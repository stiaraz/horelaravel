<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
    	return view ('index');
    }

    public function grafik()
    {
    	return view ('graf');
    }

    public function notif()
    {
    	return view ('notif');
    }
    public function det()
    {
    	return view ('detail');
    }

    public function error()
    {
        return view('error');
    }

}
