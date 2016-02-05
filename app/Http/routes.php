<?php
include __DIR__.'/routes_admin.php';
Route::get('/{slug?}' , 'PageController@index');

