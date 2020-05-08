@extends('layouts.app')
@section('title','Registration')
@section('content')
        <form class="reg-f" action="{{route('register')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="title-from">Register Account</div>
            <div class="card-body row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">Basic Info</div>
                        <div class="card-body card-block">
                            <div class="form-group">
                                <div class="input-group">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    <div class="input-group-addon">
                                        <i class="fa fa-user"></i>
                                    </div>
                                </div>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email">
                                    <div class="input-group-addon">
                                        <i class="fa fa-envelope"></i>
                                    </div>
                                </div>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                    <div class="input-group-addon">
                                        <i class="fa fa-asterisk"></i>
                                    </div>
                                </div>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <input id="password-confirm" type="password" placeholder="Confirm Password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    <div class="input-group-addon">
                                        <i class="fa fa-asterisk"></i>
                                    </div>
                                </div>
                                @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <input id="image" type="file" class="form-control" name="image" required>
                                    <div class="input-group-addon">
                                        <i class="fa fa-image"></i>
                                    </div>
                                </div>
                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <input id="birth_date" type="text" class="form-control datepicker @error('birth_date') is-invalid @enderror datetime" placeholder="Birth Date" name="birth_date" value="{{ old('birth_date') }}" required>
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                </div>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">Contact Mediums</div>
                        <div class="card-body card-block">
                            <div class="form-group">
                                <div class="input-group">
                                    <input id="msisdn" type="text" placeholder="Mobile No" value="{{ old('msisdn') }}" class="form-control @error('msisdn') is-invalid @enderror" name="msisdn" required >
                                    <div class="input-group-addon">
                                        <i class="fa fa-mobile-phone"></i>
                                    </div>
                                </div>
                                @error('msisdn')
                                <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <input id="viber" type="text" value="{{ old('viber') }}" placeholder="Viber Number" class="form-control" name="viber">
                                    <div class="input-group-addon">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                </div>
                                @error('viber')
                                <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <input id="skype" type="text" value="{{ old('skype') }}" placeholder="Skype User name" class="form-control" name="skype">
                                    <div class="input-group-addon">
                                        <i class="fa fa-skype"></i>
                                    </div>
                                </div>
                                @error('skype')
                                <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <input id="whatsapp" type="text" value="{{ old('whatsapp') }}" placeholder="Whatsapp no" class="form-control" name="whatsapp">
                                    <div class="input-group-addon">
                                        <i class="fa fa-whatsapp"></i>
                                    </div>
                                </div>
                                @error('whatsapp')
                                <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <input id="emo" type="text" value="{{ old('emo') }}" placeholder="Emo no" class="form-control" name="emo">
                                    <div class="input-group-addon">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                </div>
                                @error('emo')
                                <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <input id="telegram" type="text" value="{{ old('telegram') }}" placeholder="Telegram no" class="form-control" name="telegram">
                                    <div class="input-group-addon">
                                        <i class="fa fa-paper-plane"></i>
                                    </div>
                                </div>
                                @error('telegram')
                                <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <input type="submit" class="login-btn custom" value="Sign up">
        </form>
        <div class="line-op">
            <!-- Sign in -->
            <div class="reg-p">
                <span class="fa fa-user-plus form-p"></span>
                <a class="reset-p" href="{{route('login')}}">Already Have Account ?</a>
            </div>
        </div>
@endsection
