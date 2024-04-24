<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Inventory;
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
        $products = Product::with('inventory')->get();

        return view('management.inventory', compact('products'));
    }

    public function orderView()
    {
        $products = Product::with('inventory')->get();

        return view('management.wholesale', compact('products'));
    }

    public function order(Request $request)
    {
        // Validate form data
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        // Find the inventory record for the product
        $inventory = Inventory::where('product_id', $request->product_id)->first();

        // If inventory record exists, update the quantity, otherwise create a new record
        if ($inventory) {
            // Increment the quantity
            $inventory->increment('quantity', $request->quantity);
        } else {
            // Create a new inventory record
            Inventory::create([
                'product_id' => $request->product_id,
                'quantity' => $request->quantity,
            ]);
        }



        // Redirect back with success message
        return redirect()->route('management.wholesale')->with('success', 'Inventory ordered successfully.');
    }




}
