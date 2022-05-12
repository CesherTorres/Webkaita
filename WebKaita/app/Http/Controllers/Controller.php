<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\User;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function logout () {
        //logout user
        auth()->logout();
        // redirect to homepage
        return view('auth.login');
    }

    public function index()
    {
        switch(auth()->user()->tipousuario_id){
            case ('1'):
                return view('welcome');//si es administrador continua al weolcome
            break;
            case ('2'):
                return view('dashboard');//si es administrador continua al weolcome
            break;
        }
    }
}
