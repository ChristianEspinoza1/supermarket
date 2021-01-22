@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            @if(count(Cart::getContent()))
                <table class="table table-striped">
                    <thead>
                        <th>Id</th>
                        <th>Producto</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Eliminar</th>
                    </thead>
                    <tbody>
                        @foreach(Cart::getContent() as $prod)
                            <tr>
                            <td>{{$prod->id}}</td>
                            <td>{{$prod->name}}</td>
                            <td>{{$prod->price}}</td>
                            <td>{{$prod->quantity}}</td>
                            <td>
                                <form action="{{ route('cart.removeitem') }}" method="post">
                                    @csrf
                                    <input   type="hidden" name="id" value="{{ $prod->id }}">
                                    <input type="submit" class="btn btn-link text-danger" name="agregar" value="x" >
                                </form>
                            </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>carrito vacio</p>
            
            @endif
        </div>
    </div>
</div>
@endsection