@extends('layouts.auth')

@section('title', 'Register')

@section('content')
<div class="container-fluid">
    <div class="auth-bg-video">
        <video id="bgvid" poster="{{asset('assets/images/other-images/coming-soon-bg.jpg')}}" playsinline="" autoplay="" muted="" loop="">
            <source src="{{asset('assets/video/auth-bg.mp4')}}" type="video/mp4">
        </video>
        <div class="authentication-box" style="width:70%">
            <div class="card mt-4 p-4">
                <h4 class="text-center">REGISTER</h4>
                <h5 class="text-center">MANAGER</h5>
                <form class="theme-form" method="POST" action="{{ route('manager.submit.register') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
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
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label">Email</label>
                                <input class="form-control @error('email') is-invalid @enderror" type="text" placeholder="Enter Email" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label">Password</label>
                                <input class="form-control @error('password') is-invalid @enderror" type="password" placeholder="Enter Password" name="password" required autocomplete="new-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone" class="col-form-label">Phone Number</label>
                                <input id="phone" class="form-control @error('phone') is-invalid @enderror" type="text" placeholder="Enter Phone Number" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="date_of_joining" class="col-form-label">Date of Joining</label>
                                <input id="date_of_joining" class="form-control @error('date_of_joining') is-invalid @enderror" type="date" placeholder="Date of joining" name="date_of_joining" value="{{ old('date_of_joining') }}" required autocomplete="date_of_joining" autofocus>
                                @error('date_of_joining')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="experience" class="col-form-label">Experience in years</label>
                                <input id="experience" class="form-control @error('experience') is-invalid @enderror" type="number" placeholder="Enter Your experience" name="experience" value="{{ old('experience') }}" required autocomplete="experience" autofocus>
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fyp" class="col-form-label">FYP</label>
                                <input id="fyp" class="form-control @error('fyp') is-invalid @enderror" type="number" placeholder="--Enter Your fyp's--" name="fyp" value="{{ old('fyp') }}" required autocomplete="fyp" autofocus>
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label">Select Department</label>
                                <select name="department_id" class="form-control" required>
                                    
                                    <optgroup label="Departments">
                                        @foreach(_getAllDepartments() as $department)
                                        @if($department != null || $department != '')
                                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                                        @else
                                        <option value="">Please Select Department</option>
                                        @endif
                                        @endforeach
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group form-row mt-3 mb-0">
                                <button class="btn btn-primary btn-block" type="submit">Signup</button>
                                <div class="col-sm-12">
                                    <div class="text-center">
                                        <div class="mt-2 m-l-20">Already a Member?  <a class="btn-link text-capitalize" href="{{ route('manager.login') }}">Login!</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- sign up page ends-->
</div>
@endsection