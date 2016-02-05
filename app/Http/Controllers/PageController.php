<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Page;

class PageController extends Controller
{
    public function __construct(Page $model)

    {
    	$this->model = $model;
    
    	view()->share('pages' , $model);
    }

    public function index($slug = "")
    {

    	if(empty($slug))
    	{
    		$model = $this->model->orderBy('id' ,'asc')->first();
    	}else{
    		$model = $this->model->whereSlug($slug)->first();
		}

    	return view('page' , compact('model'));
    }
}
