<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Role;
use App\User;
use App\Institution;

class DatabaseSeeder extends Seeder{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $this->call('RolesTableSeeder');
        $this->call('UsersTableSeeder');
    }

}

class RolesTableSeeder extends Seeder{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
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

class UsersTableSeeder extends Seeder{
/**
 * Run the database seeds.
 *
 * @return void
 */
    public function run(){
        $institute= new Institution();
        $institute->name="Mathare Primary School";
        $institute->save();
        
        $institute1= new Institution();
        $institute1->name="Makelele Primary School";
        $institute1->save();
        
        $institute2= new Institution();
        $institute2->name="Matharo Primary School";
        $institute2->save();
        
        
        $institute3= new Institution();
        $institute3->name="Makueni Primary School";
        $institute3->save();
        
        $sa= Role::where('name','=','Super Admin')->first();
        $user= new User();
        $user->name="Kelmax Makamu";
        $user->email="profmakamu@gmail.com";
        $user->phone="0768745678";
        $user->pwd_changed=0;
        $user->password=bcrypt("kelmax");
        $user->last_login=date("Y-m-d");
        $user->institution_id=$institute->id;
        $user->save();

        $user->roles()->attach($sa);

        $admin= Role::where('name','=','Admin')->first();
        $user1= new User();
        $user1->name="Admin Admin";
        $user1->email="admin@gmail.com";
        $user1->phone="0767745678";
        $user1->pwd_changed=0;
        $user1->password=bcrypt("kelmax");
        $user1->last_login=date("Y-m-d");
        $user1->institution_id=$institute1->id;
        $user1->save();

        $user1->roles()->attach($admin);

        $teacher= Role::where('name','=','Teacher')->first();
        $user2= new User();
        $user2->name="Teacher Teacher";
        $user2->email="teacher@gmail.com";
        $user2->phone="0766745678";
        $user2->pwd_changed=0;
        $user2->password=bcrypt("kelmax");
        $user2->last_login=date("Y-m-d");
        $user2->institution_id=$institute2->id;
        $user2->save();

        $user2->roles()->attach($teacher);

        $student= Role::where('name','=','Student')->first();
        $user3= new User();
        $user3->name="Student Student";
        $user3->email="student@gmail.com";
        $user3->phone="0765745678";
        $user3->pwd_changed=0;
        $user3->password=bcrypt("kelmax");
        $user3->last_login=date("Y-m-d");
        $user3->institution_id=$institute3->id;
        $user3->save();

        $user3->roles()->attach($teacher);

    }
}