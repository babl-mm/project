<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<a href="{{ URL::to('user/activate',array('userid'=>$userid ,urlencode($code)))}}" target="_blank">
Go to Activation &raquo;
</a>

</body>
</html>