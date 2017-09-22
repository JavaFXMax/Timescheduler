@extends('layouts.auth')
@section('content')
<div class="content">
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <form class="form-horizontal" role="form" method="POST"
          action="{{ url('/password/email') }}">
        {{ csrf_field() }}
        <h4>Provide a registered email address</h4>
        <hr>
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="Email Address">
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
        </div>
        <div class="form-group">
                <button type="submit" class="btn btn-primary pull-right">
                    Send Password Reset Link
                </button>
        </div>
    </form>
</div>
@endsection
