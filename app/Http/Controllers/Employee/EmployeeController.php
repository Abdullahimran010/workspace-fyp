<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Carbon\Carbon;
use App\Http\Controllers\Controller;


class EmployeeController extends Controller
{
    public function index()
    {
        return view('employee.dashboard');
    }
}

