@extends('base')

@section('titre', 'Stock')

@section('content')
    <div class="container mb-3">
        <form action="{{ route('stock.searchProduct') }}" method="GET" class="row g-2 align-items-center">
            @csrf
            <div class="col">
                <input class="form-control @error('search') is-invalid @enderror" type="text" name="search" placeholder="Rechercher un produit">
                @error('search')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-auto">
                <select class="form-select @error('filter') is-invalid @enderror" name="filter">
                    <option value="ref">Référence</option>
                    <option selected value="nom">Nom</option>
                    <option value="categorie">Catégorie</option>
                    <option value="prix">Prix</option>
                </select>
                @error('filter')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-auto">
                <button type="submit" class="btn btn-primary">Rechercher</button>
            </div>
        </form>
    </div>


    @if ($products->isEmpty())
        <p class="alert alert-info">Aucun produit dans le stock</p>
    @else
        <div class="row g-3">
        @foreach ($products as $product)
            <div class="col-12 col-sm-6 col-md-4">
                <div class="card center position-relative text-center border-2 @if (!$product->in_stock()) border-danger @elseif ($product->is_critical()) border-warning @endif">
                    <div class="card-body">
                        @if (!$product->in_stock())
                            <i
                                class="bg-white bi bi-x-circle-fill text-danger position-absolute"
                                data-bs-toggle="tooltip"
                                style="top: -18px; right: 15px; font-size: 1.5rem;"
                                title="Stock épuisé"
                            ></i>
                        @elseif ($product->is_critical())
                            <i
                                class="bg-white bi bi-exclamation-triangle-fill text-warning position-absolute"
                                data-bs-toggle="tooltip"
                                style="top: -18px; right: 15px; font-size: 1.5rem;"
                                title="Stock presque épuisé"
                            ></i>
                        @endif


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