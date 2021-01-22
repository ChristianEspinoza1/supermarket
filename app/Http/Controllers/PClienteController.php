<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

//use Illuminate\Support\Facades\Storage;

class PClienteController extends Controller
{
    public function index()
    {
        $datos['productos']=Producto::all();
        return view('welcome',$datos);
    }
}