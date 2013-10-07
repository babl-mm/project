@if($messages= Session::get('errors'))

	  <div class="error-alert alert alert-danger">  
	  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	  <strong class="sbottom"> <span class="glyphicon glyphicon-info-sign"></span> Notice </strong>
	  <ul class="messages">
	@foreach ($messages->all('<li>:message</li>') as $message)
		{{ $message }}
	@endforeach
	  </ul>
	</div>
@endif
@if($message= Session::get('success'))

	  <div class="error-alert alert alert-success">  
	  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	  <strong class="sbottom"> <span class="glyphicon glyphicon-info-sign"></span> Successful ! </strong>
	  <ul class="messages">
	
		{{ $message }}

	  </ul>
	</div>
@endif
@if($message= Session::get('error'))

	  <div class="error-alert alert alert-danger">  
	  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	  <strong class="sbottom"> <span class="glyphicon glyphicon-info-sign"></span> Sorry ! </strong>
	  <ul class="messages">
	
		{{ $message }}

	  </ul>
	</div>
@endif
@if($message= Session::get('warning'))

	  <div class="error-alert alert alert-warning">  
	  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	  <strong class="sbottom"> <span class="glyphicon glyphicon-info-sign"></span> Warning ! </strong>
	  <ul class="messages">
	
		{{ $message }}

	  </ul>
	</div>
@endif