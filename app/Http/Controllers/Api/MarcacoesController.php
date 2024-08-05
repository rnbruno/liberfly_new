<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MarcacoesResource;
use App\Models\Marcacoes;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\MarcacoesRequest;

class MarcacoesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return MarcacoesResource::collection(Marcacoes::all());
    }

    public function getMarcacaoRecepcionista()
    {
        $marcacoes = Marcacoes::getRecepcionistaMarcacao();
        // dd($marcacoes);
        return MarcacoesResource::collection($marcacoes);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(Marcacoes $marcacoes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update_medical(Request $request, Marcacoes $marcacao)
    {

        \DB::enableQueryLog();


        $validatedData = $request->validate([
            'id' => 'required|int|max:255',
            'medical_id' => 'required|int|max:255',
            // Adicione outras regras de validação conforme necessário
        ]);

        $id = $validatedData["id"];

        try {

            $marcacao = Marcacoes::findOrFail($id);

            if (!$marcacao) {
                return response()->json(['message' => 'Conta não encontrada.'], Response::HTTP_NOT_FOUND);
            }

            // Atualizar o campo medical_id
            $marcacao->medical_id = $validatedData['medical_id'];
            $marcacao->save(); // Salva as mudanças

            $queries = \DB::getQueryLog();

            // Retornar sucesso com o recurso atualizado
            return response()->json([
                'success' => true,
                'message' => 'Marcação atribuída com sucesso.',
                'data' => new MarcacoesResource($marcacao)
            ], 200);

        } catch (\Exception $e) {
            // Retornar erro se algo deu errado
            return response()->json([
                'success' => false,
                'message' => 'Erro ao atribuir registro.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function excluido(Request $request, Marcacoes $marcacao)
    {

        \DB::enableQueryLog();


        $validatedData = $request->validate([
            'id' => 'required|int|max:255',
            // Adicione outras regras de validação conforme necessário
        ]);

        $id = $validatedData["id"];

        try {

            $marcacao = Marcacoes::findOrFail($id);

            if (!$marcacao) {
                return response()->json(['message' => 'Conta não encontrada.'], Response::HTTP_NOT_FOUND);
            }

            // Atualizar o campo medical_id
            $marcacao->excluido = 1;
            $marcacao->save(); // Salva as mudanças

            $queries = \DB::getQueryLog();

            // Retornar sucesso com o recurso atualizado
            return response()->json([
                'success' => true,
                'message' => 'Marcação excluída com sucesso.',
                'data' => new MarcacoesResource($marcacao)
            ], 200);

        } catch (\Exception $e) {
            // Retornar erro se algo deu errado
            return response()->json([
                'success' => false,
                'message' => 'Erro ao excluir marcação.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Marcacoes $marcacoes)
    {
        //
    }
}
