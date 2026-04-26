@extends('base')

@section('titre', 'Informations produit')

@section('content')

    @if (!$product->in_stock())
        <span class="alert alert-danger ">
            Stock épuisé
        </span>
    @elseif ($product->is_critical())
        <span class="alert alert-warning">
            Stock presque épuisé
        </span>
    @endif

    <div class="d-flex flex-column align-items-center mt-2">

        <div class="card shadow-lg border-0" style="width: 22rem; border-radius: 15px;">
            <div class="card-body">
                <!-- Header avec nom + prix -->
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <h4 class="card-title fw-bold mb-1">
                            {{ $product->nom }}
                        </h4>
                        <p class="text-muted mb-0">
                            Réf : {{ $product->ref }}
                        </p>
                    </div>

                    <h2 class="fw-bold">
                        {{ $product->prix }} €
                    </h2>
                </div>

                <span class="mt-2 badge bg-secondary mb-3">
                    {{ $product->categorie }}
                </span>

                <div class="d-flex justify-content-between @if (!$product->in_stock()) py-2 px-3 alert alert-danger @elseif ($product->is_critical()) py-2 px-3 alert alert-warning @else '' @endif">
                    <span>Quantité :</span>
                    <strong class="">
                        {{ $product->quantite }}
                    </strong>
                </div>
            </div>
        </div>

        <!-- Boutons alignés avec la carte -->
        <div class="d-flex justify-content-center gap-2 mt-4" style="width: 22rem;">
            <a class="btn btn-primary" href="{{ route('stock.editProduct', ['product' => $product]) }}">Modifier</a>
            <a class="btn btn-danger" href="{{ route('stock.confirmationDeleteProduct', ['product' => $product]) }}">Supprimer</a>
        </div>
    </div>

@endsection