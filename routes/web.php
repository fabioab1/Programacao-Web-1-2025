<?php

use App\Http\Controllers\MotoristaController;
use App\Http\Controllers\VeiculoController;
use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\AlterarAdminController;
use App\Http\Controllers\AlterarPacienteController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CadastroPacienteController;
use App\Http\Controllers\CidadeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CargoController;
use App\Http\Controllers\PontoController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\EditarMotoristaController;
use App\Http\Controllers\SolicitacaoController;
use App\Http\Controllers\HomeMotController;
use App\Http\Middleware\RoleAdmMiddleware;
use App\Http\Middleware\RoleMotMiddleware;
use App\Http\Middleware\RolePacMiddleware;

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

Route::get('/', function() {
    return view('home');
});

Route::get('/login', [AuthController::class, 'showFormLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/cadastro/pacientes', [CadastroPacienteController::class, 'create']);
Route::post('/cadastro/pacientes/store', [CadastroPacienteController::class, 'store']);

Route::get('/alterar-dados/paciente/{id}', [AlterarPacienteController::class, 'edit'])
    ->middleware(RolePacMiddleware::class);

Route::put('/alterar-dados/paciente/update/{id}', [AlterarPacienteController::class, 'update'])
    ->middleware(RolePacMiddleware::class);

Route::get('/alterar-dados/admin/{id}', [AlterarAdminController::class, 'edit'])
    ->middleware(RoleAdmMiddleware::class);

Route::put('/alterar-dados/admin/update/{id}', [AlterarAdminController::class, 'update'])
    ->middleware(RoleAdmMiddleware::class);


Route::middleware("auth")->group(function () {
    
    Route::post('/logout', [AuthController::class, 'logout']);
    
    Route::middleware([RoleAdmMiddleware::class])->group(function (){
        Route::get('/inicio', function () {
            return view('inicio');
        })->name('inicio');
        Route::resource("motoristas", MotoristaController::class);
        Route::resource("veiculos", VeiculoController::class);
        Route::resource('administradores', AdministradorController::class);
        Route::resource('cidades', CidadeController::class);
        Route::resource('cargos', CargoController::class);
        Route::resource('pontos', PontoController::class);
        Route::resource('pacientes', PacienteController::class);
    });
############################################################################################
    Route::middleware([RoleMotMiddleware::class])->group(function (){
        Route::get('/inicio-mot', function() {
            return view('inicio-mot');
        });
        Route::get('/relatorio-motorista', [HomeMotController::class, 'gerarRelatorio']);
    });

#############################################################################################
    Route::middleware([RolePacMiddleware::class])->group(function (){
        Route::get('/inicio-pac', function() {
            return view("inicio-pac");
        })->name('inicio-pac');
    });
    
});