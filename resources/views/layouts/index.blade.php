<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Sistem Pengenalan Wajah Berbasis Video | timhore  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0 " />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- styles -->
<link href="https://fonts.googleapis.com/css?family=Noto+Serif:400,400italic,700|Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- flattern -->
  <link rel="stylesheet" href="{{ asset('flattern/css/bootstrap.css')}}" >  
  <link rel="stylesheet" href="{{ asset('flattern/css/bootstrap-responsive.css')}}" >  
  <link rel="stylesheet" href="{{ asset('flattern/css/fancybox/jquery.fancybox.css')}}" >  
  <link rel="stylesheet" href="{{ asset('flattern/css/jcarousel.css')}}" >  
  <link rel="stylesheet" href="{{ asset('flattern/css/flexslider.css')}}" >  
  <link rel="stylesheet" href="{{ asset('flattern/css/slitslider.css')}}" >  
  <link rel="stylesheet" href="{{ asset('flattern/css/style.css')}}" > 
  <link rel="stylesheet" href="{{ asset('flattern/css/cslider.css')}}" > 
  <!-- Theme skin -->
  <link id="t-colors" rel="stylesheet" href="{{ asset('flattern/skins/default.css')}}" >  
  <link id="bodybg" rel="stylesheet" href="{{ asset('flattern/bodybg/bg1.css')}}" >  
  <link rel="stylesheet" href="{{asset('adminlte/bower_components/Ionicons/css/ionicons.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('adminlte/bower_components/font-awesome/css/font-awesome.min.css')}}">
  <link rel="stylesheet" href="{{asset('adminlte/dist/css/skins/_all-skins.min.css')}}">
  
  <!-- fav and touch icons -->  
  <link rel="shortcut icon" href="{{asset('flattern/img/logohore.png')}}">  
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('flattern/ico/apple-touch-icon-144-precomposed.png')}}">  
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('flattern/ico/apple-touch-icon-144-precomposed.png')}}">  
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('flattern/ico/apple-touch-icon-72-precomposed.png')}}">  
  <link rel="apple-touch-icon-precomposed" href="{{ asset('flattern/ico/apple-touch-icon-57-precomposed.png')}}">  

 <!--  ample dropdown -->
    <link href="{{asset('ample/plugins/bower_components/custom-select/custom-select.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('ample/plugins/bower_components/switchery/dist/switchery.min.css')}}" rel="stylesheet" />
    <link href="{{asset('ample/plugins/bower_components/bootstrap-select/bootstrap-select.min.css')}}" rel="stylesheet" />
    <link href="{{asset('ample/plugins/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.css')}}" rel="stylesheet" />
    <link href="{{asset('ample/plugins/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css')}}" rel="stylesheet" />
    <link href="{{asset('ample/plugins/bower_components/multiselect/css/multi-select.css')}}" rel="stylesheet" type="text/css" />
 <!-- ample chart -->
 <!-- Bootstrap Core CSS -->
  

 <!-- ample upload file -->
  <link rel="stylesheet" href="{{asset('ample/plugins/bower_components/dropify/dist/css/dropify.min.css')}}">

  <!-- end flattern -->
  <!-- editor -->
  <link href="{{ asset('codesnippet/lib/highlight/styles/default.css') }}" rel="stylesheet">
  <!-- Calendar CSS -->
  <link href="{{asset('ample/plugins/bower_components/calendar/dist/fullcalendar.css')}}" rel="stylesheet" />

  <!-- Color picker plugins css -->
  
  <!-- Date picker plugins css -->
  <link href="{{asset('ample/plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.css')}}" rel="stylesheet" type="text/css" />

  <!-- data tables -->
  <link href="{{asset('ample/plugins/bower_components/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css" />
  <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
  <script src="{{ asset('flattern/js/jquery.js')}}"></script>  

</head>

