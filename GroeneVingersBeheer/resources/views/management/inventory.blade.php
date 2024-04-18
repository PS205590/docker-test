@extends('layouts.layout')

@section('content')
    <h1>Inventaris</h1>

    <!-- Loading screen -->
    <div id="loading-screen" style="display: flex; justify-content: center; align-items: center; height: 100vh;">
        <div class="spinner"></div>
        <p>Loading...</p>
    </div>

    <!-- Inventory content (hidden by default) -->
    <div id="inventory-content" style="display: none;">
        <table>
            <thead>
            <tr>
                <th>Product</th>
                <th>Aantal</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>
                        <a style="text-decoration: none;" href="{{ route('management.product.show', ['id' => $product['id']]) }}">
                            {{ $product['name'] }}
                        </a>
                    </td>
                    <td>{{ optional($product->inventory)->quantity ?? 'N/A' }}</td> <!-- Display quantity -->
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <script>
        // Display loading screen
        document.getElementById("loading-screen").style.display = "flex";

        // Simulate delay for demonstration purposes
        setTimeout(function() {
            // Hide loading screen
            document.getElementById("loading-screen").style.display = "none";
            // Show inventory content
            document.getElementById("inventory-content").style.display = "block";
        }, 2000); // Adjust delay time as needed
    </script>
@endsection
