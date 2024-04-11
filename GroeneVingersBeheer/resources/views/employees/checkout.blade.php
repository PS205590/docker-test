@extends('layouts.layout')

@section('content')

    <form action="/checkout" method="POST">
        @csrf
        <div>
            <label for="product_name">Product Name:</label>
            <input type="text" id="product_name" name="product_name">
        </div>
        <div>
            <label for="price">Price:</label>
            <input type="number" id="price" name="price">
        </div>
        <button type="submit">Add to Cart</button>
    </form>

    <!-- Display added products -->
    @if(!empty($products))
        <ul>
            @foreach($products as $product)
                <li>{{ $product['name'] }} - ${{ $product['price'] }}</li>
            @endforeach
        </ul>
    @else
        <p>No products added yet.</p>
    @endif

@endsection
