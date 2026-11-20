<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PublicApiController;

Route::get('/empresa', [PublicApiController::class, 'empresa']);
Route::get('/piezas', [PublicApiController::class, 'piezas']);
Route::get('/promociones', [PublicApiController::class, 'promociones']);
