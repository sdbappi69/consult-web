<!-- Hosting Plans -->
<section class="plans-prices-st2">
	<!-- Title -->
	<div class="sec-title">
		<h2>Our Services</h2>
		<p>Innovative features make hosting simple.</p>
	</div>
	<div class="container">
		<div class="row">
			@if($service->count() === 2)
				<div class="col-lg-3 col-sm-6"></div>
			@endif
			@foreach($service as $data)
				<div class="col-lg-3 col-sm-6">
					<div class="plan-st2">
						<!-- Title -->
						<h3>{{$data->name}}</h3>
						<!-- Price -->
						{{--<span>3.9$ /mo</span>--}}
						<!-- Icon -->
						<img src="{{config('app.image_path').json_decode($data->attributes)->image_url}}" class="img img-thumbnail mt-3" alt="">
						<!-- Features -->
						<ul>
							<li>
								{!! json_decode($data->attributes)->description !!}
							</li>
						</ul>
						<!-- Order -->
						<a class="order-st2" href="#">Order</a>
					</div>
				</div>
			@endforeach
		</div>
	</div>
</section>