@extends('layouts.index')
@section('aktifdet')
					<li><a href="{{route('home')}}">HOME</i></a></li>
					<li ><a href="{{url('/grafik')}}">GRAFIK</a></li>
                    <li class="dropdown active"><a href="{{url('/detail')}}">DETAIL</a></li>
                    <li><a href="{{url('/notif')}}">NOTIFIKASI</a></li>
@endsection

 @section ('det')

 @endsection