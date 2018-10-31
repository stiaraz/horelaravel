<?php

namespace App\Http\Controllers;

use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Redirect;
use Auth;

class RecogController extends Controller
{
    public function RecvData(Request $request){
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

    	if (!Auth::check())
            return Redirect::to('/');

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
        $waktu2 = Input::get('waktu2');
        $opt = Input::get('opt');
        if ($opt==0) {
            $raw ="SELECT id,'no',foto,nama,waktu,tempat, status FROM recognition WHERE waktu BETWEEN '".$waktu." 00' AND '".$waktu2." 23:59:59'";
        } elseif ($opt==1) {
            $raw ="SELECT id,'no',foto,nama,waktu,tempat, status FROM recognition WHERE waktu BETWEEN '".$waktu." 00' AND '".$waktu2." 23:59:59' AND status=1";
        } 
        else{
            $raw ="SELECT id,'no',foto,nama,waktu,tempat, status FROM recognition WHERE waktu BETWEEN '".$waktu." 00' AND '".$waktu2." 23:59:59' AND status=2";
        }
        

    	$result = DB::select(Db::raw($raw));
    	// dd($result);
    	$data=array();
    	$count2=1;
    	foreach ($result as $key => $value) {
    		$row =array();
    		$count =0;
    		foreach ($value as $key2 => $value2) {
    			if ($count==1) {
    				$row[]=$count2;
    			}
    			elseif ($count==2){
    				$value_foto =asset("storage/files/".$value2);
    				$row[]="<img style='height:100px; width:100px' src=".$value_foto.">";
    			}
                elseif($count==6){
                    if ($value2==2) {
                        $row[]='<button type="button" id="discard" class="btn btn-danger btn-outline btn-circle btn-lg m-r-5"> x </button>
                        <button type="button" id="acc" class="btn btn-success btn-outline btn-circle btn-lg m-r-5"><i class="icon-check"></i></button>';
                    }
                    else $row[]='--';
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

    public function graf_change(){
    	$start = Input::get('start');
    	$end = Input::get('end');

    	// $waktu = '2018-10-23';
    	// $end = '2018-10-24';

    	$raw ="SELECT DATE(waktu) as tgl, SUM(status=1) as dikenali, SUM(status=2) as tidak_dikenali
    	FROM recognition WHERE waktu >='".$start."' AND waktu < '".$end." 23:59:59' GROUP by DATE(waktu)";

		$result = DB::select(Db::raw($raw));
    	return response()->json($result);
    }

    public function change_status(){
        $id = Input::get('id');
        $raw ="UPDATE RECOGNITION SET status=1 WHERE id=".$id;
        $result = DB::update(Db::raw($raw));
        return response()->json($result);
    }

    public function send_alert(){

    }


    public function send_alert_detail(){
        $tempat = Input::get('tempat');
        $waktu = Input::get('waktu');
        $pesan ="Terdeteksi seseorang yang tidak teridentifikasi oleh sistem pada ".$waktu." di ".$tempat.", mohon segera ditindaklanjuti";
        $pesan_enc = urlencode($pesan);
        $send_msg = "https://reguler.zenziva.net/apps/smsapi.php?userkey=061un3&passkey=r3rooyrl9z&nohp=081331006457&pesan=".$pesan_enc;
        // $send_msg = "https://reguler.zenziva.net/apps/smsapi.php?userkey=061un3&passkey=r3rooyrl9z&nohp=08165468409&pesan=".$pesan_enc;
        $url = file_get_contents($send_msg);
        return response()->json($url);
    }
}
