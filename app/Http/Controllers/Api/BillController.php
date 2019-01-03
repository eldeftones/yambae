<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CreateNewBillRequest;
use App\Models\Bill;

class BillController extends Controller {


    public function getBills() {

        $bills = Bill::all();

        return response()->json($bills->map->toJson());
    }


    public function createBill(CreateNewBillRequest $request) {

        $bill = new Bill;
        $bill->fromJson(request()->all());
        $bill->save();

        return response()->json(['message' => 'Nouvelle facture créée avec succès !']);
    }

}
