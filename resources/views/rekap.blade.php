

@extends('layouts.index')
@section('aktifgraf')
					<li><a href="{{route('home')}}">HOME</i></a></li>
					<!-- <li class="dropdown active"><a href="{{url('/grafik')}}">GRAFIK</a></li> -->
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
                    <li><a href="{{url('/unregister')}}">UNREGISTERED</a></li>
@endsection

@section ('graf')

		
    		<div class="col-md-6 container">
             <div class="box box-primary">
              <h3 class="box-title">Bar Chart</h3>
            <div class="box-header with-border">
              <!-- <i class="fa fa-bar-chart-o"></i> -->
              <div class="col-lg-12"> 
                  <input type="text" id="datepicker" name="dates" class="form-control">
                  <input type="hidden" id="start_input" value="" name="start">
                  <input type="hidden" id="end_input" value="" name="end">
              </div>
             

             <!--  <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div> -->
            </div>
            <div class="box-body span11">
              <canvas id="myChart" style="width:200,height:200" width="200" height="200"></canvas>
              <!-- <div id="bar-chart" style="height: 300px;"></div> -->
            </div>
            <!-- /.box-body-->
          </div>
      </div>
  

<!-- <script src="{{asset('adminlte/bower_components/jquery/dist/jquery.min.js')}}"></script> -->
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('adminlte/bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('adminlte/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('adminlte/dist/js/demo.js')}}"></script>
<!-- FLOT CHARTS -->
<!-- <script src="{{asset('adminlte/bower_components/Flot/jquery.flot.js')}}"></script> -->
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<!-- <script src="{{asset('adminlte/bower_components/Flot/jquery.flot.resize.js')}}"></script> -->
<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<!-- <script src="{{asset('adminlte/bower_components/Flot/jquery.flot.pie.js')}}"></script> -->
<!-- FLOT CATEGORIES PLUGIN - Used to draw bar charts -->
<!-- <script src="{{asset('adminlte/bower_components/Flot/jquery.flot.categories.js')}}"></script> -->

<script type="text/javascript" src="{{asset('adminlte/bower_components/chart.js/dist/chart.js')}}"></script>
<script type="text/javascript" src="{{asset('adminlte/bower_components/chart.js/dist/Chart.min.js')}}"></script>

<script type="text/javascript">
  $(function () {

    $.ajaxSetup({  
       headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var chartdata={
      labels: [],
      datasets:[{
        label : 'Dikenali',
        backgroundColor:'#00b20b',
        borderColor: 'rgba(200, 200, 200, 0.75)',
        // hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
        hoverBorderColor: 'rgba(200, 200, 200, 1)',
        data: []
      },
      {
        label : 'Tidak Dikenali',
        backgroundColor:'#ad0808',
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



    $('#datepicker').daterangepicker({
      "maxSpan": {
        "days": 30
      }
    },
      function(start, end, label) {
        $('#start_input').val(start.format('YYYY-MM-DD'));
        $('#end_input').val(end.format('YYYY-MM-DD'));
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
  



// var ctx = document.getElementById("myChart").getContext('2d');

// 	$(function () {
// 	var bar_data = {
//       data : [['January', 10], ['February', 8], ['March', 4], ['April', 13], ['May', 17], ['June', 9]],
//       color: '#d60a40'
//     }
//     $.plot('#bar-chart', [bar_data], {
//       grid  : {
//         borderWidth: 1,
//         borderColor: '#f3f3f3',
//         tickColor  : '#f3f3f3'
//       },
//       series: {
//         bars: {
//           show    : true,
//           barWidth: 0.9,
//           align   : 'center'
//         }
//       },
//       xaxis : {
//         mode      : 'categories',
//         tickLength: 0
//       }
//     })
// });
//     /* END BAR CHART */

//     function labelFormatter(label, series) {
//     return '<div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">'
//       + label
//       + '<br>'
//       + Math.round(series.percent) + '%</div>'
//   }
// </script>

        @endsection
        
    

