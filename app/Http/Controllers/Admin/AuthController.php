<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Admin\Controller;
use App\User;

class AuthController extends Controller
{
	public function getLogin()

    {
    	return view('admin.login');
    }

    public function postLogin(Request $request)

    {
    	$credentials = ['username' => $request->username , 'password' => $request->password];				

    	$auth = \Auth::attempt($credentials);

    	if(!$auth)
    	{
    		return redirect()->back()->withMessage('username or password is incorrect')->withInput();
    	}

    	return redirect('admin-panel/');
    }
}
