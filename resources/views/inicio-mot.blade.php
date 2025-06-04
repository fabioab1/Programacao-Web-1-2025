@extends('layout')

@section('conteudo')

    <h1>e-PAS</h1>
    <p>Seja bem-vindo(a) motorista {{ Auth::user()->name }}!</p>

@endsection