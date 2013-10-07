@extends('_layouts.master')
@section('nav')
    @include('_layouts.loginavi')
@stop
@section('content')
      <div class="col-md-12">
         {{ Form::open(array('method'=>'post'))}}
         <!-- Notification -->
         @include('notifications')

          <div class="form-group">
              <label for="email">{{ trans('memberlogin.email') }}</label>
           {{ Form::text('email', Input::old('email', ''), array('class' =>'form-control','placeholder' => 'Email address')) }}
              <label for="password">{{ trans('memberlogin.password') }}</label>
          
              {{ Form::password('password', array('class' =>'form-control','placeholder' => 'Password')) }}
          </div>
      
          <p><a href="#">{{ trans('memberlogin.forgetpass')}}</a></p>
          {{ Form::submit(trans('memberlogin.login'),array('class' =>'btn btn-large btn-lg btn-block btn-info'))}}

          <br>          
          <button type="button" class="btn btn-primary btn-lg btn-block" id="btn_fb">
          <img src="{{ asset('img/ico_facebook.png')}}">{{ trans('memberlogin.signinfb')}}</button>
                    
          <a href="{{ URL::to('user/register')}}" class="btn btn-default btn-lg btn-block">{{ trans('memberlogin.createnewacc')}}</a>
          <p><a href="#">{{ trans('memberlogin.contactus')}}</a></p>      
         
       {{ Form::close() }}
      </div> <!-- End of Grid -->
@stop
