@extends('layouts.layout')

@section('content')
    <h1>Product information</h1>


    <div id="product-content">
        <table>
            <thead>
            <tr>
                <th>Product</th>
                <th>Beschrijving</th>
                <th>Prijs</th>
                <th>Barcode</th>
                <th>Foto</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $product['name'] }}</td>
                    <td>{{ $product['description'] }}</td>
                    <td>{{ $product['price'] }}</td>
                    <!-- <td>{!! DNS2D::getBarcodeHTML("$product->barcode", 'QRCODE') !!}</td> -->
                    <td>{!! DNS1D::getBarcodeHTML("$product->barcode", 'PHARMA', 2, 100) !!} {{$product['barcode']}}</td>
                    <td><img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" style="max-width: 100px;"></td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
