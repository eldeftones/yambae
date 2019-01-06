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


    public function getBill($billId)
    {
        $bill = Bill::find($billId);
        if (!$bill) {
            return response()->json(['message' => 'Facture inconnue'], 404);
        }

        return response()->json($bill->toJson());
    }


    public function getStudentBills($studentId)
    {
        $student = Student::find($studentId);
        if (!$student) {
            return response()->json(['message' => 'Élève inconnu'], 404);
        }

        return response()->json($student->bills->map->toJson());
    }


    public function saveBill(CreateNewBillRequest $request)
    {
        if ($request->id === 'new') {
            $bill = new Bill;
        } else {
            $bill = Bill::find($request->id);
            if (!$bill) {
                return response()->json(['message' => 'Facture inconnue'], 404);
            }
        }

        $bill->fromJson($request->all());
        $bill->save();

        return response()->json(['message' => 'Facture enregistrée avec succès !']);
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
