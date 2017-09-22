<div class="page-content-wrapper">
		<div class="page-content">
			<div class="row">
				<div class="col-md-2 sidebar-content">
					<ul class="ver-inline-menu">
                        <li>
							<a href="{{url('/')}}">
								<i class="fa fa-home"></i>
                                Home
							</a>
						</li>
						<li>
							<a href="{{url('/instructors')}}">
								<i class="fa fa-group"></i>
                                Instructors
							</a>
						</li>
                        <li>
							<a href="{{url('/ng_classes')}}">
								<i class="fa fa-tasks"></i>
                                Classes
							</a>
						</li>
                        <li>
							<a href="{{url('/courses')}}">
								<i class="fa fa-sitemap"></i>
                                Courses
							</a>
						</li>
						<li>
							<a href="{{url('/venues')}}">
								<i class="fa fa-map-marker"></i>
                                Venues
							</a>
						</li>
						<li>
							<a href="{{url('/reports')}}">
								<i class="fa fa-folder-open"></i>
                                Reports
							</a>
						</li>
						<li>
							<a href="{{url('/settings')}}">
								<i class="fa fa-cogs"></i>
                                Settings
							</a>
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
				</div>