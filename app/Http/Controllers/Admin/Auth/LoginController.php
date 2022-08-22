<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/shop.dashboard';

    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function showLoginForm()
    {

        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $admin = Admin::where(['email' => $request->email])->first();

        if (!$admin){
            return redirect()->back()->with('error', 'Access Denied! Invalid username and password');
        }

         $request->validate([
             'email' => 'required|string',
             'password' => 'required|string'
         ]);

        if(Auth::guard('admin')->attempt(['email'=>$request->email, 'password'=>$request->password], $request->remember)){

            return redirect()->route('admin.dashboard')->with('success', 'Logged In Successfully');
        }
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }

    protected function loggedOut(Request $request)
    {
//        dd($request->toArray());
        return redirect(route('admin.login'));
    }
}
