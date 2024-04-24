<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\OrderDetail;
use App\Models\OrderItem;
use App\Models\PaymentDetail;
use Illuminate\Http\Request;
use PDF;

class CheckoutController extends Controller
{

    public function index()
    {
        $products = Product::all();
        return view('employees.checkout', compact('products'));
    }

    // public function store(Request $request)
    // {
    //     // Retrieve selected products and calculate total price
    //     $selectedProducts = [];
    //     $totalPrice = 0;
    //     $selectedProductIds = $request->input('products', []);
    //     $productQuantities = array_count_values($selectedProductIds);

    //     foreach ($productQuantities as $productId => $quantity) {
    //         $product = Product::find($productId);
    //         if ($product) {
    //             $selectedProducts[] = [
    //                 'id' => $product->id,
    //                 'name' => $product->name,
    //                 'price' => $product->price,
    //                 'quantity' => $quantity,
    //             ];
    //             $totalPrice += $product->price * $quantity;
    //         }
    //     }

    //     // Create order details
    //     $orderDetail = new OrderDetail();
    //     $orderDetail->user_id = auth()->user()->id;
    //     $orderDetail->total = $totalPrice;
    //     $orderDetail->save();

    //     // Add order items
    //     foreach ($selectedProducts as $product) {

    //         $orderItem = new OrderItem();
    //         $orderItem->order_id = $orderDetail->id;
    //         $orderItem->product_id = $product['id'];
    //         $orderItem->save();
    //     }

    //     // Create payment detail
    //     $paymentDetail = new PaymentDetail();
    //     $paymentDetail->order_id = $orderDetail->id;
    //     $paymentDetail->amount = $totalPrice;
    //     $paymentDetail->provider = 'Checkout';
    //     $paymentDetail->status = 'Pending';
    //     $paymentDetail->save();

    //     // Generate PDF invoice
    //     $customerName = $request->input('customer_name');
    //     $customerAddress = $request->input('address');
    //     $zipCode = $request->input('zip_code');
    //     $fullAddress = "$customerAddress, $zipCode";

    //     $pdfContent = view('employees.invoice', compact('customerName', 'selectedProducts', 'totalPrice', 'customerName', 'fullAddress'))->render();

    //     $pdf = PDF::loadHTML($pdfContent);
    //     $pdf->setPaper('A4', 'portrait');

    //     return $pdf->stream('invoice.pdf');
    // }


    public function store(Request $request)
    {
        // Retrieve selected products and calculate total price
        $selectedProducts = [];
        $totalPrice = 0;
        $selectedProductIds = $request->input('products', []);
        $productQuantities = array_count_values($selectedProductIds);
        
        foreach ($productQuantities as $productId => $quantity) {
            $product = Product::find($productId);
            if ($product) {
                $selectedProducts[] = [
                    'id' => $product->id,
                    'name' => $product->name,
                    'price' => $product->price,
                    'quantity' => $quantity, // Include quantity in the selected products array
                ];
                $totalPrice += $product->price * $quantity;
            }
        }
        
        // Create order details
        $orderDetail = new OrderDetail();
        $orderDetail->user_id = auth()->user()->id;
        $orderDetail->total = $totalPrice;
        $orderDetail->save();
        
        // Add order items
        foreach ($selectedProducts as $product) {
            // Here you can access the product quantity via $product['quantity']
            $orderItem = new OrderItem();
            $orderItem->order_id = $orderDetail->id;
            $orderItem->product_id = $product['id'];
            $orderItem->quantity = $product['quantity']; // Save the quantity in the order item
            $orderItem->save();
        }
        
        // Create payment detail
        $paymentDetail = new PaymentDetail();
        $paymentDetail->order_id = $orderDetail->id;
        $paymentDetail->amount = $totalPrice;
        $paymentDetail->provider = 'Checkout';
        $paymentDetail->status = 'Pending';
        $paymentDetail->save();
        
        // Generate PDF invoice
        $customerName = $request->input('customer_name');
        $customerAddress = $request->input('address');
        $zipCode = $request->input('zip_code');
        $fullAddress = "$customerAddress, $zipCode";
        
        // Pass selected products and other data to the PDF view
        $pdfContent = view('employees.invoice', compact('customerName', 'selectedProducts', 'totalPrice', 'customerName', 'fullAddress'))->render();
        
        $pdf = PDF::loadHTML($pdfContent);
        $pdf->setPaper('A4', 'portrait');
        
        return $pdf->stream('invoice.pdf');
    }
    
}
