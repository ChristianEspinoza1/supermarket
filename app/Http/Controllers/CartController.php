<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Cart;

//use Illuminate\Support\Facades\Storage;

class CartController extends Controller
{
    public function add(Request $request)
    {
        $producto = Producto::find($request->idproducto);
            Cart::add(
                $producto->id,
                $producto->producto,
                $producto->precio,
                1,
                array("imagen"=>$producto->imagen)
            );

        return back()->with('success',"$producto->producto ¡se ha agregado con exito!");
    }

    public function cart(){
        return view('checkout');    
    }

    public function removeitem(Request $request){
        Cart::remove([
            'id' => $request->id,
        ]);
        return back()->with('success',"El producto ha sido eliminado!");  
     }

     public function clear(){
        Cart::clear();
        return back()->with('success',"carrito vaciado!");  
     }
}