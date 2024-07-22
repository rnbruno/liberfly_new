<?php

use App\Http\Controllers\Admin\{ReplySupportController, SupportController};
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\CartaoController;
use App\Http\Controllers\Site\SiteController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Api\UsuarioApiController;
use App\Http\Controllers\DashboardController;





// Route::get('/contato', [SiteController::class, 'contact']);

// Route::get('/', function () {
//     return Inertia::render('Create');
// });

// Route::get('/user', function () {
//     return Inertia::render('Profile/Form');
// });

// Route::get('/usuario/listar', function () {
//     return Inertia::render('Usuario/Usuarios');
// });
// Route::get('usuarios/listar',[UsuarioController::class, 'usuario_pessoa'])->name('usuarios.pessoa');
// Route::post('/ajax-request-usuario', [UsuarioController::class, 'desativarAtivarUsuario']);
// Route::get('usuarios/listarjson',[UsuarioController::class, 'usuarioPessoaJson'])->name('usuarios.pessoa.json1');

// Route::get('cartao/listar',[App\Http\Controllers\Api\CartaoAPIController::class, 'index'])->name('cartao.listar');
// // Route::Inertia('cartao/listar','Cartão');


// Route::get('/customers/create',[CustomerController::class, 'create']);
// Route::get('customers',[CustomerController::class, 'index'])->name('customers.index');
// Route::post('customers',[CustomerController::class,'store']);

// Route::get('posts', [PostController::class, 'index']);

// Route::view('/', 'dashboard')->name('dashboard');
// // Route::view('/dashboard')->name('dashboard');

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::post('login', [
    \App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'store']);
Route::post('logout', [
    \App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'destroy']);

// Route::view('/{any?}', 'dashboard')
//     ->name('dashboard')
//     ->where('any', '.*');

// Route::get('/{any}', function () {
//     return view('layouts/app');
// })->where("any", ".*");
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::view('/{any}', 'layouts/app')
    ->where('any', '.*');


// Route::middleware(['auth'])->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

//     Route::post('/supports/{id}/replies', [ReplySupportController::class, 'store'])->name('replies.store');
//     Route::delete('/supports/{id}/replies/{reply}', [ReplySupportController::class, 'destroy'])->name('replies.destroy');
//     Route::get('/supports/{id}/replies', [ReplySupportController::class, 'index'])->name('replies.index');

//     // Route::resource('/supports', SupportController::class);
//     Route::delete('/supports/{id}', [SupportController::class, 'destroy'])->name('supports.destroy');
//     Route::put('/supports/{id}', [SupportController::class, 'update'])->name('supports.update');
//     Route::get('/supports/{id}/edit', [SupportController::class, 'edit'])->name('supports.edit');
//     Route::get('/supports/create', [SupportController::class, 'create'])->name('supports.create');
//     Route::post('/supports', [SupportController::class, 'store'])->name('supports.store');
//     Route::get('/supports', [SupportController::class, 'index'])->name('supports.index');
// });

// require __DIR__ . '/auth.php';