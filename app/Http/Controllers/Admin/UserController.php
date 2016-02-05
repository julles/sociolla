<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Admin\Controller;
use App\User;
use App\Models\Role;
use Datatables;

class UserController extends Controller
{
    public function __construct()

    {
        parent::__construct();

        $this->titleAction = 'User';

        $this->model = new User;

        $this->roles = Role::lists('name' , 'id')->toArray();
    }

    public function getIndex()
    
    {
        $titleAction = "List ".$this->titleAction;
        return view('admin.user.index' , compact('titleAction'));
    }

    public function getData()

    {
        $data = $this->model->select('users.id' , 'users.name AS name' ,'email' ,'roles.name AS role_name' , 'username')
        
        ->join('roles' , 'roles.id' , '=' , 'users.role_id');

        $tables = Datatables::of($data)
            ->addColumn('action' , function($model){

                
                if($model->id != 1)
                    return \Helper::buttons($model->id);
            })
            ->make(true);

        return $tables;
    }

    public function postValidate(Request $request)

    {
        
        $id = $request->id;
        
        $validation = \Validator::make($request->all() , $this->model->rules($id));
        
        if($validation->fails())
        {
            $errors = $validation->getMessageBag();
            $status = 'notValidate';
        }else{
            $errors = '';
            $status = 'true';
        }

        return \Response::json([

            'errors' => $errors,
            'status' => $status,

        ]);
    }

    public function getCreate()

    {
        $titleAction = "Create ".$this->titleAction;

        $model = $this->model;

        $roles = $this->roles;

        return view('admin.user._form' , compact('titleAction' ,'model','roles'));
    }

    public function postCreate(Request $request)

    {
        $this->model->create([

            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'role_id' => $request->role_id,
            'password' => \Hash::make($request->password),

        ]);

        return redirect(url('admin-panel/user'))->withMessage('Data has been saved!');
    }

    public function getUpdate($id)

    {
        $titleAction = "Update ".$this->titleAction;

        $model = $this->model->find($id);

        $roles = $this->roles;

        if($id != 1)
        {

            return view('admin.user._form' , compact('titleAction' ,'model','roles'));

        }else{
            echo "<h2>Cannot Update Super Admin!</h2>";
        }
    }

    public function postUpdate(Request $request , $id)

    {
        $this->model->find($id)->update([

            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'role_id' => $request->role_id,
            'password' => \Hash::make($request->password),

        ]);

        return redirect(url('admin-panel/user'))->withMessage('Data has been updated!');
    }

    public function getDelete($id)

    {
        $model = $this->model->find($id);

        try
        {  
            if($id != 1)
            {
                $model->delete();
                return redirect(url('admin-panel/user'))->withMessage('Data has been deleted!');
        
            }else{

                echo '<h2>Cannot Delete Super Admin!</h2>';
       
            }
                
        }catch(\Exception $e){
            return redirect(url('admin-panel/user'))->withMessage('Data cannot bee deleted!');
        
        }
    }

}
