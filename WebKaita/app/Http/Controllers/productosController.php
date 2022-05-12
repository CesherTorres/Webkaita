<?php

namespace App\Http\Controllers;

use App\Exports\ProductosExport;
use App\Http\Requests\StoreProductoRequest;
use App\Models\Category;
use App\Models\Etiqueta;
use App\Models\Image;
use App\Models\Marca;
use App\Models\Medida;
use App\Models\Producto;
use App\Models\Store;
use App\Models\Tipo;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class productosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::all();
        return view('productos.index', compact('productos'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Category::all();
        $tipos = Tipo::all();
        $medidas = Medida::all();
        $marcas = Marca::all();
        $etiquetas = Etiqueta::all();
        $now = Carbon::now();
        return view('productos.create', compact('categorias', 'marcas', 'now', 'medidas', 'etiquetas', 'tipos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductoRequest $request)
    {
        // condicion para guardar el nombre de la imagen principal
        if($request->hasFile('imagen')){
            $file = $request->file('imagen');
            $img_producto = time().$file->getClientOriginalName();
            $file->move(public_path().'/images/productos/', $img_producto);
        }
        // condicion para guardar el nombre de las imagenes opcionales
        $urlimagenes = [];
        if ($request->hasFile('imagenes')){
            $imagenes = $request->file('imagenes');
            foreach ($imagenes as $imagen) {
                $nombre = time().'_'.$imagen->getClientOriginalName();
                $imagen->move(public_path().'/images/productos-opcional/', $nombre);
                $urlimagenes[]['url']='/images/productos-opcional/'.$nombre;
            }
        }
        // guardar un nuevo producto
        $producto = new Producto();
        $producto->name = $request->input('name');
        $producto->slug = Str::slug($request->input('name'));
        $producto->codigo = $request->input('codigo');
        $producto->temperatura = $request->input('temperatura');
        $producto->descripcion = $request->input('descripcion');
        $producto->beneficios = $request->input('beneficios');
        $producto->imagen = $img_producto;
        $producto->fecha = $request->input('fecha');
        $producto->category_id = $request->input('category_id');
        $producto->tipo_id = $request->input('tipo_id');
        $producto->marca_id = $request->input('marca_id');
        $producto->medida_id = $request->input('medida_id');
        $producto->save();
        // condicional para relacionar las etiquetas seleccionadas
        if($request->input('etiqueta')){
            $producto->etiquetas()->attach($request->input('etiqueta'));
        }
        // guardar las imagenes opcionales
        $producto->images()->createMany($urlimagenes);
        // redireccionar a la vista index de productos
        return redirect()->route('productos.index')->with('addproducto', 'ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        return view('productos.show', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        $categorias = Category::all();
        $medidas = Medida::all();
        $marcas = Marca::all();
        $etiquetas = Etiqueta::all();
        $tipos = Tipo::all();
        $now = Carbon::now();
        return view('productos.edit', compact('categorias', 'marcas', 'now', 'medidas', 'etiquetas', 'tipos', 'producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        $producto->fill($request->except('imagen', 'fecha'));
        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $imagen = time().$file->getClientOriginalName();
            if ($producto->imagen) {
                $file_path = public_path(). '/images/productos/'.$producto->imagen;
                File::delete($file_path);
                $producto->update([
                    $producto->imagen = $imagen,
                    $file->move(public_path().'/images/productos/', $imagen)
                ]);
            }else{
                $producto->create([
                    $producto->imagen = $imagen,
                    $file->move(public_path().'/images/productos/', $imagen)
                ]);
            }
        }
        // condicion para guardar el nombre de las imagenes opcionales
        $urlimagenes = [];
        if ($request->hasFile('imagenes')){
            $imagenes = $request->file('imagenes');
            foreach ($imagenes as $imagen) {
                $nombre = time().'_'.$imagen->getClientOriginalName();
                $imagen->move(public_path().'/images/productos-opcional/', $nombre);
                $urlimagenes[]['url']='/images/productos-opcional/'.$nombre;
            }
        }
        $producto->save();
        // guardar las imagenes opcionales
        $producto->images()->createMany($urlimagenes);
        if($request->input('etiquetas')){
            $producto->etiquetas()->detach();
            $producto->etiquetas()->attach($request->input('etiquetas'));
        }
        return redirect()->route('productos.index')->with('update', 'ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        // eliminar la imagen principal del producto
        $file_path = public_path(). '/images/productos/'.$producto->imagen; 
        File::delete($file_path);
        // eliminar las imagenes opcionales del producto
        $images = $producto->images;
        foreach ($images as $image) {
            File::delete(public_path().$image->url);
            $image->delete();
        }
        // eliminar registro de productos
        $producto->delete();
        return redirect()->route('productos.index')->with('delete', 'ok');
    }


    public function deleteImage($id)
    {
        $image = Image::find($id);
        $file_path = public_path(). $image->url; 
        File::delete($file_path);
        $image->delete();
        return redirect()->back();
    }

        // reportes
        public function reporteExcel()
        {
            return Excel::download(new ProductosExport, 'Kaita-Productos-Registrados.xlsx');
        }
    
        public function reportePrintPdf()
        {
            $now = Carbon::now();
            $productos = Producto::all();
            $pdf = PDF::loadView('reportes.almacen.productos-reportePdf', ['productos'=>$productos, 'now'=>$now]);
            return $pdf->stream('Reporte-Productos-PDF.pdf');
        }
}
