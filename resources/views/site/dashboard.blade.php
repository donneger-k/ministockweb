@extends('base')

@section('titre', 'Dashboard')

@section('content')
    <div class="container py-4">
        <!-- INFOS GENERALES -->
        <div class="row g-3 mb-4">
            <div class="col-md-3">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h6 class="text-muted">Produits</h6>
                        <h3>{{ $data['totalProducts'] }}</h3>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h6 class="text-warning">Stock critique</h6>
                        <h3>{{ $data['criticalProducts'] }}</h3>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h6 class="text-danger">Ruptures</h6>
                        <h3>{{ $data['outOfStockProducts'] }}</h3>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h6>Transactions</h6>
                        <h3>{{ $data['totalTransactions'] }}</h3>
                    </div>
                </div>
            </div>

        </div>

        <!-- GRAPHIQUES-->
        <div class="row g-3 mb-4">
            <div class="col-lg-8">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-header">
                        <span class="fw-bold">Évolution des transactions</span>
                    </div>
                    <div class="card-body">
                        <canvas id="transactionsChart"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-header">
                        <span class="fw-bold">Répartition</span>
                    </div>
                    <div class="card-body d-flex align-items-center">
                        <canvas id="pieChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- INFOS PRODUIT -->
        <div class="row g-3">
            <!-- Produits Critiques -->
            <div class="col-md-6">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-warning-subtle">
                        Produits critiques
                    </div>
                    <ul class="list-group list-group-flush">
                        @forelse ($data['listOfCriticalProducts'] as $p)
                            <li class="list-group-item d-flex justify-content-between">
                                <a href="/stock/{{ $p->id }}">{{ $p->nom }}</a>
                                <span class="badge bg-warning text-dark">Critique</span>
                            </li>
                        @empty
                            <li class="list-group-item text-muted">Aucun produit critique</li>
                        @endforelse
                    </ul>
                </div>
            </div>

            <!-- Produits Ruptures -->
            <div class="col-md-6">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-danger-subtle">
                        Produits en rupture
                    </div>
                    <ul class="list-group list-group-flush">
                        @forelse ($data['listOfOutOfStockProducts'] as $p)
                            <li class="list-group-item d-flex justify-content-between">
                                <a href="/stock/{{ $p->id }}">{{ $p->nom }}</a>
                                <span class="badge bg-danger">Rupture</span>
                            </li>
                        @empty
                            <li class="list-group-item text-muted">Tout est en stock</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const labelsGraphiqueBarre = @json($data['listOfTransactions']['months']);
        const dataGraphiqueBarre = @json($data['listOfTransactions']['counts']);

        new Chart(document.getElementById('transactionsChart'), {
            type: 'line',
            data: {
                labels: labelsGraphiqueBarre,
                datasets: [{
                    label: 'Transactions',
                    data: dataGraphiqueBarre,
                    tension: 0.3,
                    fill: true
                }]
            }
        });

        const labelsGraphiqueCercle = @json($data['detailsTransactionOfTheMonth']['labels']);
        const dataGraphiqueCercle = @json($data['detailsTransactionOfTheMonth']['data']);
        const colors = @json($data['detailsTransactionOfTheMonth']['colors']);

        new Chart(document.getElementById('pieChart'), {
            type: 'pie',
            data: {
                labels: labelsGraphiqueCercle,
                datasets: [{
                    data: dataGraphiqueCercle,
                    backgroundColor: colors
                }]
            }
        });
    </script>
@endsection