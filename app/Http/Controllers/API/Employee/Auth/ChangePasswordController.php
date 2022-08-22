<?php

namespace App\Http\Controllers\API\Employee\Auth;

use App\Models\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function changePassword(Request $request)
    {
        $employee = Employee::where('id', $request->employee_id)->first();
        if ($employee) {
            $employee->update([
                'password' => Hash::make($request->password),
            ]);
            return response()->json(['success' => 'Password updated successfully.']);
        }
        else
            return response()->json(['error' => 'Unable to update password. Please try again later.']);
    }
}
