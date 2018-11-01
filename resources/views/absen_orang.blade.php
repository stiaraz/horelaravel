@extends('layouts.index')

@section('aktifnotif')
					<li><a href="{{route('home')}}">HOME</i></a></li>
					<!-- <li ><a href="{{url('/grafik')}}">GRAFIK</a></li> -->
                    <li><a href="{{url('/detail')}}">DETAIL PENGENALAN</a></li>
                    <li class="dropdown active"><a>KEHADIRAN</a>
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
 @section ('notif')
<div class="container">
	
	<div class="col-md-12">
                    <div class="panel">
                        <h3 class="box-title">Kehadiran</h3>
                        <div class="panel-heading"></div>
                        <div class="table-responsive">
                            <table id="example1" class="table table-striped table-bordered table-hover manage-u-table" >
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Gambar</th>
                                        <th>Nama</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @for ($i=0; $i<count($result);$i++)
                                    <tr id="1" class="gradeX">
                                        <td>{{ $i+1 }}</td>
                                        <td class="center"><a href="{{ url('/absen',$result[$i]->id )}}">{{ $result[$i]->id }}</a></td>
                                        <td class="center">{{ $result[$i]->nama }}</td>
                                    </tr>

                                    @endfor
                                </tbody>
                                <!-- <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Gambar</th>
                                        <th>Nama</th>

                                    </tr>
                                </tfoot> -->
                            </table>
                            
                        </div>
                    </div>
                </div>
</div>

    <script src="{{asset('ample/plugins/bower_components/jquery-datatables-editable/jquery.dataTables.js')}}"></script>
    <script src="{{asset('ample/plugins/bower_components/datatables/dataTables.bootstrap.js')}}"></script>
    <!--<script src="{{(asset('ample/plugins/bower_components/tiny-editable/mindmup-editabletable.js'))}}"></script>-->
    <!--<script src="{{asset('ample/plugins/bower_components/tiny-editable/numeric-input-example.js')}}"></script>-->
    <script>
        $(function () {
          // $("#example1").DataTable();
            $('#example1').DataTable({
                // "paging": true,
                // "lengthChange": false,
                // "searching": false,
                // "ordering": true,
                // "info": true,
                // "autoWidth": false
            });

        });
    </script>

    <script src="{{ asset ("/adminlte/bower_components/datatables/jquery.dataTables.min.js") }}"></script>

    <script src="{{ asset ("/adminlte/bower_components/datatables/dataTables.bootstrap.min.js") }}"></script>
 @endsection