@extends('base')

@section('titre', 'Stock')

@section('content')

    <h2>Stock</h2>

    @foreach ($products as $product)
        <a class="card center" style="width: 18rem;" href="{{ route('stock.showProduct', ['product' => $product]) }}">
            <div class="card-body">
                <h3>{{ $product->nom }}</h3>
                <p>{{ $product->id }}</p>
            </div>
        </a>
    @endforeach

    {{ $products->links() }}

@endsection