<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;

Route::get('/Inicio', function () {
    return Inertia::render('Inicio');
});
