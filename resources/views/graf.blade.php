

@extends('layouts.index')
@section('aktifgraf')
					<li><a href="{{route('home')}}">HOME</i></a></li>
					<li class="dropdown active"><a href="{{url('/grafik')}}">GRAFIK</a></li>
                    <li><a href="{{url('/detail')}}">DETAIL</a></li>
                    <li><a href="{{url('/notif')}}">NOTIFIKASI</a></li>
@endsection

@section ('graf')

		
    		<div class="col-md-6 container">
             <div class="box box-primary">
            <div class="box-header with-border">
              <!-- <i class="fa fa-bar-chart-o"></i> -->

              <h3 class="box-title">Bar Chart</h3>

             <!--  <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div> -->
            </div>
            <div class="box-body ">
              <canvas id="myChart" width="400" height="400"></canvas>
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
var ctx = document.getElementById("myChart").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
        datasets: [{
            label: 'Dikenali',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: color(window.chartColors.red).alpha(0.5).rgbString(),
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        },{
            label: 'Tidak dikenali',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: color(window.chartColors.blue).alpha(0.5).rgbString(),
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
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
        
    

