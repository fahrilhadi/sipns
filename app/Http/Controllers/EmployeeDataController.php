<?php

namespace App\Http\Controllers;

use App\Models\Agama;
use App\Models\Eselon;
use App\Models\Jabatan;
use App\Models\Pegawai;
use App\Models\Golongan;
use PDF;
use App\Models\UnitKerja;
use App\Models\TempatTugas;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Storage;

class EmployeeDataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Ambil semua unit kerja untuk dropdown filter
        $unitKerjas = UnitKerja::all();

        // Ambil unit kerja yang dipilih (kalau ada)
        $unitKerjaId = $request->input('unit_kerja_id');

        // Query pegawai
        $pegawais = Pegawai::with(['agama', 'golongan', 'eselon', 'jabatan', 'unitKerja', 'tempatTugas'])
            ->when($unitKerjaId, function ($query, $unitKerjaId) {
                return $query->where('unit_kerja_id', $unitKerjaId);
            })
            ->get();

        return view('employee-data.index', compact('pegawais', 'unitKerjas', 'unitKerjaId'));
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
        $pegawai = Pegawai::findOrFail($id);

        $agamas = Agama::all();
        $golongans = Golongan::all();
        $eselons = Eselon::all();
        $jabatans = Jabatan::all();
        $unitKerjas = UnitKerja::all();
        $tempatTugas = TempatTugas::all();

        return view('employee-data.edit', compact(
            'pegawai',
            'agamas',
            'golongans',
            'eselons',
            'jabatans',
            'unitKerjas',
            'tempatTugas'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pegawai = Pegawai::findOrFail($id);
        
        $request->validate([
            'nip' => ['required', 'string', 'max:20', 'unique:pegawais,nip,' . $pegawai->id],
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

        // check if photo is uploaded
        if ($request->hasFile('foto')) {

            // upload new photo
            $foto = $request->file('foto');
            $foto->storeAs('pegawai/foto', $foto->hashName());

            // delete old photo
            Storage::delete('pegawai/foto/'.$pegawai->foto);

            // update employee data with new photo
            $pegawai->update([
                'foto' => $foto->hashName(),
                'nip' => $request->nip,
                'nama' => $request->nama,
                'tempat_lahir' => $request->tempat_lahir,
                'tgl_lahir' => $request->tgl_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'alamat' => $request->alamat,
                'no_hp' => $request->no_hp,
                'npwp' => $request->npwp,
                'agama_id' => $request->agama_id,
                'golongan_id' => $request->golongan_id,
                'eselon_id' => $request->eselon_id,
                'jabatan_id' => $request->jabatan_id,
                'unit_kerja_id' => $request->unit_kerja_id,
                'tempat_tugas_id' => $request->tempat_tugas_id,
            ]);

        } else {

            // update employee data without photo
            $pegawai->update([
                'nip' => $request->nip,
                'nama' => $request->nama,
                'tempat_lahir' => $request->tempat_lahir,
                'tgl_lahir' => $request->tgl_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'alamat' => $request->alamat,
                'no_hp' => $request->no_hp,
                'npwp' => $request->npwp,
                'agama_id' => $request->agama_id,
                'golongan_id' => $request->golongan_id,
                'eselon_id' => $request->eselon_id,
                'jabatan_id' => $request->jabatan_id,
                'unit_kerja_id' => $request->unit_kerja_id,
                'tempat_tugas_id' => $request->tempat_tugas_id,
            ]);
        }

        // toastr notification
        $notification = array (
            'message' => 'Data berhasil diubah!',
            'alert-type' => 'success'
        );

        return redirect()->route('user.employee-list.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //get pegawai by ID
        $pegawai = Pegawai::findOrFail($id);

        //delete pegawai
        $pegawai->delete();

        // toastr notification
        $notification = array (
            'message' => 'Data berhasil dihapus!',
            'alert-type' => 'success'
        );

        return redirect()->route('user.employee-list.index')->with($notification);
    }
}
