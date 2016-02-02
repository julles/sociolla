<?php
Route::group(['prefix' => 'admin-panel'] , function(){

	Route::get('/' , function(){

		return view('admin.welcome');

	});

});