<?php

Route::group(['prefix' => 'admin-panel'] , function(){

	Route::get('/' , 'Admin\DefaultController@index');

	// routes dynamic from DB
	
	foreach(Helper::injectModel('Menu')->where('slug' , '!=' , '#')->get() as $row)
	{
		Route::controller($row->slug , $row->controller);
	}

	// 

});