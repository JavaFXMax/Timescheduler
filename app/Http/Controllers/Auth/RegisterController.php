<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Institution;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'institution' => 'required|max:255',
            'phone' => 'required|unique:users|regex:/(07)[0-9]{8}/',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }else{
            $institution=new Institution;
            $institution->name=$request->institution;
            $institution->save();

            $user=new User;
            $user->name=$request->name;
            $user->email=$request->email;
            $user->phone=$request->phone;
            $user->password=bcrypt($request->password);
            $user->institution_id=$institution->id;
            $user->last_login=date("Y-m-d");
            $user->save();

            return redirect('/login')->with('status', 'Registration Successful! Kindly login.');
        }
    }
}
