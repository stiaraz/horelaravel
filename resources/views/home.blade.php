@extends('layouts.index')
@section('aktifhome')
                    <li class="dropdown active"><a href="{{route('home')}}">HOME</i></a></li>
                    <li><a href="{{url('/grafik')}}">GRAFIK</a></li>
                    <li><a href="{{url('/notif')}}">DETAIL</a></li>
                    <li><a href="{{url('/detail')}}">NOTIFIKASI</a></li>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
