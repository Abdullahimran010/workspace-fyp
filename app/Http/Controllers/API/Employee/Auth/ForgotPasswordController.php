<?php

namespace App\Http\Controllers\API\Employee\Auth;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Mail\VerificationCode;
use App\VerifyCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class ForgotPasswordController extends Controller
{
    public function sendCodeToEmail(Request $request)
    {
        $employee = Employee::where('email', $request->email)->first();
        if ($employee)
        {
            $str = Str::random(4);
            $code = VerifyCode::create([
                'employee_id' => $employee->id,
                'email' => $employee->email,
                'code' => $str,
            ]);
            Mail::to($employee)->send(new VerificationCode($str,$employee));
            return response()->json(['success' => $str]);
        }else
            return response()->json(['error' => 'Invalid Email']);
    }

    public function verifyCode(Request $request)
    {
        $row = VerifyCode::where('code', $request->code)->first();
        if ($row) {
            $row->delete();
            return response()->json(['success' => 'yes']);
        }else
            return response()->json(['error' => 'no']);
    }

    public function resetPassword(Request $request)
    {
        // return response()->json(['email' => $request->email, "password" => $request->password]);
        $employee = Employee::where('email', $request->email)->first();
        if ($employee) {
            $employee->update([
                'password' => Hash::make($request->password),
                ]);
            return response()->json(['success' => 'Password reset successfully']);
        }else
            return response()->json(['error' => 'Unable to reset password']);
    }
}
