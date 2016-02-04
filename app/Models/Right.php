<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Role;
use App\Models\Menu;

class Right extends Model
{
	protected $table = 'rights';
	
    public $guarded = [];

    public function role()
    
    {
    	return $this->belongsTo(Role::class , 'role_id');
    }

    public function menu()
    
    {
    	return $this->belongsTo(Menu::class , 'menu_id');
    }

    
}
