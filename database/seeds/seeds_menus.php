<?php

use Illuminate\Database\Seeder;

class seeds_menus extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	\DB::table('menus')->delete();

        \DB::table('menus')->insert([
        	'id' => 1,
        	'parent_id' => 0,
        	'title' => 'User',
        	'slug' => '#',
        	'controller' => '#',
        	'order' => 2,
        	'icon' => 'fa fa-user nav_icon',
        ]);

        \DB::table('menus')->insert([
        	'parent_id' => 1,
        	'title' => 'Role',
        	'slug' => 'role',
        	'controller' => 'Admin\RoleController',
        	'order' => 1,
        ]);
    }
}
