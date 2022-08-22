@extends('admin.layouts.master')
@section('title', 'Events')
@section('styles')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/photoswipe.css')}}">
@endsection

@section('breadcrumb-title', 'Tasks')
@section('title', 'Events')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <div class="row">
                            <div class="col-md-6"><h4 class="card-title">Tasks</h4></div>
                            @if(auth('admin')->user()->isAdmin == 1)
                            <div class="col-md-6">
                                <a href="{{ route('adminTasks.create') }}" class="btn btn-sm btn-success pull-right">+Add Task</a>
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
                                <th>Event Title</th>
                                <th>Description</th>
                                <th>Points</th>
                                <th>Completion Date</th>
                                <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($tasks as $adminTask)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $adminTask->title }}</td>
                                        <td>{{ $adminTask->description }}</td>
                                        <td>{{ $adminTask->points }}</td>
                                        <td>{{ $adminTask->completion_date }}</td>
                                        <td>
                                            @if(auth('admin')->user()->isAdmin == 1)
                                                <a class="btn btn-xs btn-info active" title="Edit Event"
                                                   style="opacity: 0.9"
                                                   href="{{ route('adminTasks.edit', ['adminTask' => $adminTask->id]) }}"><i
                                                        class="fa fa-pencil"></i> Edit</a>
                                            @else
                                            @endif

{{--                                            <a class="btn btn-xs btn-success active" title="Show Event"--}}
{{--                                               style="opacity: 0.9"--}}
{{--                                               href="{{ route('adminTasks.show', ['adminTask' => $adminTask->id]) }}"><i--}}
{{--                                                    class="fa fa-pencil"></i> Show</a>--}}

                                            @if(auth('admin')->user()->isAdmin == 1)
                                            <a class="btn btn-xs btn-danger active" title="Delete Event"
                                               style="color: white; opacity: 0.9"
                                               data-toggle="modal" data-target="#confirm_adminTask_{{$adminTask->id}}"><i
                                                    class="fa fa-trash"></i> Delete</a>
                                            @include('includes.modals.confirm', ['model' => 'adminTask', 'route' => route('adminTasks.destroy', $adminTask->id), 'form' => true])
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


            <div class="col-md-12">
                <div class="card">
                <div class="card-header card-header-primary">
                        <div class="row">
                            <div class="col-md-6"><h4 class="card-title">Managers Manually Assign Tasks</h4></div>
                            @if(auth('admin')->user()->isAdmin == 1)
                            <div class="col-md-6">
                                <a href="{{ route('adminTasks.create') }}" class="btn btn-sm btn-success pull-right">List</a>
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
                                <th>Event Title</th>
                                <th>Description</th>
                                <th>Points</th>
                                <th>Completion Date</th>
                                <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($assignedtasks as $adminTask)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $adminTask->title }}</td>
                                        <td>{{ $adminTask->description }}</td>
                                        <td>{{ $adminTask->points }}</td>
                                        <td>{{ $adminTask->completion_date }}</td>
                                        <td>
                                            @if(auth('admin')->user()->isAdmin == 1)
                                                <a class="btn btn-xs btn-info active" title="Edit Event"
                                                   style="opacity: 0.9"
                                                   href="{{ route('adminTasks.edit', ['adminTask' => $adminTask->id]) }}"><i
                                                        class="fa fa-pencil"></i> Edit</a>
                                            @else
                                            @endif

{{--                                            <a class="btn btn-xs btn-success active" title="Show Event"--}}
{{--                                               style="opacity: 0.9"--}}
{{--                                               href="{{ route('adminTasks.show', ['adminTask' => $adminTask->id]) }}"><i--}}
{{--                                                    class="fa fa-pencil"></i> Show</a>--}}

                                            @if(auth('admin')->user()->isAdmin == 1)
                                            <a class="btn btn-xs btn-danger active" title="Delete Event"
                                               style="color: white; opacity: 0.9"
                                               data-toggle="modal" data-target="#confirm_adminTask_{{$adminTask->id}}"><i
                                                    class="fa fa-trash"></i> Delete</a>
                                            @include('includes.modals.confirm', ['model' => 'adminTask', 'route' => route('adminTasks.destroy', $adminTask->id), 'form' => true])
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
