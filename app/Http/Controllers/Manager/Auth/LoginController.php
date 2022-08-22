<?php

namespace App\Http\Controllers\Manager\Auth;

use App\Http\Controllers\Controller;
use App\Models\Manager;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/manager.dashboard';

    public function __construct()
    {
        $this->middleware('guest:manager')->except('logout');
    }

    public function showLoginForm()
    {

        return view('manager.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        $manager = Manager::where(['email' => $request->email])->first();

        if (!$manager){
            return redirect()->back()->with('error', 'Access Denied! Invalid username and password');
        }

        if ($manager->status == 1) {
            if(Auth::guard('manager')->attempt(['email'=>$request->email, 'password'=>$request->password], $request->remember)){
                return redirect()->route('manager.dashboard')->with('success', 'Logged In Successfully');
            }
        } else return redirect()->back()->with('warning', 'Your account is de-activated.');

        // if(Auth::guard('manager')->attempt(['email'=>$request->email, 'password'=>$request->password], $request->remember)){

        //     return redirect()->route('manager.dashboard')->with('success', 'Logged In Successfully');
        // }
        // return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    protected function guard()
    {
        return Auth::guard('manager');
    }

    protected function loggedOut(Request $request)
    {
//        dd($request->toArray());
        return redirect(route('manager.login'));
    }
}
