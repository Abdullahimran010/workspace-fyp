<?php

namespace App\Http\Controllers\API\Employee\Auth;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManagerStatic as Image;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api_employee');
    }

    function viewProfile(Request $request)
    {
        $employee = Employee::where('id', $request->employee_id)->first();
        if ($employee) {
            return response()->json(["employee" => $employee]);
        } else {
            return response()->json(["employee" => []]);
        }
    }

    function updateProfile(Request $request)
    {
        $employee = Employee::where('id', $request->employee_id)->first();
        $employee->update($request->except('password'));
        if ($employee) {
            return response()->json(["success" => "Profile updated successfully"]);
        } else {
            return response()->json(["error" => "Unale to update profile"]);
        }
    }

    public function updateProfileImage(Request $request)
    {
        $employee = Employee::where('id', $request->id)->first();
        if ($employee) {

            if (request()->hasFile('avatar') && request()->file('avatar')->isValid()) {
                $filename = $request->file('avatar')->getClientOriginalName();
                $dir = public_path('storage/employees/' . $request->id);
                if (!file_exists($dir)) mkdir($dir, 0777, true);
                $image = Image::make(request()->file('avatar'));
                $image->fit(200, 200)->save($dir . '/' . $filename);

                $employee->update(['avatar' => "employees/{$request->id}/{$filename}"]);
                return response()->json(["message" => "Profile image updated successfully."]);
            } else {
                return response()->json(["message" => "Unable to process your image. Try again."]);
            }
        } else {
            return response()->json(["error" => "We are unable to find your details. Try again later."]);
        }
    }
    
    public function saveFcmToken(Request $request)
    {
        $employee = Employee::where('id', auth()->user()->id)->first();
        
        $res = $employee->update([
           'fcm_token' => $request->fcm_token 
        ]);   
        
        if($res){
            return response()->json(["success" => "FCM Token updated successfully"]);
        } else {
            return response()->json(["error" => "Unable to update FCM Token"]);
        }
    }
}
