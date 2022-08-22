<?php

namespace App\Http\Controllers\Manager\Auth;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/employee.dashboard';

    public function __construct()
    {
        $this->middleware('guest:employee')->except('logout');
    }

    public function showLoginForm()
    {

        return view('employee.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        $employee = Employee::where(['email' => $request->email])->first();

        if (!$employee){
            return redirect()->back()->with('error', 'Access Denied! Invalid username and password');
        }

        if ($employee->status == 1) {
            if(Auth::guard('employee')->attempt(['email'=>$request->email, 'password'=>$request->password], $request->remember)){
                return redirect()->route('employee.dashboard')->with('success', 'Logged In Successfully');
            }
        } else return redirect()->back()->with('warning', 'Your account is de-activated.');

        // if(Auth::guard('manager')->attempt(['email'=>$request->email, 'password'=>$request->password], $request->remember)){

        //     return redirect()->route('manager.dashboard')->with('success', 'Logged In Successfully');
        // }
        // return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    protected function guard()
    {
        return Auth::guard('employee');
    }

    protected function loggedOut(Request $request)
    {
//        dd($request->toArray());
        return redirect(route('employee.login'));
    }
}
