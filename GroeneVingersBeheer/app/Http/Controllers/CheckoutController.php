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
        // Handle storing the order

        // Store selected products in session
        $selectedProducts = [];
        $totalPrice = 0;
        foreach ($request->input('products', []) as $productId) {
            $product = Product::find($productId);
            if ($product) {
                $selectedProducts[] = [
                    'name' => $product->name,
                    'price' => $product->price,
                ];
                $totalPrice += $product->price;
            }
        }
        Session::put('selectedProducts', $selectedProducts);

        // Generate PDF invoice
        $pdfContent = '<h1>Invoice</h1>';
        $pdfContent .= '<ul>';
        foreach ($selectedProducts as $product) {
            $pdfContent .= '<li>' . $product['name'] . ' - $' . $product['price'] . '</li>';
        }
        $pdfContent .= '</ul>';
        $pdfContent .= '<h3>Total Price: $' . $totalPrice . '</h3>';

        $pdf = new Dompdf();
        $pdf->loadHTML($pdfContent);
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();

        // Stream or save the PDF file
        return $pdf->stream('invoice.pdf');
    }

    public function generateInvoice(Request $request)
    {
        // Retrieve the selected items from the request
        $selectedItems = $request->input('items');

        // Load the invoice PDF view with the selected items
        $pdf = PDF::loadView('pdf.invoice', ['selectedItems' => $selectedItems]);

        // Download the PDF
        return $pdf->download('invoice.pdf');
    }

}
