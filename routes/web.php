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
    Route::get('/sc-print/{id}', [App\Http\Controllers\InvoiceUploadController::class,'scInvoicePrint']);
    Route::get('/pi-generate/{id}', [App\Http\Controllers\InvoiceUploadController::class,'piGenerate']);
    Route::post('generate-pi', [App\Http\Controllers\InvoiceUploadController::class,'generatePi'])->name('generate-pi');
    Route::get('pi-list', [App\Http\Controllers\InvoiceUploadController::class,'piList']);
    Route::get('/pi-print/{id}', [App\Http\Controllers\InvoiceUploadController::class,'piInvoicePrint']);
    Route::resource('destinations', App\Http\Controllers\FinalDestinationController::class);
    Route::resource('load_places', App\Http\Controllers\LoadingPlacesController::class);
    Route::resource('port-discharged', App\Http\Controllers\PortDischargedController::class);
    Route::resource('modes_of_carrying', App\Http\Controllers\ModeCarryingController::class);
    Route::resource('customer', App\Http\Controllers\CustomerController::class);
    Route::resource('signature', App\Http\Controllers\SignatureUploadController::class);
});

include('auth.php');
