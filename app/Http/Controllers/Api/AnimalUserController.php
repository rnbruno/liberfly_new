<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AnimalUser;
use Illuminate\Http\Request;
use App\Http\Resources\AnimalUserResource;

class AnimalUserController extends Controller
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
    public function show($id)
    {
        $animalUser = AnimalUser::getAnimalsForUser($id);
        return AnimalUserResource::collection($animalUser);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AnimalUser $animalUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AnimalUser $animalUser)
    {
        //
    }
}
