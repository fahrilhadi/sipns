<?php

namespace App\Http\Controllers;

use App\Models\TempatTugas;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;

class DutyStationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tempatTugas = TempatTugas::latest()->get();
        return view('duty-station.index', compact('tempatTugas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('duty-station.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_tempat' => ['required', 'string', 'max:100'],
        ], [
            'nama_tempat.required' => 'Masukkan nama tempat tugas!',
        ]);

        $tempatTugas = TempatTugas::create([
            'nama_tempat' => $request->nama_tempat,
        ]);

        event(new Registered($tempatTugas));

        // toastr notification
        $notification = array (
            'message' => 'Data berhasil ditambahkan!',
            'alert-type' => 'success'
        );

        return redirect()->route('user.duty-station.index')->with($notification);
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
        $tempatTugas = TempatTugas::findOrFail($id);
        return view('duty-station.edit', compact('tempatTugas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // validate form
        $request->validate([
            'nama_tempat' => ['required', 'string', 'max:100'],
        ],[
            'nama_tempat.required' => 'Masukkan nama tempat tugas!',
        ]);

        // Temukan tempat tugas berdasarkan ID
        $tempatTugas = TempatTugas::findOrFail($id);

        // Data untuk diupdate
        $tempatTugas->update([
            'nama_tempat' => $request->nama_tempat,
        ]);

        // toastr notification
        $notification = array (
            'message' => 'Data berhasil diubah!',
            'alert-type' => 'success'
        );

        // redirect back
        return redirect()->route('user.duty-station.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Cari tempat tugas berdasarkan ID
        $tempatTugas = TempatTugas::findOrFail($id);

        // Cek apakah tempat tugas ini masih dipakai oleh pegawai
        if ($tempatTugas->pegawai()->count() > 0) {
            // Jika masih digunakan, tampilkan pesan error
            $notification = [
                'message' => 'Tidak dapat menghapus tempat tugas karena masih digunakan oleh data pegawai!',
                'alert-type' => 'error'
            ];

            return redirect()->route('user.duty-station.index')->with($notification);
        }

        // Jika tidak digunakan, hapus
        $tempatTugas->delete();

        // Toastr notification
        $notification = [
            'message' => 'Data berhasil dihapus!',
            'alert-type' => 'success'
        ];

        return redirect()->route('user.duty-station.index')->with($notification);
    }
}
