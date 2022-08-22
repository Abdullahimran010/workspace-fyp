@extends('admin.layouts.master')

@section('title', 'Edit Department')

@extends('layouts.form')

@section('card-title', 'Edit Department')

@section('route', route('departments.update', ['department' => $department->id]))

@section('form-fields')
    @include('admin.department.fields')
    @method('PUT')
@endsection

@section('submit-text', 'Update Department')
