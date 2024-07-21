<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\ReplySupportApiController;
use App\Http\Controllers\Api\SupportController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CompanyController;
use App\Http\Controllers\Api\CartaoController;
use App\Http\Controllers\Api\UsuarioApiController;
use App\Http\Controllers\Api\AcessoController;
use App\Http\Controllers\Api\ContaController;



// Route::post('/login', [AuthController::class, 'auth']);
// Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
// Route::get('/me', [AuthController::class, 'me'])->middleware('auth:sanctum');

// Route::get('posts',[\App\Http\Controllers\Api\PostController::class, 'index']);

// Route::middleware(['auth:sanctum'])->group(function () {
//     Route::get('/replies/{support_id}', [ReplySupportApiController::class, 'getRepliesFromSupport']);
//     Route::post('/replies/{support_id}', [ReplySupportApiController::class, 'createNewReply']);
//     Route::delete('/replies/{id}', [ReplySupportApiController::class, 'destroy']);

//     Route::apiResource('/supports', SupportController::class);
// });
// Route::apiResource('/supports', SupportController::class)->middleware('auth');

// Route::apiResource('companies', CompanyController::class);
Route::apiResource('companies', CompanyController::class)->names([
    'index' => 'companies.index'
]);

Route::apiResource('cartao', CartaoController::class)->names([
    'index' => 'cartao.index'
]);

// Route::apiResource('usuarios_json', UsuarioApiController::class)->names([
//     'index' => 'usuarios_json.usuarioPessoaJson'
// ]);

Route::apiResource('acesso', AcessoController::class)->names([
    'index' => 'acesso.index'
]);

Route::apiResource('acesso12', AcessoController::class)->names([
    'index1' => 'acesso12.index1'
]);

Route::apiResource('contas', ContaController::class)->names([
    'index' => 'contas.index'
]);

Route::patch('/contas/{id}', [ContaController::class, 'update']);