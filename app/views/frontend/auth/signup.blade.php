@extends('frontend/layouts/default')

{{-- Page title --}}
@section('title')
Account Sign up ::
@parent
@stop

{{-- Page content --}}
@section('content')
<div class="page-header">
	<h3>Sign up</h3>
</div>
<div class="row">
	<form method="post" action="{{ route('signup') }}" class="form-horizontal" >
		<!-- CSRF Token -->
		<input type="hidden" name="_token" value="{{ csrf_token() }}" />

		<!-- First Name -->
		<div class="control-group{{ $errors->first('first_name', ' error') }}">
			<label class="control-label" for="first_name">First Name</label>
			<div class="controls">
				<input type="text" name="first_name" id="first_name" value="{{ Input::old('first_name') }}" placeholder="First Name" />
				{{ $errors->first('first_name', '<span class="help-block">:message</span>') }}
			</div>
		</div>

		<!-- Last Name -->
		<div class="control-group{{ $errors->first('last_name', ' error') }}">
			<label class="control-label" for="last_name">Last Name</label>
			<div class="controls">
				<input type="text" name="last_name" id="last_name" value="{{ Input::old('last_name') }}" placeholder="Last Name" />
				{{ $errors->first('last_name', '<span class="help-block">:message</span>') }}
			</div>
		</div>

		<!-- Email -->
		<div class="control-group{{ $errors->first('email', ' error') }}">
			<label class="control-label" for="email">Email</label>
			<div class="controls">
				<input type="text" name="email" id="email" value="{{ Input::old('email') }}" placeholder="Valid Email ID" />
				{{ $errors->first('email', '<span class="help-block">:message</span>') }}
			</div>
		</div>

		<!-- Email Confirm -->
		<div class="control-group{{ $errors->first('email_confirm', ' error') }}">
			<label class="control-label" for="email_confirm">Confirm Email</label>
			<div class="controls">
				<input type="text" name="email_confirm" id="email_confirm" value="{{ Input::old('email_confirm') }}" placeholder="Confirm Email ID" />
				{{ $errors->first('email_confirm', '<span class="help-block">:message</span>') }}
			</div>
		</div>

		<!-- Password -->
		<div class="control-group{{ $errors->first('password', ' error') }}">
			<label class="control-label" for="password">Password</label>
			<div class="controls">
				<input type="password" name="password" id="password" value="" placeholder="Minimum 5 Characters"/>
				{{ $errors->first('password', '<span class="help-block">:message</span>') }}
			</div>
		</div>

		<!-- Password Confirm -->
		<div class="control-group{{ $errors->first('password_confirm', ' error') }}">
			<label class="control-label" for="password_confirm">Confirm Password</label>
			<div class="controls">
				<input type="password" name="password_confirm" id="password_confirm" value="" placeholder="Confirm Password"/>
				{{ $errors->first('password_confirm', '<span class="help-block">:message</span>') }}
			</div>
		</div>
		<div class="control-group{{ $errors->first('mobile', ' error') }}">
			<label class="control-label" for="mobile">Mobile Number</label>
			<div class="controls">
				<input type="text" name="mobile" id="mobile" value="{{ Input::old('mobile') }}" placeholder="Valid Mobile Number"/>
				{{ $errors->first('mobile', '<span class="help-block">:message</span>') }}
			</div>
		</div>
		<div class="control-group{{ $errors->first('terms', ' error') }}">
			<div class="controls">
				<label class="checkbox">
					<input type="checkbox" name="terms" id="terms" value="1" /> I agree all your <a href="#">Terms of Services</a>
				</label>
				{{ $errors->first('terms', '<span class="help-block">:message</span>') }}
			</div>
		</div>
		<!-- Form actions -->
		<div class="control-group">
			<div class="controls">
				<button type="submit" class="btn">Sign up</button>
			</div>
		</div>
	</form>
</div>
@stop
