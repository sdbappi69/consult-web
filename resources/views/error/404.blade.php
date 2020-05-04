@extends('layout.app')

@section('content')

	<div class="container">

		<!-- Error -->
		<div class="error-p">
			<div class="title-error">
				<div class="title-error-t">404</div>
				<p>OOPS! PAGE NOT FOUND</p>
			</div>
			<img src="{{ url('/') }}/img/icons/error.svg" alt="X-Data">
		</div>

		<div class="clearfix"></div>

		@include('home.faq')

		<!-- Partners -->
		<div class="clearfix"></div>
		
	</div>
	<!-- /Container -->

@endsection