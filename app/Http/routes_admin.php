<?php

Route::group(['prefix' => 'admin-panel'] , function(){

	Route::get('/' , 'Admin\DefaultController@index');

	// routes dynamic from DB
	if(\Schema::hasTable('menus'))
	{	
		foreach(Helper::injectModel('Menu')->where('slug' , '!=' , '#')->get() as $row)
		{
				Route::controller($row->slug , $row->controller);
			
		}
	}
	// 

});