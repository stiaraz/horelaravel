@extends('layouts.index')
@section('aktifgraf')
					<li><a href="{{route('home')}}">HOME</i></a></li>
					<li class="dropdown active"><a href="{{url('/grafik')}}">GRAFIK</a></li>
                    <li><a href="{{url('/notif')}}">DETAIL</a></li>
                    <li><a href="{{url('/detail')}}">NOTIFIKASI</a></li>
@endsection

@section ('graf')

@endsection