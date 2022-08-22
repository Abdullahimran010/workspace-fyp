<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('manager.profile.index', compact('user'));
    }

    public function edit()
    {
        $user = auth('manager')->user();
        return view('manager.profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = auth('manager')->user();
        $user->update($request->except('avatar', 'password'));
        if($request->password != null || $request->password != "")
        {
            $request->validate([
                'password' => ['string', 'min:8', 'confirmed'],
            ]);
            $user->update(['password' => Hash::make($request->password)]);
        }
        $user->updateAvatar();

        return redirect()->back()->with('success', 'Profile Updated Successfully');
    }
}
