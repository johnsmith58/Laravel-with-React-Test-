<?php

namespace App\Casts;

use Illuminate\Support\Str;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class UserCode implements CastsAttributes
{

    public function get($model, $key, $value, $attributes)
    {
        return "ABC-" . $value . 'DEF';
    }

    public function set($model, $key, $value, $attributes)
    {
        return Str::of($value)->after('ABC-')->before('DEF');
    }

}
