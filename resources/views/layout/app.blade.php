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

		<div class="layout-width">
			<!-- Header -->
			<header>
				<div class="container">
					<!-- Logo & Menu -->
					<div class="l-area">

						<!-- Brand and toggle get grouped for better mobile display -->
						<nav class="navbar navbar-expand-lg navbar-header">
							<!-- Logo -->
							<a class="navbar-brand" href="index.html">
								<img class="logo" src="img/logo.png" alt="X-DATA">
							</a>
							<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
							  aria-label="Toggle navigation">
								<span class="navbar-toggler-icon">
									<i class="fa fa-bars"></i>
								</span>
							</button>
							<!-- Collect the nav links, forms, and other content for toggling -->
							<div class="collapse navbar-collapse custo-drp-res" id="navbarNav">
								
								@include('layout.nav')

							</div>
						</nav>
					</div>
					<!-- SocialMedia -->
					<div class="s-area">

						@include('layout.social')
						
					</div>
				</div>
			</header>

			@yield('content')

			<!-- Footer -->
			<footer class="footer">
				<!-- Contact -->
				<div class="contact">
					<!-- Phone -->
					<div class="phone">
						<span class="fa fa-phone cont"></span>
						<span>+20 111 222 333</span>
					</div>
					<!-- Mail -->
					<div class="mail">
						<span class="fa fa-envelope cont"></span>
						<a href="mailto:info@site.com" target="_top">Info@site.com</a>
					</div>
				</div>
				<!-- Footer Lv2 -->
				<div class="f-lv2">
					<div class="container">
						<div class="row">
							<!-- About -->
							<div class="col-lg-3 col-sm-3">
								<div class="about">
									<!-- Brand -->
									<img src="img/logo-b.png" alt="X-Data">
									<!-- iNFO -->
									<p>
										Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy
										text ever since the 1500s .
									</p>
									<!-- Links -->
									<a href="terms.html">Terms |</a>
									<a href="terms.html">Policy |</a>
									<a href="contact.html">Careers</a>
									<!-- CopyRights -->
									<h4>© {{ date("Y") }} Consult. All rights reserved.</h4>
								</div>
							</div>
							<!-- Products -->
							<div class="col-lg-2 col-sm-3">
								<div class="links-foot">
									<h2>Services</h2>
									<ul>
										<li>
											<a href="#">Service 1</a>
										</li>
										<li>
											<a href="#">Service 2</a>
										</li>
										<li>
											<a href="#">Service 3</a>
										</li>
										<li>
											<a href="#">Service 4</a>
										</li>
									</ul>
								</div>
							</div>
							<!-- Help -->
							<div class="col-lg-2 col-sm-3">
								<div class="links-foot">
									<h2>Help</h2>
									<ul>
										<li>
											<a href="faq.html">Faq</a>
										</li>
										<li>
											<a href="contact.html">Contact</a>
										</li>
									</ul>
								</div>
							</div>
							<!-- NewsLetter -->
							<div class="col-lg-4 col-sm-3">
								<div class="links-foot">
									<h2>NewsLetter</h2>
									<p>
										Lorem Ipsum is simply dummy text of the printing and typesetting industry.
									</p>
									<input class="email-news" type="email" placeholder="email">
									<input class="sub-news" type="submit" value="Subscribe">
								</div>
							</div>
						</div>
					</div>
				</div>
			</footer>
		</div>

		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="{{ url('/') }}/js/popper.min.js"></script>
		<script src="{{ url('/') }}/js/bootstrap.min.js"></script>
		<!-- Owl Carousel -->
		<script src="{{ url('/') }}/js/owl.carousel.min.js"></script>
		<!-- Plugins -->
		<script src="{{ url('/') }}/js/plugins.js"></script>


	</body>

</html>
