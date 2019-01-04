<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    public $timestamps = false;


    public function fromJson($data, $asObject = false)
    {
        $this->label = $data['label'];
        $this->price = $data['price'];
        $this->description = $data['description'];
    }


    public function toJson($options = 0)
    {
        return [
            'id' => $this->id,
            'label' => $this->label,
            'price' => $this->price,
            'description' => $this->description,
        ];
    }

}
