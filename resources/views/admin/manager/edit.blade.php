@extends('admin.layouts.master')

@section('title', 'Edit Manager')

@section('breadcrumb-title', 'Manager')

@section('breadcrumb-item')
    <li class="breadcrumb-item">Edit</li>
    <li class="breadcrumb-item active">Manager</li>
@endsection

@section('styles')
@endsection

@extends('layouts.form')

@section('form-heading', 'Edit Manager')
@section('route', route('managers.update', $manager->id))

@section('form-fields')
    @include('admin.manager.fields')
    @method('PUT')
@endsection

@section('submit-text', 'Update')

@section('scripts')
@endsection

