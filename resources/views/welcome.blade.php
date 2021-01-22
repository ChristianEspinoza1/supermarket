@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-3">
            @if(count(Cart::getContent()))
                <a href="cart-checkout"> Ver carrito<span class="badge badge-danger">{{ count(Cart::getContent()) }}</span></a>
            @endif
        </div>
        <div class="col-sm-9">
            <div class="row justify-content-center">
                @forelse($productos as $producto)
                    <div class="col-4 border p-5 mt-5 text-center">
                        <h1>{{ $producto->producto }}</h1>
                        <p> <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$producto->imagen }}" alt="" width="100"></p>
                        <p>{{  $producto->precio }}</p>
                        <h5>{{  $producto->descripcion }}</h5>
                        
                        <form method="post" action="{{ route('cart.add') }}" >
                            @csrf
                            <input   type="hidden" name="idproducto" value="{{ $producto->id }}">
                            <input type="submit" class="btn btn-success" name="agregar" value="Agregar al carrito" >
                        </form>
                    </div>
                @empty
                
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection