<?php

namespace App\Http\Controllers;

use App\User;
use App\Institution;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class ProfileController extends Controller{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        $this->middleware('auth');
    }
    /**
    *Index Page
     */
    protected function index(){
        return view('profiles.index');
    }
    /**
    *Updating details
    */
    protected function update(Request $request){
        /*Validation Rules*/
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'phone' => 'required|unique:users|regex:/(07)[0-9]{8}/',
        ]);
        /*Check whether validation fails*/
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }else{
            $user= User::where('id',$request->user)->first();
            $user->name=$request->name;
            $user->phone=$request->phone;
            $user->save();

            return redirect('/profile')->with('updated','User information successfully updated!!!');
        }
    }
    /*Change use password*/
    protected function password(Request $request){
        $validator = Validator::make($request->all(), [
            'newpwd' => 'required|min:6|confirmed',
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput()
                        ->withNot('Password was not changed...Please try again');
        }else{
            $user= User::where('id',$request->user)->first();
            if(Hash::check($request->old_pwd, $user->password)){
                $user->password=bcrypt($request->newpwd);
                $user->pwd_changed=1;
                $user->save();

                return redirect('/profile')->with('changed','User password was successfully changed!!!');
            }else{
                return redirect()->back()->withWrong('The current password provided is not correct. Please provide the correct one.');
            }
        }
    }
    
    
}
