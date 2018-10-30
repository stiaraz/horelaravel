<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Redirect;
use DB;
use Illuminate\Support\Facades\Input;

class Absensi extends Controller
{
    public function absen()
    {
        if (!Auth::check())
            return Redirect::to('/');

        $raw="SELECT id, nama FROM listanggota";
    	$result = DB::select(DB::raw($raw));


    	return view('absen', ['result'=>$result]);
    }

    public function detail_absen($id){
    	
    	return view('detail_absen', ['id'=>$id]);
    }

    public function detail_tgl(){

    	$id = Input::get('id');
    	$raw="SELECT tanggal FROM absen WHERE id=".$id;
    	$result = DB::select(DB::raw($raw));
    	return response()->json($result);
    }
}
