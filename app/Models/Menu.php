<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Role;

class Menu extends Model
{
    public function roles()

    {
    	return $this->belongsToMany(Role::class , 'rights');
    }

}
