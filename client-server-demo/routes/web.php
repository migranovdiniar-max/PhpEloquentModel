<?php

use App\Http\Controllers\ServerController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => redirect()->route('servers.index'));

Route::resource('servers', ServerController::class)->only([
    'index', 'create', 'store',
]);
