@extends('_layouts.master.default')
@section('head') @parent
   <link rel="stylesheet" type="text/css" href="{{ asset('css/chosen/chosen.min.css') }}" media="screen,projection">   
@stop
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
			<h3><span></span>Edit Profile</h3>
		</div>
	   <div class="col col-md-12">
	   		
	   	{{ Form::open(array('method'=>'put','files' => true)) }}
	   	<!-- Notification -->
         @include('notifications')

            <div class="form-group {{ (Session::get('errors') ? 'has-error' : '') }}">
            		  
                 {{ Form::hidden('email', $user->email)}}
                 
            	  {{Form::hidden('uid', $user->id )}}
            	  {{Form::hidden('imageurl', $user->imageurl )}}
            	
            	  <label for="profile"> <img width="81px" height="82px" class="img-circle" src="{{asset($user->imageurl)}}"> Change Profile Pic</label>
                  {{ Form::file('profilepic',array('class'=>'form-control')) }}

              
                  <label for="First Name">First name</label>
                  {{ Form::text('firstname', Input::old('firstname', $user['first_name']), array('class' =>'form-control','placeholder' => 'First Name')) }}

                  <label for="Last Name">Last name</label>
                   {{ Form::text('lastname', Input::old('lastname', $user['last_name']), array('class' =>'form-control','placeholder' => 'Last name')) }}
      
                   <label for="Address">Address</label>
                   {{ Form::textarea('address', Input::old('address', $user['address']), array('class' =>'form-control','placeholder' => 'Address' ,'rows'=>'3')) }}

                  <label for="">Date of Birth</label>
                   
                   <div class="" id="dob"> 
                    <ul>
                      <li>
                        {{ Form::select('dob_month', $dobmonth,$dob[0],array('class' =>'form-control'))}}
                      </li> 
                      <li>
                        {{ Form::select('dob_day', $dobday,$dob[1],array('class' =>'form-control'))}}
                      </li>
                                     
                    </ul>
                  </div>

                    <label for="Gender">Gender</label>
                    {{ Form::select('gender', array(
                        'male' => 'Male',
                        'female' => 'Female'
                    ),Input::old('gender', $user['gender']),array('class' =>'form-control'))}}
                  
                  <label for="city">City</label>
               
                {{ Form::select('city', array(
                        'yangon' => 'Yangon',
                        'mandalay' => 'Mandalay',
                        'taungyi' => 'Taungyi',
                        'Kyauksal' => 'KyaukSal',
                        'monywa' => 'Myowna',
                        'koko' => 'Pakyoke ku',
                        'yangon1' => 'Yangon',
                        'mandalay1' => 'Mandalay',
                        'taungyi1' => 'Taungyi',
                        'Kyauksal1' => 'KyaukSal',
                        'monywa1' => 'Myowna',
                        'koko1' => 'Pakyoke ku',
                    ),Input::old('city', $user['city']),array('class' =>'form-control '))}}

              <br/>
              <br/>
               <p>

           		{{Form::submit('Update', array('class'=>'btn btn-block btn-info'))}}
	   			    {{ Form::close()}}
                
              </p>
         
   
          </div>
	   		
	   		
	   		
       </div>
</div>
</div> <!-- Content Container -->

@stop