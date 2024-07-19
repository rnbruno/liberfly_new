<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Acesso;
use Illuminate\Http\Request;
use App\Http\Requests\AcessoRequest;
use App\Http\Resources\AcessoResource;

class AcessoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $acesso = Acesso::getAcessoPessoa12Meses();
        // dd($acesso); // Verifique se os dados estão corretos  
        return AcessoResource::collection($acesso);
    }

    public function acesso12()
    {
        $acesso = Acesso::getAcessoPessoa12Meses();
        // dd($acesso); // Verifique se os dados estão corretos  
        return AcessoResource::collection($acesso);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $acesso = Acesso::create($request->validated());
 
        return new AcessoResource($acesso);
    }

    /**
     * Display the specified resource.
     */
    public function show(Acesso $acesso)
    {
        return new AcessoResource($acesso);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Acesso $acesso)
    {
        $acesso->update($request->validated());
 
        return new AcessoResource($acesso);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Acesso $acesso)
    {
        $acesso->delete();
 
        return response()->noContent();
    }
}
