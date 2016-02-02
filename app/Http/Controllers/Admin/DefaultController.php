<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Admin\Controller;

class DefaultController extends Controller
{
    
    public function index()

    {
        return view('admin.welcome');
    }
}
