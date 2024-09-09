<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Empresa;
use App\Models\SocioEmpresa;
use Illuminate\Http\Request;
use App\Enums\InativoGeral;

class SocioEmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function inserirSocio(Request $request)
    {
        
        $validatedData = $request->validate([
            'id' => 'required|max:255',
            'id_int' => 'required|max:255',
            // Adicione outras regras de validação conforme necessário
        ]);
        
        
        $id = $validatedData["id"];
        $id_int = $validatedData["id_int"];
        // dd($id_int);
        $empresa_id = Empresa::where('user_id', $id)->first();
        // dd($empresa_id->empresas_id);

        try {

            $nomes = array_column(InativoGeral::cases(), 'name');
            // Pega o valor correspondente à chave aleatória
            $nomeAleatorio = $nomes[0];

            SocioEmpresa::create([
                'empresas_id' => $empresa_id->empresas_id,
                'user_id' => $id_int,
                'status' => $nomeAleatorio,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

                      // Retornar sucesso com o recurso atualizado
            return response()->json([
                'success' => true,
                'message' => 'Associação atribuída com sucesso.',
                'data' => ''
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
}
