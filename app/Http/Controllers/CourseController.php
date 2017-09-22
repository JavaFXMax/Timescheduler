<?php

namespace App\Http\Controllers;

use App\User;
use App\Institution;
use App\Course;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class CourseController extends Controller{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /* 
     *Validation Rules
     */
    protected function validator(array $data){
        return Validator::make($data, [
            'name' => 'required|max:255',
            'institution' => 'required|max:255',
            'phone' => 'required|unique:users|regex:/(07)[0-9]{8}/',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }
    /**
    *Index Page
     */
    protected function index(){
        $courses= Course::where('institution_id','=',Auth::user()->institution_id)->get();
        return view('courses.index',compact('courses'));
    }
    
    /*create a new course*/
    protected function newCourse(Request $request){
        $validator = Validator::make($request->all(), [
             'name' => 'required|max:255',
             'code' => 'required|max:255|unique:courses',
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput()
                        ->withNot('Course not created. Details provided are of the wrong format.
                        Please correct and try again.');
        }else{
            $course=new Course();
            $course->name= $request->name;
            $course->code= $request->code;
            $course->description= $request->description;
            $course->type= $request->type;
            $course->institution_id= $request->institution;
            $course->save();
            
            return redirect('/courses')->with('created','Course was created successfully!!!');
            
        }
    }
}
