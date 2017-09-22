<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sa= Role::where('name','=','Super Admin')->first();
        $user= new User();
        $user->name="Kelmax Makamu";
        $user->email="profmakamu@gmail.com";
        $user->phone="0768745678";
        $user->pwd_changed=0;
        $user->password=bcrypt("kelmax");
        $user->last_login=date("Y-m-d");
        $user->institution_id=3;
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
        $user1->institution_id=3;
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
        $user2->institution_id=3;
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
        $user3->institution_id=3;
        $user3->save();
        
        $user3->roles()->attach($teacher);
        
    }
}
