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
use App\Http\Controllers\Api\MarcacoesController;
use App\Http\Controllers\Api\MedicalController;
use App\Http\Controllers\Api\HorariosDisponiveisController;
use App\Http\Controllers\Api\AnimalUserController;


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
Route::patch('/contas/update-name/{id}', [ContaController::class, 'updateName']);
Route::patch('/contas/store/{id}', [ContaController::class, 'store']);

Route::get('/marcacoes/recepcionista', [MarcacoesController::class, 'getMarcacaoRecepcionista'])->name('marcacoes.getMarcacaoRecepcionista');

Route::put('/marcacoes/update/{id}', [MarcacoesController::class, 'update_medical'])->name('marcacoes.update_medical');

Route::put('/marcacoes/edicao/{id}', [MarcacoesController::class, 'edicao'])->name('marcacoes.edicao');

Route::put('/marcacoes/excluido/{id}', [MarcacoesController::class, 'excluido'])->name('marcacoes.excluido');

Route::apiResource('/marcacoes', MarcacoesController::class);

Route::apiResource('/horarios_disponiveis', HorariosDisponiveisController::class);

Route::apiResource('/medical', MedicalController::class);

Route::get('/animaluser/{id}', [AnimalUserController::class, 'show'])->name('animaluser.show');

Route::post('/submitMarcacao', [MarcacoesController::class, 'store'])->name('marcacao.store');