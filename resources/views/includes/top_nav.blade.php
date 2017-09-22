<body class="page-header-fixed page-full-width">
<div class="header navbar navbar-fixed-top mega-menu">
	<div class="header-inner">
		<a class="navbar-brand" href="{{url('/')}}">
            <h5 style="margin-top:-0.45%;margin-left:8%;color:#fff;">
                TIMESCHEDULER
            </h5>
            <!--
			<img src="{{asset('assets/img/logo3.png')}}" alt="logo" class="img-responsive"/>
            -->
		</a>
		<a href="javascript:;" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
			<img src="{{asset('assets/img/menu-toggler.png')}}" alt=""/>
		</a>
		<ul class="nav navbar-nav pull-right">
			<li class="dropdown user">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					<span class="username hidden-1024">
						 @if(Auth::check())
                            <strong>
                                <i class="fa fa-lock"></i>
                                {{Auth::user()->name}}
                            </strong>
                         @endif
					</span>
					<i class="fa fa-angle-down"></i>
				</a>
				<ul class="dropdown-menu">
					<li>
						<a href="{{ url('/profile') }}">
							<i class="fa fa-user"></i>
                            Profile
						</a>
					</li>
					<li>
						<a href="{{ url('/calendar') }}">
							<i class="fa fa-calendar"></i>
                            Calendar
						</a>
					</li>
					<li class="divider">
					</li>
					<li>
                        <a href="{{ url('/logout') }}"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out"></i>
                            Log Out
                        </a>
                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
				</ul>
			</li>
		</ul>
	</div>
</div>
<div class="page-container">