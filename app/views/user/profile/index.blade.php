@extends('_layouts.master.default')

@section('mobilemenu')
      @include('_layouts.navi.mobilenavi')
@stop

@section('navi')
      @include('_layouts.navi.defaultnavi')
@stop

@section('content')
    <div id="pg_userprofile" class="content container">
      <!-- Notification -->
     @include('notifications')
     <div class="row">
	   <div class="col col-md-12">
	   <div class="user-profile-header">
	   		Welcome to User Profile
	   </div>
	   <div class="user-profile">
	    	<div class="profile-pic">
	    		<img class="img-circle" width="81px" height="82px" src="{{$user['imageurl']}}">
	    	</div>
	    	<div class="profile-detail">
	 	
		    	<h3 class="profile-name">{{ $user['first_name']}}  {{ $user['last_name']}} </h3>
		       	<span>Gender :: {{ ucwords($user['gender'])}} </span> <br/>
		       	<span>Email :: {{ $user['email']}} </span>
	       </div>
	    </div>
	   <div class="user-access-tabs">
      <ul id="myTab" class="nav nav-tabs">
        <li class="active"><a href="#purchasehistroy" data-toggle="tab">Purchased History</a></li>
        <li class=""><a href="#wanttogo" data-toggle="tab">Want to go</a></li>
      
      </ul>
      <div id="myTabContent" class="tab-content">
        <div class="tab-pane fade active in" id="purchasehistroy">
         <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit. Keytar helvetica VHS salvia yr, vero magna velit sapiente labore stumptown. Vegan fanny pack odio cillum wes anderson 8-bit, sustainable jean shorts beard ut DIY ethical culpa terry richardson biodiesel. Art party scenester stumptown, tumblr butcher vero sint qui sapiente accusamus tattooed echo park.</p>

        </div>
        <div class="tab-pane fade" id="wanttogo">
          <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit. Keytar helvetica VHS salvia yr, vero magna velit sapiente labore stumptown. Vegan fanny pack odio cillum wes anderson 8-bit, sustainable jean shorts beard ut DIY ethical culpa terry richardson biodiesel. Art party scenester stumptown, tumblr butcher vero sint qui sapiente accusamus tattooed echo park.</p>
        </div>
        
      </div>
    </div>

       </div>
       </div><!--  End of row -->
</div> <!-- Content Container -->

@stop