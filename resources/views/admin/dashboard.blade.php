@extends('admin.layouts.master')


@section('title', 'Dashboard')

@section('breadcrumb-title', 'Admin Dashboard')


@section('styles')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/chartist.css')}}">
@endsection

@section('breadcrumb-item')
    <li class="breadcrumb-item">Starter Kit</li>
    <li class="breadcrumb-item active">Dashboard</li>
@endsection

@section('content')
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <h3>This is dashboard</h3>
        </div>
    </div>
    <!-- Container-fluid Ends-->
@endsection

@extends('admin.chart.index')



@section('scripts')
    <script src="{{asset('assets/js/chart/chartist/chartist.js')}}"></script>
    <script src="{{asset('assets/js/counter/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('assets/js/counter/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('assets/js/counter/counter-custom.js')}}"></script>
    <script src="{{asset('assets/js/dashboard/default.js')}}"></script>
@endsection