<body>
    <div id="wrapper">
    <!-- toggle top area -->
    <div class="hidden-top">
      <div class="hidden-top-inner container">
        <div class="row">
          <div class="span12">
            <ul>
             <li style="margin: 0px 0px 0px 0px"><h4><strong> timhore | Kota Cerdas </strong></h4></li>
              <li style="margin bottom:  0px; font-size: 16px;">Gemastik 11</li>
              <img src="{{asset('flattern/img/itshitam.png')}}" style="margin-bottom: 0px; margin-top: 0px; background-position: relative; height: 100px;width: 250px;">
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- end toggle top area -->
    <!-- start header -->
    <header>

    <img src="{{asset('flattern/img/hdr.png')}}" style="margin-bottom: 0px auto; background-position: relative;">
      <div class="container" style="margin-top: -20px;">
   <!-- hidden top area toggle link -->
        <div id="header-hidden-link">
          <a href="#" class="toggle-link" title="Click me you'll get a surprise" data-target=".hidden-top" style="
          margin-top: -90px;"><i></i>Open</a>
        </div>
        <!-- end toggle link -->
        <div class="row nomargin">
          <div class="span12">
            <div class="headnav" style="margin-top: -45px;">
            @if(auth()->check())
              <ul>
                <li><a href="#mySignup" ><i class="icon-group"></i>{{Auth::user()->email}}</a></li>
              </ul>
            @else
              <ul>                
                <li><a href="#mySignup" data-toggle="modal"><i class="icon-group"></i> Sign up</a></li>
                <li><a href="#mySignin" data-toggle="modal"><i class="icon-user"></i>Sign in</a></li>
              </ul>
            @endif
            </div>
            <!-- Signup Modal -->
            <div id="mySignup" class="modal styled hide fade" tabindex="-1" role="dialog" aria-labelledby="mySignupModalLabel" aria-hidden="true">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 id="mySignupModalLabel">Create an <strong>account</strong></h4>
              </div>
              <div class="modal-body">
                <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                  @csrf
                  <div class="control-group">
                    <label class="control-label" for="inputEmail">Username</label>
                    <div class="controls">
                      <input placeholder="Username" id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                        @if ($errors->has('name'))
                          <span class="invalid-feedback">
                            <strong>{{ $errors->first('name') }}</strong>
                          </span>
                        @endif
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="inputEmail">Email</label>
                    <div class="controls">
                      <input placeholder="Email" id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                        @if ($errors->has('email'))
                          <span class="invalid-feedback">
                            <strong>{{ $errors->first('email') }}</strong>
                          </span>
                        @endif
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="inputSignupPassword">Password</label>
                    <div class="controls">
                      <input placeholder="Password" id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                        @if ($errors->has('password'))
                          <span class="invalid-feedback">
                            <strong>{{ $errors->first('password') }}</strong>
                          </span>
                        @endif
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="inputSignupPassword2">Confirm Password</label>
                    <div class="controls">
                      <input placeholder="Password" id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                    </div>
                  </div>
                  <div class="control-group">
                    <div class="controls">
                      <button type="submit" class="btn">Sign up</button>
                    </div>
                    <p class="aligncenter margintop20">
                      Already have an account? <a href="#mySignin" data-dismiss="modal" aria-hidden="true" data-toggle="modal">Sign in</a>
                    </p>
                  </div>
                </form>
              </div>
            </div>
            <!-- end signup modal -->
            <!-- Sign in Modal -->
            <div id="mySignin" class="modal styled hide fade" tabindex="-1" role="dialog" aria-labelledby="mySigninModalLabel" aria-hidden="true">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 id="mySigninModalLabel">{{ __('Login') }} to your <strong>account</strong></h4>
              </div>
              <div class="modal-body">

                <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                  @csrf
                  <div class="control-group">
                    <label class="control-label" for="inputText">Email</label>
                    <div class="controls">

                      <input type="email" id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif

                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="inputSigninPassword">Password</label>
                    <div class="controls">

                      <input type="password" id="password"  class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif


                    </div>
                  </div>
                  <div class="control-group">
                    <div class="controls">

                      <button type="submit" class="btn">{{ __('Login') }}</button>

                    </div>
                  </div>
                </form>
              </div>
            </div>
            <!-- end signin modal -->
            <!-- Reset Modal -->
            <div id="myReset" class="modal styled hide fade" tabindex="-1" role="dialog" aria-labelledby="myResetModalLabel" aria-hidden="true">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 id="myResetModalLabel">Reset your <strong>password</strong></h4>
              </div>
              <div class="modal-body">
                <form class="form-horizontal">
                  <div class="control-group">
                    <label class="control-label" for="inputResetEmail">Email</label>
                    <div class="controls">
                      <input type="text" id="inputResetEmail" placeholder="Email">
                    </div>
                  </div>
                  <div class="control-group">
                    <div class="controls">
                      <button type="submit" class="btn">Reset password</button>
                    </div>
                    <p class="aligncenter margintop20">
                      We will send instructions on how to reset your password to your inbox
                    </p>
                  </div>
                </form>
              </div>
            </div>
            <!-- end reset modal -->
          </div>
        </div>
        <div class="row" style="margin-bottom: 3px;">
          <div class="span4">

            
              <a href="{{url('/')}}"><img src="{{ asset('flattern/img/gemastik.png') }}" alt="" class="logo" style="height: 120px; width: 110px; margin-top: -30px" /></a>
              <!-- <h1>Area Pelaksana Pemeliharaan</h1> -->
           
          </div>
          <div class="span8">
            <div class="navbar navbar-static-top">

              <div class="navigation">
                <nav>
                  <ul class="nav topnav">
                    <li class="dropdown active">
                      @guest
                      <a href="{{route('index')}}">HOME</a></li>
                      @else
                    @yield('aktifhome')
                    @yield('aktifgraf')
                    @yield('aktifdet')
                    @yield('aktifnotif')
                      @endguest
                    
