<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id = Auth::user()->id;
        $ChangePassword = User::findOrFail($id);
        return view('change-password.index', compact('ChangePassword'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // validate form
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed'
        ],[
            'old_password.required' => 'Masukkan password lama Anda!',
            'new_password.required' => 'Masukkan password baru Anda!',
            'new_password.confirmed' => 'Konfirmasi password Anda tidak benar!'
        ]);

        if (!Hash::check($request->old_password, auth::user()->password)) {
            // toastr notification
            $notification = array (
                'message' => 'Password lama tidak sesuai!',
                'alert-type' => 'error'
            );

            // redirect back
            return back()->with($notification);
        }

        $id = Auth::user()->id;
        $ChangePassword = User::findOrFail($id);

        // update new password
        $ChangePassword->update([
            'password' => Hash::make($request->new_password)
        ]);

        // toastr notification
        $notification = array (
            'message' => 'Password berhasil diubah!',
            'alert-type' => 'success'
        );

        // redirect back
        return back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
