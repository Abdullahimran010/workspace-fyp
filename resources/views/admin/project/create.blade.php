@extends('admin.layouts.master')

@section('title', 'Add Project')

@extends('layouts.form')

@section('card-title', 'Add New Project')

@section('route', route('projects.store'))

@section('form-fields')
    @include('admin.project.fields')
@endsection

@section('submit-text', 'Add Project')

