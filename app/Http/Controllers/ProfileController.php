<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id = Auth::user()->id;
        $Profile = User::findOrFail($id);
        return view('profile.index', compact('Profile'));
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
            'name' => 'required',
            'email' => 'required|email:users',
            'photo' => 'image|mimes:jpeg,jpg,png|max:2048'
        ]);

        // get user by ID
        $id = Auth::user()->id;
        $Profile = User::findOrFail($id);

        // check if photo is uploaded
        if ($request->hasFile('photo')) {

            // upload new photo
            $photo = $request->file('photo');
            $photo->storeAs('public/profile', $photo->hashName());

            // delete old photo
            Storage::delete('public/profile/'.$Profile->photo);

            // update guru profile with new photo
            $Profile->update([
                'photo' => $photo->hashName(),
                'name' => $request->name,
                'email' => $request->email,
            ]);

        } else {

            // update guru profile without photo
            $Profile->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);
        }

        // toastr notification
        $notification = array (
            'message' => 'Profil berhasil diubah!',
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
