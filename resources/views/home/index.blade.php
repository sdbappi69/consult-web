@extends('layout.app')

@section('content')

	@include('home.banners')

	<div class="clearfix"></div>

	@include('home.services')

	<div class="container">

		@include('home.faq')

		<!-- Partners -->
		<div class="clearfix"></div>
		
	</div>
	<!-- /Container -->

@endsection