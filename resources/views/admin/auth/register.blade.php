@extends('admin.layouts.master')

@section('title', 'Register')

@section('content')
    <div class="container-fluid">
        <div class="auth-bg-video">
{{--            <video id="bgvid" poster="{{asset('assets/images/other-images/coming-soon-bg.jpg')}}" playsinline="" autoplay="" muted="" loop="">--}}
{{--                <source src="{{asset('assets/video/auth-bg.mp4')}}" type="video/mp4">--}}
{{--            </video>--}}
            <div class="authentication-box">
                {{--            <div class="text-center"><img src="{{asset('assets/images/endless-logo.png')}}" alt=""></div>--}}
{{--                <div class="card mt-4 p-4">--}}
                    <h4 class="text-center">REGISTER</h4>
                    <h5 class="text-center">Sub Admin</h5>
                    <form class="theme-form" method="POST" action="{{ route('admin.submit.register') }}">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name" class="col-form-label">Name</label>
                                    <input id="name" class="form-control @error('name') is-invalid @enderror" type="text" placeholder="Enter Name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Email</label>
                            <input class="form-control @error('email') is-invalid @enderror" type="text" placeholder="Enter Email" name="email" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Password</label>
                            <input class="form-control @error('password') is-invalid @enderror" type="password" placeholder="Enter Password" name="password" required autocomplete="new-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group form-row mt-3 mb-0">
                            <button class="btn btn-primary btn-block" type="submit">Add SubAdmin</button>
{{--                            <div class="col-sm-12">--}}
{{--                                <div class="text-center">--}}
{{--                                    <div class="mt-2 m-l-20">Already a Member?  <a class="btn-link text-capitalize" href="{{ route('admin.login') }}">Login!</a></div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- sign up page ends-->
{{--    </div>--}}
@endsection
