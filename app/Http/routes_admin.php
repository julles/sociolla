<?php
Route::group(['prefix' => 'admin-panel'] , function(){

	Route::get('/' , 'Admin\DefaultController@index');

});