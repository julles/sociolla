<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller as ControllerLaravel;
use App\Models\Menu;
class Controller extends ControllerLaravel
{
    protected $model;

    protected $parents;

    public function __construct()

    {
        $this->model = new Menu;

        $this->parents = $this->model->whereParentId(0)->orderBy('order' , 'asc')->get();

        view()->share('modelMenu' , $this->model);
        view()->share('parents' , $this->parents);
    }
}
