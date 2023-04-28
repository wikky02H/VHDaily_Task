<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// Route::post("user",[UserController::class,"loginUser"]);
// Route::get("user/{email}",[UserController::class,"getUser"]);
// Route::put("user",[UserController::class,"updateUser"]);
// Route::delete("user",[UserController::class,"deleteUser"]);

Route::post("category",[CategoryController::class,"insert"]);
Route::post("category/bulkInsert",[CategoryController::class,"bulkInsert"]);
Route::get("category",[CategoryController::class,"get"]);
Route::put("category",[CategoryController::class,"update"]);
Route::delete("category",[CategoryController::class,"delete"]);

Route::post("products",[ProductController::class,"insert"]);



