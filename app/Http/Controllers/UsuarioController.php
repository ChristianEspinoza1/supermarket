<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['usuarios']=Usuario::paginate(10);
        return view('usuarios.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $campos=[
            'nombre'=>'required|string|max:80',
            'apellido'=>'required|string|max:80',
            'email'=>'required|email',
            'contrasena'=>'required|string',
            'domicilio'=>'required|string|max:100',
            'telefono'=>'required|string|max:20',
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
            //'foto.required'=>'la foto es requerida'
        ];

        $this->validate($request,$campos,$mensaje);

        $datosUsuario = request()->except('_token');
        Usuario::insert($datosUsuario);
        return redirect('usuario')->with('mensaje','usuario registrado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario=Usuario::findOrFail($id);
        return view('usuarios.edit', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos=[
            'nombre'=>'required|string|max:80',
            'apellido'=>'required|string|max:80',
            'email'=>'required|email',
            'contrasena'=>'required|string',
            'domicilio'=>'required|string|max:100',
            'telefono'=>'required|string|max:20',
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
            //'foto.required'=>'la foto es requerida'
        ];

        $this->validate($request,$campos,$mensaje);
        

        $datosUsuario = request()->except(['_token','_method']);
        Usuario::where('id','=',$id)->update($datosUsuario);

        $usuario=Usuario::findOrFail($id);
      //  return view('usuarios.edit', compact('usuario'));
        return redirect('usuario')->with('mensaje','Usuario modificado con exito!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Usuario::destroy($id);
        return redirect('usuario')->with('mensaje','Usuario borrado con exito!');
    }
}