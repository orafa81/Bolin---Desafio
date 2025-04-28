<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConfectioneryRequest;
use App\Models\Confectionery;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ConfectioneryController extends Controller
{
    public function show($confectionery)
    {
        $data = Confectionery::findOrFail($confectionery);

        $products = $data
            ->produtos()
            ->with('imagens')
            ->paginate(8); // 

        
        
        return Inertia("Confectionery/Confectionery", ["data" => $data, "data_product" => $products]) ;
    }
    public function list(Request $request)
    {
        return Inertia("Confectionery/ListConfectionery", ["list" => Confectionery::all()]) ;
    }

    public function create()
    {
        return Inertia("Confectionery/CreateConfectionery");
    }
    public function store(ConfectioneryRequest $request)
    {
        Confectionery::create($request->validated());
        return redirect()->route('home')->with('success', 'Confeitaria criada com sucesso!');
    }

    public function edit(Confectionery $confectionery)
    {
        return Inertia("Confectionery/EditConfectionery", ['confectionery' => $confectionery]) ;
    }
    #salva as edições
    public function update(Confectionery $confectionery, ConfectioneryRequest $request)
    {
        $confectionery->update($request->validated());
        return redirect()->route('home')->with('success', 'Confeitaria editada com sucesso!');
    }

    public function destroy(Confectionery $confectionery){
        $confectionery->delete();
        return redirect()->route('home')->with('success', 'Confeitaria deletada com sucesso!');
    }
}
