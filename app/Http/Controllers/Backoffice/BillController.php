<?php

namespace App\Http\Controllers\Backoffice;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Bill;
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

        return view('backend.bill.edit')
            ->with([
                'studentId' => $student->id,
                'billId' => 'new',
            ]);
    }


    public function editBill($billId)
    {
        $bill = Bill::find($billId);
        if (!$bill) {
            // TODO
        }

        return view('backend.bill.edit')
            ->with([
                'studentId' => $bill->student->id,
                'billId' => $billId,
            ]);
    }


    public function total()
    {
        return view('backend.bill.total');
    }

}
