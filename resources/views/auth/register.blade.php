@extends('layouts.auth')
@section('content')
<div class="content">
    <form class="form-horizontal" role="form" method="POST" action="{{ url('/create') }}">
        {{ csrf_field() }}
        <div class="form-group{{ $errors->has('institution') ? ' has-error' : '' }}">
            <input id="name" type="text" class="form-control" name="institution" value="{{ old('institution') }}" required autofocus placeholder="Institution Name">
            @if ($errors->has('institution'))
                <span class="help-block">
                    <strong>{{ $errors->first('institution') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus placeholder="FirstName LastName">
            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
            <input id="name" type="text" class="form-control" name="phone" value="{{ old('phone') }}" required autofocus placeholder="0712345678">
            @if ($errors->has('phone'))
                <span class="help-block">
                    <strong>{{ $errors->first('phone') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required placeholder="abc@example.com">
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <input id="password" type="password" class="form-control" name="password" required placeholder="Password">
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Repeat Password">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary pull-right">
                Register
            </button>
        </div>
    </form>
</div>
@endsection
