
@extends('layouts.app')

@section('content')
<div class="container">

    <form method="post" action="{{ url('/usuario/'.$usuario->id) }}">
    @csrf
    {{ method_field('PATCH') }}

    @include('usuarios.form',['modo'=>'Editar'])

    </form>
</div>
@endsection
