@extends('base')

@section('content')

    <h2>Stock</h2>

    @foreach ($products as $product)
        <h3>{{ $product->nom }}</h3>
    @endforeach


@endsection