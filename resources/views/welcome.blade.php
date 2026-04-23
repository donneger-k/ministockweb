    @extends('base')

@section('titre', 'Accueil')

@section('content')

    <div class="container row g-3">

        <div class="col-12 col-sm-6 col-md-4">
            <div class="card center text-center">
                <div class="card-body">
                    <img class="card-img-top img-fluid w-25  mb-3" src="{{ asset('icons/stock.png') }}" alt="stock">
                    <a class="btn btn-primary w-100" href="{{ route('stock') }}">Stock</a>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-md-4">
            <div class="card center text-center">
                <div class="card-body">
                    <img class="card-img-top img-fluid w-25  mb-3" src="{{ asset('icons/add-product.png') }}" alt="add product">
                    <a class="btn btn-primary w-100" href="{{ route('stock.addProduct') }}">Ajouter</a>
                </div>
            </div>
        </div>
    </div>

@endsection