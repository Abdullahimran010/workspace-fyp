<?php

namespace App\Http\Controllers\Admin\Manager;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Manager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ManagerController extends Controller
{
    public function index()
    {
       
        $managers = Manager::with('department')->get(); 
        return view('admin.manager.index' , compact('managers'));

    }
    public function changeStatus(Manager $manager){
        if($manager->status == 1){
            $manager->update([
                'status'=> '0'
            ]);
        }
        else{
            $manager->update([
                'status'=> '1'
            ]);
        }
        return redirect()->back();
    }
}
