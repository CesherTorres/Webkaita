<?php

namespace App\Exports;

use App\Models\Ingreso;
use Maatwebsite\Excel\Concerns\FromCollection;

class IngresosExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Ingreso::all();
    }
}
