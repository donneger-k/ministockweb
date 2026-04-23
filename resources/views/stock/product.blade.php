@extends('base')

@section('titre', $product->nom)

@section('content')

    <p>{{ $product->categorie }}</p>
    <p>{{ $product->ref }}</p>

    <div class="d-flex gap-2">
        <a class="btn btn-primary" href="{{ route('stock.editProduct', ['product' => $product]) }}">Modifier</a>
        <a class="btn btn-danger" href="{{ route('stock.confirmationDeleteProduct', ['product' => $product]) }}">Supprimer</a>
    </div>

@endsection