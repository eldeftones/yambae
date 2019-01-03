<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = 'bills';


    public function fromJson($data, $asObject = false) {

        $this->product_id = $data['product_id'];
        $this->student_id = $data['student_id'];
        $this->price = $data['price'];
        $this->refunded = $data['refunded'];
        $this->comment = $data['comment'];
        $this->created_at = $data['created_at'];
    }


    public function toJson($options = 0) {

        return [
            'id' => $this->id,
            'product_id' => $this->product_id,
            'student_id' => $this->student_id,
            'price' => $this->price,
            'refunded' => $this->refunded,
            'comment' => $this->comment,
            'created_at' => $this->created_at->format('d-m-Y'),
        ];
    }
}
