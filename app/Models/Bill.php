<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = 'bills';

    public const TAXES_AMOUNT = 0.15;

    public function product()
    {
        return $this->hasOne('App\Models\Product', 'id', 'product_id');
    }


    public function student()
    {
        return $this->hasOne('App\Models\Student', 'id', 'student_id');
    }


    public function session()
    {
        return $this->hasOne('App\Models\Session', 'id', 'session_id');
    }


    public function level()
    {
        return $this->hasOne('App\Models\Level', 'id', 'level_id');
    }


    public function getPriceHT()
    {
        return round($this->price / (1 + self::TAXES_AMOUNT), 2);
    }


    public function getTaxesAmount()
    {
        return round($this->price - $this->getPriceHT(), 2);
    }


    public function fromJson($data, $asObject = false)
    {
        $this->product_id = $data['product_id'];
        $this->level_id = $data['level_id'];
        $this->session_id = $data['session_id'];
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
            'session_id' => $this->session_id,
            'level_id' => $this->level_id,
            'student_id' => $this->student_id,
            'price' => $this->price,
            'refunded' => $this->refunded,
            'comment' => $this->comment,
            'created_at' => $this->created_at->format('Y-m-d'),

            'student' => $this->student->toJson(),
            'product_label' => $this->product->label,
            'session_label' => optional($this->session)->label,
            'level_label' => optional($this->level)->label,
        ];
    }
}
