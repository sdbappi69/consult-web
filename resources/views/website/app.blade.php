<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<title>X-DATA - Web Hosting</title>

		<!-- Fonts -->
		<link href="//fonts.googleapis.com/css?family=Open+Sans:400,600,700%7CRaleway:400,700" rel="stylesheet">
		<!-- Favicon -->
		<link rel="icon" type="image/ico" href="img/favicon.ico">
		<!-- Bootstrap -->
		<link href="{{ url('/') }}/css/bootstrap.min.css" rel="stylesheet">
		<!-- Font Awesome -->
		<link href="{{ url('/') }}/css/font-awesome.min.css" rel="stylesheet">
		<!-- Owl Carousel -->
		<link rel="stylesheet" href="{{ url('/') }}/css/owl.carousel.min.css">
		<link rel="stylesheet" href="{{ url('/') }}/css/owl.theme.default.min.css">
		<!-- Custom Style -->
		<link href="{{ url('/') }}/css/style.css" rel="stylesheet">
		<link href="{{ url('/') }}/css/default_theme.css" rel="stylesheet">
		<!-- Responsive Style -->
		<link href="{{ url('/') }}/css/responsive.css" rel="stylesheet">

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
	      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	    <![endif]-->

	    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="{{ url('/') }}/js/jquery-2.2.4.min.js"></script>

	</head>

	<body>

		@yield('content')

		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="{{ url('/') }}/js/popper.min.js"></script>
		<script src="{{ url('/') }}/js/bootstrap.min.js"></script>
		<!-- Owl Carousel -->
		<script src="{{ url('/') }}/js/owl.carousel.min.js"></script>
		<!-- Plugins -->
		<script src="{{ url('/') }}/js/plugins.js"></script>


	</body>

</html>
