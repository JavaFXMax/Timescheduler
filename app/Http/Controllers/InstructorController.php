<?php

namespace App\Http\Controllers;

use App\User;
use App\Institution;
use App\Instructor;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class InstructorController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
    *Index Page
     */
    protected function index(){
        $tutors=Instructor::where('institution_id','=',Auth::user()->institution_id)->get();
        return view('instructors.index',compact('tutors'));
    }
    /*Creating a new instructor*/
    protected function newInstructor(Request $request){
        /*Validation Rules*/
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'phone' => 'required|unique:users|regex:/(07)[0-9]{8}/',
            'email' => 'required|email|max:255|unique:users',
        ]);
        /*Check whether validation fails*/
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput()
                        ->withNot("Operation Failure. The details provided contain some errors.
                        Please correct the errors and try again.");
        }else{
            $user= new Instructor();
            $user->name=$request->name;
            $user->phone=$request->phone;
            $user->email=$request->email;
            $user->institution_id=$request->institution;
            $user->save();

            return redirect('/instructors')->with('created','Instructor successfully created!!!');
        }
    }
    
    
    
}
