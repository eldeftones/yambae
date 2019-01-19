<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    public $timestamps = false;

    const ID_SESSION_COLOMBIAN_SALSA = 1;

    public function category()
    {
        return $this->hasOne('App\Models\Category', 'id', 'category_id');
    }


    public function fromJson($data, $asObject = false)
    {
        $this->label = $data['label'];
        $this->price = $data['price'];
        $this->description = $data['description'];
        $this->category_id = $data['category_id'];
    }


    public function toJson($options = 0)
    {
        return [
            'id' => $this->id,
            'label' => $this->label,
            'price' => $this->price,
            'description' => $this->description,
            'category' => $this->category->toJson(),
        ];
    }

}
