<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        return Inertia("Home", ["list" => Product::with('imagens')->take(8)->get()]);
    }
}
