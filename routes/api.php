<?php

use App\Http\Controllers\CompanyController;
use Illuminate\Support\Facades\Route;

Route::post('/companies', [CompanyController::class, 'create']);
Route::put('/companies/{nit}', [CompanyController::class, 'updateByNIT']);
Route::get('/companies/{nit}', [CompanyController::class, 'getByNIT']);
Route::get('/companies', [CompanyController::class, 'getAll']);
Route::delete('/companies/{nit}', [CompanyController::class, 'deleteInactiveByNIT']);