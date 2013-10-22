<!DOCTYPE html>
<html lang="en">   
<head>  
<title>Bee Ticketing System</title>
@section('head')
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link rel="shortcut icon" href="../../assets/ico/favicon.png">
<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" type="text/css" media="all" >
<link rel="stylesheet" type="text/css" href="{{ asset('css/template.css') }}" media="screen,projection">   
@show
	<!-- Header -->
 </head>
 <body>
 @section ('navi') <!-- Section Nav-top -->
 @show

 <div id="container">
 <div id="st-container">
 @yield('content')  <!-- Content -->

</div> <!-- End of Row -->
</div>  <!-- End Of Container -->

@include('_layouts.footer')

</body>
</html>