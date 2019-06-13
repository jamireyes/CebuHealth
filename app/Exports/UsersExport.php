<?php

namespace App\Exports;

use App\User;
use App\role;
use Maatwebsite\Excel\Concerns\FromQuery;
use Illuminate\Database\Eloquent\Collection;

class UsersExport implements FromQuery
{    
    public function setUsers($users)
    {
        $this->users = $users;
        return $this;
    }
    
    public function query()
    {
        return User::withTrashed()->whereIn('id', $this->users);
    }
}
