<?php

namespace App\Http\Controllers;

use App\Course;
use App\Instructor;
use App\NgClass;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller{
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*Count Existing classes, courses and instructors*/
        $ng_classes= NgClass::where('institution_id','=',Auth::user()->institution_id)->count(); 
        $courses= Course::where('institution_id','=',Auth::user()->institution_id)->count(); 
        $instructors= Instructor::where('institution_id','=',Auth::user()->institution_id)->count(); 
        
        return view('home',compact('ng_classes','courses','instructors'));
    }
}
