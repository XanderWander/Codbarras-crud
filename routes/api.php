<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\prototipoController;
use App\Http\Controllers\Api\componentesController;
use App\Http\Controllers\Api\herramientasController;

//Rutas de la tabla prototipo
Route::get('prototipo', [prototipoController::class, 'index']);
route::get('prototipo/{id}', [prototipoController::class, 'show']);
route::post('prototipo', [prototipoController::class, 'store']);
route::put('prototipo/{id}', [prototipoController::class, 'update']);
route::delete('prototipo/{id}', [prototipoController::class, 'destroy']);
route::patch('prototipo/{id}', [prototipoController::class, 'updatePartial']);

//Rutas de componentes
route::get('componentes', [componentesController::class, 'index']);
route::get('componentes/{id}', [componentesController::class, 'show']);
route::post('componentes', [componentesController::class, 'store']);
route::put('componentes/{id}', [componentesController::class, 'update']);
route::delete('componentes/{id}', [componentesController::class, 'destroy']);
route::patch('componentes/{id}', [componentesController::class, 'updatePartial']);

//Rutas de la tabla Herramientas
route::get('herramientas', [herramientasController::class, 'index']);
route::get('herramientas/{id}', [herramientasController::class, 'show']);
route::post('herramientas', [herramientasController::class, 'store']);
route::put('herramientas/{id}', [herramientasController::class, 'update']);
route::delete('herramientas/{id}', [herramientasController::class, 'destroy']);
route::patch('herramientas/{id}', [herramientasController::class, 'updatePartial']);
