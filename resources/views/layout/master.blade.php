<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,400italic,300italic,300' rel='stylesheet'
	      type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Droid+Serif' rel='stylesheet' type='text/css'>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title>@section('title')- Mobydoc
    		@show
    	</title>

	<link rel="stylesheet" href="css/app.css"/>

	@if (Config::get('app.debug'))
	<script src="js/modernizr.js"></script>
	@else
	<script src="js/head.min.js"></script>
	@endif


</head>
<body>


<div class="row collapse topbar maxout">
	<div class="small-2 columns">
		<h1>Mobydoc</h1>
	</div>
	<div class="small-3 columns searchbox">
		{{--<input type="text" placeholder="Hex Value">--}}
	</div>
	<div class="small-1 columns searchbox-prefix">
		{{--<a href="#" class="button postfix">Go</a>--}}
	</div>
	<div class="small-6 columns">
	</div>
</div>


<div class="row-left">
	<div class="large-4 columns menu-column">Menu here</div>
	<div class="large-8 columns content-column">
		@yield('content')
	</div>
</div>

@if (Config::get('app.debug'))
<script src="js/jquery.js"></script>
<script src="js/foundation.min.js"></script>
<script src="js/app.js"></script>
@else
<script src="js/body.min.js"></script>
@endif
</body>
</html>
