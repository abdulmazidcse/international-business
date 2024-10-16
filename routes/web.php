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
    
    Route::post('generate-ci', [App\Http\Controllers\InvoiceUploadController::class,'generateCi'])->name('generate-ci');
    Route::get('/ci-generate/{id}', [App\Http\Controllers\InvoiceUploadController::class,'ciGenerate']);
    Route::get('ci-list', [App\Http\Controllers\InvoiceUploadController::class,'ciList']);
    Route::get('/ci-print/{id}', [App\Http\Controllers\InvoiceUploadController::class,'ciInvoicePrint']);
    
    Route::post('generate-pw', [App\Http\Controllers\InvoiceUploadController::class,'generatePw'])->name('generate-pw');
    Route::get('/pw-generate/{id}', [App\Http\Controllers\InvoiceUploadController::class,'pwGenerate']);
    Route::get('pw-list', [App\Http\Controllers\InvoiceUploadController::class,'pwList']);
    Route::get('/pw-print/{id}', [App\Http\Controllers\InvoiceUploadController::class,'pwInvoicePrint']);
    
    Route::post('generate-tr', [App\Http\Controllers\InvoiceUploadController::class,'generateTr'])->name('generate-tr');
    Route::get('/tr-generate/{id}', [App\Http\Controllers\InvoiceUploadController::class,'trGenerate']);
    Route::get('tr-list', [App\Http\Controllers\InvoiceUploadController::class,'trList']);
    Route::get('/tr-print/{id}', [App\Http\Controllers\InvoiceUploadController::class,'trInvoicePrint']);
    
    
    Route::post('generate-angikarnama', [App\Http\Controllers\InvoiceUploadController::class,'generateangikarnama'])->name('generate-angikarnama');
    Route::get('/angikarnama-generate/{id}', [App\Http\Controllers\InvoiceUploadController::class,'angikarnamaGenerate']);
    Route::get('angikarnama-list', [App\Http\Controllers\InvoiceUploadController::class,'angikarnamaList']);
    Route::get('/angikarnama-print/{id}', [App\Http\Controllers\InvoiceUploadController::class,'angikarnamaPrint']); 

    Route::resource('destinations', App\Http\Controllers\FinalDestinationController::class);
    Route::resource('load_places', App\Http\Controllers\LoadingPlacesController::class);
    Route::resource('port-discharged', App\Http\Controllers\PortDischargedController::class);
    Route::resource('modes_of_carrying', App\Http\Controllers\ModeCarryingController::class);
    Route::resource('customer', App\Http\Controllers\CustomerController::class);
    Route::resource('signature', App\Http\Controllers\SignatureUploadController::class);
    Route::resource('products', App\Http\Controllers\ProductController::class);
    Route::resource('sales-term', App\Http\Controllers\SalesTermController::class);

    Route::get('top-sheet', [App\Http\Controllers\ReportController::class,'topSheet']);
    Route::get('send-mail/{id}', [App\Http\Controllers\InvoiceUploadController::class,'testMail']);
    // Route::get('top-sheet', [App\Http\Controllers\ReportController::class,'topSheet']);

});

include('auth.php');
