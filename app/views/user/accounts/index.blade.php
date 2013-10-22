@extends('_layouts.master.default')

@section('mobilemenu')
      @include('_layouts.navi.mobilenavi')
@stop

@section('navi')
      @include('_layouts.navi.defaultnavi')
@stop

@section('content')
<div id="accountsetting" class="content container">
<div class="row">
	   <div class="col col-md-12">
	   		<div class="settings-menu">
	   				<ul>
	   					   <li>
					       <a href="{{ URL::Route('user.profile')}}" id="ticketPurchaseHistory">
					      <span class="icon icon-calendar icon-big black"></span>Ticket Purchase History
					      <span class="icon icon-right-open-big icon-small black"></span>
					       </a>
					      </li>

	   					 <li>
					         <a class="first" href="{{ URL::Route('user.editprofile')}}" id="editaccount">
					      <span class="icon icon-calendar icon-big black"></span>Edit Profile info
					      <span class="icon icon-right-open-big icon-small black"></span>
					             </a>
					      </li>

					     <!--  <li>
					         <a href="#" id="socsetting">
					      <span class="icon icon-calendar icon-big black"></span>Social Network Setting
					      <span class="icon icon-right-open-big icon-small black"></span>
					             </a>
					      </li>
 -->
					 	 <li>
					         <a href="#" id="socsetting">
					      <span class="icon icon-calendar icon-big black"></span>Notification Settings
					      <span class="icon icon-right-open-big icon-small black"></span>
					             </a>
					      </li>


					  <!--     <li>
					         <a href="#" id="changeEmailAddress">
					      <span class="icon icon-calendar icon-big black"></span>Change Mobile Phone number
					      <span class="icon icon-right-open-big icon-small black"></span>
					             </a>
					      </li> -->

					      <li>
					         <a href="{{ URL::Route('user.editpass')}}" id="changePassword">
					      <span class="icon icon-calendar icon-big black"></span>Change Password
					      <span class="icon icon-right-open-big icon-small black"></span>
					             </a>
					      </li>

					      <li>
					         <a id="userHelp">
					      <span class="icon icon-calendar icon-big black"></span>
					      Help
					      <span class="icon icon-right-open-big icon-small black"></span>
					             </a>
					      </li>
	   				</ul>
	   		</div>
       </div>
</div>
</div> <!-- Content Container -->

@stop