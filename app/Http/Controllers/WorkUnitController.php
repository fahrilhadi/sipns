<?php

namespace App\Http\Controllers;

use App\Models\UnitKerja;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;

class WorkUnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $unitkerjas = UnitKerja::latest()->get();
        return view('work-unit.index', compact('unitkerjas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('work-unit.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_unit' => ['required', 'string', 'max:100'],
        ], [
            'nama_unit.required' => 'Masukkan nama unit kerja!',
        ]);

        $unitkerjas = UnitKerja::create([
            'nama_unit' => $request->nama_unit,
        ]);

        event(new Registered($unitkerjas));

        // toastr notification
        $notification = array (
            'message' => 'Data berhasil ditambahkan!',
            'alert-type' => 'success'
        );

        return redirect()->route('user.work-unit.index')->with($notification);
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
