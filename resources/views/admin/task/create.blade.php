@extends('admin.layouts.master')

@section('title', 'Add Task')

@extends('layouts.form')

@section('form-heading', 'Task Form')
@section('card-title', 'Add New Task')

@section('route', route('adminTasks.store'))

@section('form-fields')
    @include('admin.task.fields')
@endsection

@section('submit-text', 'Add Task')

