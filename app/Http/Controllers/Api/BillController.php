<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CreateNewBillRequest;
use App\Models\Bill;
use App\Models\Product;
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

        // Send bill to the customer
        $to = $bill->student->email;
        if ($to) {
            $mail = new \App\Mail\BillCreated($bill);
            \Mail::to($to)->send($mail);
            // Save a copy of the email sent
            $bill->email_copy = json_encode($mail->render());
            $bill->save();
        }

        return response()->json(['message' => 'Facture enregistrée avec succès !']);
    }


    public function getTotalBills()
    {
        $request = request();
        $sessionId = $request->session_id;
        $productId = $request->product_id;
        $levelId = $request->level_id;

        $totals = Bill::query()
            ->addSelect([
                'p.label AS product_label',
                \DB::raw("SUM(bills.price) AS total"),
            ])
            ->join('products AS p', 'p.id', 'bills.product_id')
            ->when($productId, function ($q) use ($productId) {
                $q
                    ->where('bills.product_id', $productId);
            })
            ->when($sessionId, function ($q) use ($sessionId) {
                $q
                    ->where('bills.session_id', $sessionId);
            })
            ->when($levelId, function ($q) use ($levelId) {
                $q
                    ->where('bills.level_id', $levelId);
            })
            ->groupBy('p.id')
            ->get();

        return response()->json($totals);
    }

}
