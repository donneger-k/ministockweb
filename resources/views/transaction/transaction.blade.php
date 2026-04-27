@extends('base')

@section('titre', 'Transactions')

@section('content')

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
                            <a class="btn btn-sm btn-primary" href="#">Voir</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        {{ $transactions->links() }}
    @endif

@endsection