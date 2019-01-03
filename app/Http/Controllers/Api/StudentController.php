<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CreateNewStudentRequest;
use App\Models\Student;

class StudentController extends Controller {


    public function getStudents() {

        $students = Student::all();

        return response()->json($students->map->toJson());
    }


    public function createStudent(CreateNewStudentRequest $request) {

        $student = new Student;
        $student->fromJson(request()->all());
        $student->save();

        return response()->json(['message' => 'Nouvel(le) élève créé(e) !']);
    }

}
