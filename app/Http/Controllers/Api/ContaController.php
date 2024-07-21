<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Conta;
use Illuminate\Http\Request;
use App\Http\Requests\ContaRequest;
use App\Http\Resources\ContaResource;
use Symfony\Component\HttpFoundation\Response;

class ContaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contas = Conta::getContas();
        // dd($cartoes); // Verifique se os dados estão corretos
    
        return ContaResource::collection($contas);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $contas = Conta::create($request->validated());
 
        return new ContaResource($contas);
    }

    /**
     * Display the specified resource.
     */
    public function show(Conta $conta)
    {
        return new ContaResource($conta);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Conta $conta)
    {
        // $conta->update($request->validated([
        //     'conta_id' => 'required|string|max:255',
        //     // Adicione outras regras de validação conforme necessário
        // ]);
 
        // return new ContaResource($conta);
        try {
            //code...
            // Validar dados de entrada
            $validatedData = $request->validate([
                'conta_id' => 'required|int|max:255',
                'inativo' => 'required|int|max:2',
                // Adicione outras regras de validação conforme necessário
            ]);

            // Encontrar a conta pelo ID
            $conta = Conta::find($conta);

            if (!$conta) {
                return response()->json(['message' => 'Conta não encontrada.'], Response::HTTP_NOT_FOUND);
            }

            // Atualizar os campos da conta
            // $inativo = "";
            // if($validatedData['inativo']==1){
            //     $inativo=0;
            // }else if($validatedData['inativo']==0){
            //     $inativo=1;
            // }
            // $conta->inativo = $inativo;

            $update = Conta::atualizarInAtivoConta($validatedData['conta_id'],$validatedData['inativo']);
            return response()->json(['message' => 'Conta atualizada com sucesso.'], Response::HTTP_OK);

        } catch (ModelNotFoundException $e) {
            // Retornar uma resposta quando o item não é encontrado
            return response()->json(['message' => 'Conta não encontrada.'], Response::HTTP_NOT_FOUND);

        } catch (\Exception $e) {
            // Retornar uma resposta para outras exceções
            return response()->json(['message' => 'Erro ao atualizar a conta.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Conta $conta)
    {
        $conta->delete();
 
        return response()->noContent();
    }
}