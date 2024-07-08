
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
                <a href="{{ url('/cilents') }}" class="">
                    <i class="icon-book"></i>
                    <span>Clients</span>
                     <span class="arrow"></span>
                </a>
             
            </li>
			   <li class="sub-menu">
                <a href="{{ url('/subscribe') }}" class="">
                    <i class="icon-book"></i>
                    <span>Test PayPal</span>
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