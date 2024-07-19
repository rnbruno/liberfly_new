<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cartao;
use Illuminate\Http\Request;
use App\Http\Requests\CartaoRequest;
use App\Http\Resources\CartaoResource;

class CartaoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $results = CartaoResource::collection(Cartao::getCartaoTipoCartaoProduto());
        // dd($results);
        // return response()->json(['data' => $results]);

        $cartoes = Cartao::getCartaoTipoCartaoProduto();
        // dd($cartoes); // Verifique se os dados estão corretos
    
        return CartaoResource::collection($cartoes);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CartaoRequest $request)
    {
        $cartao = Cartao::create($request->validated());

        return new CartaoResource($cartao);
    }

    /**
     * Display the specified resource.
     */
    public function show(Cartao $cartao)
    {
        //
        return new CartaoResource($cartao);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CartaoRequest $request, Cartao $cartao)
    {
        //
        $cartao->update($request->validated());

        return new CartaoResource($cartao);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cartao $cartao)
    {
        $cartao->delete();

        return response()->noContent();
    }
}
