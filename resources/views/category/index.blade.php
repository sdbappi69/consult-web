@extends('layout.app')
@section('css')
	<link href="{{ url('/') }}/css/step.css" rel="stylesheet">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endsection
@section('content')
	<div class="container">
		<form action="" style="margin-top: 40px;">

			<h1>Book an appointment:</h1>
			<div class="row">
				<!-- One "tab" for each step in the form: -->
				<div class="col-md-3">Please select the date:
					<p><input id="datepicker" name="date" value="{{@$req['date']}}" placeholder="Select a date" oninput="this.className = ''"></p>
				</div>
				<div class="col-md-3">Please select rank:
					<p>
						<select name="rank" id="rank">
							<option value="">Select a rank</option>
						</select>
					</p>
				</div>
				<div class="col-md-5"></div>
				<div class="col-md-1">&nbsp
					<p>
						<button class="btn btn-info user-sub">Filter</button>
					</p>
				</div>
			</div>
		</form>

		<div class="row">
			@forelse($slot as $data)
				@foreach(availableSlot($data) as $slot_data)
					<div class="col-lg-3 col-sm-6 pb-5">
						<div class="plan-st3">
							<h4>{{$data->getProvider->name}}</h4>
							<!-- Title -->
							<img src="{{ config('app.image_path').json_decode($data->getProvider->attributes)->image_url}}" class="img img-thumbnail" alt="provider image">
							<!-- Price -->
							<span>{{json_decode($data->getCategoryDetail->attributes)->fee_per_slot}} BDT / Slot</span>
							<!-- Features -->
							<ul>
								<li>
									<tr>
										<td><b>Date : </b></td>
										<td>{{$data->date}}</td>
									</tr>
								</li>
								<li>
									<tr>
										<td><b>Slot Start Time : </b></td>
										<td>{{$slot_data->start}}</td>
									</tr>
								</li>
								<li>
									<tr>
										<td><b>Slot End Time : </b></td>
										<td>{{$slot_data->end}}</td>
									</tr>
								</li>
								<li>
									<tr>
										<td><b>Slot Duration : </b></td>
										<td>{{$slot_data->duration}} Minutes</td>
									</tr>
								</li>
								<li>
									<tr>
										<td>{{json_decode($data->attributes)->description}} Minutes</td>
									</tr>
								</li>
								<li>
									<button class="btn btn-success btn-block booking-btn" data-value="{{json_encode([
									'slot_id' => $data->id,
									'provider_id' => $data->getCategoryDetail->provider_id,
									'category_id' => $data->getCategoryDetail->category_id,
									'client_id' => auth()->user()->id ?? null,
									'fee' => json_decode($data->getCategoryDetail->attributes)->fee_per_slot,
									'start' => $slot_data->start,
									'end' => $slot_data->end,
									])}}">Book Now</button>
								</li>
							</ul>
						</div>
					</div>
				@endforeach
			@empty
				<h2 style="margin: auto;">No slot available in this category</h2>
			@endforelse
		</div>
	</div>

	<div class="clearfix"></div>

	@include('home.faq')

	<!-- Partners -->
	<div class="clearfix"></div>

	</div>
	<!-- /Container -->
	<div class="modal" id="bookingModel">
		<div class="modal-dialog">
			<div class="modal-content">

				<!-- Modal Header -->
				<div class="modal-header">
					<h4 class="modal-title">Booking</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>

				<!-- Modal body -->
				<form action="{{route('appointment.store')}}" method="post" enctype="multipart/form-data">
					@csrf
					<div class="modal-body">
						<div>
							<label for="medium">Medium Name</label>
							<select name="medium" id="medium" required>
								<option value="">Select your medium</option>
								@foreach(\App\Medium::all() as $medium)
									<option value="{{$medium->id}}">{{$medium->name}}</option>
								@endforeach
							</select>
							<label for="file">Additional documents</label>
							<input type="file" name="file[]" id="file" multiple>
						</div>
						<input type="hidden" name="additional_data" id="additional_data" required>
					</div>

					<!-- Modal footer -->
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-success">Book Appointment</button>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection
@section('script')
	<script src="{{ url('/') }}/js/step.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
@endsection
@push('script')
	<script>
		$('.booking-btn').click(function () {
			if(!"{{auth()->check()}}"){
				alert('Please login for booking!')
			}else{
				var additional_data = $(this).data('value')
				$('#additional_data').val(JSON.stringify(additional_data))
				$('#bookingModel').modal('show')
			}
		})
		$(function() {
			$("#datepicker").datepicker();
		});
	</script>
@endpush
