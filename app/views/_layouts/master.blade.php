<!DOCTYPE html>
<html lang="en">   
<head>  
<title>Bee Ticketing System</title>
@section('head')
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<link rel="shortcut icon" href="../../assets/ico/favicon.png">
	<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" type="text/css" media="all" >
	<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" media="screen,projection">   
@show
	<!-- Header -->
 </head>
 <body>
 <div class="container">
 <div class="row" >
 @section ('nav') <!-- Section Nav-top -->
      <div class="col-md-12" id="pg_login"> 
        <div class="navbar navbar-inverse navbar-fixed-top">      
        <div id="navbar-header" >
        <div class="container">
          <h1>{{ trans('siteinfo.brandname') }}</h1>
        </div>
         </div>      
      </div>
      </div>
@show
<br/>
 @yield('content')  <!-- Content -->

 </div> <!-- End of Row -->
</div>  <!-- End Of Container -->


@include('_layouts.footer')

</body>
</html>