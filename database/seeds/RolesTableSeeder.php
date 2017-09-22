<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role=new Role();
        $role->name="Super Admin";
        $role->description="A super user with most elaborate privileges";
        $role->save();
        
        $role=new Role();
        $role->name="Admin";
        $role->description="A local system administrator";
        $role->save();
        
        $role=new Role();
        $role->name="Teacher";
        $role->description="A user with some privileges and roles cut out";
        $role->save();
        
        $role=new Role();
        $role->name="Student";
        $role->description="A normal under-privileged user";
        $role->save();
    }
}
