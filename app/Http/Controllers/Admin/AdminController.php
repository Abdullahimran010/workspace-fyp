<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Models\Electroniccard;
use App\Models\Employee;
use App\Models\Event;
use App\Models\Manager;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use function Composer\Autoload\includeFile;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function subAdminsIndex()
    {
        $admins = Admin::where('isAdmin', '0')->get();
        return view('admin.subadmin.index', compact('admins'));
    }

    public function subadmincreate()
    {
        return view('admin.subadmin.create');
    }

    public function subadmindestroy(Admin $admin)
    {
        $admin->delete();
        return redirect()->back()->with('success', 'Sub Admin Deleted Successfully');
    }

    public function subadminchangestatus(Admin $admin) {
        if($admin->status == 1) {
            $admin->update([
                'status'=> '0'
            ]);
        }
        else{
            $admin->update([
                'status'=> '1'
            ]);
        }
        return redirect()->back()->with('success', 'Status changed successfully');
    }
}
