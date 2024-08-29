<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataPosyandu;
use App\Models\DataLansia;

class PosyanduController extends Controller
{
    public function index()
    {
        $dataposyandu = DataPosyandu::with('lansia')->get();
        $datalansia = DataLansia::all();
        return view('admin.perkembanganlansia.posyandu', compact('dataposyandu', 'datalansia'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'lansia_id' => 'required|exists:data_lansia,id',
            'tinggi_badan' => 'required|numeric',
            'berat_badan' => 'required|numeric',
            'lingkar_pinggang' => 'required|numeric',
            'tekanan_darah' => 'required',
            'gula_darah' => 'required',
            'keluhan' => 'nullable',
        ]);

        DataPosyandu::create([
            'lansia_id' => $request->lansia_id,
            'tinggi_badan' => $request->tinggi_badan,
            'berat_badan' => $request->berat_badan,
            'lingkar_pinggang' => $request->lingkar_pinggang,
            'tekanan_darah' => $request->tekanan_darah,
            'gula_darah' => $request->gula_darah,
            'keluhan' => $request->keluhan,
        ]);

        return redirect()->route('posyandu.index')->with('success', 'Data Posyandu berhasil ditambahkan.');
    }

    public function update(Request $request, DataPosyandu $posyandu)
    {
        $request->validate([
            'lansia_id' => 'required|exists:data_lansia,id',
            'tinggi_badan' => 'required|numeric',
            'berat_badan' => 'required|numeric',
            'lingkar_pinggang' => 'required|numeric',
            'tekanan_darah' => 'required',
            'gula_darah' => 'required',
            'keluhan' => 'nullable',
        ]);

        $posyandu->update([
            'lansia_id' => $request->lansia_id,
            'tinggi_badan' => $request->tinggi_badan,
            'berat_badan' => $request->berat_badan,
            'lingkar_pinggang' => $request->lingkar_pinggang,
            'tekanan_darah' => $request->tekanan_darah,
            'gula_darah' => $request->gula_darah,
            'keluhan' => $request->keluhan,
        ]);

        return redirect()->route('posyandu.index')->with('success', 'Data Posyandu berhasil diperbarui.');
    }

    public function destroy(DataPosyandu $posyandu)
    {
        $posyandu->delete();
        return redirect()->route('posyandu.index')->with('success', 'Data Posyandu berhasil dihapus.');
    }
}
