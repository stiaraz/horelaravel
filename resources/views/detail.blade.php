@extends('layouts.index')
@section('aktifdet')
					<li><a href="{{route('home')}}">HOME</i></a></li>
					<li ><a href="{{url('/rekap')}}">REKAPITULASI</a></li>
                    <li class="dropdown active"><a href="{{url('/detail')}}">DETAIL</a></li>
                    <li><a href="{{url('/logdetail')}}">DETAIL LOG</a></li>
@endsection

 @section ('det')
 <link rel="stylesheet" href="{{ asset('adminlte/bower_components/datatables/dataTables.bootstrap.css') }}" >
<div class="container col-lg-8">
                    <div class="col-lg-12">
                        <div class="white-box">
                            <h3 class="box-title">Detail Rekaman</h3>
                            <div class="col-lg-8"> 
                                <div id="datepicker"></div>
                                <input type="hidden" id="hidden_input" value="" name="waktu">
                            </div>
                            <div class="col-lg-8">
                            	<select class="form-control">
                            					<option>All</option>
                                                <option>Unregister Person</option>
                                                <option>Register Person</option>
                                </select>
                            <br>
                            <table id="example1" class="table table-striped table-bordered" >
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Gambar</th>
                                        <th>Nama</th>
                                        <th>Time</th>
                                        <th>Tempat</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <!-- @for ($i=0; $i<count($result);$i++)
                                    <tr id="1" class="gradeX">
                                        <td>{{ $i+1 }}</td>
                                        <td><img style="height:100px; width:100px " src="{{asset('storage/files/galang.jpg') }}"></td>
                                        <td>{{ $result[$i]->nama }}</td>
                                        <td class="center">{{ $result[$i]->waktu }}</td>
                                        <td class="center">{{ $result[$i]->tempat }}</td>
                                    </tr>

                                @endfor -->
                                    
                                <!-- <td>
                                     <button type="button" class="btn btn-danger btn-outline btn-circle btn-lg m-r-5">Lapor</button>
                                      <button type="button" class="btn btn-success btn-outline btn-circle btn-lg m-r-5">Terima</button>
                                </td> -->
                                </tbody>
                                <!-- <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Gambar</th>
                                        <th>Nama</th>
                                        <th>Time</th>
                                        <th>Tempat</th>
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
                // ajaxSetup:{  
                //    headers: {
                //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                //     }
                // },
                ajax:{
                    "url": '/detail_change',
                    "type": "POST",
                    "data": function(data){
                        data.waktu =  $('#hidden_input').val();
                    }
                },
                
            });

            $('#hidden_input').change(function(){
                table.ajax.reload(null,false)
            });
            // $('#hidden_input').change((function(){
            //     $.ajaxSetup({
            //        headers: {
            //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //         }
            //     });
            //     $("#example1").DataTable({
            //         ajax:{
            //             "url": '/detail_change',
            //             "type": "POST",
            //             "data":'waktu='+$('#hidden_input').val(),
            //             "success":function(data){
            //               console.log(data);
            //            }
            //         },
            //     });
            // }));

            

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
 