@extends('admin.layouts.master')

@section('title', 'Add Sub Admin')
@section('styles')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/datatables.css')}}">
@endsection
@section('breadcrumb-title', 'Sub Admin Management')

@section('breadcrumb-item')
    <li class="breadcrumb-item active">Sub Admin</li>
@endsection

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="pull-left">Sub Admins List</h5>
                        <div class=" pull-right">
                            <a href="{{route('admin.subadmin.create')}}" class="btn btn-primary btn-sm px-2"
                               title=""><i
                                    class="fa fa-plus"></i> Add New Sub Admin</a>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="hover" id="example-style-4">
                                        <thead>
                                        <tr>
                                            <td>#</td>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($admins as $admin)
                                            <tr>
                                                <th scope="row">{{$loop->iteration}}</th>
                                                <td>{{$admin->name}}</td>
                                                <td>{{$admin->email}}</td>
                                                <td>
                                                    @if($admin->status == 1)
                                                        <a href="{{ route('admin.subadmin.changestatus', ['admin' => $admin->id]) }}"
                                                           class="btn btn-success btn-sm mb-1 px-2"
                                                           title="Change Status">Active</a>
                                                    @else
                                                        <a href="{{ route('admin.subadmin.changestatus', ['admin' => $admin->id]) }}"
                                                           class="btn btn-danger btn-sm mb-1 px-2"
                                                           title="Change Status">Deactivated</a>

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
