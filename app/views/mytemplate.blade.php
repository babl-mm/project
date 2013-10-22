@extends('_layouts.master.default')

@section('mobilemenu')
      @include('_layouts.navi.mobilenavi')
@stop

@section('navi')
      @include('_layouts.navi.defaultnavi')
@stop

@section('content')
    <div id="pageid" class="content container">

        <div id="change_email">
        
         <div class="col-md-12" >
          <h3  style="">Change Email Address </h3>
        </div>

	     	<div class="col-md-12">

        <div class="form-group">      
              <label>
                Email Address
              </label>      
              <input type="text" class="form-control" id="register_input" placeholder="Enter using of email address"><br>
              <label>
                Change Email Address
              </label>
              <input type="text" class="form-control" id="register_input" placeholder="Enter new email address"><br>
              <br>  
        </div>
                
          <p>
           <button type="button" class="btn btn-default btn-lg" id="btn_register">Update</button>
            <button type="button" class="btn btn-default btn-lg" id="btn_register">Cancel</button>
          </p>

          </div>
     
      </div>  


</div> <!-- Content Container -->

@stop