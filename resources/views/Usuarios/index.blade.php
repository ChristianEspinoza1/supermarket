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
        


    <a href="{{ url('usuario/create') }}" class="btn btn-success">Registrar usuario</a>
    <br><br>
    <table class="table table-light">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Correo</th>
                <th>Domicilio</th>
                <th>Teléfono</th>
                <th>Rol</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usuarios as $usuario)
            <tr>
                <td>{{ $usuario->id }}</td>
                <td>{{ $usuario->nombre }}</td>
                <td>{{ $usuario->apellido }}</td>
                <td>{{ $usuario->email }}</td>
                <td>{{ $usuario->domicilio }}</td>
                <td>{{ $usuario->telefono }}</td>
                <td>{{ $usuario->rolId }}</td>
                <td>
                    <a href="{{ url('/usuario/'.$usuario->id.'/edit') }}" class="btn btn-warning">
                        Editar
                    </a> 
                    <form method="post" action="{{ url('/usuario/'.$usuario->id)}}" class="d-inline" >
                        @csrf 
                        {{ method_field('DELETE') }}
                        <input class="btn btn-danger" type="submit" onclick="return confirm('Quieres borrar?')" value="Borrar" >    
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!! $usuarios->links()!!}
</div>
@endsection