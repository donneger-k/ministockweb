    @extends('base')

@section('titre', 'Accueil')

@section('content')

    <div class="card position-relative mt-3">
        <div class="position-absolute top-0 start-0 translate-middle-y ms-3 px-2 bg-white fw-bold">
            <h3 class="mb-1 fw-bold">Stock</h3>
        </div>
        <div class="card-body mt-2">
            <div class="container row g-2">
                <div class="col-12 col-sm-6 col-md-6">
                    <div class="card center text-center">
                        <div class="card-body">
                            <img class="card-img-top img-fluid w-25  mb-3" src="{{ asset('icons/stock.png') }}" alt="stock">
                            <a class="btn btn-primary w-100" href="{{ route('stock') }}">Stock</a>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-6">
                    <div class="card center text-center">
                        <div class="card-body">
                            <img class="card-img-top img-fluid w-25  mb-3" src="{{ asset('icons/add-product.png') }}" alt="add product">
                            <a class="btn btn-primary w-100" href="{{ route('stock.addProduct') }}">Ajouter</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="card position-relative mt-3">
        <div class="position-absolute top-0 start-0 translate-middle-y ms-3 px-2 bg-white fw-bold">
            <h3 class="mb-1 fw-bold">Transactions</h3>
        </div>
        <div class="card-body mt-2">
            <div class="container row g-2">
                <div class="col-12 col-sm-6 col-md-6">
                    <div class="card center text-center">
                        <div class="card-body">
                            <img class="card-img-top img-fluid w-25  mb-3" src="{{ asset('icons/transaction.png') }}" alt="stock">
                            <a class="btn btn-primary w-100" href="{{ route('transaction') }}">Transactions</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection