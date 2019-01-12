<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $table = 'levels';


    public function toJson($options = 0)
    {
        return [
            'id' => $this->id,
            'ident' => $this->ident,
            'label' => $this->label,
        ];
    }
}
