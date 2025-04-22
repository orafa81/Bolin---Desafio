<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConfectioneryRequest;
use App\Models\Confectionery;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ConfectioneryController extends Controller
{
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
        return to_route('home')->with('success', 'confeitaria criada com sucesso');
    }

    public function edit(Confectionery $confectionery)
    {
        return Inertia("Confectionery/EditConfectionery", ['confectionery' => $confectionery]) ;
    }
    #salva as edições
    public function update(Confectionery $confectionery, ConfectioneryRequest $request)
    {
        $confectionery->update($request->validated());
        return to_route('confectionery.create')->with('success', 'confeitaria editada com sucesso');
    }

    public function destroy(Confectionery $confectionery){
        $confectionery->delete();
        return to_route('confectionery.list')->with('success', 'confeitaria escluida com sucesso');
    }
}
