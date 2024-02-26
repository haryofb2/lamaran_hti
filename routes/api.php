<?php

use App\Http\Controllers\Api\MasterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/user/all',[MasterController::class,'userall'])->name('api.user.all');
Route::get('/user/active',[MasterController::class,'useractive'])->name('api.user.active');
Route::get('/user/datatable',[MasterController::class,'userdatatable'])->name('api.user.datatable');
Route::post('/user/select',[MasterController::class,'userselect'])->name('api.user.select');
Route::post('/user/edit',[MasterController::class,'useredit'])->name('api.user.edit');
Route::post('/user/add',[MasterController::class,'useradd'])->name('api.user.add');
