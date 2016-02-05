<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Admin\Controller;
use App\Models\Page;
use Input;

class PageController extends Controller
{

	protected $titleAction;

	public function __construct(Page $model)

	{
		parent::__construct();

		$this->titleAction = 'Role';

		$this->model = $model;
	}

    public function getIndex()

    {
    	$titleAction = "List ".$this->titleAction;
    	$model = $this->model;
    	return view('admin.page.index' ,compact('model' ,'titleAction'));
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
    	$model = $this->model;
    	$titleAction = "Create ".$this->titleAction;
    	$lists = $this->model->lists();
    	
    	return view('admin.page._form' , compact('model' , 'titleAction' , 'lists'));
    }

    

	public function postCreate(Request $request)

    {
    	$this->model->create($request->all());
    	return redirect(url('admin-panel/manage-pages'))->withMessage('Data has been saved!');
    }

    public function getUpdate($id)

    {
    	$model = $this->model->find($id);
    	$titleAction = "Update ".$this->titleAction;
    	$lists = $this->model->lists($id);
    	
    	return view('admin.page._form' , compact('model' , 'titleAction' , 'lists'));
    }

    

	public function postUpdate(Request $request , $id)

    {
    	$this->model->find($id)->update($request->all());
    	return redirect(url('admin-panel/manage-pages'))->withMessage('Data has been updated!');
    }

    public function getDelete($id)
    {
    	$model = $this->model->find($id);

    	\DB::beginTransaction();

    	try
    	{	
    		if($model->parent_id == 0)
    		{
    			$this->model->whereParentId($model->id)->delete();
    		}

    		$model->delete();

    		\DB::commit();
    		
    		return redirect(url('admin-panel/manage-pages'))->withMessage('Data has been deleted!');
       
    	}catch(\Exception $e){
    		
    		\DB::rollback();
    		
    		return redirect(url('admin-panel/manage-pages'))->withMessage('Transaction Failed!');
       
    	}
    	
         
        
    }

}
