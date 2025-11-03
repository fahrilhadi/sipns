<?php

namespace App\Http\Controllers;

use App\Models\Golongan;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;

class RankController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $golongans = Golongan::latest()->get();
        return view('ranks.index', compact('golongans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ranks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_golongan' => ['required', 'string', 'max:50'],
        ], [
            'nama_golongan.required' => 'Masukkan nama golongan!',
        ]);

        $golongan = Golongan::create([
            'nama_golongan' => $request->nama_golongan,
        ]);

        event(new Registered($golongan));

        // toastr notification
        $notification = array (
            'message' => 'Data berhasil ditambahkan!',
            'alert-type' => 'success'
        );

        return redirect()->route('user.ranks.index')->with($notification);
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
        $golongan = Golongan::findOrFail($id);
        return view('ranks.edit', compact('golongan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // validate form
        $request->validate([
            'nama_golongan' => ['required', 'string', 'max:50'],
        ],[
            'nama_golongan.required' => 'Masukkan nama golongan!',
        ]);

        // Temukan golongan berdasarkan ID
        $golongan = Golongan::findOrFail($id);

        // Data untuk diupdate
        $golongan->update([
            'nama_golongan' => $request->nama_golongan,
        ]);

        // toastr notification
        $notification = array (
            'message' => 'Data berhasil diubah!',
            'alert-type' => 'success'
        );

        // redirect back
        return redirect()->route('user.ranks.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
