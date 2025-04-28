<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\ImageProduct;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function create()
    {
        return Inertia("Product/CreateProduct");
    }
    public function store(ProductRequest $request)
    {
        
        
        $product = Product::create($request->validated());

        
        if ($request->hasFile('images_products')) {
            foreach ($request->file('images_products') as $file) {
                $path = $file->store('products', 'public');
                ImageProduct::create([
                    'products_id' => $product->id,
                    'path' => $path,
                ]);
            }
        }
       

        return redirect()->route('home')->with('success', 'Produto criado com sucesso!');
    }

}
