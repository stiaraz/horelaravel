@extends('layouts.index')

@section('aktifnotif')
					<li><a href="{{route('home')}}">HOME</i></a></li>
					<li ><a href="{{url('/grafik')}}">GRAFIK</a></li>
                    <li><a href="{{url('/detail')}}">DETAIL</a></li>
                    <li class="dropdown active"><a href="{{url('/notif')}}">NOTIFIKASI</a></li>
@endsection
 @section ('notif')
<div class="container">
	
	<div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">NOTIFIKASI</div>
                        <div class="table-responsive">
                            <table class="table table-hover manage-u-table">
                                <thead>
                                    <tr>
                                        <th width="70" class="text-center">#</th>
                                        <th>NAME</th>
                                        <th>OCCUPATION</th>
                                        <th>EMAIL</th>
                                        <th>ADDED</th>
                                        <th width="250">CATEGORY</th>
                                        <th width="300">AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td><span class="font-medium">Daniel Kristeen</span>
                                            <br/><span class="text-muted">Texas, Unitedd states</span></td>
                                        <td>Visual Designer
                                            <br/><span class="text-muted">Past : teacher</span></td>
                                        <td>daniel@website.com
                                            <br/><span class="text-muted">999 - 444 - 555</span></td>
                                        <td>15 Mar 1988
                                            <br/><span class="text-muted">10: 55 AM</span></td>
                                        <td>
                                            <select class="form-control">
                                                <option>Modulator</option>
                                                <option>Admin</option>
                                                <option>User</option>
                                                <option>Subscriber</option>
                                            </select>
                                        </td>
                                        <td>
                                             <button type="button" class="btn btn-danger btn-outline btn-circle btn-lg m-r-5"><i class="icon-phone"></i></button>
                                            <button type="button" class="btn btn-success btn-outline btn-circle btn-lg m-r-5"><i class="icon-check"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">2</td>
                                        <td><span class="font-medium">Daniel Kristeen</span>
                                            <br/><span class="text-muted">Texas, Unitedd states</span></td>
                                        <td>Visual Designer
                                            <br/><span class="text-muted">Past : teacher</span></td>
                                        <td>daniel@website.com
                                            <br/><span class="text-muted">999 - 444 - 555</span></td>
                                        <td>15 Mar 1988
                                            <br/><span class="text-muted">10: 55 AM</span></td>
                                        <td>
                                            <select class="form-control">
                                                <option>Modulator</option>
                                                <option>Admin</option>
                                                <option>User</option>
                                                <option>Subscriber</option>
                                            </select>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-danger btn-outline btn-circle btn-lg m-r-5"><i class="icon-phone"></i></button>
                                            <button type="button" class="btn btn-success btn-outline btn-circle btn-lg m-r-5"><i class="icon-check"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">3</td>
                                        <td><span class="font-medium">Daniel Kristeen</span>
                                            <br/><span class="text-muted">Texas, Unitedd states</span></td>
                                        <td>Visual Designer
                                            <br/><span class="text-muted">Past : teacher</span></td>
                                        <td>daniel@website.com
                                            <br/><span class="text-muted">999 - 444 - 555</span></td>
                                        <td>15 Mar 1988
                                            <br/><span class="text-muted">10: 55 AM</span></td>
                                        <td>
                                            <select class="form-control">
                                                <option>Modulator</option>
                                                <option>Admin</option>
                                                <option>User</option>
                                                <option>Subscriber</option>
                                            </select>
                                        </td>
                                        <td>
                                             <button type="button" class="btn btn-danger btn-outline btn-circle btn-lg m-r-5"><i class="icon-phone"></i></button>
                                            <button type="button" class="btn btn-success btn-outline btn-circle btn-lg m-r-5"><i class="icon-check"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">4</td>
                                        <td><span class="font-medium">Daniel Kristeen</span>
                                            <br/><span class="text-muted">Texas, Unitedd states</span></td>
                                        <td>Visual Designer
                                            <br/><span class="text-muted">Past : teacher</span></td>
                                        <td>daniel@website.com
                                            <br/><span class="text-muted">999 - 444 - 555</span></td>
                                        <td>15 Mar 1988
                                            <br/><span class="text-muted">10: 55 AM</span></td>
                                        <td>
                                            <select class="form-control">
                                                <option>Modulator</option>
                                                <option>Admin</option>
                                                <option>User</option>
                                                <option>Subscriber</option>
                                            </select>
                                        </td>
                                        <td>
                                             <button type="button" class="btn btn-danger btn-outline btn-circle btn-lg m-r-5"><i class="icon-phone"></i></button>
                                            <button type="button" class="btn btn-success btn-outline btn-circle btn-lg m-r-5"><i class="icon-check"></i></button>
                                        </td>
                                    </tr>
                                     <tr>
                                        <td class="text-center">5</td>
                                        <td><span class="font-medium">Daniel Kristeen</span>
                                            <br/><span class="text-muted">Texas, Unitedd states</span></td>
                                        <td>Visual Designer
                                            <br/><span class="text-muted">Past : teacher</span></td>
                                        <td>daniel@website.com
                                            <br/><span class="text-muted">999 - 444 - 555</span></td>
                                        <td>15 Mar 1988
                                            <br/><span class="text-muted">10: 55 AM</span></td>
                                        <td>
                                            <select class="form-control">
                                                <option>Modulator</option>
                                                <option>Admin</option>
                                                <option>User</option>
                                                <option>Subscriber</option>
                                            </select>
                                        </td>
                                        <td>
                                             <button type="button" class="btn btn-danger btn-outline btn-circle btn-lg m-r-5"><i class="icon-phone"></i></button>
                                            <button type="button" class="btn btn-success btn-outline btn-circle btn-lg m-r-5"><i class="icon-check"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">6</td>
                                        <td><span class="font-medium">Daniel Kristeen</span>
                                            <br/><span class="text-muted">Texas, Unitedd states</span></td>
                                        <td>Visual Designer
                                            <br/><span class="text-muted">Past : teacher</span></td>
                                        <td>daniel@website.com
                                            <br/><span class="text-muted">999 - 444 - 555</span></td>
                                        <td>15 Mar 1988
                                            <br/><span class="text-muted">10: 55 AM</span></td>
                                        <td>
                                            <select class="form-control">
                                                <option>Modulator</option>
                                                <option>Admin</option>
                                                <option>User</option>
                                                <option>Subscriber</option>
                                            </select>
                                        </td>
                                        <td>
                                             <button type="button" class="btn btn-danger btn-outline btn-circle btn-lg m-r-5"><i class="icon-phone"></i></button>
                                            <button type="button" class="btn btn-success btn-outline btn-circle btn-lg m-r-5"><i class="icon-check"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">7</td>
                                        <td><span class="font-medium">Daniel Kristeen</span>
                                            <br/><span class="text-muted">Texas, Unitedd states</span></td>
                                        <td>Visual Designer
                                            <br/><span class="text-muted">Past : teacher</span></td>
                                        <td>daniel@website.com
                                            <br/><span class="text-muted">999 - 444 - 555</span></td>
                                        <td>15 Mar 1988
                                            <br/><span class="text-muted">10: 55 AM</span></td>
                                        <td>
                                            <select class="form-control">
                                                <option>Modulator</option>
                                                <option>Admin</option>
                                                <option>User</option>
                                                <option>Subscriber</option>
                                            </select>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-danger btn-outline btn-circle btn-lg m-r-5"><i class="icon-phone"></i></button>
                                            <button type="button" class="btn btn-success btn-outline btn-circle btn-lg m-r-5"><i class="icon-check"></i></button>
                                           
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
</div>
 @endsection