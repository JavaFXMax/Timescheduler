@extends('layouts.admin')

@section('content')
    <!--SAMPLE PAGE CONTENT-->
    <div class="col-md-9">
            <div class="row">
                <!--Stats Box -->
               <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat blue">
						<div class="visual">
							<i class="fa fa-tasks"></i>
						</div>
						<div class="details">
							<div class="number">
								 0
							</div>
							<div class="desc">
								 Classses
							</div>
						</div>
						<a class="more" href="{{url('/classes')}}">
							 View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
                <!--Stats Box -->
               <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat green">
						<div class="visual">
							<i class="fa fa-sitemap"></i>
						</div>
						<div class="details">
							<div class="number">
								 0
							</div>
							<div class="desc">
								 Courses
							</div>
						</div>
						<a class="more" href="{{url('/courses')}}">
							 View more 
                            <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
                <!--Stats Box -->
               <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat yellow">
						<div class="visual">
							<i class="fa fa-group"></i>
						</div>
						<div class="details">
							<div class="number">
								 0
							</div>
							<div class="desc">
								 Instructors
							</div>
						</div>
						<a class="more" href="{{url('/instructors')}}">
							 View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
                <!--Stats Box -->
               <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat purple">
						<div class="visual">
							<i class="fa fa-th"></i>
						</div>
						<div class="details">
							<div class="number">
								 0
							</div>
							<div class="desc">
								 Timetables
							</div>
						</div>
						<a class="more" href="{{url('/reports')}}">
							 View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
            </div>
            <div class="row margin-bottom-20">
                <div class="col-md-12">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                </div>
                <div class="col-md-6">
                </div>
            </div>
      </div>
      <!--SAMPLE PAGE CONTENT-->
@endsection
