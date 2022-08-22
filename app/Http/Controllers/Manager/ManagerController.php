<?php

namespace App\Http\Controllers\Manager;

use App\Models\Admin;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ManagerController extends Controller
{
    public function index()
    {
        return view('manager.dashboard');
    }
}
