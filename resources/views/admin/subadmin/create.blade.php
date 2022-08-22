@extends('admin.layouts.master')

@section('title', 'Add New Sub Admin')

@section('breadcrumb-title', 'Add New Sub Admin')

@section('breadcrumb-item')
    <li class="breadcrumb-item">Sub Admin</li>
    <li class="breadcrumb-item active">Add New Sub Admin</li>
@endsection

@section('styles')
@endsection

@extends('layouts.form')

@section('form-heading', 'Add SubAdmin')

@section('route', route('admin.submit.register'))

@section('form-fields')
    @include('admin.subadmin.fields')
@endsection

@section('submit-text', 'Create')

@section('scripts')
@endsection
