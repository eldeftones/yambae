<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
     protected $table = 'students';

     public function fromJson($data, $asObject = false) {

         $this->gender = $data['gender'];
         $this->firstname = $data['firstname'];
         $this->lastname = $data['lastname'];
         $this->created_at = $data['created_at'];
     }

     public function toJson($options = 0) {

         return [
             'id' => $this->id,
             'gender' => $this->gender,
             'firstname' => $this->firstname,
             'lastname' => $this->lastname,
             'created_at' => $this->created_at->format('d-m-Y'),
         ];
     }
}
