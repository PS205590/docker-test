@extends('layouts.layout')

@section('content')
    <h1 class="mt-4">Product information</h1>
    
    <div class="product-content border rounded p-4">
        <div class="row mb-3">
            <div class="col-md-3 font-weight-bold">Product:</div>
            <div class="col-md-9">{{ $product['name'] }}</div>
        </div>
        <div class="row mb-3">
            <div class="col-md-3 font-weight-bold">Foto:</div>
            <div class="col-md-9"><img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" class="img-fluid" style="max-width: 100px;"></div>
        </div>
        <div class="row mb-3">
            <div class="col-md-3 font-weight-bold">Beschrijving:</div>
            <div class="col-md-9">{{ $product['description'] }}</div>
        </div>
        <div class="row mb-3">
            <div class="col-md-3 font-weight-bold">Prijs:</div>
            <div class="col-md-9">{{ $product['price'] }}</div>
        </div>
        <div class="row mb-3">
            <div class="col-md-3 font-weight-bold">Barcode:</div>
            <div class="col-md-9">{!! DNS1D::getBarcodeHTML("$product->barcode", 'PHARMA', 2, 100) !!} {{$product['barcode']}}</div>
        </div>
    </div>

@endsection
