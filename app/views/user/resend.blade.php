@extends('_layouts.master.default')

@section('mobilemenu')
      @include('_layouts.navi.mobilenavi')
@stop

@section('navi')
      @include('_layouts.navi.defaultnavi')
@stop

@section('content')
    <div id="pageid" class="content container">

  
	    <div class="col-md-12">
	         <!-- Notification -->
         @include('notifications')

 			{{ Form::open(array('method'=>'post'))}}
 			    <legend>User Activationcode Resend</legend>
 			
 			    <div class="form-group {{ (Session::get('errors') ? 'has-error' : '') }}">
 			        <label for="">Email</label>
 			        <input type="text" class="form-control" name="email" id="email" placeholder="Enter Email address">
 			    </div>

 		{{ Form::submit('Resend Activation Code', array('class' => 'btn btn-block btn-info'))}}
 			
 			{{ Form::close()}}  
 			
       </div>

</div> <!-- Content Container -->

@stop