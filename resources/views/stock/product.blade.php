@extends('base')

@section('titre', $product->nom)

@section('content')

    <p>{{ $product->categorie }}</p>

@endsection