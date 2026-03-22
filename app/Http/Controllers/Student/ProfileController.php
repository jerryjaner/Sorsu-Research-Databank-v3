<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function index()
    {
        return view('student.profile.index');
    }

public function update(Request $request)
{
    $user = Auth::user();

    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'email' => ['required','email', Rule::unique('users')->ignore($user->id)],
        'password' => $request->filled('password') ? ['required','string','min:8','confirmed'] : 'nullable',
        'image_upload' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    if ($validator->fails()) {
        return back()->withErrors($validator)->withInput();
    }

    DB::beginTransaction();

    try {
        // update basic info
        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        // PROFILE DATA
        $profileData = [];

        // IMAGE UPLOAD
        if ($request->hasFile('image_upload')) {
            $file = $request->file('image_upload');

            // generate filename
            $filename = time().'_'.$file->getClientOriginalName();

            // store
            $file->storeAs('profile-picture/images', $filename, 'public');

            // delete old
            if ($user->profile && $user->profile->profile_picture) {
                Storage::disk('public')->delete('profile-picture/images/'.$user->profile->profile_picture);
            }

            $profileData['profile_picture'] = $filename;
        }

        // SAVE PROFILE
        if (!empty($profileData)) {
            $user->profile()->updateOrCreate(
                ['user_id' => $user->id],
                $profileData
            );
        }

        DB::commit();

        return back()->with([
            'message' => 'Profile updated successfully',
            'alert-type' => 'success'
        ]);

    } catch (\Exception $e) {
        DB::rollBack();

        return back()->with([
            'message' => 'Error: '.$e->getMessage(),
            'alert-type' => 'error'
        ]);
    }
}
}
