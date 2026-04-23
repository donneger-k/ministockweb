@extends('base')

@section('titre', $product->nom)

@section('content')

    <p>{{ $product->categorie }}</p>
    <p>{{ $product->ref }}</p>

    <a class="btn btn-primary" href="{{ route('stock.editProduct', ['product' => $product]) }}">Modifier</a>

@endsection