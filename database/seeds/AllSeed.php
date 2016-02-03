<?php

use Illuminate\Database\Seeder;

class AllSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// menus

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

	        \DB::table('menus')->insert([
	        	'parent_id' => 1,
	        	'title' => 'User',
	        	'slug' => 'user',
	        	'controller' => 'Admin\UserController',
	        	'order' => 1,
	        ]);
	    //
	    
	    // roles
	    	
	    	\DB::table('roles')->delete();
	    	\DB::table('roles')->insert([
	    		'id' => 1,
	    		'name' => 'Super Admin',
	    	]);
	    	\DB::table('roles')->insert([
	    		'id' => 2,
	    		'name' => 'Admin',
	    	]);
	    	\DB::table('roles')->insert([
	    		'id' => 3,
	    		'name' => 'User',
	    	]);

	    //
    }
}
