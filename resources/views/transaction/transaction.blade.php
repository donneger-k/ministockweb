@extends('base')

@section('titre', 'Transactions')

@section('content')

    <div class="container mb-3">
        <form action="{{ route('transaction.searchTransaction') }}" method="POST" class="row g-2 align-items-center">
            @csrf
            <div class="col">
                <input class="form-control @error('search') is-invalid @enderror" type="text" name="search" placeholder="Rechercher une transaction">
                @error('search')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-auto">
                <select class="form-select @error('filter') is-invalid @enderror" name="filter">
                    <option selected value="nom">Nom Transaction</option>
                    <option value="created_at">Date</option>
                    <option value="nom_produit">Nom produit</option>
                    <option value="type">Type</option>
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

    @if ($transactions->isEmpty())
        <p class="alert alert-info">Aucunes transactions enregistrées</p>
    @else
        <div class="card shadow-sm">
            <div class="card-body p-0">
                <ul class="list-group list-group-flush">
                    @foreach ($transactions as $transaction)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <div class="fw-bold">{{ $transaction->nom }}</div>
                                <small class="text-muted">{{ $transaction->created_at->format('d/m/Y H:i') }}</small>
                            </div>
                            <a class="btn btn-sm btn-primary" href="{{ route('transaction.showTransaction', ['transaction' => $transaction]) }}">Voir</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        {{ $transactions->links() }}
    @endif

@endsection