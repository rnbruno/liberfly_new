<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\EmpresaResource;
use App\Http\Resources\SocioEmpresaResource;
use App\Http\Resources\UserResource;
use App\Models\Empresa;
use App\Models\SocioEmpresa;
use App\Models\User;
use Illuminate\Http\Request;

class EmpresaController extends Controller
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
    public function show(Empresa $empresa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Empresa $empresa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Empresa $empresa)
    {
        //
    }
    /**
     * Empresas id for usuários/sócios.
     */
    public function getEmpresaSocio(Request $request){
        try{
            $empresas_socios = Empresa::getEmpresasForSocio($request->user_id);
            return EmpresaResource::collection($empresas_socios);
        }catch (\Exception $e) {
            // Em caso de erro, retorne uma resposta JSON com o erro
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }
    public function empresasLista(Request $request){
        try{
            $empresaslista = Empresa::empresasLista($request->user_id);
            return EmpresaResource::collection($empresaslista);
        }catch (\Exception $e) {
            // Em caso de erro, retorne uma resposta JSON com o erro
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }
    public function getSocios(){
        try{
            $empresaslista = User::socios();
            return UserResource::collection($empresaslista);
        }catch (\Exception $e) {
            // Em caso de erro, retorne uma resposta JSON com o erro
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
