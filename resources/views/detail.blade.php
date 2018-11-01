@extends('layouts.index')
@section('aktifdet')
					<li><a href="{{route('home')}}">HOME</i></a></li>
					<!-- <li ><a href="{{url('/grafik')}}">GRAFIK</a></li> -->
                    <li class="dropdown active"><a href="{{url('/detail')}}">DETAIL PENGENALAN</a></li>
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
                    <li><a href="{{url('/unregister')}}">UNREGISTERED</a></li>
@endsection

 @section ('det')
 <link rel="stylesheet" href="{{ asset('adminlte/bower_components/datatables/dataTables.bootstrap.css') }}" >
<div class="container col-lg-8">
                    <div class="col-lg-12">
                        <div class="white-box">
                            <h3 class="box-title">Detail Pengenalan</h3>
							<!-- <div class="span3" style="margin-bottom:20px">                                 
                                <div id="datepicker"></div>
                            </div> -->
							<div class="col-lg-4 span3" style="margin-left:0">
                                <div class="col-lg-12"> 
                                  <input type="text" id="daterangepicker" name="dates" class="form-control">
                                  <input type="hidden" id="start_input" value="" name="start">
                                  <input type="hidden" id="end_input" value="" name="end">
                                  <input type="hidden" id="hidden_input" value="" name="waktu">
                                    <input type="hidden" id="hidden_input2" value="" name="waktu2">
                                </div>
                                <select id="opt" name="opt">

                                    <option value="0">--Pilih opsi--</option>
                                    <option value="1">Dikenali</option>
                                    <option value="2">Tidak Dikenali</option>
                                </select>
                            </div>                            
                            <div class="box-body span9" style="margin-left:0">
                              <canvas id="myChart"  width="200" height="200"></canvas>
                              <!-- <div id="bar-chart" style="height: 300px;"></div> -->
                            </div>
                            <div class="span12" style="margin-top:30px">                                 
                                <!-- <div id="datepicker"></div> -->
                            </div>
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
    <script type="text/javascript" src="{{asset('adminlte/bower_components/chart.js/dist/chart.js')}}"></script>
    <script type="text/javascript" src="{{asset('adminlte/bower_components/chart.js/dist/Chart.min.js')}}"></script>
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
        // $('#datepicker' ).datepicker({
        //     format: 'yyyy-mm-dd',
        //     todayHighlight: true
        // });
        // $('#datepicker').on('changeDate', function() {
        //     $('#hidden_input').val(
        //         $('#datepicker').datepicker('getFormattedDate')
        //     );
        //     $('#hidden_input').trigger("change");
        // });

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
                    data.waktu2 =  $('#hidden_input2').val();
                    data.opt = $('#opt').val();
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
            },{
                "targets":[2],
                "width":"400px",
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

        // $('#hidden_input').change(function(){
        //     table.ajax.reload(null,false)
        // });

        var chartdata={
          labels: [],
          datasets:[{
            label : 'Dikenali',
            backgroundColor:'#bfe9c2',
            borderColor: 'rgba(200, 200, 200, 0.75)',
            // hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
            hoverBorderColor: 'rgba(200, 200, 200, 1)',
            data: []
          },
          {
            label : 'Tidak Dikenali',
            backgroundColor:'#fdadb4',
            borderColor: 'rgba(200, 200, 200, 0.75)',
            // hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
            hoverBorderColor: 'rgba(200, 200, 200, 1)',
            data: []
          }]
        };

        var ctxz = $('#myChart')[0].getContext('2d');
        ctxz.canvas.width =1000;
        ctxz.canvas.height =400;
        var barGraph = new Chart(ctxz, {
          type: 'bar',
          data: chartdata,
          options: {
            responsive: true,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
          }
        });

        $('#daterangepicker').daterangepicker({
          "maxSpan": {
            "days": 30
          }
        },
          function(start, end, label) {
            $('#start_input').val(start.format('YYYY-MM-DD'));
            $('#end_input').val(end.format('YYYY-MM-DD'));

            $('#hidden_input').val(start.format('YYYY-MM-DD'));
            $('#hidden_input2').val(end.format('YYYY-MM-DD'));
            table.ajax.reload(null,false)

            $('#hidden_input').trigger("change");
            $.ajax({
              url: '/graf_change',
              type: 'POST',
              dataType: 'json',
              data: {
                start: start.format('YYYY-MM-DD'),
                end: end.format('YYYY-MM-DD')
              },
              success: function(d){
                console.log(d);
                var tgl=[];
                var dikenali=[];
                var tdkdikenali=[];
                for (var i in d){
                  tgl.push(d[i].tgl);
                  dikenali.push(d[i].dikenali);
                  tdkdikenali.push(d[i].tidak_dikenali);
                }

                barGraph.config.data.labels = tgl;
                barGraph.config.data.datasets[0].data =dikenali;
                barGraph.config.data.datasets[1].data =tdkdikenali;
                barGraph.update();
                // console.log(chartdata);
              }

            });
          }
        );
    });

</script>

    <script src="{{ asset ("/adminlte/bower_components/datatables/jquery.dataTables.min.js") }}"></script>

    <script src="{{ asset ("/adminlte/bower_components/datatables/dataTables.bootstrap.min.js") }}"></script>

 @endsection
 