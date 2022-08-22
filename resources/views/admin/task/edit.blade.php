@extends('admin.layouts.master')

@section('title', 'Edit Task')

@extends('layouts.form')

@section('form-heading', 'Edit Task Form')
@section('card-title', 'Edit Task')

@section('route', route('adminTasks.update', ['adminTask' => $adminTask->id]))

@section('form-fields')
    @include('admin.task.fields')
    @method('PUT')
@endsection

@section('submit-text', 'Update Task')
