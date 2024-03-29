<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClintInfoController;

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


 Route::get('/',[ClintInfoController::class,'index']);
 Route::post('/store',[ClintInfoController::class,'openTxtFile']);
 Route::post('/store_data',[ClintInfoController::class,'store']);
