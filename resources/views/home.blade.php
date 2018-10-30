@extends('layouts.index')
@section('aktifhome')
                    <li class="dropdown active"><a href="{{route('home')}}">HOME</i></a></li>
                    <li><a href="{{url('/grafik')}}">GRAFIK</a></li>
                    <li><a href="{{url('/detail')}}">DETAIL</a></li>
                    <li><a href="{{url('/absen')}}">ABSEN</a></li>
@endsection
@section('content')
<div class="container">
    <div class="container">
        <div class=".col-md-6">
        <img src="http://10.151.33.16:5000/calc" width="420" height="350">
      <!-- <iframe width="420" height="350" src="//www.youtube.com/embed/9GZVbDDcW6Q" frameborder="2px"allowfullscreen style="margin-right: 30px;"></iframe> -->
    </div>
    <div class=".col-xs-6 .col-sm-4">
                                    <h5 class="m-t-10 m-b-10">Pilih Tempat</h5>
                                    <select class="selectpicker" data-style="form-control">
                                        <optgroup label="Lokasi Informatika">
                                            <option>KCV</option>
                                            <option>Plasa Lama</option>
                                            
                                        </optgroup>
                                        <optgroup label="Luar Informatika">
                                            <option>Parkiran</option>
                                            <option>parkiran Motor</option>
                                            
                                        </optgroup>
                                    </select>
                                    <button class="btn btn-success btn-rounded" type="submit">Submit</button>
                                </div>
  
</div>
</div>
@endsection
