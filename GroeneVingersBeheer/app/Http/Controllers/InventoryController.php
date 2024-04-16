<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Http;
use App\Console\Commands\SyncInventoryCommand;
use Illuminate\Support\Facades\Cache;
use App\Jobs\SyncInventoryJob;

class InventoryController extends Controller
{
    public function index()
    {
        // Dispatch job to sync inventory
        SyncInventoryJob::dispatch();

        // Retrieve the latest products from the database
        $products = Product::all();

        // Display inventory page with the latest data
        return view('management.inventory', compact('products'));
    }

}
