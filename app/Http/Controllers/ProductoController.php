<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['productos']=Producto::paginate(10);
        return view('productos.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('productos.create');
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
            'producto'=>'required|string|max:80',
            'descripcion'=>'required|string|max:80',
            'precio'=>'required',
            'stock'=>'required',
            'TipoId'=>'required',
            'departamentoId'=>'required',
            'imagen'=>'required|max:10000|mimes:jpeg,png,jpg',
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
            'imagen.required'=>'la imagen es requerida'
        ];

        $this->validate($request,$campos,$mensaje);

        $datosProducto = request()->except('_token');

        if($request->hasFile('imagen')){
            $datosProducto['imagen']=$request->file('imagen')->store('uploads','public');
        }

        Producto::insert($datosProducto);
        return redirect('producto')->with('mensaje','Producto registrado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto=Producto::findOrFail($id);
        return view('productos.edit', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos=[
            'producto'=>'required|string|max:80',
            'descripcion'=>'required|string|max:80',
            'precio'=>'required',
            'stock'=>'required',
            'TipoId'=>'required',
            'departamentoId'=>'required',
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
            //'foto.required'=>'la foto es requerida'
        ];
        
        if($request->hasFile('imagen')){
            $campos=['imagen'=>'required|max:10000|mimes:jpeg,png,jpg'];
            $mensaje=['imagen.required'=>'La imagen es requerida'];
        }
        $this->validate($request,$campos,$mensaje);
        
        $datosProducto = request()->except(['_token','_method']);

        if($request->hasFile('imagen')){
            $producto=Producto::findOrFail($id);

            Storage::delete('public/'.$producto->imagen);

            $datosProducto['imagen']=$request->file('imagen')->store('uploads','public');
        }

        Producto::where('id','=',$id)->update($datosProducto);

        $producto=Producto::findOrFail($id);
         // return view('usuarios.edit', compact('usuario'));
        return redirect('producto')->with('mensaje','Producto modificado con exito!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $producto=Producto::findOrFail($id);

        if(Storage::delete('public/'.$producto->imagen)){
            Producto::destroy($id);
        }
        
        return redirect('producto')->with('mensaje','Producto borrado con exito!');
    }
}
