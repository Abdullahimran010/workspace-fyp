@extends('admin.layouts.master')

@section('title', 'Add Manager')

@section('breadcrumb-title', 'Add Manager')

@section('breadcrumb-item')
    <li class="breadcrumb-item">Manager</li>
    <li class="breadcrumb-item active">Add Manager</li>
@endsection

@section('styles')
@endsection

@extends('layouts.form')

@section('form-heading', 'Add Manager')

@section('route', route('managers.store'))

@section('form-fields')
    @include('admin.manager.fields')
@endsection

@section('submit-text', 'Create')

@section('scripts')
@endsection
