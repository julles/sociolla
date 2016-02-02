<?php
Route::get('/', function () {
    return view('welcome');
});


include __DIR__.'/routes_admin.php';