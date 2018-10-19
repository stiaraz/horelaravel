@extends('layouts.index')
@section('aktifgraf')
					<li><a href="{{route('home')}}">HOME</i></a></li>
					<li class="dropdown active"><a href="{{url('/grafik')}}">GRAFIK</a></li>
                    <li><a href="{{url('/notif')}}">DETAIL</a></li>
                    <li><a href="{{url('/detail')}}">NOTIFIKASI</a></li>
@endsection

@section ('graf')
    
    
				
                    <div class="col-md-10 col-lg-10 col-xs-10">
                        <div class="white-box">
                            <h3 class="box-title">Bar Chart</h3>
                            <div id="morris-bar-chart"></div>
                        </div>
                    </div>
				 <!--Morris JavaScript -->
    <script src="{{asset('ample/plugins/bower_components/raphael/raphael-min.js')}}"></script>
    <script src="{{asset('ample/plugins/bower_components/morrisjs/morris.js')}}"></script>
    <script src="{{asset('ample/js/morris-data.js')}}"></script>
    
@endsection
