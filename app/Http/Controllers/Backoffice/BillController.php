<?php

namespace App\Http\Controllers\Backoffice;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Student;

class BillController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function listBills()
    {
        return view('backend.bill.list');
    }

    public function newBill($id)
    {
        $student = Student::find($id);
        if (!$student) {
            abort();
        }

        return view('backend.bill.new')
            ->with([
                'studentId' => $student->id,
            ]);
    }
}
