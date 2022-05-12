<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class documentacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function acercade()
    {
        return view('acercade');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ayuda()
    {
        return view('ayuda');
    }


}
