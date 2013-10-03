@extends('_layouts.master')
@section('content')
      <div class="col-md-12">
         {{ Form::open(array('method'=>'post'))}}
         <!-- Notification -->
         @include('notifications')

          <div class="form-group">
              <label for="">{{ trans('memberlogin.email') }}</label>
           {{ Form::text('email', Input::old('email', ''), array('class' =>'form-control','placeholder' => 'Enter email address')) }}
              <label for="">{{ trans('memberlogin.password') }}</label>
          
              {{ Form::password('password', array('class' =>'form-control','placeholder' => 'Enter your password')) }}
          </div>
      
          <p><a href="#">{{ trans('memberlogin.forgetpass')}}</a></p>
          {{ Form::submit(trans('memberlogin.login'),array('class' =>'btn btn-large btn-lg btn-block btn-info'))}}

          <br>          
          <button type="button" class="btn btn-primary btn-lg btn-block" id="btn_fb">
          <img src="{{ asset('img/ico_facebook.png')}}">{{ trans('memberlogin.signinfb')}}</button>
                    
          <button type="button" class="btn btn-default btn-lg btn-block">{{ trans('memberlogin.createnewacc')}}</button>
          <p><a href="#">{{ trans('memberlogin.contactus')}}</a></p>      
         
       {{ Form::close() }}
      </div> <!-- End of Grid -->
@stop
