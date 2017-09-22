<?php

namespace App\Http\Controllers;

use App\User;
use App\Institution;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class SettingsController extends Controller{
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
        return view('settings.index');
    }
    
    
}
