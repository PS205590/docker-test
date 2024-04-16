<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Http;
use Barryvdh\DomPDF\Facade\Pdf;

class CheckoutController extends Controller
{

    public function index()
    {
        $products = Product::all();
        return view('employees.checkout', compact('products'));
    }

    public function store(Request $request)
    {

        $selectedProducts = [];
        $totalPrice = 0;
        $selectedProductIds = $request->input('products', []);


        $productQuantities = array_count_values($selectedProductIds);

        foreach ($productQuantities as $productId => $quantity) {
            $product = Product::find($productId);
            if ($product) {
                $selectedProducts[] = [
                    'name' => $product->name,
                    'price' => $product->price,
                    'quantity' => $quantity,
                ];
                $totalPrice += $product->price * $quantity;
            }
        }

        $customerName = $request->input('customer_name');
        $customerAddress = $request->input('address');
        $zipCode = $request->input('zip_code');
        $fullAddress = "$customerAddress, $zipCode";


        $pdfContent = view('employees.invoice', compact('customerName','selectedProducts', 'totalPrice', 'customerName', 'fullAddress'))->render();

        $pdf = PDF::loadHTML($pdfContent);
        $pdf->setPaper('A4', 'portrait');


        return $pdf->stream('invoice.pdf');

    }









}
