<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $token = 'Bearer 75|oxURV36dYHnbyy3f94vb70qPmCwY4OLimqyjorTh';
        $response = Http::withHeaders([
            'Authorization' => $token,
        ])->get('https://kuin.summaict.nl/api/product');
        $posts = $response->json();

        return view('management.inventory', ['posts' => $posts]);
    }


}
