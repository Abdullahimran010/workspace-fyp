<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\Admin\Chart;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function PieChart()
    {
        return view('pie');
    }
}
