@extends('layouts.index')

@section('aktifunreg')
					<li><a href="{{route('home')}}">HOME</i></a></li>
					<!-- <li ><a href="{{url('/grafik')}}">GRAFIK</a></li> -->
                    <li><a href="{{url('/detail')}}">DETAIL PENGENALAN</a></li>
                    <li class="dropdown"><a >KEHADIRAN</a>
                        <ul class="dropdown-menu">
                            <li class="dropdown">
                                <a class="dropdown" href="{{url('/absen_hari')}}">Rekap per hari</a>
                            </li>
                            <li class="dropdown">
                                <a class="dropdown" href="{{url('/absen')}}">Rekap per orang</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown active"><a href="{{url('/unregister')}}">UNREGISTERED</a></li>
@endsection
 @section ('unreg')
<div class="container">
	
	<div class="col-md-12">
                    <div class="panel">
                        <h3 class="box-title">Unregistered</h3>
                        <div class="panel-heading"></div>
                        <div class="table-responsive">
                            <table id="example1" class="table table-striped table-bordered table-hover manage-u-table" >
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>No</th>
                                        <th>Gambar</th>
                                        <th>Nama</th>
                                        <th>Time</th>
                                        <th>Tempat</th>
                                        <th>Action</th> 
                                    </tr>
                                </thead>
                                <tbody>

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
            $.ajaxSetup({  
               headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var table= $("#example1").DataTable({
                "ajax":{
                    "url": '/unregister',
                    "type": "POST",
                    "data": function(data){
                        
                    }
                },
                "order": [[ 1, "asc" ]],
                "deferRender": true,
                "destroy":true,
                "columnDefs": [
                {
                    "targets":[0],
                    "visible":false,
                    "searchable":false
                }]
                
            });

            $('#example1 tbody').on( 'click', '.btn-danger', function () {
                var data = table.row( $(this).parents('tr') ).data();
                $.ajax({
                    url: '/alert_detail',
                    type: 'post',
                    data: {
                        tempat: data[5],
                        waktu: data[4],
                    },
                    success: function(d){
                        alert('Pesan terkirim kepada petugas keamanan');
                    }
                });
                // alert(data[0]);
            } );

            $('#example1 tbody').on( 'click', '.btn-success', function () {
                var data = table.row( $(this).parents('tr') ).data();
                $.ajax({
                    url: '/change_status',
                    type: 'post',
                    data: {
                        id: data[0],
                    },
                    success: function(d){
                        alert('Status orang tersebut sudah terkonfirmasi aman');
                        table.ajax.reload(null,false);
                    }

                });

            });

        });
    </script>

    <script src="{{ asset ("/adminlte/bower_components/datatables/jquery.dataTables.min.js") }}"></script>

    <script src="{{ asset ("/adminlte/bower_components/datatables/dataTables.bootstrap.min.js") }}"></script>
 @endsection