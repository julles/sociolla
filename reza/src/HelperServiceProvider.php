<?php namespace Reza;

use Illuminate\Support\ServiceProvider;

class HelperServiceProvider extends ServiceProvider

{

	public function register()

	{
		$this->app->bind('register-helper'  , function(){

			return new Helper;

		});
	}

}