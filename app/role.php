<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class role extends Model
{
    protected $table = 'roles';
    public $primarykey = 'RoleID';
    
    public function user()
    {
        return $this->belongsTo('App\User', 'RoleID', 'RoleID');
    }
}
