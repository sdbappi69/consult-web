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
		<link href="{{asset('/') }}/css/bootstrap.min.css" rel="stylesheet">
		<!-- Font Awesome -->
		<link href="{{asset('/') }}/css/font-awesome.min.css" rel="stylesheet">
		<!-- Owl Carousel -->
		<link rel="stylesheet" href="{{asset('/') }}/css/owl.carousel.min.css">
		<link rel="stylesheet" href="{{asset('/') }}/css/owl.theme.default.min.css">
		<!-- Custom Style -->
		<link href="{{asset('/') }}/css/style.css" rel="stylesheet">
		<link href="{{asset('/') }}/css/default_theme.css" rel="stylesheet">
		@yield('css')
		<!-- Responsive Style -->
		<link href="{{asset('/') }}/css/responsive.css" rel="stylesheet">
		<link href="{{asset('/') }}/css/custom.css" rel="stylesheet">
		@stack('css')
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
	      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	    <![endif]-->

	    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="{{asset('/') }}/js/jquery-2.2.4.min.js"></script>


	</head>

	<body>

		<div class="layout-width">
			<!-- Header -->
			@include('layout.header')

			@yield('content')
			@include('partials.status')
			<!-- Footer -->
			@include('layout.footer')
		</div>

		<div class="modal modal-warning" id="passwordModal">
			<div class="modal-dialog">
				<div class="modal-content modal-sm">
					<!-- Modal Header -->
					<div class="modal-header">
						<h4 class="modal-title">Change Password</h4>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<form _lpchecked="1" action="{{route('profile.update')}}" method="post" enctype="multipart/form-data">
					{{csrf_field()}}
					<!-- Modal body -->
						<div class="modal-body">

							<div class="col-md-12 col-sm-6">
								<div class="form-group">
									<label for="old_password">Old Password</label>
									<input type="password" class="form-control" name="old_password" id="old_password">
								</div>
								<div class="form-group">
									<label for="new_password">New Password</label>
									<input type="password" class="form-control" name="new_password" id="new_password">
								</div>
								<div class="form-group">
									<label for="confirm_password">Confirm Password</label>
									<input type="password" class="form-control" name="confirm_password" id="confirm_password">
								</div>
							</div>
						</div>
						<!-- Modal footer -->
						<div class="modal-footer">
							<button type="submit" class="btn btn-info" id="password_change_button" disabled>Update</button>
							<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
						</div>
					</form>
				</div>
			</div>
		</div>

		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="{{asset('/') }}/js/popper.min.js"></script>
		<script src="{{asset('/') }}/js/bootstrap.min.js"></script>
		<!-- Owl Carousel -->
		<script src="{{asset('/') }}/js/owl.carousel.min.js"></script>
		<!-- Plugins -->
		<script src="{{asset('/') }}/js/plugins.js"></script>
		<script src="{{asset('/') }}/js/sweet_alert.js"></script>
		@yield('script')
		<script src="{{asset('/') }}/js/custom.js"></script>
		@stack('script')
	</body>

</html>
