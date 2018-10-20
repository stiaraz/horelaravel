<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\User;
use Redirect;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class UserController extends Controller
{
    public function loginValidation(){
    
		return Redirect::to('/');
		

    }

    public function CreateAccount(){

    }
}
