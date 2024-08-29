<?php

namespace App\Http\Controllers;

use App\Models\DataLansia;
use Illuminate\Http\Request;

class DataLansiaController extends Controller
{
    public function index()
    {
        $dataLansia = DataLansia::all();
        return view('admin.datalansia.index', compact('dataLansia'));
    }

    public function create()
    {
        return view('admin.data_lansia.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'nullable|string|max:255',
            'umur' => 'nullable|string|max:255',
            'kemampuan_berjalan' => 'nullable|string|max:255',
            'riwayat_penyakit' => 'nullable|string|max:255',
            'jumlah_anggota_keluarga' => 'nullable|string|max:255',
            'status_pekerjaan' => 'nullable|string|max:255',
            'penghasilan_perbulan' => 'nullable|string|max:255',
        ]);

        DataLansia::create($request->all());

        return redirect()->route('data_lansia.index')
                         ->with('success', 'Data lansia berhasil ditambahkan.');
    }

    public function show($id)
    {
        $lansia = DataLansia::findOrFail($id);
        return view('admin.data_lansia.show', compact('lansia'));
    }

    public function edit($id)
    {
        $lansia = DataLansia::findOrFail($id);
        return view('admin.data_lansia.edit', compact('lansia'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'nullable|string|max:255',
            'umur' => 'nullable|string|max:255',
            'kemampuan_berjalan' => 'nullable|string|max:255',
            'riwayat_penyakit' => 'nullable|string|max:255',
            'jumlah_anggota_keluarga' => 'nullable|string|max:255',
            'status_pekerjaan' => 'nullable|string|max:255',
            'penghasilan_perbulan' => 'nullable|string|max:255',
        ]);

        $lansia = DataLansia::findOrFail($id);
        $lansia->update($request->all());

        return redirect()->route('data_lansia.index')
                         ->with('success', 'Data lansia berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $lansia = DataLansia::findOrFail($id);
        $lansia->delete();

        return redirect()->route('data_lansia.index')
                         ->with('success', 'Data lansia berhasil dihapus.');
    }
}
