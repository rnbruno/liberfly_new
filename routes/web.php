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


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::view('/{any}', 'layouts/app')
    ->where('any', '.*');

require __DIR__ . '/auth.php';