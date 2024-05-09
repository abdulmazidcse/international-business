<?php

use Illuminate\Support\Facades\Route;

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




Route::middleware('auth')->group(function () {
    Route::get('/',  [App\Http\Controllers\HomeController::class,'index']);
    Route::get('/dashboard',  [App\Http\Controllers\HomeController::class,'index'] );
    Route::resource('roles', App\Http\Controllers\RoleController::class);
    Route::resource('users', App\Http\Controllers\UserController::class);
    Route::resource('invoice-upload', App\Http\Controllers\InvoiceUploadController::class);
    Route::resource('banks', App\Http\Controllers\BankController::class);
    
    Route::get('/invoice-details/{id}', [App\Http\Controllers\InvoiceUploadController::class,'invoiceDetails']);
    Route::resource('destinations', App\Http\Controllers\FinalDestinationController::class);
    Route::resource('loading-places', App\Http\Controllers\LoadingPlacesController::class);
    Route::resource('port-discharged', App\Http\Controllers\PortDischargedController::class);
    Route::resource('mode-carrying', App\Http\Controllers\ModeCarryingController::class);
    Route::resource('customer', App\Http\Controllers\CustomerController::class);
});

include('auth.php');
