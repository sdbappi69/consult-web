@extends('layout.app')

@section('content')

	<div class="container">

		@if($service->categories->count() > 0)

			<br>

			<!-- Title -->
			<div class="title-bg1-modern">
				<h1>Please select a category</h1>
				<h2>One line short description of this service</h2>
			</div>

			<div class="features-bg1-modern">

			@foreach($service->categories as $category)

				@php
					$attributes = json_decode($category->attributes, true);
                    if(isset($attributes['fa_icon']) && $attributes['fa_icon'] != ''){
                        $fa_icon = $attributes['fa_icon'];
                    }else{
                        $fa_icon = 'fa-circle';
                    }
				@endphp

				<!-- Item -->
					<div class="support-modlyo-item">
						<i class="fa {{ $fa_icon }}"></i>
						<span>{{ $category->name }}</span>
						<a href="{{ route('category',$category->alias )}}">Book an Appointment</a>
					</div>

				@endforeach

			</div>

		@else

		<!-- Error -->
			<div class="error-p">
				<div class="title-error">
					<p>COMING SOON</p>
				</div>
				<img src="{{ url('/') }}/img/icons/error.svg" alt="X-Data">
			</div>

		@endif

		<div class="clearfix"></div>

	@include('home.faq')

	<!-- Partners -->
		<div class="clearfix"></div>

	</div>
	<!-- /Container -->

@endsection
