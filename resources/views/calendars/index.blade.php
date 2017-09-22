@extends('layouts.admin')
    @section('content')
        <!--SAMPLE PAGE CONTENT-->
        <div class="col-md-9">
            <!--First Content  -->
            <div class="row">
                <div class="portlet box light-grey">
						<div class="portlet-body">
							<div class="table-toolbar">
								<div class="btn-group">
									<a href="#new_instructor" class="btn green" data-toggle="modal">
									Add New <i class="fa fa-plus"></i>
                                    </a>
								</div>
								<div class="btn-group pull-right">
									<button class="btn dark dropdown-toggle" data-toggle="dropdown">
                                        <i class="fa fa-cogs"></i>
                                        Tools 
									</button>
									<ul class="dropdown-menu pull-right">
										<li>
											<a href="#">
                                                <i class="fa fa-print"></i>
												 Print
											</a>
										</li>
										<li>
											<a href="#">
                                                <i class="fa fa-folder"></i>
												 PDF
											</a>
										</li>
										<li>
											<a href="#">
                                                <i class="fa fa-random"></i>
												 Excel
											</a>
										</li>
									</ul>
								</div>
							</div>
							<table class="table table-striped table-bordered table-hover" id="sample_1">
							<thead>
							<tr>
								<th class="table-checkbox">
									<input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes"/>
								</th>
								<th>
									 Username
								</th>
								<th>
									 Email
								</th>
								<th>
									 Points
								</th>
								<th>
									 Joined
								</th>
								<th>
									 &nbsp;
								</th>
							</tr>
							</thead>
							<tbody>
							<tr class="odd gradeX">
								<td>
									<input type="checkbox" class="checkboxes" value="1"/>
								</td>
								<td>
									 shuxer
								</td>
								<td>
									<a href="mailto:shuxer@gmail.com">
										 shuxer@gmail.com
									</a>
								</td>
								<td>
									 120
								</td>
								<td class="center">
									 12 Jan 2012
								</td>
								<td>
									<span class="label label-sm label-success">
										 Approved
									</span>
								</td>
							</tr>
							</tbody>
							</table>
						</div>
					</div>
            </div>
      </div>
      <!--SAMPLE PAGE CONTENT-->
      <!-- New Instructor Modal-->
      <div class="modal fade" id="new_instructor" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">
                        <strong>
                            New Instructor
                        </strong>
                    </h4>
                </div>
                <div class="modal-body">
                     <form role="form" action="{{url('/profile/update')}}" method="post" id="update_form">
                         {{ csrf_field() }}
                         <input type="hidden" name="institution" value="{{Auth::user()->institution_id}}"/>
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="control-label">Full Name</label>
                            <input type="text" name="name" class="form-control" value="" required/>
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label class="control-label">Mobile Number</label>
                            <input type="text"  name="phone" class="form-control" value="" required/>
                            @if ($errors->has('phone'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="control-label">Email Address</label>
                            <input type="text" class="form-control" value="" disabled/>
                        </div>
                         <div class="form-group">
                            <label class="control-label">Institution</label>
                            <input type="text" class="form-control" value="" disabled/>
                        </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn blue">Save Instructor</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
@stop