<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function admin_profile()
    {
        return view('backend.profile');
    }

    public function updateProfile(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable',
            'photo' => 'nullable|image|mimes:jpeg,png,gif|max:20000'
        ]);


        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->hasFile('photo')) {
            if ($user->photo != null) {
                $previousImagePath = public_path('public/Image/users/' . $user->photo);

                if (file_exists($previousImagePath)) {
                    unlink($previousImagePath);
                }
            }
            $file = $request->file('photo');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('public/Image/users'), $filename);
            $user->update([
                'photo' => $filename,
            ]);
        }

        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }

    public function updatePassword(Request $request, $id)
    {
        $request->validate([
            'old_password' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (!Hash::check($value, auth()->user()->password)) {
                        return $fail(__('The old password is incorrect.'));
                    }
                },
            ],
            'new_password' => [
                'required',
                'confirmed',
                function ($attribute, $value, $fail) {
                    if (Hash::check($value, auth()->user()->password)) {
                        return $fail(__('The new password cannot be same as the old password.'));
                    }
                },
                'min:8',
            ],
        ]);

        // Validation passed, update the password
        $user = User::findOrFail($id);
        $user->password = Hash::make($request->input('new_password'));
        $user->save();

        return redirect()->back()->with('success', 'Password updated successfully.');
    }
}
