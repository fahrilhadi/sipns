<?php

namespace App\Http\Controllers;

use App\Models\Eselon;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;

class EchelonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $eselons = Eselon::latest()->get();
        return view('echelons.index', compact('eselons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('echelons.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_eselon' => ['required', 'string', 'max:10'],
        ], [
            'nama_eselon.required' => 'Masukkan nama eselon!',
        ]);

        $eselon = Eselon::create([
            'nama_eselon' => $request->nama_eselon,
        ]);

        event(new Registered($eselon));

        // toastr notification
        $notification = array (
            'message' => 'Data berhasil ditambahkan!',
            'alert-type' => 'success'
        );

        return redirect()->route('user.echelons.index')->with($notification);
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
        $eselon = Eselon::findOrFail($id);
        return view('echelons.edit', compact('eselon'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // validate form
        $request->validate([
            'nama_eselon' => ['required', 'string', 'max:10'],
        ],[
            'nama_eselon.required' => 'Masukkan nama eselon!',
        ]);

        // Temukan eselon berdasarkan ID
        $eselon = Eselon::findOrFail($id);

        // Data untuk diupdate
        $eselon->update([
            'nama_eselon' => $request->nama_eselon,
        ]);

        // toastr notification
        $notification = array (
            'message' => 'Data berhasil diubah!',
            'alert-type' => 'success'
        );

        // redirect back
        return redirect()->route('user.echelons.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Cari eselon berdasarkan ID
        $eselon = Eselon::findOrFail($id);

        // Cek apakah eselon ini masih dipakai oleh pegawai
        if ($eselon->pegawai()->count() > 0) {
            // Jika masih digunakan, tampilkan pesan error
            $notification = [
                'message' => 'Tidak dapat menghapus eselon karena masih digunakan oleh data pegawai!',
                'alert-type' => 'error'
            ];

            return redirect()->route('user.echelons.index')->with($notification);
        }

        // Jika tidak digunakan, hapus
        $eselon->delete();

        // Toastr notification
        $notification = [
            'message' => 'Data berhasil dihapus!',
            'alert-type' => 'success'
        ];

        return redirect()->route('user.echelons.index')->with($notification);
    }
}
