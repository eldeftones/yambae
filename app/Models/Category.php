<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = ['ident', 'label'];


    public function toJson($options = 0)
    {
        return [
            'id' => $this->id,
            'ident' => $this->ident,
            'label' => $this->label,
        ];
    }
}
