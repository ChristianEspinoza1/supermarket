@extends('layouts.app')

@section('content')
<div class="container">

    <form action="{{ url('/producto') }}" method="post" enctype="multipart/form-data">
    @csrf
    @include('productos.form',['modo'=>'Crear'])
    </form>
</div>
@endsection
