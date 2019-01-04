<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = 'bills';


    public function product()
    {
        return $this->hasOne('App\Models\Product', 'id', 'product_id');
    }


    public function student()
    {
        return $this->hasOne('App\Models\Student', 'id', 'student_id');
    }


    public function fromJson($data, $asObject = false)
    {
        $this->product_id = $data['product_id'];
        $this->student_id = $data['student_id'];
        $this->price = $data['price'];
        $this->refunded = $data['refunded'];
        $this->comment = $data['comment'];
        $this->created_at = $data['created_at'];
    }


    public function toJson($options = 0)
    {
        return [
            'id' => $this->id,
            'product_id' => $this->product_id,
            'product_label' => $this->product->label,
            'student' => $this->student->toJson(),
            'price' => $this->price,
            'refunded' => $this->refunded,
            'comment' => $this->comment,
            'created_at' => $this->created_at->format('d-m-Y'),
        ];
    }
}
