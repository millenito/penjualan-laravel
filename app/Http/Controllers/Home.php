<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Models\product;

class Home extends Controller
{
    public function __invoke(Request $request): View
    {
        $products = product::all();

        return view('products.list', compact('products'));
        return view('products.list');
    }
}
