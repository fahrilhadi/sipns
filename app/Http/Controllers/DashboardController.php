<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\Pegawai;
use App\Models\TempatTugas;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPegawais = Pegawai::count();
        $totalJabatans = Jabatan::count();
        $totalTempatTugas = TempatTugas::count();
        return view('dashboard.index', compact('totalPegawais','totalJabatans','totalTempatTugas'));
    }
}
