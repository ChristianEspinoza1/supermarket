
@extends('layouts.app')

@section('content')
<div class="container">

    <form method="post" action="{{ url('/producto/'.$producto->id) }}" enctype="multipart/form-data">
    @csrf
    {{ method_field('PATCH') }}

    @include('productos.form',['modo'=>'Editar'])

    </form>
</div>
@endsection
