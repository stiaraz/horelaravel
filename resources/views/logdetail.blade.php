@extends('layouts.index')

@section('aktifnotif')
					<li><a href="{{route('home')}}">HOME</i></a></li>
					<li ><a href="{{url('/rekap')}}">REKAPITULASI</a></li>
                    <li><a href="{{url('/detail')}}">DETAIL PENGENALAN</a></li>
                    <li class="dropdown active"><a href="{{url('/logdetail')}}">DETAIL LOG</a></li>
@endsection
 @section ('notif')
<div class="container">
	
	<div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">DETAIL LOG</div>
                        <div class="col-lg-10"> 
                                <div id="datepicker"></div>
                                <input type="hidden" id="hidden_input" value="" name="waktu">
                         </div>
                        <div class="table-responsive">
                            <table class="table table-hover manage-u-table">
                                <thead>
                                    <tr>
                                        <th width="70" class="text-center">#</th>
                                        <th>Gambar</th>
                                        <th>Waktu</th>
                                        <th width="250">Kategori</th>
                                        <th width="300">Aksi</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td><span class="font-medium"></span>
                                        </td>
                                    
                                        <td>15 Mar 1988
                                            <br/><span class="text-muted">10: 55 AM</span></td>
                                        <td>
                                            <select class="form-control">
                                                <option>Unregister Person</option>
                                                
                                            </select>
                                        </td>
                                        <td>
                                             <button type="button" class="btn btn-danger btn-outline btn-circle btn-lg m-r-5"> Lapor </button>
                                            <button type="button" class="btn btn-success btn-outline btn-circle btn-lg m-r-5">Terima</i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">2</td>
                                        <td><span class="font-medium"></span>
                                        </td>
                                    
                                        <td>15 Mar 1988
                                            <br/><span class="text-muted">10: 55 AM</span></td>
                                        <td>
                                            <select class="form-control">
                                                <option>Unregister Person</option>
                                                
                                            </select>
                                        </td>
                                        <td>
                                             <button type="button" class="btn btn-danger btn-outline btn-circle btn-lg m-r-5">Lapor</button>
                                            <button type="button" class="btn btn-success btn-outline btn-circle btn-lg m-r-5">Terima</i></button>
                                        </td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
</div>
 @endsection