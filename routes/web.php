<?php

//  ____  _   _ ____  _     ___ ____
// |  _ \| | | | __ )| |   |_ _/ ___|
// | |_) | | | |  _ \| |    | | |
// |  __/| |_| | |_) | |___ | | |___
// |_|    \___/|____/|_____|___\____|

Route::get('/', function () {
    return view('welcome');
});

// AUTHENTICATION
Auth::routes();


// ____  ____  _____     ___  _____ _____
// |  _ \|  _ \|_ _\ \   / / \|_   _| ____|
// | |_) | |_) || | \ \ / / _ \ | | |  _|
// |  __/|  _ < | |  \ V / ___ \| | | |___
// |_|   |_| \_|___|  \_/_/   \_|_| |_____|

// HOME
Route::get('/home',                             'HomeController@index')->name('home');

// STUDENTS
Route::get('/list-students',                    'Backoffice\\StudentController@listStudents')->name('list_students');
Route::get('/new-student',                      'Backoffice\\StudentController@newStudent')->name('new_student');

// PRODUCTS
Route::get('/list-products',                    'Backoffice\\ProductController@listProducts')->name('list_products');
Route::get('/new-product',                      'Backoffice\\ProductController@newProduct')->name('new_product');

// BILLS
Route::get('/student/{id}/list-bills',          'Backoffice\\BillController@listBills')->name('list_bills');
Route::get('/student/{id}/new-bill',            'Backoffice\\BillController@newBill')->name('new_bill');
Route::get('/bills/total',                      'Backoffice\\BillController@total')->name('total');
