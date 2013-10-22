@extends('_layouts.master.default')

@section('mobilemenu')
      @include('_layouts.navi.mobilenavi')
@stop

@section('navi')
      @include('_layouts.navi.defaultnavi')
@stop

@section('content')
<div id="EditProfile" class="content container">
<div class="row">
		 <div class="col col-md-12">
			<h3><span></span>Change Password</h3>
		</div>
	   <div class="col col-md-12">
	   		
	   	{{ Form::open(array('method'=>'put')) }}
	   	<!-- Notification -->
         @include('notifications')

            <div class="form-group {{ (Session::get('errors') ? 'has-error' : '') }}">
            		  
                 {{ Form::hidden('userid', $user->id)}}
            	
				<label for="current password">Enter Current Password</label>
                 {{ Form::password('currentpass', array('class' => 'form-control', 'placeholder' => 'Current Password'))}}

                 <hr>
                 	<label for="current password">Enter new Password</label>
                 {{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'New Password'))}}
                 
                 	<label for="current password">Re-enter new Password</label>
                 {{ Form::password('password_confirmation', array('class' => 'form-control','placeholder' => 'Confirm Password'))}}
                 
                 <br/>
           		 {{ Form::submit('Update', array('class'=>'btn btn-block btn-info'))}}
	   			 {{ Form::close()}}
                
              </p>
          </div>
       </div>
</div>
</div> <!-- Content Container -->

@stop