<?php namespace Reza;

class Helper

{
	public function injectModel($model)

	{
		$instance =  "App\Models\\".$model;
		return new $instance;
	}

	public function buttonUpdate($id)
	
	{
		return '<a class="btn btn-default btn-sm" href="'.url('admin-panel/manage-pages/update/'.$id).'">Update</a>';
        
	}

	public function buttonDelete($id)
	
	{
		return '<a class="btn btn-danger btn-sm" onclick = "return confirm(\'are you sure want to delete this item ?\')" href="'.url('admin-panel/manage-pages/delete/'.$id).'">Delete</a>';
        
	}

	public function buttons($id)

	{
		return $this->buttonUpdate($id).' '.$this->buttonDelete($id);	                        
                                
	}

}