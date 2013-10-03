@extends('_layouts.master')

@section('content')
	<div class="jumbotron">
	    <div class="container">
	        <h1>Welcome To Profile</h1>
	        <p>First Name: {{ $user['first_name']}}  <br/>
	       Last Name: {{ $user['last_name']}} <br/>
	       Email: {{ $user['email']}} </p>
	       
	        <p>
	        	@if(Sentry::check())
				<a class="btn btn-primary btn-large" href="{{ URL::route('user.logout')}}"> Logout </a>
			@endif
	        </p>
	    </div>
	</div>

@stop