@guest
                     <li>
                      <!-- <a href="#mySignin" data-toggle="modal"><i class="icon-user"></i>{{ __('Login') }}</a> -->
                    </li>
@else
                    <li class="dropdown"><a class="dropdown" href="#" role="button">{{ Auth::user()->name }} <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li class="dropdown">
                      <a class="dropdown" href="{{ route('logout') }}" onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">{{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                    </form>
                    </li>   
                  </ul>  
                </li>
@endguest
                  </ul>
                </nav>
              </div>
             
            </div>
          </div>
        </div><img src="{{asset('flattern/img/hdr2.png')}}" style="margin-left: 85px; margin-top: -1px; margin-bottom: 10px">
      </div>
    </header>
    <!-- end header -->

     @yield('slider')
    @yield('content')
    @yield('graf')
    @yield('det')
    @yield('notif')

    <section id="bottom">
      <div class="container">
        <div class="row">
           
          <div class="span12">
            <div class="aligncenter">
              <div id="twitter-wrapper">
                <div id="twitter">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
     
    
    <footer style="background: linear-gradient(to left, #035B71 , #00A2B9);">
      <div class="container">
        <div class="row" style="color: white;">
          <div class="span3">
           <!--  @yield('kategori') -->
          </div>
          <div class="span5">
            <div class="widget">
              <h5 class="widgetheading" style="text-align: center">Our Location</h5>
              <div id="google-map" data-latitude="-7.282373" data-longitude="112.794897" style="background-color: white;opacity: 1; "></div>
            </div>
          </div>
          <div class="span3">
            <div class="widget">
              <h5 class="widgetheading">Get in touch with us</h5>
              <address>
                <strong>Member</strong><br>
                 <li>Andreas Galang</li><li>Luqman Ahmad</li><li>Syavira T Z</li>
              </address>
              <p>
                <i class="icon-envelope-alt"></i>https://if.its.ac.id/
              </p>
            </div>
          </div>
        </div>
      </div>
      <div id="sub-footer" style="background: #004252">
        <div class="container">
          <div class="row">
            <div class="span6">
              <div class="copyright">
                <p>
                  <span>&copy; timhore. 2018 - All right reserved.</span>
                </p>
                <div class="credits">
                  <!--
                    All the links in the footer should remain intact.
                    You can delete the links only if you purchased the pro version.
                    Licensing information: https://bootstrapmade.com/license/
                    Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Flattern
                  -->
                  Powered by <a href="https://if.its.ac.id/">TimHore Informatics ITS</a>
                </div>
              </div>
            </div>
            <div class="span6">
              <ul class="social-network">
                <li><a href="#" data-placement="bottom" title="Facebook"><i class="icon-facebook icon-square"></i></a></li>
                <li><a href="#" data-placement="bottom" title="Twitter"><i class="icon-twitter icon-square"></i></a></li>
                <li><a href="#" data-placement="bottom" title="Linkedin"><i class="icon-linkedin icon-square"></i></a></li>
                <li><a href="#" data-placement="bottom" title="Pinterest"><i class="icon-pinterest icon-square"></i></a></li>
                <li><a href="#" data-placement="bottom" title="Google plus"><i class="icon-google-plus icon-square"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </footer>


  </div>
 


  <a href="#" class="scrollup"><i class="icon-chevron-up icon-square icon-32 active"></i></a>
  
  <script src="{{ asset('flattern/js/jquery.easing.1.3.js')}}"></script>  
  <script src="{{ asset('flattern/js/bootstrap.js')}}"></script>  
  <script src="{{ asset('flattern/js/jcarousel/jquery.jcarousel.min.js')}}"></script>  
  <script src="{{ asset('flattern/js/jquery.fancybox.pack.js')}}"></script>  
  <script src="{{ asset('flattern/js/jquery.fancybox-media.js')}}"></script>  
  <script src="{{ asset('flattern/js/google-code-prettify/prettify.js')}}"></script>  
  <script src="{{ asset('flattern/js/portfolio/jquery.quicksand.js')}}"></script>  
  <script src="{{ asset('flattern/js/portfolio/setting.js')}}"></script>  
  <script src="{{ asset('flattern/js/jquery.flexslider.js')}}"></script>  
  <script src="{{ asset('flattern/js/jquery.nivo.slider.js')}}"></script>  
  <script src="{{ asset('flattern/js/modernizr.custom.js')}}"></script>  
  <script src="{{ asset('flattern/js/jquery.ba-cond.min.js')}}"></script>  
  <script src="{{ asset('flattern/js/jquery.slitslider.js')}}"></script>
  <script src="{{ asset('flattern/js/jquery.cslider.js')}}"></script>  
  <script src="{{ asset('flattern/js/animate.js')}}"></script>

  <!-- Calendar JavaScript -->
  <script src="{{asset('ample/plugins/bower_components/calendar/jquery-ui.min.js')}}"></script>
  <script src="{{asset('ample/plugins/bower_components/moment/moment.js')}}"></script>
  <script src="{{asset('ample/plugins/bower_components/calendar/dist/fullcalendar.min.js')}}"></script>
  <script src="{{asset('ample/plugins/bower_components/calendar/dist/jquery.fullcalendar.js')}}"></script>
  <!--<script src="{{asset('ample/plugins/bower_components/calendar/dist/cal-init.js')}}"></script>  -->
  <!-- google maps -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC_QRkSebrTMlwTo872afIbMoQ8cSbLyDI"></script>
  <!-- Template Custom JavaScript File -->  
  <script src="{{ asset('flattern/js/custom.js')}}"></script>
  <!-- js upload file -->
  <script src="{{asset('ample/plugins/bower_components/dropify/dist/js/dropify.min.js')}}"></script>
  <script src="{{asset('ample/plugins/bower_components/tinymce/tinymce.min.js')}}"></script>
    <script>
        $(document).ready(function () {
            // Basic
            $('.dropify').dropify();
            // Translated
            $('.dropify-fr').dropify({
                messages: {
                    default: 'Glissez-déposez un fichier ici ou cliquez'
                    , replace: 'Glissez-déposez un fichier ou cliquez pour remplacer'
                    , remove: 'Supprimer'
                    , error: 'Désolé, le fichier trop volumineux'
                }
            });
            // Used events
            var drEvent = $('#input-file-events').dropify();
            drEvent.on('dropify.beforeClear', function (event, element) {
                return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
            });
            drEvent.on('dropify.afterClear', function (event, element) {
                alert('File deleted');
            });
            drEvent.on('dropify.errors', function (event, element) {
                console.log('Has Errors');
            });
            var drDestroy = $('#input-file-to-destroy').dropify();
            drDestroy = drDestroy.data('dropify')
            $('#toggleDropify').on('click', function (e) {
                e.preventDefault();
                if (drDestroy.isDropified()) {
                    drDestroy.destroy();
                }
                else {
                    drDestroy.init();
                }
            })
        });
    
    </script>

   <!-- <script src="{{ asset('codesnippet/lib/highlight/highlight.pack.js') }}"></script> -->
    <script>hljs.initHighlightingOnLoad();</script>

    
    <!-- date picker -->
    <!-- Clock Plugin JavaScript -->
    <script src="{{asset('ample/plugins/bower_components/clockpicker/dist/jquery-clockpicker.min.js')}}"></script>
    <!-- Color Picker Plugin JavaScript -->
    <script src="{{asset('ample/plugins/bower_components/jquery-asColorPicker-master/libs/jquery-asColor.js')}}"></script>
    <script src="{{asset('ample/plugins/bower_components/jquery-asColorPicker-master/libs/jquery-asGradient.js')}}"></script>
    <script src="{{asset('ample/plugins/bower_components/jquery-asColorPicker-master/dist/jquery-asColorPicker.min.js')}}"></script>
    <!-- Date Picker Plugin JavaScript -->
    <script src="{{asset('ample/plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
    <!-- Date range Plugin JavaScript -->
    <script src="{{asset('ample/plugins/bower_components/timepicker/bootstrap-timepicker.min.js')}}"></script>
    <script src="{{asset('ample/plugins/bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
    
