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
									 Phone
								</th>
								<th>
									 Email
								</th>
								<th>
								    Another
								</th>
								<th>
									 
								</th>
							</tr>
							</thead>
							<tbody>
                                @foreach($tutors as $tutor)
                                <tr class="odd gradeX">
                                    <td>
                                        <input type="checkbox" class="checkboxes" value="1"/>
                                    </td>
                                    <td>
                                         {{$tutor->name}}
                                    </td>
                                    <td>
                                        {{$tutor->phone}}
                                    </td>
                                    <td>
                                         {{$tutor->email}}
                                    </td>
                                    <td class="center">
                                         
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
                            New Instructor
                        </strong>
                    </h4>
                </div>
                <div class="modal-body">
                     <form role="form" action="{{url('/instructors/new')}}" method="post" id="update_form">
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
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="control-label">Email Address</label>
                            <input type="email" name="email" class="form-control" value="" required/>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
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
    <script type="text/javascript">
        $('#update_form').submit(e){
            var $form = $(this);
            e.preventDefault(); //keeps the form from behaving like a normal (non-ajax) html form
            var url = $form.attr('action');
            var formData = {};
            //submit a POST request with the form data
            $form.find('input').each(function(){
                formData[$(this).attr('name') ] = $(this).val();
            });
            //submits an array of key-value pairs to the form's action URL
            $.post(url, formData, function(response){
                //handle successful validation
                console.log(formData);
            }).fail(function(response){
                //handle failed validation
                associate_errors(response['errors'], $form);
            });
        }

        function associate_errors(errors, $form){
            //remove existing error classes and error messages from form groups
            $form.find('.form-group').removeClass('has-error').find('.help-block').text('');
            errors.foreach(function(value, index){
               //find each form group, which is given a unique id based on the form field's name
                var $group = $form.find('#' + index + '-group');
                //add the error class and set the error text
                $group.addClass('has-error').find('.help-block').text(value);
            });
        }
        
    </script>
@stop