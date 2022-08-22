@extends('admin.layouts.master')

@section('title', 'Edit Project')

@extends('layouts.form')

@section('card-title', 'Edit Project')

@section('route', route('projects.update', ['project' => $project->id]))

@section('form-fields')
    @include('admin.project.fields')
    @method('PUT')
@endsection

@section('submit-text', 'Update Project')
