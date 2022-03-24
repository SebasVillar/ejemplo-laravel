<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\UserAuthController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\CompanyController;
use App\Models\Company;

Route::post('/register', [UserAuthController::class, 'register']);
Route::post('/login', [UserAuthController::class, 'login']);

/*
Un API Resource crea automaticamente las rutas
index, store, show, update, y destroy
*/
Route::apiResource('/employee', EmployeeController::class)->middleware('auth:api');

Route::prefix('Employee')->middleware('guest')->group(function () {
    Route::get('show2', [EmployeeController::class, 'show2']);
    Route::get('show3', [EmployeeController::class, 'show3']);
});

Route::prefix('Company')->middleware('guest')->group(function () {
    Route::get('index', [CompanyController::class, 'index']);
    Route::post('store', [CompanyController::class, 'store']);
    Route::get('show', [CompanyController::class, 'show']);
    Route::put('update', [CompanyController::class, 'update']);
    Route::delete('destroy', [CompanyController::class, 'destroy']);
    Route::get('show2/{company}', [CompanyController::class, 'show2']);
    Route::get('show3/{company}', [CompanyController::class, 'show3']);
    Route::get('prueba/{param1}', function ($param1) {
        return 'Este es el parametro 1: ' . $param1;
    });
    Route::post('store2', [CompanyController::class, 'store2']);
    Route::post('store3', [CompanyController::class, 'store3']);
    Route::get('index2', [CompanyController::class, 'index2']);
});

// Route::get('/prueba', 'EmployeeController@prueba');
