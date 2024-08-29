<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DaftarHadir;
use App\Models\DataLansia;

class DaftarhadirController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $daftarHadir = DaftarHadir::with('lansia')->get();
        $dataLansia = DataLansia::all(); // Pastikan data lansia diambil dari database
        return view('admin.perkembanganlansia.daftarhadir', compact('daftarHadir', 'dataLansia'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'lansia_id' => 'required|exists:data_lansia,id',
            'tanggal_kehadiran' => 'required|date',
            'status_kehadiran' => 'required|string',
        ]);

        DaftarHadir::create($request->all());

        return redirect()->route('daftarhadir.index')->with('success', 'Data Daftar Hadir berhasil ditambahkan.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DaftarHadir $daftarHadir)
    {
        $request->validate([
            'lansia_id' => 'required|exists:data_lansia,id',
            'tanggal_kehadiran' => 'required|date',
            'status_kehadiran' => 'required|string',
        ]);

        $daftarHadir->update($request->all());

        return redirect()->route('daftarhadir.index')->with('success', 'Data Daftar Hadir berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DaftarHadir $daftarHadir)
    {
        $daftarHadir->delete();
        return redirect()->route('daftarhadir.index')->with('success', 'Data Daftar Hadir berhasil dihapus.');
    }
}
