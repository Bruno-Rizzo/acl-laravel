<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () { return view('welcome'); });

Route::middleware('auth')->group(function(){

    Route::middleware('admin')->group(function(){

        Route::resource('/users', UserController::class);
        Route::resource('/roles', RoleController::class);
        Route::post('/roles/{role}/permissions', [RoleController::class, 'assignPermission'])->name('roles.permissions');

    });

    Route::get('/dashboard', function () { return view('dashboard'); })->name('dashboard');

    Route::resource('/customers', CustomerController::class);

});


require __DIR__.'/auth.php';
