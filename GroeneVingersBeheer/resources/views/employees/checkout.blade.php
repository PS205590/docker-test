@extends('layouts.layout')

@section('content')



        <h1>Checkout</h1>
        <form method="POST" action="{{ route('checkout.store') }}">
            @csrf
            <ul>
                @foreach($products as $product)
                    <li>
                        <label>
                            <input type="checkbox" name="products[]" value="{{ $product->id }}">
                            {{ $product->name }} - ${{ $product->price }}
                        </label>
                    </li>
                @endforeach
            </ul>
            <button type="submit">Place Order</button>
        </form>
    @endsection



