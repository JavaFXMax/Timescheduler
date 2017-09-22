<?php

namespace App\Http\Controllers;

use App\User;
use App\Institution;
use App\NgClass;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class NgclassesController extends Controller{
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
        $ng_classes= NgClass::where('institution_id','=',Auth::user()->institution_id)->get();
        return view('ng_classes.index',compact('ng_classes'));
    }
    /*create a new ng_class*/
    protected function newNgClass(Request $request){
        $validator = Validator::make($request->all(), [
             'name' => 'required|max:255',
             'code' => 'required|max:255',
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput()
                        ->withNot('Class not created. Details provided are of the wrong format.
                        Please correct and try again.');
        }else{
            $ngclass=new NgClass();
            $ngclass->name= $request->name;
            $ngclass->code= $request->code;
            $ngclass->institution_id= Auth::user()->institution_id;
            $ngclass->save();
            
            return redirect('/ng_classes')->with('created','Class was created successfully!!!');
            
        }
    }
}
