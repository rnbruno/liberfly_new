<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Type_user;
use Illuminate\Http\Request;
use App\Http\Resources\TypeUserResource;
use App\Http\Requests\TypeUserRequest;

class TypeUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return TypeUserResource::collection(Type_user::all());
    }
 
    public function store(TypeUserRequest $request)
    {
        $type_user = Type_user::create($request->validated());
 
        return new TypeUserResource($type_user);
    }
 
    public function show(Type_user $type_user)
    {
        return new TypeUserResource($type_user);
    }
 
    public function update(TypeUserRequest $request, Typer_User $type_user)
    {
        $type_user->update($request->validated());
 
        return new TypeUserResource($type_user);
    }
 
}
