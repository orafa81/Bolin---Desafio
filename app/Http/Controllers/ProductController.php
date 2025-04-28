<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\ImageProduct;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function list(Request $request)
    {
        return Inertia("Product/ListProduct", ["list" => Product::all()]);
    }

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

    public function edit(Product $product)
    {   
        
        return Inertia("Product/EditProduct", ['product' => $product]);
    }
    #salva as edições
    public function update(Product $product, ProductRequest $request)
    {
        $product->update($request->validated());
        if ($request->hasFile('images_products')) {
            foreach ($request->file('images_products') as $file) {
                $path = $file->store('products', 'public');
                ImageProduct::update([
                    'products_id' => $product->id,
                    'path' => $path,
                ]);
            }
        }
        return redirect()->route('home')->with('success', 'Produto editado com sucesso!');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('home')->with('success', 'Produto deletado com sucesso!');
    }

}
