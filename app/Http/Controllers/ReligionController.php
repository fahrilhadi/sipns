<?php

namespace App\Http\Controllers;

use App\Models\Agama;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;

class ReligionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $agamas = Agama::latest()->get();
        return view('religions.index', compact('agamas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('religions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_agama' => ['required', 'string', 'max:50'],
        ], [
            'nama_agama.required' => 'Masukkan nama agama!',
        ]);

        $agama = Agama::create([
            'nama_agama' => $request->nama_agama,
        ]);

        event(new Registered($agama));

        // toastr notification
        $notification = array (
            'message' => 'Data berhasil ditambahkan!',
            'alert-type' => 'success'
        );

        return redirect()->route('user.religions.index')->with($notification);
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
        $agama = Agama::findOrFail($id);
        return view('religions.edit', compact('agama'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // validate form
        $request->validate([
            'nama_agama' => ['required', 'string', 'max:50'],
        ],[
            'nama_agama.required' => 'Masukkan nama agama!',
        ]);

        // Temukan agama berdasarkan ID
        $agama = Agama::findOrFail($id);

        // Data untuk diupdate
        $agama->update([
            'nama_agama' => $request->nama_agama,
        ]);

        // toastr notification
        $notification = array (
            'message' => 'Data berhasil diubah!',
            'alert-type' => 'success'
        );

        // redirect back
        return redirect()->route('user.religions.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //get agama by ID
        $agama = Agama::findOrFail($id);

        //delete agama
        $agama->delete();

        // toastr notification
        $notification = array (
            'message' => 'Data berhasil dihapus!',
            'alert-type' => 'success'
        );

        //redirect to index
        return redirect()->route('user.religions.index')->with($notification);
    }
}
