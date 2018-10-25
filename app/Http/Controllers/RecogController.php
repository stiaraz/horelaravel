<?php

namespace App\Http\Controllers;

use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class RecogController extends Controller
{
    public function getData(Request $request){
    	$tempat = Input::get('tempat');
    	$status = Input::get('status');
    	$nama = Input::get('nama');
    	// $file= Input::file('image');
    	$name = $request->all();
    	$current_time = Carbon::now();
    	
    	// echo strlen($tempat);
  //   	$name = Input::all();
		$uploadedFile = $request->file('image');   
		$file = $uploadedFile->store('public/files');
		// echo $path;

		$raw="INSERT INTO recognition (`tempat`, `waktu`,`nama`,`foto`, `status`) VALUES ('".$tempat."','".$current_time."','".$nama."','".$file."',".$status.")";
    	$query = DB::insert(DB::raw($raw));
		// $file = File::create([
	 //        'title' => $request->title ?? $uploadedFile->getClientOriginalName(),
	 //        'filename' => $path
	 //    ]);
    	// dd($name);
    	// echo '<html>'.$status.'<img src='.$request->input('image').'></html>';
    	
    }


    public function detail(){
    	$waktu = '2018-10-23';
    	$raw ="SELECT id,foto,nama,waktu,tempat FROM recognition WHERE waktu='".$waktu."'";
    	// $raw ="SELECT id,foto,nama,waktu,tempat FROM recognition WHERE waktu BETWEEN '2018-10-23 00' AND '2018-10-23 23:59:59'";
    	$result = DB::select(Db::raw($raw));
    	// dd($result);
    	$data=array();
    	foreach ($result as $key => $value) {
    		$roww =array();
    		foreach ($value as $key2 => $value2) {
    			$row[]=$value2;
    		}
    		$data[]=$row;
    	}
    	// dd($data);
    	return view('detail', ['result'=>$result]);
    }

    public function detail_change(){
    	$waktu = Input::get('waktu');
    	// $waktu = '2018-10-23';
    	// $raw ="SELECT * FROM recognition WHERE waktu='".$waktu."'";
    	// $result = DB::select(Db::raw($raw));
    	// $raw ="SELECT * FROM recognition";
    	// $result = DB::select(Db::raw($raw));
    	$raw ="SELECT id,foto,nama,waktu,tempat FROM recognition WHERE waktu BETWEEN '".$waktu." 00' AND '".$waktu." 23:59:59'";

    	$result = DB::select(Db::raw($raw));
    	// dd($result);
    	$data=array();
    	$count2=1;
    	foreach ($result as $key => $value) {
    		$row =array();
    		$count =0;
    		foreach ($value as $key2 => $value2) {
    			if ($count==0) {
    				$row[]=$count2;
    			}
    			elseif ($count==1){
    				$value_foto =asset("storage/files/".$value2);
    				$row[]="<img style='height:100px; width:100px' src=".$value_foto.">";
    			}
    			else 
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
