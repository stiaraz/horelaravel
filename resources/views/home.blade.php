@extends('layouts.index')
@section('aktifhome')
                    <li class="dropdown active"><a href="{{route('home')}}">HOME</i></a></li>
                    <!-- <li><a href="{{url('/grafik')}}">GRAFIK</a></li> -->
                    <li><a href="{{url('/detail')}}">DETAIL PENGENALAN</a></li>
					<li class="dropdown"><a>KEHADIRAN</a>
                        <ul class="dropdown-menu">
                            <li class="dropdown">
                                <a class="dropdown" href="{{url('/absen_hari')}}">Rekap per hari</a>
                            </li>
                            <li class="dropdown">
                                <a class="dropdown" href="{{url('/absen')}}">Rekap per orang</a>
                            </li>
                        </ul>
                    </li>
                    <li><a href="{{url('/unregister')}}">UNREGISTERED</a></li>
                    @endsection
@section('content')
<div class="container">
    <div class="container">
        <div class=".col-md-6 span8">
        <div id="parent_cam" style="">
            <img id="cam_0" src="http://10.151.33.16:5000/calc" width="640" height="480">
        </div>
        <!-- <iframe src="http://localhost:8080/stream_video"></iframe> -->
      <!-- <iframe width="420" height="350" src="rtsp://admin:admin123@10.151.33.60:554/cam/realmonitor?channel=1&subtype=0" frameborder="2px"allowfullscreen style="margin-right: 30px;"></iframe> -->
    </div>
    <div class=".col-xs-6 .col-sm-4 span2">
                                    <h5 class="m-t-10 m-b-10">Pilih Tempat</h5>
                                    <select id="camera" class="" data-style="form-control">
                                        <optgroup label="Lokasi Informatika">
                                            <option value="0">KCV</option>
                                            <option value="1">Lokal</option>
                                            
                                        </optgroup>
                                        <!-- <optgroup label="Luar Informatika">
                                            <option>Parkiran</option>
                                            <option>parkiran Motor</option>
                                            
                                        </optgroup> -->
                                    </select>
                                    <button id="ch_camera" class="btn btn-success btn-rounded" type="submit">Submit</button>
                                </div>
  
</div>
</div>

<script type="text/javascript">
    $(function () {
        $('#ch_camera').click(function(){
            if ($('#camera').val()==1)
            {
                if($('#cam_0').length>0)
                {
                    $('#cam_0').remove();
                    var txt1 = '<img id="cam_1" src="http://10.151.11.56:9090/calc" width="640" height="480">';
                    $("#parent_cam").append(txt1);
                }
            }
            else if ($('#camera').val()==0)
            {
                if($('#cam_1').length>0)
                {
                    $('#cam_1').remove();
                    var txt1 = '<img id="cam_0" src="http://10.151.33.16:5000/calc" width="640" height="480">';
                    $("#parent_cam").append(txt1);
                }
            }
            
            // alert('sss');

        });
    });
</script>
@endsection
