<h1> {{ $modo }} Usuario</h1>

@if(count($errors)>0)
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach( $errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class ="form-group">
    <label for="nombre"> Nombre </label>
    <input type="text" class="form-control" name="nombre" id="nombre" value="{{ isset($usuario->nombre)?$usuario->nombre:old('nombre') }}">

    <label for="apellido"> Apellidos </label>
    <input type="text" class="form-control" name="apellido" id="apellido" value="{{ isset($usuario->apellido)?$usuario->apellido:old('apellido') }}">

    <label for="email"> Correo electrónico </label>
    <input type="text" class="form-control" name="email" id="email" value="{{ isset($usuario->email)?$usuario->email:old('email') }}">

    <label for="contrasena"> Contraseña </label>
    <input type="text" class="form-control" name="contrasena" id="contrasena" value="{{ isset($usuario->contrasena)?$usuario->contrasena:old('contrasena') }}">

    <label for="domicilio"> Domicilio </label>
    <input type="text" class="form-control" name="domicilio" id="domicilio" value="{{ isset($usuario->domicilio)?$usuario->domicilio:old('domicilio') }}">

    <label for="telefono"> Teléfono </label>
    <input type="text" class="form-control" name="telefono" id="telefono" value="{{ isset($usuario->telefono)?$usuario->telefono:old('telefono') }}">
    <br>
    <input type="submit" class="btn btn-success" Value="{{ $modo }}">

    <a href="{{ url('usuario') }}" class="btn btn-primary">Regresar</a>
</div>