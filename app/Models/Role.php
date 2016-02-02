<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}
