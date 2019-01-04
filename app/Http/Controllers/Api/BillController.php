<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CreateNewBillRequest;
use App\Models\Bill;
use App\Models\Student;

class BillController extends Controller {


    public function getBills()
    {
        $bills = Bill::all();

        return response()->json($bills->map->toJson());
    }


    public function getStudentBills($studentId)
    {
        $student = Student::find($studentId);
        if (!$student) {
            return response()->json(['message' => 'Élève inconnu'], 404);
        }

        return response()->json($student->bills->map->toJson());
    }


    public function createBill(CreateNewBillRequest $request)
    {
        $bill = new Bill;
        $bill->fromJson(request()->all());
        $bill->save();

        return response()->json(['message' => 'Nouvelle facture créée avec succès !']);
    }


    public function getTotalBills()
    {
        $totals = Bill::query()
            ->addSelect([
                'p.label AS product_label',
                \DB::raw("SUM(bills.price) AS total"),
            ])
            ->join('products AS p', 'p.id', 'bills.product_id')
            ->groupBy('p.id')
            ->get();

        return response()->json($totals);
    }

}
