@extends('base')

@section('titre', 'Stock')

@section('content')

    @if ($products->isEmpty())
        <p class="alert alert-info">Aucun produit dans le stock</p>
    @else
        <div class="row g-3">
        @foreach ($products as $product)
            <div class="col-12 col-sm-6 col-md-4">
                <div class="card center text-center">
                    <div class="card-body">
                        <h3 class="card-title">{{ $product->nom }}</h3>
                        <p> <span class="fw-bold">Catégorie : </span> {{ $product->categorie }}</p>
                        <p> <span class="fw-bold">Prix :</span> {{ $product->prix }} €</p>
                        <a class="btn btn-primary w-100" href="{{ route('stock.showProduct', ['product' => $product]) }}">Voir plus</a>
                    </div>
                </div>
            </div>
        @endforeach
        </div>

        {{ $products->links() }}
    @endif

@endsection