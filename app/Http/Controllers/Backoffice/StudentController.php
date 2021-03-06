<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function listStudents()
    {
        return view('backend.student.list');
    }


    public function newStudent()
    {
        return view('backend.student.new');
    }

}
