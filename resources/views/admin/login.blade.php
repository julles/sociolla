@extends('admin.layouts.layout')
@section('content')
<div id="page-wrapper">
    <div class="main-page login-page ">
		<h3 class="title1">SignIn Page</h3>
		<div class="widget-shadow">
			<div class="login-top">
				<h4>Welcome back to Sociolla AdminPanel</h4>
			</div>
			<div class="login-body">
				
				@if(\Session::has('message'))
					<div class="alert alert-danger">
						{{ \Session::get('message') }}
					</div>
				@endif

				{!! Form::open() !!}
					{!! Form::text('username' , null , ['class' => 'user' , 'placeholder' => 'USERNAME']) !!}
					
					{!! Form::password('password'  , ['class' => 'lock' , 'placeholder' => 'PASSWORD']) !!}
					
					<input type="submit" value="Sign In" name="Sign In">
					
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>
@endsection
