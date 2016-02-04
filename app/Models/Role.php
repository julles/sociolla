<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Menu;
class Role extends Model
{

	public $guarded = [];

	public function rules($id = "")

	{
		if(!empty($id))
		{
			$update = ',name,'.$id;
		}else{
			$update = '';
		}

		return [

			'name' => 'required|max:225|unique:roles'.$update,

		];
	}

	public function menus()

	{
		return $this->belongsToMany(Menu::class , 'rights');
	}
}
