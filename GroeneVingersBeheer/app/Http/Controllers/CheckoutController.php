<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class CheckoutController extends Controller
{

    protected \App\Http\Controllers\ApiController $apiController;

    public function __construct(ApiController $apiController)
    {
        $this->apiController = $apiController;
    }

    public function index()
    {
        // Fetch products using the API controller
        $products = $this->apiController->getProducts();

        return view('employees.checkout', compact('products'));
    }
}
