<?php

namespace App\Http\Controllers\Admin\Department;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::get();
        return view('admin.department.index', compact('departments'));
    }

    public function create(Request $request)
    {
        return view('admin.department.create');
    }

    public function store(Request $request)
    {
        $department = Department::create($request->all());

        return redirect()->route('departments.index')->with('success', 'Department Added Successfully');
    }

    public function show(Department $department)
    {
        return view('admin.department.show', compact('department'));
    }

    public function edit(Request $request, Department $department)
    {
        return view('admin.department.edit', compact('department'));
    }

    public function update(Request $request, Department $department)
    {
        $department->update($request->all());

        return redirect()->route('departments.index')->with('success', 'Department Updated Successfully');
    }

    public function destroy(Department $department)
    {
        $department->delete();
        return redirect()->back()->with('success', 'Department Deleted Successfully');
    }
}
