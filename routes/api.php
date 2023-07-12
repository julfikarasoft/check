<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
//category
Route::post('store-category', [ApiController::class, 'storeCategory']);
Route::post('update-category/{id}', [ApiController::class, 'updateCategory']);
Route::get('show-category/{id}', [ApiController::class, 'showCategory']);
Route::delete('delete-category/{id}', [ApiController::class, 'deleteCategory']);
//category with sub category
Route::get('categories', [ApiController::class, 'categories']);
//sub category
Route::post('store-subcategory', [ApiController::class, 'storeSubcategory']);
Route::post('update-subcategory/{id}', [ApiController::class, 'updateSubcategory']);
Route::get('show-subcategory/{id}', [ApiController::class, 'showSubcategory']);
Route::delete('delete-subcategory/{id}', [ApiController::class, 'deleteSubcategory']);

//product
Route::post('store-product', [ApiController::class, 'storeProduct']);
Route::post('update-product/{id}', [ApiController::class, 'updateProduct']);
Route::get('show-product/{id}', [ApiController::class, 'showProduct']);
Route::delete('delete-product/{id}', [ApiController::class, 'deleteProduct']);


//user role add
Route::post('store-role', [ApiController::class, 'storeRole']);
Route::post('store-user', [ApiController::class, 'storeUser']);
Route::post('assign-role', [ApiController::class, 'assignRole']);