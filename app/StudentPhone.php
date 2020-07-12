<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Casts\UserCode;

class StudentPhone extends Model
{
    protected $fillable = [
        'student_id', 'phone_number',
    ];

    protected $casts = [
        'student_id' => UserCode::class
    ];

}
