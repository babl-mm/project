<br/>
@if($messages= Session::get('errors'))
	  <div class="alert alert-danger">  
	  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	  <strong class="sbottom"> <span class="glyphicon glyphicon-info-sign"></span> Notice </strong>
	  <ul class="messages">
	@foreach ($messages->all('<li>:message</li>') as $message)
				    {{ $message }}
	@endforeach
	  </ul>
	</div>
@endif

