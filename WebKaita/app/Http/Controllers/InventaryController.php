<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InventaryController extends Controller
{
    public function index(){
        return view('inventary.index');
    }
    public function create(){
        return view('inventary.create');
    }
}
