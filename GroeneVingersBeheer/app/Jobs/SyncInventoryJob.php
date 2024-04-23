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
use App\Models\Inventory;

class SyncInventoryJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function handle()
    {

        $apiEndpoint = 'https://kuin.summaict.nl/api/product';


        $bearerToken = 'Bearer 75|oxURV36dYHnbyy3f94vb70qPmCwY4OLimqyjorTh';

        $response = Http::withHeaders([
            'Authorization' => $bearerToken,
        ])->get($apiEndpoint);

        if ($response->successful()) {
            $apiData = $response->json();

            foreach ($apiData as $item) {

                $existingItem = Product::where('id', $item['id'])->first();


                if (!$existingItem) {

                    $randomNumber = mt_rand(1000000000, 9999999999);

                    Product::create([
                        'id' => $item['id'],
                        'name' => $item['name'],
                        'description' => $item['description'],
                        'price' => $item['price'],
                        'image' => $item['image'],
                        'color' => $item['color'],
                        'barcode' => $randomNumber,
                        'height_cm' => $item['height_cm'],
                        'width_cm' => $item['width_cm'],
                        'depth_cm' => $item['depth_cm'],
                        'weight_gr' => $item['weight_gr'],
                    ]);

                    Inventory::updateOrCreate(
                        ['product_id' => $item['id']],
                        ['quantity' => 0]
                    );
                }
            }
        }
    }
}
