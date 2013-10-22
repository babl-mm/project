@extends('_layouts.master.login')
@section('head') @parent
   <link rel="stylesheet" type="text/css" href="{{ asset('css/chosen/chosen.min.css') }}" media="screen,projection">   
@stop
@section('navi')
    @include('_layouts.navi.regnavi')
@stop
@section('content')
<div class="container">
<div class="row">
<div class="col-md-12">
<h3 class="form-legend">User Registration</h3>
          {{ Form::open(array('method'=>'post'))}}
         <!-- Notification -->
         @include('notifications')

        
            <div class="form-group {{ (Session::get('errors') ? 'has-error' : '') }}">
                  <label for="email">Email</label>
                  {{ Form::email('email', Input::old('email', ''), array('class' =>'form-control','placeholder' => 'Email address')) }}
               
                  <label for="password">Password</label>
                  {{ Form::password('password', array('class' =>'form-control','placeholder' => 'Password')) }}

                      <label for="confirmpassword">Confirm Password</label>
                  {{ Form::password('password_confirmation', array('class' =>'form-control','placeholder' => 'Confirm Password')) }}

                  <label for="First Name">First name</label>
                  {{ Form::text('firstname', Input::old('firstname', ''), array('class' =>'form-control','placeholder' => 'First Name')) }}

                  <label for="Last Name">Last name</label>
                   {{ Form::text('lastname', Input::old('lastname', ''), array('class' =>'form-control','placeholder' => 'Last name')) }}
                  
                 
                  
                   <label for="">Date of Birth</label>
              
                   <div class="" id="dob"> 
                    <ul>
                      <li>
                    {{ Form::select('dob_month', $dobmonth,'0',array('class' =>'form-control'))}}
                      </li> 
                      <li>
                    {{ Form::select('dob_day', $dobday,'0',array('class' =>'form-control'))}}
                      </li>
                                     
                    </ul>
                  </div>

                   <label for="Address">Address</label>
                   {{ Form::textarea('address', Input::old('address', ''), array('class' =>'form-control','placeholder' => 'Address' ,'rows'=>'3')) }}

                    <label for="Gender">Gender</label>
                    {{ Form::select('gender', array(
                        'male' => 'Male',
                        'female' => 'Female'
                    ),'',array('class' =>'form-control'))}}
                  
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
                    ),'',array('class' =>'form-control chosen-select-no-single' ,'data-placeholder' => 'Your Favorite Type of Bear'))}}

              <br/>
              <br/>
               <p>

                {{ Form::submit('Register', array('class'=>'btn btn-info btn-lg btn-block','id'=>'btn_register' ))}}
                
                {{ Form::reset('Cancel', array('class'=>'btn btn-default btn-lg btn-block','id'=>'btn_register'  ))}}
                
              </p>
   
          </div>
            {{ Form::close() }}
      </div> <!-- / Column 12 -->
</div><!--  / of Row -->
</div><!--  End of Container -->
@stop
