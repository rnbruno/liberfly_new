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
    public function store(Request $request, Conta $conta)
    {
        // $contas = Conta::create($request->validated());
 
        // return new ContaResource($contas);

        try {
 
            $validatedData = $request->validate([
                'conta' => 'required|string|max:255',
            ]);
            
            // Encontrar a conta pelo ID
            $conta = Conta::find($conta);

            if ($conta) {
                return response()->json(['message' => 'Conta já existe.'], Response::HTTP_NOT_FOUND);
            }

            $insert = Conta::insertConta($validatedData['conta']);
            return response()->json(['message' => 'Name da Conta atualizada com sucesso.'], Response::HTTP_OK);

        } catch (ModelNotFoundException $e) {
            // Retornar uma resposta quando o item não é encontrado
            return response()->json(['message' => 'Conta não encontrada.'], Response::HTTP_NOT_FOUND);

        } catch (\Exception $e) {
            // Retornar uma resposta para outras exceções
            return response()->json(['message' => 'Erro ao inserir a conta.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
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
    public function update(Request $request, Conta $conta_id)
    {
        try {
            $validatedData = $request->validate([
                'conta_id' => 'required|int|max:255',
                'inativo' => 'required|int|max:2',
                // Adicione outras regras de validação conforme necessário
            ]);
            $conta_id = Conta::find($conta_id);
            if (!$conta_id) {
                return response()->json(['message' => 'Conta não encontrada.'], Response::HTTP_NOT_FOUND);
            }


            $update = Conta::atualizarInAtivoConta($validatedData['conta_id'],$validatedData['inativo']);
            return response()->json(['message' => 'Conta atualizada com sucesso.'], Response::HTTP_OK);

        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Conta não encontrada.'], Response::HTTP_NOT_FOUND);

        } catch (\Exception $e) {
            return response()->json(['message' => 'Erro ao atualizar a conta.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
        
    }
    public function updateName(Request $request, Conta $conta)
    {

        try {
 
            $validatedData = $request->validate([
                'conta_id' => 'required|int|max:255',
                'conta' => 'required|string|max:255',
            ]);
            
            // Encontrar a conta pelo ID
            $conta = Conta::find($conta);

            if (!$conta) {
                return response()->json(['message' => 'Conta não encontrada.'], Response::HTTP_NOT_FOUND);
            }

            $update = Conta::atualizarNameConta($validatedData['conta_id'],$validatedData['conta']);
            return response()->json(['message' => 'Name da Conta atualizada com sucesso.'], Response::HTTP_OK);

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