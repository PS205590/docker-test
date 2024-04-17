<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use App\Models\Product;
use Illuminate\Support\Facades\Cache;

class SyncInventoryJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function handle()
    {
        // Define your API endpoint
        $apiEndpoint = 'https://kuin.summaict.nl/api/product';

        // Define your bearer token
        $bearerToken = 'Bearer 75|oxURV36dYHnbyy3f94vb70qPmCwY4OLimqyjorTh';

        // Make the HTTP request with bearer token included in headers
        $response = Http::withHeaders([
            'Authorization' => $bearerToken,
        ])->get($apiEndpoint);

        if ($response->successful()) {
            $apiData = $response->json();



            // Iterate through API data and create new products in the database

            // Iterate through API data
            foreach ($apiData as $item) {
                // Check if the item with the same ID already exists in the database
                $existingItem = Product::where('id', $item['id'])->first();

                // If the item doesn't exist, create it
                if (!$existingItem) {
                    Product::create($item);
                }
            }
        }
    }
}
