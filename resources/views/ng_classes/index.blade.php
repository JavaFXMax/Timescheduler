@extends('layouts.admin')
    @section('content')
        <!--SAMPLE PAGE CONTENT-->
        <div class="col-md-9">
            @if (session('created'))
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                    {{ session('created') }}
                </div>
            @endif
            
            @if (session('not'))
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                    {{ session('not') }}
                </div>
            @endif
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
									 Name
								</th>
								<th>
									 Code
								</th>
								<th>
									 Action 1
								</th>
								<th>
									 Action 2
								</th>
								<th>
									 Action 3
								</th>
							</tr>
							</thead>
							<tbody>
                                @foreach($ng_classes as $ng_class)
                                    <tr class="odd gradeX">
                                        <td>
                                            <input type="checkbox" class="checkboxes" value="1"/>
                                        </td>
                                        <td>
                                             {{$ng_class->name}}
                                        </td>
                                        <td>
                                             {{$ng_class->code}}
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
                                @endforeach
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
                            New Class
                        </strong>
                    </h4>
                </div>
                <div class="modal-body">
                     <form role="form" action="{{url('/ng_classes/new')}}" method="post" id="update_form">
                         {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="control-label">Name</label>
                            <input type="text" name="name" class="form-control" value="" required/>
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('code') ? ' has-error' : '' }}">
                            <label class="control-label">Code</label>
                            <input type="text"  name="code" class="form-control" value="" required/>
                            @if ($errors->has('code'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('code') }}</strong>
                                </span>
                            @endif
                        </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn blue">Save Class</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
@stop