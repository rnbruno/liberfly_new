<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\HorariosDisponiveisResource;
use App\Models\HorariosDisponiveis;
use Illuminate\Http\Request;


class HorariosDisponiveisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $horarios_disponiveis = HorariosDisponiveis::getHorarios();
        return HorariosDisponiveisResource::collection($horarios_disponiveis);
    }

    public function getHorariosDisponiveis()
    {

       
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
    public function show(HorariosDisponiveis $horariosDisponiveis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HorariosDisponiveis $horariosDisponiveis)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HorariosDisponiveis $horariosDisponiveis)
    {
        //
    }
}
