@extends('layouts.app')

@section('content')
<div class="container">

    <form action="{{ url('/usuario') }}" method="post">
    @csrf
    @include('usuarios.form',['modo'=>'Crear'])
    </form>
</div>
@endsection
