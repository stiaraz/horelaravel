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
                        
                        <div>
                            <input type="text" id="daterangepicker" name="dates" class="form-control">
                            <input type="hidden" id="start_input" value="" name="start">
                            <input type="hidden" id="end_input" value="" name="end">
                        </div>
                        <br>
                        <div class="panel-heading"></div>
                        <div class="table-responsive">
                            <table id="example1" class="table table-striped table-bordered table-hover manage-u-table" >
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Id</th>
                                        <th>Nama</th>
                                        <th>Tanggal</th>
                                        <th>Waktu</th>
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

            // $('#datepicker' ).datepicker({
            //     format: 'yyyy-mm-dd',
            //     todayHighlight: true
            // });

            var table= $("#example1").DataTable({
                "ajax":{
                    "url": '/absen_hari',
                    "type": "POST",
                    "data": function(data){
                        data.start =  $('#start_input').val();
                        data.end =  $('#end_input').val();
                    }
                },
                "deferRender": true,
                "destroy":true,
                
            });

            $('#daterangepicker').daterangepicker({
              "maxSpan": {
                "days": 30
              }
            },
              function(start, end, label) {
                $('#start_input').val(start.format('YYYY-MM-DD'));
                $('#end_input').val(end.format('YYYY-MM-DD'));
                table.ajax.reload(null,false)
            });
        });
    </script>

    <script src="{{ asset ("/adminlte/bower_components/datatables/jquery.dataTables.min.js") }}"></script>

    <script src="{{ asset ("/adminlte/bower_components/datatables/dataTables.bootstrap.min.js") }}"></script>
 @endsection