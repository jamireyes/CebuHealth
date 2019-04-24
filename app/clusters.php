<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class clusters extends Model
{
    public function data()
    {
        return $this->belongsTo('App\Data');
    }
}
