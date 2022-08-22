@extends('admin.layouts.master')
@section('title', 'Departments')
@section('styles')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/photoswipe.css')}}">
@endsection

@section('breadcrumb-title', 'Departments')
@section('title', 'Departments')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <div class="row">
                            <div class="col-md-6"><h4 class="card-title">Departments</h4></div>
                            @if(auth('admin')->user()->isAdmin == 1)
                            <div class="col-md-6">
                                <a href="{{ route('departments.create') }}" class="btn btn-sm btn-success pull-right">+Add Department</a>
                            </div>
                            @else
                            @endif
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                <th>#</th>
                                <th>Department Title</th>
                                <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($departments as $department)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $department->name }}</td>
                                        <td>
                                            @if(auth('admin')->user()->isAdmin == 1)
                                                <a class="btn btn-xs btn-info active" title="Edit Department"
                                                   style="opacity: 0.9"
                                                   href="{{ route('departments.edit', ['department' => $department->id]) }}"><i
                                                        class="fa fa-pencil"></i> Edit</a>
                                            @else
                                            @endif

                                            @if(auth('admin')->user()->isAdmin == 1)
                                            <a class="btn btn-xs btn-danger active" title="Delete Department"
                                               style="color: white; opacity: 0.9"
                                               data-toggle="modal" data-target="#confirm_department_{{$department->id}}"><i
                                                    class="fa fa-trash"></i> Delete</a>
                                            @include('includes.modals.confirm', ['model' => 'department', 'route' => route('departments.destroy', $department->id), 'form' => true])
                                            @else
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{asset('assets/js/counter/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('assets/js/counter/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('assets/js/counter/counter-custom.js')}}"></script>
    <script src="{{asset('assets/js/photoswipe/photoswipe.min.js')}}"></script>
    <script src="{{asset('assets/js/photoswipe/photoswipe-ui-default.min.js')}}"></script>
    <script src="{{asset('assets/js/photoswipe/photoswipe.js')}}"></script>
@endsection
