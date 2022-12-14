<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register',[CustomerController::class,'addCustomer'])->name("addCustomer");

Route::post('/storeCustomer',[CustomerController::class,'storeCustomer'])->name("storeCustomer");

Route::get('/manageCustomer',[CustomerController::class,'manageCustomer'])->name("manageCustomer");

Route::get('/editCustomer/{id}',[CustomerController::class,'editCustomer'])->name("editCustomer");

Route::get('/deleteCustomer/{id}',[CustomerController::class,'deleteCustomer'])->name("deleteCustomer");

Route::post('/updateCustomer/{id}',[CustomerController::class,'updateCustomer'])->name("updateCustomer");

//===========================
//    Customer Log
//===========================

Route::get('/customerLogAdd',[CustomerController::class,'customerLogAdd'])->name("customerLogAdd");
Route::post('/customerLogStore',[CustomerController::class,'customerLogStore'])->name("customerLogStore");
Route::get('/customerLogManageView',[CustomerController::class,'customerLogManageView'])->name("customerLogManageView");
Route::get('/customerLogEdit/{id}',[CustomerController::class,'customerLogEdit'])->name("customerLogEdit");
Route::post('/customerLogUpdate/{id}',[CustomerController::class,'customerLogUpdate'])->name("customerLogUpdate");
Route::get('/customerLogDelete/{id}',[CustomerController::class,'customerLogDelete'])->name("customerLogDelete");
Route::get('/customer_changeStatus',[CustomerController::class,'customer_changeStatus'])->name("customer.changestatus");








