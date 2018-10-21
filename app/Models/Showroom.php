<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Showroom extends Model
{
    protected $table = 'showrooms';

    public function photos() {
        return $this->hasMany('App\Models\Photo');
    }
}
