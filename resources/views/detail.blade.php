@extends('layouts.index')
@section('aktifdet')
					<li><a href="{{route('home')}}">HOME</i></a></li>
					<li ><a href="{{url('/grafik')}}">GRAFIK</a></li>
                    <li class="dropdown active"><a href="{{url('/detail')}}">DETAIL</a></li>
                    <li><a href="{{url('/absen')}}">ABSEN</a></li>
@endsection

 @section ('det')
 <link rel="stylesheet" href="{{ asset('adminlte/bower_components/datatables/dataTables.bootstrap.css') }}" >
<div class="container col-lg-8">
                    <div class="col-lg-12">
                        <div class="white-box">
                            <h3 class="box-title">Detail Rekaman</h3>
							<div class="col-lg-6">                                 <div id="datepicker"></div>
                                <input type="hidden" id="hidden_input" value="" name="waktu">
                            </div>
							<div class="col-lg-4">
                                <select id="opt" name="opt">
                                    <option value="0">All</option>
                                    <option value="1">Dikenali</option>
                                    <option value="2">Tidak Dikenali</option>
                                </select>
                            </div>                            
                            <br>

                            <table id="example1" class="table table-striped table-bordered" >
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
                                        <th>ID</th>
                                        <th>No</th>
                                        <th>Gambar</th>
                                        <th>Nama</th>
                                        <th>Time</th>
                                        <th>Tempat</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot> -->
                            </table>
                        </div>
                    </div>
                </div><!-- Editable -->
    <script src="{{asset('ample/plugins/bower_components/jquery-datatables-editable/jquery.dataTables.js')}}"></script>
    <script src="{{asset('ample/plugins/bower_components/datatables/dataTables.bootstrap.js')}}"></script>
    <!--<script src="{{(asset('ample/plugins/bower_components/tiny-editable/mindmup-editabletable.js'))}}"></script>-->
    <!--<script src="{{asset('ample/plugins/bower_components/tiny-editable/numeric-input-example.js')}}"></script>-->
    <script>
        $(function () {
          // $("#example1").DataTable();
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false
            });
            $('#datepicker' ).datepicker({
                format: 'yyyy-mm-dd',
                todayHighlight: true
            });
            $('#datepicker').on('changeDate', function() {
                $('#hidden_input').val(
                    $('#datepicker').datepicker('getFormattedDate')
                );
                $('#hidden_input').trigger("change");
            });

            $.ajaxSetup({  
               headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var table= $("#example1").DataTable({
                "ajax":{
                    "url": '/detail_change',
                    "type": "POST",
                    "data": function(data){
                        data.waktu =  $('#hidden_input').val();
                        data.opt = $('#opt').val();
                    }
                },
                "deferRender": true,
                "destroy":true,
                "columnDefs": [
                {
                    "targets":[0],
                    "visible":false,
                    "searchable":false
                }]
                
            });

            $('#opt').change(function(){
                table.ajax.reload(null,false)
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

            $('#hidden_input').change(function(){
                table.ajax.reload(null,false)
            });
            

        });
        // $('#mainTable').editableTableWidget().numericInputExample().find('td:first').focus();
        // $('#editable-datatable').editableTableWidget().numericInputExample().find('td:first').focus();
        // $(document).ready(function () {
        //     $('#editable-datatable').DataTable();
        // });

            // $('#datepicker' ).datepicker();
            // $('#datepicker').on('changeDate', function() {
            //     $('#hidden_input').val(
            //         $('#datepicker').datepicker('getFormattedDate')
            //     );
            // });


    </script>

    <script src="{{ asset ("/adminlte/bower_components/datatables/jquery.dataTables.min.js") }}"></script>

    <script src="{{ asset ("/adminlte/bower_components/datatables/dataTables.bootstrap.min.js") }}"></script>

 @endsection
 