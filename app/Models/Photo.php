<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $table = 'photos';

    public function showroom() {
        return $this->belongsTo('App\Models\Showroom');
    }
}
