@extends('layouts.index')

@section('aktifnotif')
					<li><a href="{{route('home')}}">HOME</i></a></li>
					<li ><a href="{{url('/grafik')}}">GRAFIK</a></li>
                    <li><a href="{{url('/detail')}}">DETAIL</a></li>
                    <li class="dropdown active"><a href="{{url('/absen')}}">ABSEN</a></li>
@endsection
 @section ('notif')
<div class="container">
	
	<div class="col-md-12">
                    <div class="panel">
                        <h3 class="box-title">DETAIL ABSEN</h3>
                        <div class="panel-heading"></div>
                            <input type="hidden" id="input_id" value="{{$id}}">
                        <div id='calendar'></div>

                    </div>
                </div>
</div>
<script src="{{asset('ample/plugins/bower_components/calendar/jquery-ui.min.js')}}"></script>
  <script src="{{asset('ample/plugins/bower_components/moment/moment.js')}}"></script>
  <script src="{{asset('ample/plugins/bower_components/calendar/dist/fullcalendar.min.js')}}"></script>
<script type="text/javascript">
    $(window).load(function() {
        Object.size = function(obj) {
            var size = 0, key;
            for (key in obj) {
                if (obj.hasOwnProperty(key)) size++;
            }
            return size;
        };

        $.ajaxSetup({  
           headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var data_tgl = []
        $.ajax({
            url: '/detail_tgl',
            type: 'post',
            data: {
                id: $('#input_id').val()
            },
            success: function(d){
                
                var now = new Date();
                now.setDate(now.getDate()-1)
                var daysOfYear = [];
                var count=0;
                // console.log(now.getDay());
                var dump=[];
                for (var i = new Date('2018-08-01'); i < now; i.setDate(i.getDate() + 1)) {
                    // daysOfYear.push(new Date(i));
                    if(i.getDay() > 0 && i.getDay() < 6)
                    {

                        var temp={};
                        if (count!=Object.size(d))
                            var zzz= new Date(d[count]['tanggal']);
                        if (count!=Object.size(d) && i.getTime()===zzz.getTime() ){
                            // var temp={};
                            temp.start= d[count]['tanggal'];
                            temp.end= d[count]['tanggal'];
                            temp.overlap= false;
                            temp.rendering= 'background';
                            temp.color= '#00b20b';
                            dump.push(temp);
                            count++;
                        }
                        else{
                            
                            var day =i.getDate();
                            var m=i.getMonth()+1;
                            var y=i.getFullYear();
                            if (day<10) day='0'+day;
                            if (m<10) m='0'+m;
                            temp.start= y+'-'+m+'-'+day;
                            temp.end= y+'-'+m+'-'+day;
                            temp.overlap= false;
                            temp.rendering= 'background';
                            temp.color= '#ff0000';
                            dump.push(temp);
                        }
                        // console.log(zzz);
                    }

                };
                // console.log(daysOfYear);
                
                // for (var i = 0; i < Object.size(d); i++) {
                //     var temp={};
                //     temp.start= d[i]['tanggal'];
                //     temp.end= d[i]['tanggal'];
                //     temp.overlap= false;
                //     temp.rendering= 'background';
                //     temp.color= '#00b20b';
                //     dump.push(temp);
                // };
                // console.log(dump);
                var calendar = $('#calendar').fullCalendar({
                    header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'month,basicWeek'
                    },
                    businessHours:true,
                    editable: true,
                    defaultView: 'month',
                    events: dump
                });
            }

        });
      

    });
    
</script>
 @endsection