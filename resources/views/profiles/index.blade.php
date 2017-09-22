@extends('layouts.admin')
    @section('content')
        <!--SAMPLE PAGE CONTENT-->
        <div class="col-md-9">
            @if (session('updated'))
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                    {{ session('updated') }}
                </div>
            @endif
            
            @if (session('not'))
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                    {{ session('not') }}
                </div>
            @endif
            
            @if (session('changed'))
                <div class="alert alert-info alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                    {{ session('changed') }}
                </div>
            @endif
            
            @if (session('wrong'))
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                    {{ session('wrong') }}
                </div>
            @endif
            <!--First Content  -->
            <div class="row profile">
				<div class="col-md-12">
					<!--BEGIN TABS-->
					<div class="tabbable tabbable-custom tabbable-full-width">
						<ul class="nav nav-tabs">
							<li class="active">
								<a href="#overview" data-toggle="tab">
									 Overview
								</a>
							</li>
							<li>
								<a href="#account" data-toggle="tab">
									 Account
								</a>
							</li>
						</ul>
						<div class="tab-content">
                            <!-- Overview Tab-->
							<div class="tab-pane active" id="overview">
								<div class="row">
									<div class="col-md-8 col-md-offset-2">
										<form role="form" action="#">
                                            <?php
                                                $institute= App\Institution::where('id','=',Auth::user()->institution_id)->first();
                                            ?>
                                            <div class="form-group">
                                                <label class="control-label">Institution</label>
                                                <input type="text" class="form-control" value="{{{$institute->name}}}" disabled/>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Full Name</label>
                                                <input type="text" placeholder="Doe" class="form-control" value="{{Auth::user()->name}}" disabled/>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Mobile Number</label>
                                                <input type="text"  class="form-control" value="{{Auth::user()->phone}}" disabled/>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Email Address</label>
                                                <input type="text" class="form-control" value="{{Auth::user()->email}}" disabled/>
                                            </div>
                                            <div class="form-group">
                                                <a class="btn green" data-toggle="modal" href="#profile_info">
                                                     Edit Information
                                                </a>
                                            </div>
                                        </form>
									</div>
								</div>
							</div>
                            <!-- Account Tab-->
                            <div class="tab-pane" id="account">
								<div class="row">
									<div class="col-md-6 col-md-offset-3">
										<form action="{{url('/profile/password')}}" method="post">
                                             {{ csrf_field() }}
                                            <input type="hidden" name="user" value="{{Auth::user()->id}}"/>
                                            <div class="form-group{{ $errors->has('old_pwd') ? ' has-error' : '' }}">
                                                <label class="control-label">Current Password</label>
                                                <input type="password" name="old_pwd" class="form-control" required/>
                                                @if ($errors->has('old_pwd'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('old_pwd') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="form-group{{ $errors->has('newpwd') ? ' has-error' : '' }}">
                                                <label class="control-label">New Password</label>
                                                <input type="password" name="newpwd" class="form-control" required/>
                                                 @if ($errors->has('phone'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('newpwd') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="form-group{{ $errors->has('newpwd_confirmation') ? ' has-error' : '' }}">
                                                <label class="control-label">Re-type New Password</label>
                                                <input type="password" name="newpwd_confirmation" class="form-control" required/>
                                                @if ($errors->has('phone'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('newpwd_confirmation') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <input type="submit" value="Change Password" class="btn green"/>
                                            </div>
                                        </form>
									</div>
								</div>
							</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Spacing -->
            <div class="row margin-bottom-20">
                <div class="col-md-12">
                </div>
            </div>
            <!--Second Content -->
            <div class="row">
                <div class="col-md-6">
                </div>
                <div class="col-md-6">
                </div>
            </div>
      </div>
      <!--SAMPLE PAGE CONTENT-->
      <!-- Update Info Modal-->
      <div class="modal fade" id="profile_info" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">
                        Update Profile Information
                    </h4>
                </div>
                <div class="modal-body">
                     <form role="form" action="{{url('/profile/update')}}" method="post" id="update_form">
                        <?php
                            $institute= App\Institution::where('id','=',Auth::user()->institution_id)->first();
                        ?>
                         {{ csrf_field() }}
                        <input type="hidden" name="user" value="{{Auth::user()->id}}"/>
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="control-label">Full Name</label>
                            <input type="text" name="name" class="form-control" value="{{Auth::user()->name}}" required/>
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label class="control-label">Mobile Number</label>
                            <input type="text"  name="phone" class="form-control" value="{{Auth::user()->phone}}" required/>
                            @if ($errors->has('phone'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="control-label">Email Address</label>
                            <input type="text" class="form-control" value="{{Auth::user()->email}}" disabled/>
                        </div>
                         <div class="form-group">
                            <label class="control-label">Institution</label>
                            <input type="text" class="form-control" value="{{{$institute->name}}}" disabled/>
                        </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn blue">Update</button>
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