<!-- Menu -->
<ul class="navbar-nav menu">
	<!-- Home -->
	<li>
		<a class="active-link" href="{{ url('/') }}/home">Home</a>
	</li>
	<!-- Services -->
	<li class="dropdown">
		<a class="dropdown-toggle" id="dLabel-services" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">services
			<span class="fa fa-angle-down mrg-l"></span>
		</a>
		<ul class="dropdown-menu custom" aria-labelledby="dLabel-services">
			@foreach(App\Service::orderBy('name','asc')->get() as $data)
				@php
					$attributes = json_decode($data->attributes, true);
					if(isset($attributes['fa_icon']) && $attributes['fa_icon'] != ''){
						$fa_icon = $attributes['fa_icon'];
					}else{
						$fa_icon = 'fa-circle';
					}
				@endphp
				<li>
					<a href="{{ url('/') }}/service/{{ $data->alias }}">
					<span class="fa {{ $fa_icon }} menu-ser"></span>{{ $data->name }}</a>
				</li>
			@endforeach
		</ul>
	</li>
	<li>
		<a href="contact.html">Contact</a>
	</li>
	<!-- ClientArea -->
	<li class="dropdown">
		@if(auth()->check())
			<a class="dropdown-toggle" id="dLabel-services" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> {{auth()->user()->name}}
				<span class="fa fa-angle-down mrg-l"></span>
			</a>
			<ul class="dropdown-menu custom" aria-labelledby="dLabel-services">
				<li>
					<a href="shared-hosting.html">
						<span class="fa fa-user menu-ser"></span>Profile</a>
				</li>
				<li>
					<a href="cloud-hosting.html">
						<span class="fa fa-key menu-ser"></span>Change Password</a>
				</li>
				<li>
					<a href="cloud-hosting.html">
						<span class="fa fa-refresh menu-ser"></span>History</a>
				</li>
				<li>
					<a href="{{route('logout')}}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
						<span class="fa fa-sign-out menu-ser"></span>Logout</a>
					<form action="{{route('logout')}}" method="POST" id="logout-form">@csrf</form>
				</li>
			</ul>
		@else
			<a class="dropdown-toggle" id="dLabel-clientarea" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">clientarea</a>
			<form class="dropdown-menu clientz" aria-labelledby="dLabel-clientarea" action="{{ route('login') }}" method="POST">
			@csrf
			<!-- Username -->
				<input type="text" placeholder="Email" class="user-drpd" value="{{old('email')}}" name="email">
				<!-- Password -->
				<input type="password" placeholder="Password" class="user-drpd" name="password">
				<!-- Remember -->
				<div class="remember-form">
					<input class="remi-drpd" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
					<span class="remmber-ch">Remember</span>
				</div>
				<!-- Login & Register -->
				<input type="submit" class="sub-drpd" value="Login">
				<a class="reg-drpd" href="{{route('register')}}">Register</a>
			</form>
		@endif
	</li>
	<!-- Languages -->
	<!-- <li class="navbar-right dropdown">
		<a class="dropdown-toggle fa fa-language menuz" id="dLabel-lang" data-toggle="dropdown" role="button" aria-haspopup="true"
		  aria-expanded="false"></a>
		<ul class="dropdown-menu custom" aria-labelledby="dLabel-lang">
			<li>
				<a href="#">Bangla</a>
			</li>
			<li>
				<a href="#">English</a>
			</li>
		</ul>
	</li> -->
	<!-- Notifications -->
	<!-- <li class="navbar-right dropdown">
		<a class="dropdown-toggle fa fa-bell-o menuz" id="dLabel-noti" data-toggle="dropdown" role="button" aria-haspopup="true"
		  aria-expanded="false"></a>
		<ul class="dropdown-menu custom" aria-labelledby="dLabel-noti">
			<li>
				<a href="#">
					<span class="fa fa-bullhorn menu-ser"></span>New Update on ...</a>
			</li>
			<li>
				<a href="#">
					<span class="fa fa-bullhorn menu-ser"></span>New Update on ...</a>
			</li>
			<li>
				<a href="#">
					<span class="fa fa-bullhorn menu-ser"></span>New Update on ...</a>
			</li>
		</ul>
	</li> -->
</ul>