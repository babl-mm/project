@extends('_layouts.master')
@section('head') @parent
   <link rel="stylesheet" type="text/css" href="{{ asset('css/chosen/chosen.min.css') }}" media="screen,projection">   
@stop
@section('nav')
    @include('_layouts.regnavi')
@stop
@section('content')
<div class="col-md-12">
<h3 class="form-legend">User Registration</h3>
          {{ Form::open(array('method'=>'post'))}}
         <!-- Notification -->
         @include('notifications')

          <div class="form-group">  
            <div class="form-group">
                  <label for="email">Email</label>
                  {{ Form::email('email', Input::old('email', ''), array('class' =>'form-control','placeholder' => 'Email address')) }}
               
                  <label for="password">Password</label>
                  {{ Form::password('password', array('class' =>'form-control','placeholder' => 'Password')) }}

                  <label for="First Name">First name</label>
                  {{ Form::text('firstname', Input::old('firstname', ''), array('class' =>'form-control','placeholder' => 'First Name')) }}

                  <label for="Last Name">Last name</label>
                   {{ Form::text('lastname', Input::old('lastname', ''), array('class' =>'form-control','placeholder' => 'Last name')) }}
                  
                   <label for="Phone no">Phone no</label>
                   {{ Form::text('phone', Input::old('phone', ''), array('class' =>'form-control','placeholder' => 'Phone no')) }}
                  
                   <label for="">Date of Birth</label>
                   {{ Form::text('dob', Input::old('dob', ''), array('class' =>'form-control','placeholder' => 'DD/MM/YY')) }}

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

              </div>
              <br/>
               <p>

                {{ Form::submit('Register', array('class'=>'btn btn-info btn-lg btn-block','id'=>'btn_register' ))}}
                
                {{ Form::reset('Cancel', array('class'=>'btn btn-default btn-lg btn-block','id'=>'btn_register'  ))}}
                
              </p>
   
          </div>
        </form> 
      </div>

@stop
