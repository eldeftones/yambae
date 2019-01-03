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
Route::get('/home', 'HomeController@index')->name('home');

// USERS
Route::get('/list-students',    'StudentController@listStudents')->name('list_students');
Route::get('/new-student',      'StudentController@newStudent')->name('new_student');
