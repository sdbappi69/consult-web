@extends('layouts.app')
@section('title','Login')
@section('content')
    <form class="login-f" method="POST" action="{{ route('login') }}">
    @csrf
    <!-- Title -->
        <div class="title-from">Log In to Your Account</div>
        <!-- Username -->
        <input type="text" placeholder="Email" name="email" class="user-l" value="{{ old('email') }}" required autocomplete="email" autofocus>
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <!-- Password -->
        <input type="password" placeholder="password" class="user-l"  name="password" required autocomplete="current-password">
        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <!-- Remember -->
        <div class="remember-line">
            <input class="check-f" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            <span>Remember me ?</span>
        </div>
        <!-- Login -->
        <input type="submit" class="login-btn" value="Sign in">
    </form>
    <div class="line-op">
        <!-- Reset Password -->
        <div class="re-p">
            <span class="fa fa-question form-p"></span>
            <a class="reset-p" href="{{ route('password.request') }}">Reset Password</a>
        </div>
        <!-- Register -->
        <div class="reg-p">
            <span class="fa fa-user-plus form-p"></span>
            <a class="reset-p" href="{{route('register')}}">Register</a>
        </div>
    </div>
@endsection
