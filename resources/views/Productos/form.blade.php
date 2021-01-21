<h1> {{ $modo }} Producto</h1>

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
    <label for="producto"> Producto </label>
    <input type="text" class="form-control" name="producto" id="producto" value="{{ isset($producto->producto)?$producto->producto:old('producto') }}">

    <label for="descripcion"> Descripcion </label>
    <input type="text" class="form-control" name="descripcion" id="descripcion" value="{{ isset($producto->descripcion)?$producto->descripcion:old('descripcion') }}">

    <label for="precio"> Precio </label>
    <input type="text" class="form-control" name="precio" id="precio" value="{{ isset($producto->precio)?$producto->precio:old('precio') }}">

    <label for="stock"> Stock </label>
    <input type="text" class="form-control" name="stock" id="stock" value="{{ isset($producto->stock)?$producto->stock:old('stock') }}">

    <label for="departamentoId"> Departamento </label>
    <input type="text" class="form-control" name="departamentoId" id="departamentoId" value="{{ isset($producto->departamentoId)?$producto->departamentoId:old('departamentoId') }}">

    <label for="imagen"> Imagen </label><br>
    @if(isset($producto->imagen))
    <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$producto->imagen }}" alt="" width="100">
    @endif
    <input type="file" class="form-control" name="imagen" id="imagen"  value="{{ isset($producto->imagen)?$producto->imagen:old('imagen') }}">
    <br>
    <input type="submit" class="btn btn-success" Value="{{ $modo }}">

    <a href="{{ url('producto') }}" class="btn btn-primary">Regresar</a>
</div>