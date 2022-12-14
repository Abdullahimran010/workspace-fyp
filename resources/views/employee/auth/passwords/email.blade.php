@extends('layouts.auth')
@section('title', 'Reset Password')

@section('content')
    <div class="auth-bg">
        <div class="row">
            <div class="col-md-12">
                <div class="auth-innerright">
                    <div class="authentication-box">
                        <div class="text-center mt-3"><img src="{{asset('assets/images/logo/logo.png')}}" style="width: 250px; height: 100px; object-fit: contain" alt="">
                        </div>
                        <div class="card mt-4 shadow-lg">
                            <div class="card-body">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                <div class="text-center">
                                    <h4>Reset Password</h4>
                                    <h6>Enter you email for password reset request</h6>
                                </div>
                                <form class="theme-form" method="POST" action="{{ route('employee.password.email') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="email"
                                               class="col-form-label pt-0">{{ __('E-Mail Address') }}</label>
                                        <input id="email" type="email" name="email"
                                               class="form-control @error('email') is-invalid @enderror"
                                               value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group form-row mt-3 mb-0">
                                        <button type="submit" class="btn btn-primary btn-block">
                                            {{ __('Send Password Reset Link') }}
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
