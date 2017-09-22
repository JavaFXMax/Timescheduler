<?php

namespace App\Http\Controllers;
/*Models*/
use App\User;
use App\Institution;
use App\Venue;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class VenueController extends Controller{
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
        $venues= Venue::where('institution_id','=',Auth::user()->institution_id)->get();
        return view('venues.index',compact('venues'));
    }
    /*create a new venue*/
    protected function newvenue(Request $request){
        $validator = Validator::make($request->all(), [
             'name' => 'required|max:255',
             'capacity' => 'required|numeric',
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput()
                        ->withNot('Venue not created. Details provided are of the wrong format.
                        Please correct and try again.');
        }else{
            $venue=new Venue();
            $venue->name= $request->name;
            $venue->capacity= $request->capacity;
            $venue->institution_id= Auth::user()->institution_id;
            $venue->save();
            
            return redirect('/venues')->with('created','Venue was created successfully!!!');
            
        }
    }
    
}
