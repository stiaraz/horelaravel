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
}
