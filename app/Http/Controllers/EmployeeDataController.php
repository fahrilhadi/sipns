<?php

namespace App\Http\Controllers;

use App\Models\Agama;
use App\Models\Eselon;
use App\Models\Jabatan;
use App\Models\Pegawai;
use App\Models\Golongan;
use App\Models\UnitKerja;
use App\Models\TempatTugas;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;

class EmployeeDataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pegawais = Pegawai::latest()->get();
        return view('employee-data.index', compact('pegawais'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $agamas = Agama::all();
        $golongans = Golongan::all();
        $eselons = Eselon::all();
        $jabatans = Jabatan::all();
        $unitKerjas = UnitKerja::all();
        $tempatTugas = TempatTugas::all();

        return view('employee-data.create', compact(
            'agamas',
            'golongans',
            'eselons',
            'jabatans',
            'unitKerjas',
            'tempatTugas'
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nip' => ['required', 'string', 'max:20', 'unique:' . Pegawai::class],
            'nama' => ['required', 'string', 'max:100'],
            'tempat_lahir' => ['required', 'string', 'max:100'],
            'tgl_lahir' => ['required', 'date'],
            'jenis_kelamin' => ['required', 'in:L,P'],
            'photo' => 'image|mimes:jpeg,jpg,png|max:2048',
            'agama_id' => ['required', 'exists:agamas,id'],
            'golongan_id' => ['required', 'exists:golongans,id'],
            'eselon_id' => ['required', 'exists:eselons,id'],
            'jabatan_id' => ['required', 'exists:jabatans,id'],
            'unit_kerja_id' => ['required', 'exists:unit_kerjas,id'],
            'tempat_tugas_id' => ['required', 'exists:tempat_tugas,id'],
        ], [
            'nip.required' => 'Masukkan NIP!',
            'nip.unique' => 'NIP sudah tersedia di database!',
            'nama.required' => 'Masukkan nama pegawai!',
            'tempat_lahir.required' => 'Masukkan tempat lahir!',
            'tgl_lahir.required' => 'Masukkan tanggal lahir!',
            'jenis_kelamin.required' => 'Pilih jenis kelamin!',
            'agama_id.required' => 'Pilih agama!',
            'golongan_id.required' => 'Pilih golongan!',
            'eselon_id.required' => 'Pilih eselon!',
            'jabatan_id.required' => 'Pilih jabatan!',
            'unit_kerja_id.required' => 'Pilih unit kerja!',
            'tempat_tugas_id.required' => 'Pilih tempat tugas!',
        ]);

        $fotoPegawai = null;
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $foto->storeAs('pegawai/foto', $foto->hashName());
            $fotoPegawai = $foto->hashName();
        }

        $pegawai = Pegawai::create([
            'nip' => $request->nip,
            'nama' => $request->nama,
            'tempat_lahir' => $request->tempat_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'npwp' => $request->npwp,
            'foto' => $fotoPegawai,
            'agama_id' => $request->agama_id,
            'golongan_id' => $request->golongan_id,
            'eselon_id' => $request->eselon_id,
            'jabatan_id' => $request->jabatan_id,
            'unit_kerja_id' => $request->unit_kerja_id,
            'tempat_tugas_id' => $request->tempat_tugas_id,
        ]);

        event(new Registered($pegawai));

        // toastr notification
        $notification = array (
            'message' => 'Data berhasil ditambahkan!',
            'alert-type' => 'success'
        );

        return redirect()->route('user.employee-list.index')->with($notification);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
