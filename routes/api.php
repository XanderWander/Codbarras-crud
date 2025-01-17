<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\protitpoController;

Route::get('prototipo', [protitpoController::class, 'index']);

route::post('prototipo', [protitpoController::class, 'store']);


