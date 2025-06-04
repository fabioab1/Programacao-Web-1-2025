@extends('layout')

@section('conteudo')

    <h1>e-PAS</h1>
    <p>Seja bem-vindo(a) administrador(a) {{ Auth::user()->name }}!</p>



@endsection