<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Medical;
use Illuminate\Http\Request;
use App\Http\Resources\MedicalResource;
use App\Http\Requests\MedicalRequest;

class MedicalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return MedicalResource::collection(Medical::all());
    }
 
    public function store(MedicalRequest $request)
    {
        return MedicalResource::collection(Medical::all());
    }
 
    public function show(Medical $company)
    {
        return new MedicalResource($company);
    }
 
    public function update(MedicalRequest $request, Medical $company)
    {
        $company->update($request->validated());
 
        return new MedicalResource($company);
    }
 
    public function destroy(Medical $company)
    {
        $company->delete();
 
        return response()->noContent();
    }
}
