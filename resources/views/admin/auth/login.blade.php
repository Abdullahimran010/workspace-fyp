@extends('layouts.auth')

@section('title', 'Login')

@section('content')
    <div class="container-fluid p-0">
        <!-- login page with video background start-->
        <div class="auth-bg-video">
            <video id="bgvid" poster="{{asset('assets/images/other-images/coming-soon-bg.jpg')}}" playsinline="" autoplay="" muted="" loop="">
                <source src="{{asset('assets/video/auth-bg.mp4')}}" type="video/mp4">
            </video>
            <div class="authentication-box">
                {{--                <div class="text-center"><img src="{{asset('assets/images/endless-logo.png')}}" alt=""></div>--}}
                <div class="card mt-4">
                    <div class="card-body">
                        <div class="text-center">
                            <h4>ADMIN LOGIN</h4>
                        </div>
                        <form class="theme-form" method="POST" action="{{ route('admin.login.submit') }}">
                            @csrf
                            <div class="form-group">
                                <label for="email" class="col-form-label pt-0">Email Address</label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password" class="col-form-label">Password</label>
                                <input  type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
{{--                            <div class="checkbox p-0">--}}
{{--                                <input id="checkbox1" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>--}}
{{--                                <label for="checkbox1">Remember me</label>--}}
{{--                            </div>--}}
                            <div class="form-group form-row mt-3 mb-0">
                                <button class="btn btn-primary btn-block" type="submit">Login</button>
{{--                                <div class="col-sm-12">--}}
{{--                                    <div class="text-center">--}}
{{--                                        <div class="mt-2 m-l-20">Not a Member?  <a class="btn-link text-capitalize" href="{{ route('admin.register') }}">Register Now!</a></div>--}}
{{--                                    </div>--}}
{{--                                    --}}{{--                                    <div>--}}
{{--                                    --}}{{--                                        @if (Route::has('password.request'))--}}
{{--                                    --}}{{--                                            <a class="btn btn-link text-center" href="{{ route('password.request') }}">--}}
{{--                                    --}}{{--                                                Forget Password?--}}
{{--                                    --}}{{--                                            </a>--}}
{{--                                    --}}{{--                                    </div>--}}
{{--                                </div>--}}
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- login page with video background end-->
    </div>
@endsection
@section('scripts')
    <script src="{{asset('assets/js/height-equal.js')}}"></script>
@endsection
