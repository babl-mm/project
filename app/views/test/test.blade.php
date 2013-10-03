<!DOCTYPE html>
<html>
<head>
	<title>Laravel Language</title>
</head>
<body>
		{{ trans('messages.login') }}  <br/>
		{{ LaravelLocalization::getCleanRoute() }} <br/>
		{{ LaravelLocalization::getURLLanguage('my') }}  <br/>
		{{ LaravelLocalization::getLanguageBar() }}  <br/>
</body>
</html>