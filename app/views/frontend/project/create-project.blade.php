@extends('frontend/layouts/default')

{{-- Page title --}}

@section('title')
Post your Property ::
@parent
@stop

{{-- Page Content --}}
@section('content')
<div class="page-header">
	<h3>
		Post your Project
	</h3>
</div>

<div class="row">
	<form method="post" action="{{ route('create') }}" class="form-horizontal" >
		<!-- CSRF Token -->
		<input type="hidden" name="_token" value="{{ csrf_token() }}" />

		<!-- Project Name -->

		<div class="control-group{{ $errors->first('project_name', ' error') }}">
			<label class="control-label" for="project_name">Project Name</label>
			<div class="controls">
				<input class="input-xxlarge" type="text" name="project_name" id="project_name" value="{{ Input::old('project_name') }}" placeholder="Name of the Project" />
				{{ $errors->first('project_name', '<span class="help-inline">:message</span>') }}
			</div>
		</div>

		<!-- Project Description -->

		<div class="control-group{{ $errors->first('project_description', ' error') }}">
			<label class="control-label" for="project_description">Description</label>
			<div class="controls">
				<textarea rows="8" class="input-xxlarge" name="project_description" id="project_description" value="{{ Input::old('project_description') }}" placeholder="Description of the Project"></textarea> 
				{{ $errors->first('project_description', '<span class="help-inline">:message</span>') }}
			</div>
		</div>

		<!-- Street Name -->

		<div class="control-group{{ $errors->first('street_name', ' error') }}">
			<label class="control-label" for="street_name">Street Name</label>
			<div class="controls">
				<input class="input-xlarge" type="text" name="street_name" id="street_name" value="{{ Input::old('street_name') }}" placeholder="Exact Street Name" />
				{{ $errors->first('street_name', '<span class="help-inline">:message</span>') }}
			</div>
		</div>

		<!-- Contact Number -->

		<div class="control-group{{ $errors->first('contact_number', ' error') }}">
			<label class="control-label" for="contact_number">Contact Number</label>
			<div class="controls">
				<input class="input-xlarge" type="text" name="contact_number" id="contact_number" value="{{ Input::old('contact_number') }}" placeholder="Eg. 9123123123" />
				{{ $errors->first('contact_number', '<span class="help-inline">:message</span>') }}
			</div>
		</div>

		<!-- Project Type -->

		<div class="control-group{{ $errors->first('project_type', ' error') }}">
			<label class="control-label" for="project_type">Project Type</label>

			<div class="controls" name="project_type" id="project_type" value="{{ Input::old('project_type') }}" >

			{{Form::select('project_type', array('apartment' => 'Apartment', 'villa' => 'Villa', 'plot' => 'Plot & Layouts'), 'apartment');}}
			
				{{ $errors->first('project_type', '<span class="help-inline">:message</span>') }}
			</div>
		</div>

		<!-- Number of Floors -->

		<div class="control-group{{ $errors->first('floors', ' error') }}">
			<label class="control-label" for="floors">Floors</label>
			<div class="controls">
				<input class="input-xlarge" type="text" name="floors" id="floors" value="{{ Input::old('floors') }}" placeholder="Total No. of Floors in this Project. Eg. 12" />
				{{ $errors->first('floors', '<span class="help-inline">:message</span>') }}
			</div>
		</div>

		<!-- Possesion -->

		<div class="control-group{{ $errors->first('possesion', ' error') }}">
			<label class="control-label" for="possesion">Possesion</label>
			<div class="controls">
				<input class="input-xlarge" type="text" name="possesion" id="possesion" value="{{ Input::old('possesion') }}" placeholder="Expected Possesion Time" />
				{{ $errors->first('possesion', '<span class="help-inline">:message</span>') }}
			</div>
		</div>

		<!-- Accept Terms -->
		<div class="control-group{{ $errors->first('terms', ' error') }}">
			<div class="controls">
				<label class="checkbox">
					<input type="checkbox" name="terms" id="terms" value="1" /> I agree all your <a href="#">Terms of Services</a>
				</label>
				{{ $errors->first('terms', '<span class="help-inline">:message</span>') }}
			</div>
		</div>

		<div class="control-group">
			<div class="controls">
				<button type="submit" class="btn btn-success">Post</button>
			</div>
	</form>
</div>
@stop