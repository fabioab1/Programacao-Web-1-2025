<?php

use App\Http\Controllers\MotoristaController;
use App\Http\Controllers\VeiculoController;
use App\Models\Veiculo;
use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\CidadeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CargoController;
use App\Http\Controllers\PontoController;
use App\Http\Controllers\PacienteController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('inicio');
});

Route::resource("motoristas", MotoristaController::class);
route::resource("veiculos", VeiculoController::class);
Route::resource('pacientes', PacienteController::class);
Route::resource('administradores', AdministradorController::class);
Route::resource('cidades', CidadeController::class);
Route::resource('cargos', CargoController::class);
Route::resource('pontos', PontoController::class);
Route::resource('pacientes', PacienteController::class);