<!-- DATA TABEL -->
    <script src="{{asset('ample/js/custom.min.js')}}"></script>
    <script src="{{asset('ample/plugins/bower_components/datatables/jquery.dataTables.min.js')}}"></script>
    <!-- start - This is for export functionality only -->
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <!-- end - This is for export functionality only -->
     <script>
    //     $(document).ready(function () {
    //         $('#myTable').DataTable();
    //         $(document).ready(function () {
    //             var table = $('#example').DataTable({
    //                 "columnDefs": [
    //                     {
    //                         "visible": false
    //                         , "targets": 2
    //                     }
    //       ]
    //                 , "order": [[2, 'asc']]
    //                 , "displayLength": 25
    //                 , "drawCallback": function (settings) {
    //                     var api = this.api();
    //                     var rows = api.rows({
    //                         page: 'current'
    //                     }).nodes();
    //                     var last = null;
    //                     api.column(2, {
    //                         page: 'current'
    //                     }).data().each(function (group, i) {
    //                         if (last !== group) {
    //                             $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
    //                             last = group;
    //                         }
    //                     });
    //                 }
    //             });
    //             // Order by the grouping
    //             $('#example tbody').on('click', 'tr.group', function () {
    //                 var currentOrder = table.order()[0];
    //                 if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
    //                     table.order([2, 'desc']).draw();
    //                 }
    //                 else {
    //                     table.order([2, 'asc']).draw();
    //                 }
    //             });
    //         });
    //     });
    //     $('#example23').DataTable({
    //         dom: 'Bfrtip'
    //         , buttons: [
    //         'copy', 'csv', 'excel', 'pdf', 'print'
    //     ]
    //     });
    </script>
    <!--Style Switcher -->
    <script src="{{asset('ample/plugins/bower_components/styleswitcher/jQuery.style.switcher.js')}}"></script>

    
    <!-- google maps api -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAbVhGRFIuk0EHdi7WE08ZhTLN_va-Wq84&callback=myMap"></script>
    <script src="{{asset ('ample/plugins/bower_components/gmaps/gmaps.min.js')}}"></script>
    <script src="{{asset('ample/plugins/bower_components/gmaps/jquery.gmaps.js')}}"></script>
    
    
   

  
</body>
</html>
