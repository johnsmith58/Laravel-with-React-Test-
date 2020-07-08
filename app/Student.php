<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function pfImage(){
        return $this->hasOne('App\StudentImage');
    }
}
