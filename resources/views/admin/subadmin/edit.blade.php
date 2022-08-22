@extends('admin.layouts.master')

@section('title', 'Edit Sub Admin')

@section('breadcrumb-title', 'Sub Admin')

@section('breadcrumb-item')
    <li class="breadcrumb-item">Edit</li>
    <li class="breadcrumb-item active">Sub Admin</li>
@endsection

@section('styles')
@endsection

@extends('layouts.form')

@section('form-heading', 'Edit Sub Admin')
@section('route', route('adminAdmins.update', $adminAdmin->id))

@section('form-fields')
    @include('admin.admin.fields')
    @method('PUT')
@endsection

@section('submit-text', 'Update')

@section('scripts')
@endsection

