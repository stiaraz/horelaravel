@extends('layouts.index')

@section('aktifnotif')
					<li><a href="{{route('home')}}">HOME</i></a></li>
					<!-- <li ><a href="{{url('/grafik')}}">GRAFIK</a></li> -->
                    <li><a href="{{url('/detail')}}">DETAIL PENGENALAN</a></li>
                    <li class="dropdown active"><a >KEHADIRAN</a>
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
                        <h3 class="box-title">DETAIL KEHADIRAN</h3>
                        <div class="panel-heading"></div>
                            <input type="hidden" id="input_id" value="{{$id}}">
                        <div id="external-events" class="span 4">
                            <h5>Keterangan</h5>
                            <div id="ket_tdk" style="background-color:#fdadb4;color:#000000;border:#bfe9c2;line-height:2" class="fc-event ui-draggable ui-draggable-handle">&nbsp Tidak Hadir</div>
                            <br>
                            <div id="ket_hadir" style="background-color:#bfe9c2;color:#000000;border:#bfe9c2;line-height:2" class="fc-event ui-draggable ui-draggable-handle">&nbsp Hadir</div>
                            <br>
                        </div>
                        <div id='calendar' class="span8"></div>

                    </div>
                </div>
</div>

<script src="{{asset('ample/plugins/bower_components/calendar/jquery-ui.min.js')}}"></script>
  <script src="{{asset('ample/plugins/bower_components/moment/moment.min.js')}}"></script>
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
                        if (count!=Object.size(d)){
                            var trim = d[count]['tanggal'].split(" ");
                            var zzz= new Date(trim[0]);
                        }
                        if (count!=Object.size(d) && i.getTime()===zzz.getTime() ){
                            // var temp={};
                            temp.start= trim[0];
                            temp.end= trim[0];
                            temp.overlap= false;
                            temp.rendering= 'background';
                            temp.color= '#00b20b';
                            dump.push(temp);

                            var temp={};
                            temp.title = trim[1];
                            temp.start= trim[0];
                            temp.end= trim[0];
                            temp.overlap= false;
                            temp.color= '#0061ff';
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
                    events: dump,
                    eventRender: function (event, element, view) { 
                        $(element).each(function () { 
                            $(this).attr('date-num', event.start.format('YYYY-MM-DD')); 
                        });
                    },
                    eventAfterAllRender: function(view){
                        var totalRed=0;
                        var totalGreen=0;
                        for( cDay = view.start.clone(); cDay.isBefore(view.end) ; cDay.add(1, 'day') ){
                            var dateNum = cDay.format('YYYY-MM-DD');
                            var dayEl = $('.fc-day[data-date="' + dateNum + '"]').not('.fc-other-month');
                            // console.log(dayEl.length)
                            if (dayEl.length>0)
                            {
                                var elem = $('.fc-bgevent[date-num="' + dateNum + '"]');
                                if (elem.css("background-color")=="rgb(255, 0, 0)")
                                    totalRed+=1
                                if (elem.css("background-color")=="rgb(0, 178, 11)")
                                    totalGreen+=1
                            }
                        }
                        $('#ket_hadir').html("&nbsp Hadir &emsp;&emsp;&emsp;: "+totalGreen)
                        $('#ket_tdk').html("&nbsp Tidak Hadir : "+totalRed)
                        // console.log(totalGreen);
                    }
                });

                // $('.fc-next-button').click(function() {
                //   // var moment = $('#calendar').fullCalendar('getDate');
                //   // var date = new Date(moment);
                //   // alert("The current date of the calendar is " + date.getMonth());
                //   var view = $('#calendar').fullCalendar('getView');
                //   alert("The current date of the calendar is " + view.start.format('YYYY-MM-DD'));
                // });

                // $('.fc-prev-button').click(function() {
                //   // var moment = $('#calendar').fullCalendar('getDate');
                //   // var date = new Date(moment);
                //   // alert("The current date of the calendar is " + date.getMonth());
                //   var view = $('#calendar').fullCalendar('getView');
                //   alert("The current date of the calendar is " + view.start);
                // });
            }

        });
      
        

    });
    
</script>
 @endsection