@extends('admin.layouts.master')

@section('title', 'Add Department')

@extends('layouts.form')

@section('card-title', 'Add New Department')

@section('route', route('departments.store'))

@section('form-fields')
    @include('admin.department.fields')
@endsection

@section('submit-text', 'Add Department')

