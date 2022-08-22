@extends('admin.layouts.master')

@section('title', 'manager')
@section('styles')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/datatables.css')}}">
@endsection
@section('breadcrumb-title', 'manager Management')

@section('breadcrumb-item')
<li class="breadcrumb-item active">Sponsored manager</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="pull-left">All managers List</h5>
                    {{-- <div class=" pull-right">
                        <a href="{{route('managers.create')}}" class="btn btn-primary btn-sm px-2" title=""><i class="fa fa-plus"></i> Add New manager</a>
                    </div> --}}

                </div>
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered hover" id="example-style-4">
                                    <thead>
                                        <tr>
                                            <td>#</td>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Contact</th>
                                            <th>Department</th>
                                            <th>Current Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($managers as $manager)
                                        <tr>
                                            <th scope="row">{{$loop->iteration}}</th>
                                            <td>{{$manager->name}}</td>
                                            <td>{{$manager->email}}</td>
                                            <td>{{$manager->phone}}</td>
                                            <td>{{$manager->department}}</td>
                                            @if($manager->status)
                                            <td><span class="badge badge-success">Active</span></td>
                                            @else
                                            <td><span class="badge badge-danger">Not active</span></td>
                                            @endif
                                            <td>
                                                @if($manager->status==1)
                                                <a href="{{ route('managers.changeStatus', ['manager' => $manager->id]) }}" class="btn btn-danger btn-sm mb-1 px-2" title="Change Status">Deactivate Manager</a>
                                                @else
                                                <a href="{{ route('managers.changeStatus', ['manager' => $manager->id]) }}" class="btn btn-success btn-sm mb-1 px-2" title="Change Status">Activate Manager</a>
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
    </div>
</div>
@endsection

@section('scripts')
<script src="{{asset('assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatables/datatable.custom.js')}}"></script>

@endsection