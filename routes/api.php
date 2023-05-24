<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FileuploadController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

Route::middleware('auth:sanctum')->get('/user', function(Request $request) {
    return $request->user();
});
// Route::post("user",[UserController::class,"loginUser"]);
// Route::get("user/{email}",[UserController::class,"getUser"]);
// Route::put("user",[UserController::class,"updateUser"]);
// Route::delete("user",[UserController::class,"deleteUser"]);


//route group with middleware

Route::middleware('api.endpoint')->group(function() {
    Route::post("category", [CategoryController::class,"insert"]);
    Route::post("category/bulkInsert", [CategoryController::class,"bulkInsert"]);
    Route::get("category", [CategoryController::class,"get"]);
    Route::put("category", [CategoryController::class,"update"]);
    Route::delete("category", [CategoryController::class,"delete"]);

    Route::post("products", [ProductController::class,"insert"]);
    Route::get("products", [ProductController::class,"getProducts"]);

    Route::get("productsAlter", [ProductController::class,"get_Products"]);
    Route::get("productsFormal", [ProductController::class,"getproductformal"]);

    Route::post("uploadFile", [FileuploadController::class,"upload"]);
    Route::delete("deleteFile/{filename}", [FileuploadController::class,"delete"]);
});

use Illuminate\Support\Facades\Route;

Route::get('/generate-password', function() {
    $password = Hash::make("Test@123");
    echo $password;
});
