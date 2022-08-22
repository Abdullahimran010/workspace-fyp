@extends('admin.layouts.master')
@section('title', 'EventManagement')

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/photoswipe.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/prism.css')}}">
@endsection

@section('breadcrumb-title', 'Events')

@section('content')
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="user-profile">
            <div class="row">
                <div class="col-sm-12 col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Event: {{ $adminEvent->title }}</h5>

                            <div class="card-header-right">
                                <ul class="list-unstyled card-option">
                                    <li><i class="icofont icofont-minus minimize-card"></i></li>
                                </ul>
                            </div>
                        </div>
                        {{--                        <div class="card-body row">--}}
                        {{--                        <div class="col-md-12">--}}
                        {{--                            <h5 style="color: blue; text-decoration-line: underline">Associated Rocks</h5>--}}
                        {{--                        </div>--}}
                        {{--                            @forelse($category->rocks as $rock)--}}
                        {{--                                <div class="card shadow-sm col-md-3" style="margin-bottom: 4px">--}}
                        {{--                                    <div class="card-body">--}}
                        {{--                                        <h5>{{ $rock->name }}</h5>--}}
                        {{--                                    </div>--}}
                        {{--                                </div>--}}
                        {{--                                @empty--}}
                        {{--                                    <div class="col-md-12 text-center">--}}
                        {{--                                        <h5>No rock added to this category yet!</h5>--}}
                        {{--                                    </div>--}}
                        {{--                            @endforelse--}}
                        {{--                    </div>--}}
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
        @endsection


@section('scripts')
    <script src="{{asset('assets/js/prism/prism.min.js')}}"></script>
    <script src="{{asset('assets/js/clipboard/clipboard.min.js')}}"></script>
    <script src="{{asset('assets/js/custom-card/custom-card.js')}}"></script>
    <script src="{{asset('assets/js/height-equal.js')}}"></script>
@endsection
