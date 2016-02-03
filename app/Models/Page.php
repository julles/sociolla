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
}
