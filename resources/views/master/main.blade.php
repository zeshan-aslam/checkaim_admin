<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Checkaim</title>
    <link rel="icon" href="">
     <!-- Theme -->
     <link href="{{ asset('theme/assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
     <link href="{{ asset('theme/assets/bootstrap/css/bootstrap-fileupload.css') }}" rel="stylesheet" />
     <link href="{{ asset('theme/assets/bootstrap/css/bootstrap-responsive.min.css') }}" rel="stylesheet" />
     <link href="{{ asset('theme/assets/bootstrap/css/bootstrap-responsive.min.css') }}" rel="stylesheet" />
     <link href="{{ asset('theme/assets/jquery-slimscroll/jquery.slimscroll.min.js') }}" rel="stylesheet" />
     <link href="{{ asset('theme/assets/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
     <link href="{{ asset('theme/css/style.css') }}" rel="stylesheet" />
     <link href="{{ asset('theme/css/style-responsive.css') }}" rel="stylesheet" />
     <link href="{{ asset('theme/css/style-default.css') }}" rel="stylesheet" />
     <link rel="stylesheet" type="text/css" href="{{ asset('assets/uniform/css/uniform.default.css') }}" />
     <link rel="stylesheet" href="{{ asset('theme/assets/data-tables/DT_bootstrap.css') }}" />
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.4/b-2.2.2/datatables.min.css"/>
     <link href="{{ asset('theme/assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css') }}" rel="stylesheet" />
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
     <link rel="stylesheet" type="text/css" href="assets/bootstrap-wysihtml5/bootstrap-wysihtml5.css" />

    
</head>
<!-- BEGIN BODY -->
<body class="fixed-top">
   <!-- BEGIN HEADER -->
  <!-- BEGIN HEADER -->
  <div id="header" class="navbar navbar-inverse navbar-fixed-top blue">
    <!-- BEGIN TOP NAVIGATION BAR -->
    <div class="navbar-inner">
        <div class="container-fluid yellow">
            <!--BEGIN SIDEBAR TOGGLE-->
            <div class="sidebar-toggle-box hidden-phone">
                <div class="icon-reorder tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
            </div>
            <!--END SIDEBAR TOGGLE-->
            <!-- BEGIN LOGO -->
           
            <!-- END LOGO -->
            <!-- BEGIN RESPONSIVE MENU TOGGLER -->
            <a class="btn btn-navbar collapsed" id="main_menu_trigger" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="arrow"></span>
            </a>
            <!-- END RESPONSIVE MENU TOGGLER -->
            <div id="top_menu" class="nav notify-row">
				<h3 style="font-weight: bold;margin: 4px;">CheckAim</h3>
            </div>
            <!-- END  NOTIFICATION -->
            <div class="top-nav ">
                <ul class="nav pull-right top-menu" >
                    <!-- BEGIN SUPPORT -->
                    <li class="dropdown mtop5">

                       
                    </li>
                    <li class="dropdown mtop5">
                       
                    </li>
                    <!-- END SUPPORT -->
                    <!-- BEGIN USER LOGIN DROPDOWN -->
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                          
							<span class="username"><b>Hi</b> {{ Auth::user()->name }}</span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <li> <a class="icon-key" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                                 {{ __('Logout') }}
                             </a>

                             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                 @csrf
                             </form></li>
                        </ul>
                    </li>
                    <!-- END USER LOGIN DROPDOWN -->
                </ul>
                <!-- END TOP NAVIGATION MENU -->
            </div>
        </div>
    </div>
    <!-- END TOP NAVIGATION BAR -->
</div>
<!-- END HEADER -->
   <!-- BEGIN CONTAINER -->
   <div id="container" class="row-fluid">
    
    <!-- BEGIN SIDEBAR -->
    <div class="sidebar-scroll">
      <div id="sidebar" class="nav-collapse collapse">

       <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
       <div class="navbar-inverse">
          <form class="navbar-search visible-phone">
             <input type="text" class="search-query" placeholder="Search" />
          </form>
       </div>
       <!-- END RESPONSIVE QUICK SEARCH FORM -->
       <!-- BEGIN SIDEBAR MENU -->
        <ul class="sidebar-menu">
            <li class="sub-menu">
                <a class="" href="{{ url('/dashboard') }}">
                    <i class="icon-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="sub-menu">
                <a href="{{ url('/clients') }}" class="">
                    <i class="icon-book"></i>
                    <span>Clients</span>
                    <span class="arrow"></span> 
                </a>
            </li>
			
           <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="icon-cogs"></i>
                    <span>Edit Contents</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="{{Route('header.getheader')}}">Header</a></li>
                    <li><a class="" href="{{Route('section1.getcontent')}}">Section1</a></li>
                    <li><a class="" href="{{Route('section2.section2content')}}">Section2</a></li>
                    <li><a class="" href="{{Route('section3.section3content')}}">Section3</a></li>
                
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="icon-cogs"></i>
                    <span>Terms & Conditions</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub">
                    <li class=""><a href="{{ url('PrivacyPolicy') }}">Privacy Policy</a></li>
                    <li class=""><a href="{{ url('GDPRLegislation') }}">GDPR Legislation</a></li>
                    <li class=""><a href="{{ url('TermsConditions') }}">Terms and Conditions</a></li>
                    <li class=""><a href="{{ url('FAQs') }}">FAQs</a></li>
                </ul>
            </li>
			   <li class="sub-menu">
                <a href="{{ url('/adminUser') }}" class="">
                    <i class="icon-book"></i>
                    <span>Admin Users</span>
                    <span class="arrow"></span> 
                </a>
            </li>
            <li>
                <a class="" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                                <i class="icon-user"></i>
                                <span>Logout</span>
                             </a>

                             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                 @csrf
                             </form>    
            </li>
        </ul>
       <!-- END SIDEBAR MENU -->
    </div>
    </div>
    <!-- END SIDEBAR -->
    @yield('content')
   </div>
   <!-- END CONTAINER -->

   <!-- BEGIN FOOTER -->
   <div id="footer">
      Checkaim Admin Panel
   </div>
	<!-- BEGIN JAVASCRIPTS -->
   <!-- Load javascripts at bottom, this will reduce page load time -->
   <script src="{{ asset('theme/js/jquery-1.8.3.min.js') }}"></script>
   <script src="{{ asset('theme/js/jquery.nicescroll.js') }}" type="text/javascript"></script>
   <script type="text/javascript" src="{{ asset('theme/assets/jquery-slimscroll/jquery-ui-1.9.2.custom.min.js') }}"></script>
   <script type="text/javascript" src="{{ asset('theme/assets/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
   <script src="{{ asset('theme/assets/fullcalendar/fullcalendar/fullcalendar.min.js') }}"></script>
   <script src="{{ asset('theme/assets/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
   <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
   <script src="{{ asset('theme/js/jquery.scrollTo.min.js') }}"></script>
   
   <script src="{{ asset('theme/js/common-scripts.js') }}"></script>
   @yield('js')
  @yield('script')
   <!-- END JAVASCRIPTS -->   