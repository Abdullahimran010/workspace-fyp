@extends('admin.layouts.master')
@section('title', 'Projects')
@section('styles')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/photoswipe.css')}}">
@endsection

@section('breadcrumb-title', 'Projects')
@section('title', 'Projects')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <div class="row">
                            <div class="col-md-6"><h4 class="card-title">Projects</h4></div>
                            @if(auth('admin')->user()->isAdmin == 1)
                            <div class="col-md-6">
                                <a href="{{ route('projects.create') }}" class="btn btn-sm btn-success pull-right">+Add Project</a>
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
                                <th>Client Name</th>
                                <th>Project Title</th>
                                <th>Description</th>
                                <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($projects as $project)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $project->client_name }}</td>
                                        <td>{{ $project->title }}</td>
                                        <td>{{ $project->description }}</td>
                                        <td>
                                            @if(auth('admin')->user()->isAdmin == 1)
                                                <a class="btn btn-xs btn-info active" title="Edit Project"
                                                   style="opacity: 0.9"
                                                   href="{{ route('projects.edit', ['project' => $project->id]) }}"><i
                                                        class="fa fa-pencil"></i> Edit</a>
                                            @else
                                            @endif

                                            @if(auth('admin')->user()->isAdmin == 1)
                                            <a class="btn btn-xs btn-danger active" title="Delete Project"
                                               style="color: white; opacity: 0.9"
                                               data-toggle="modal" data-target="#confirm_project_{{$project->id}}"><i
                                                    class="fa fa-trash"></i> Delete</a>
                                            @include('includes.modals.confirm', ['model' => 'project', 'route' => route('projects.destroy', $project->id), 'form' => true])
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
