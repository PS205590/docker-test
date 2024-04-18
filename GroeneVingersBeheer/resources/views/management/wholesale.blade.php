@extends('layouts.layout')

@section('content')
    <div class="container">
        <h1>Groothandel</h1>
        <form method="POST" action="{{ route('inventory.order') }}">
            @csrf
            <div class="form-group">
                <label for="product_id">Product:</label>
                <select name="product_id" id="product_id" class="form-control">
                    @foreach($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="quantity">Aantal:</label>
                <input type="number" name="quantity" id="quantity" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Bestellen</button>
        </form>
    </div>
@endsection
