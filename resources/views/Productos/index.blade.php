@extends('layouts.app')

@section('content')
<div class="container">
 
        @if(Session::has('mensaje'))   
        <div class="alert alert-success alert-dismissible" role="alert">
            {{ Session::get('mensaje') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times</span>
            </button>
        </div>
        @endif
        


    <a href="{{ url('producto/create') }}" class="btn btn-success">Registrar producto</a>
    <br><br>
    <table class="table table-light">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Imagen</th>
                <th>Producto</th>
                <th>Descripcion</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Tipo de unidad</th>
                <th>departamento</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productos as $producto)
            <tr>
                <td>{{ $producto->id }}</td>
                <td>
                    <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$producto->imagen }}" alt="" width="100">
                </td>
                <td>{{ $producto->producto }}</td>
                <td>{{ $producto->descripcion }}</td>
                <td>{{ $producto->precio }}</td>
                <td>{{ $producto->stock }}</td>
                <td>{{ $producto->tipoId }}</td>
                <td>{{ $producto->departamentoId }}</td>
                <td>
                    <a href="{{ url('/producto/'.$producto->id.'/edit') }}" class="btn btn-warning">
                        Editar
                    </a> 
                    <form method="post" action="{{ url('/producto/'.$producto->id)}}" class="d-inline" >
                        @csrf 
                        {{ method_field('DELETE') }}
                        <input class="btn btn-danger" type="submit" onclick="return confirm('Quieres borrar?')" value="Borrar" >    
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!! $productos->links()!!}
</div>
@endsection