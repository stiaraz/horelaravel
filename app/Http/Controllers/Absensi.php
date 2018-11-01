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


    	return view('absen_orang', ['result'=>$result]);
    }

    public function detail_absen($id){
    	
    	return view('absen_detail', ['id'=>$id]);
    }

    public function detail_tgl(){

    	$id = Input::get('id');
    	$raw="SELECT tanggal FROM absen WHERE id=".$id;
    	$result = DB::select(DB::raw($raw));
    	return response()->json($result);
    }

    public function per_hari(){
        if (!Auth::check())
            return Redirect::to('/');
        return view('absen_hari');
    }

    public function get_per_hari(){
        $start = Input::get('start');
        $end = Input::get('end');

        $raw="SELECT a.id, l.nama, Date(a.tanggal) as date, time(a.tanggal) as time  
            FROM absen a, listanggota l WHERE tanggal >='".$start."' AND tanggal < '".$end." 23:59:59' AND a.id=l.id ORDER by nama ASC";

        
        $result = DB::select(DB::raw($raw));
        $data=array();
        $count2=1;
        foreach ($result as $key => $value) {
            $row =array();
            $count =0;
            foreach ($value as $key2 => $value2) {
                if ($count==0) {
                    $row[]=$count2;
                }
                $row[]=$value2;
                $count++;
            }
            $count2++;
            $data[]=$row;
        }
        $arr = array(
            "data" => $data,
        );
        return response()->json($arr);
    }
}
