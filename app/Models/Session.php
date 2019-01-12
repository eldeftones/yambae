<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    protected $table = 'sessions';


    public function toJson($options = 0)
    {
        return [
            'id' => $this->id,
            'label' => $this->label,
            'date_start' => $this->date_start,
            'date_end' => $this->date_end,
        ];
    }
}
