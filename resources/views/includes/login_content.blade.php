<div class="content">
    @if (session('status'))
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
            <strong>Account Created!</strong> {{ session('status') }}
        </div>
    @endif
	<form class="login-form" role="form" method="POST" action="{{ url('/login') }}">
        {{ csrf_field() }}
		<h3 class="form-title">Account Login</h3>
		<div class="alert alert-danger display-hide">
			<button class="close" data-close="alert"></button>
			<span>
				 Provide correct username and password combination
			</span>
		</div>
		<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
			<div class="input-icon">
				<i class="fa fa-user"></i>
				<input class="form-control placeholder-no-fix" type="email" autocomplete="off" placeholder="Email Address" name="email" value="{{ old('email') }}" required autofocus/>
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
			</div>
		</div>
		<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
			<div class="input-icon">
				<i class="fa fa-lock"></i>
				<input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password" required/>
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
			</div>
		</div>
		<div class="form-actions">
			<label class="checkbox">
			     <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : ''}}>       Remember me 
            </label>
			<button type="submit" class="btn blue pull-right">
			     Login 
                <i class="m-icon-swapright m-icon-white"></i>
			</button>
		</div>
		<div class="forget-password">
			<a class="btn btn-link" href="{{ url('/password/reset') }}">
                Lost Password?
            </a>&emsp;&emsp;&emsp;&emsp;
            <a class="btn btn-info pull-right" href="{{ url('/register') }}">
                Register
            </a>
		</div>
	</form>
</div>