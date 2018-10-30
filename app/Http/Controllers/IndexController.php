<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;
use App\Http\Controllers\Controller;
use Auth;
use Redirect;

class IndexController extends Controller
{
    public function index()
    {
        if (Auth::check())
            return Redirect::to('/home');
    	return view ('index');
    }

    public function grafik()
    {
        if (!Auth::check())
            return Redirect::to('/');
    	return view ('rekap');
    }

    public function notif()
    {
        if (!Auth::check())
            return Redirect::to('/');
    	return view ('logdetail');
    }

    public function det()
    {
        if (!Auth::check())
            return Redirect::to('/');
    	return view ('detail');
    }

    public function error()
    {
        if (!Auth::check())
            return Redirect::to('/');
        return view('error');
    }

    public function home()
    {
        if (!Auth::check())
            return Redirect::to('/');
        return view('home');
    }

}
