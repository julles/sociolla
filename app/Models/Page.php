<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    public $guarded = [];

    public function rules($id="")
    
    {

    	(!empty($id)) ? $title = ',title,'.$id : $title = '';

    	return [
    		'title' => 'required|unique:pages'.$title
    	];
    }

    public function lists($id = "")
    {
    	return ['0' => 'This Parent'] + $this->whereParentId(0)
			->where('id' , '!=' , $id)
			->lists('title' , 'id')
			->toArray();
    }
}
