@extends('base')

@section('titre', 'Supprimer un produit')

@section('content')

    <p class="alert alert-danger"> Voulez-vous vraiment supprimer le produit {{ $product->nom }} ?</p>
    <form action="" method="post">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger">Oui</button>
        <a class="btn btn-primary" href="{{ route('stock.showProduct', ['product' => $product]) }}">Non</a>
    </form>

@endsection