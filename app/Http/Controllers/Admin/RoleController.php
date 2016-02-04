<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Admin\Controller;
use App\Models\Role;
use App\Models\Menu;
use App\Models\Right;
use Datatables;
use Input;

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

                $access = '<a href = "'.url('admin-panel/role/right/'.$model->id).'" class = "btn btn-success btn-sm">Access<a/>';
                $update = '<a href = "'.url('admin-panel/role/update/'.$model->id).'" class = "btn btn-default btn-sm">Update<a/>';
    			$delete = '<a href = "'.url('admin-panel/role/delete/'.$model->id).'" class = "btn btn-danger btn-sm" onclick = "return confirm(\'are you sure want to delete this item ?\')">Delete</i><a/>';

    			if($model->id != 1)
    				return $access.' '.$update.' '.$delete;
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

        if($id != 1)
        {   
            $model = $this->model->find($id);
            return view('admin.role._form' , compact('titleAction' ,'model'));
        
        }else{

            echo '<h2>Cannot Update Super Admin!</h2>';
       }
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
            if($id != 1)
            {
                $model->delete();
                return redirect(url('admin-panel/role'))->withMessage('Data has been deleted!');
        
            }else{

                echo '<h2>Cannot Delete Super Admin!</h2>';
       
            }
        		
        }catch(\Exception $e){
    		return redirect(url('admin-panel/role'))->withMessage('Data cannot bee deleted!');
    	
    	}
    }

    public function getRight($id)

    {
        $titleAction = "Access Rights ".$this->titleAction;

        if($id != 1)
        {   
            $model = $this->model->find($id);
            
            $titleAction = "Access Rights :".$model->name;
            
            $menus = Menu::whereParentId(0)->orderBy('order' ,'asc')->get();

            $active = function($paramId) use ($id)
            {
                $cek = Right::whereRoleId($id)->whereMenuId($paramId)->first();
                if(!empty($cek->id))
                {
                    return 'checked';
                }
            };

            return view('admin.role.right' , compact('titleAction' ,'model' , 'menus' ,'active'));
        
        }else{

            echo '<h2>Cannot Update Super Admin!</h2>';
       }
    }

    public function postRight($id)
    
    {
        $model = $this->model->find($id);
    
        \DB::beginTransaction();

        try
        {
            Right::whereRoleId($model->id)->delete();

            $count = count(Input::get('menu_id'));

            for($a=0;$a<$count;$a++)
            {
                Right::create([

                    'menu_id' => Input::get('menu_id')[$a],
                    'role_id' => $model->id,

                ]);
            }

            \DB::commit();

            return redirect('admin-panel/role/index')->withMessage('Rights Access has been updated');

        }catch(\Exception $e){
            \DB::rollback();
            return redirect('admin-panel/role/index')->withMessage('Transaction Failed');
        }
    }
}
