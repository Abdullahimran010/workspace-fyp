<?php

namespace App\Http\Controllers\API\Employee\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\EmployeeResource;
use App\Models\Employee;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api_employee', ['except' => ['login', 'register']]);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if ($token = $this->guard()->attempt($credentials)) {

            $employee = Employee::where(['email' => $request->email, 'status' => '1'])->first();

            if($employee) {
                return $this->respondWithToken($token);
            } else {
                return response()->json(['error' => 'Your account has been deactivated.'], 401);
            }

        }

        return response()->json(['error' => 'These credentials does not match our records'], 401);
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'emp_id' => 'required|string',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:employees',
            'password' => 'required|string|min:6',
            'rank' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            $a = $validator->getMessageBag()->toArray();
            foreach ($a as $key => $value) {
                $b = $value;
            }
            return response()->json(['error' => $b], 422);
        }
        $employee = Employee::create($request->except('password'));
        $employee->update([
            'password' => Hash::make($request->password),
        ]);

         return new EmployeeResource($employee);
    }

    public function me()
    {
        return response()->json($this->guard()->user());
    }

    public function logout()
    {
        $this->guard()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    public function refresh()
    {
        return $this->respondWithToken($this->guard()->refresh());
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api_employee')->factory()->getTTL() * 3600,
            'employee' => new EmployeeResource(auth('api_employee')->user())
        ]);
    }

    public function guard()
    {
        return Auth::guard('api_employee');
    }
}
