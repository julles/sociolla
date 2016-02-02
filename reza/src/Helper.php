<?php namespace Reza;

class Helper

{
	public function injectModel($model)

	{
		$instance =  "App\Models\\".$model;
		return new $instance;
	}

}