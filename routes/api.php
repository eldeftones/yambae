<?php

use Illuminate\Http\Request;

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

// STUDENTS
Route::get('/students',                     'Api\\StudentController@getStudents');
Route::post('/student/new',                 'Api\\StudentController@createStudent');

// PRODUCTS
Route::get('/products',                     'Api\\ProductController@getProducts');
Route::post('/product/new',                 'Api\\ProductController@createProduct');
Route::get('/categories',                   'Api\\ProductController@listProductCategories');

// BILLS
Route::get('/bill/{id}',                    'Api\\BillController@getBill');
Route::get('/student/{id}/bills',           'Api\\BillController@getStudentBills');
Route::post('/bill/save',                   'Api\\BillController@saveBill');
Route::get('/bills/total',                  'Api\\BillController@getTotalBills');
