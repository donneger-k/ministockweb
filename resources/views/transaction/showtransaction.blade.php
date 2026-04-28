@extends('base')

@section('titre', 'Informations transaction')

@section('content')
    <div class="d-flex justify-content-center mt-3">
        <div class="card shadow-sm border-0" style="width: 24rem; border-radius: 16px;">
            <div class="card-body">
                <!-- Header -->
                <div class="d-flex justify-content-between align-items-start mb-2">
                    <div>
                        <h5 class="fw-bold mb-1">{{ $transaction->nom }}</h5>
                        <small class="text-muted">{{ $transaction->created_at->format('d/m/Y H:i') }}</small>
                    </div>

                    <span class="badge bg-secondary">
                        {{ $transaction->type->label() }}
                    </span>
                </div>

                <!-- Commentaire -->
                @if ($transaction->commentaire)
                    <div class="mb-3 p-2 bg-light rounded">
                        <small class="text-muted">{{ $transaction->commentaire }}</small>
                    </div>
                @endif

                <!-- Infos -->
                <div class="d-flex justify-content-between py-2 border-top">
                    <span class="text-muted">Quantité</span>
                    <strong>{{ $transaction->quantite }}</strong>
                </div>

                <div class="d-flex justify-content-between align-items-center py-2 border-top">
                    <span class="text-muted">Produit</span>

                    <div class="d-flex align-items-center gap-2">
                        <strong>{{ $transaction->nom_produit }}</strong>
                        @if ($transaction->produit_id)
                            <a href="{{ route('stock.showProduct', ['product' => $transaction->produit]) }}" class="btn btn-sm btn-outline-primary">
                                <i class="bi bi-box-arrow-up-right"></i>
                            </a>
                        @else
                            <i class="bi bi-info-circle text-danger ms-2" data-bs-toggle="tooltip" title="Ce produit a été supprimé" style="cursor: pointer;"></i>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection