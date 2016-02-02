<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Admin\Controller;
use App\Models\Role;
use Datatables;

class RoleController extends Controller
{

	protected $titleAction;

	public function __construct()

	{
		parent::__construct();

		$this->titleAction = 'Role';

		$this->model = new Role;
	}

    public function getIndex()

    {
    	$titleAction = "List ".$this->titleAction;

    	return view('admin.role.index' , compact('titleAction'));
    }

    public function getData()

    {
    	$data = $this->model->select('id' , 'name');

    	$tables = Datatables::of($data)
    		->addColumn('action' , function($model){

    			$update = '<a href = "'.url('admin-panel/role/update/'.$model->id).'" class = "btn btn-default btn-sm">Update<a/>';
    			$delete = '<a href = "'.url('admin-panel/role/delete/'.$model->id).'" class = "btn btn-danger btn-sm" onclick = "return confirm(\'are you sure want to delete this item ?\')">Delete</i><a/>';

    			if($model->id != 1)
    				return $update.' '.$delete;
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

    	return view('admin.role._form' , compact('titleAction' ,'model'));
    }

    public function postCreate(Request $request)

    {
    	$this->model->create($request->all());

    	return redirect(url('admin-panel/role'))->withMessage('Data has been saved!');
    }

    public function getUpdate($id)

    {
    	$titleAction = "Update ".$this->titleAction;

    	$model = $this->model->find($id);

    	return view('admin.role._form' , compact('titleAction' ,'model'));
    }

    public function postUpdate(Request $request , $id)

    {
    	$this->model->find($id)->update($request->all());

    	return redirect(url('admin-panel/role'))->withMessage('Data has been updated!');
    }

    public function getDelete($id)

    {
    	$model = $this->model->find($id);

    	try
    	{
    		$model->delete();
    		return redirect(url('admin-panel/role'))->withMessage('Data has been deleted!');
    	}catch(\Exception $e){
    		return redirect(url('admin-panel/role'))->withMessage('Data cannot bee deleted!');
    	
    	}
    }
}
