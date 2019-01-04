<?php

namespace App\Http\Controllers\Backoffice;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Student;

class BillController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function listBills($studentId)
    {
        $student = Student::find($studentId);
        if (!$student) {
            // TODO
        }

        return view('backend.bill.list')
            ->with([
                'studentId' => $studentId,
            ]);
    }


    public function newBill($studentId)
    {
        $student = Student::find($studentId);
        if (!$student) {
            // TODO
        }

        return view('backend.bill.new')
            ->with([
                'studentId' => $student->id,
            ]);
    }


    public function total()
    {
        return view('backend.bill.total');
    }

}
