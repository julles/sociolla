<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    public $guarded = [];

    public function rules($id="")
    
    {
        return [
    		'title' => 'required|max:255',
            'sub_title' => 'max:255',
    	];
    }

    public function lists($id = "")
    {
    	return ['0' => 'This Parent'] + $this->whereParentId(0)
			->where('id' , '!=' , $id)
			->lists('title' , 'id')
			->toArray();
    }

    public function changeSlug($id)
    {
        $model = $this->find($id);
        $slug = str_slug($model->id.' '.$model->title);
        $model->update(['slug' => $slug]);
    }
}
