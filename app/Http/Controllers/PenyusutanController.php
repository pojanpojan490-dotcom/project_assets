<?php

namespace App\Http\Controllers;

use App\Models\Penyusutan;
use Illuminate\Http\Request;

class PenyusutanController extends Controller
{
    public function index()
    {
        $penyusutans = Penyusutan::all();

        return view('penyusutan.index', compact('penyusutans'));
    }

    public function create()
    {
        return view('penyusutan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_aset' => 'required',
            'harga_perolehan' => 'required|numeric|min:0',
            'umur_ekonomis' => 'required|integer|min:1',
            'tanggal_penyusutan' => 'required|date',
        ]);

        $nilai_penyusutan = $request->harga_perolehan / $request->umur_ekonomis;
        $nilai_buku = $request->harga_perolehan - $nilai_penyusutan;

        Penyusutan::create([
            'nama_aset' => $request->nama_aset,
            'harga_perolehan' => $request->harga_perolehan,
            'umur_ekonomis' => $request->umur_ekonomis,
            'nilai_penyusutan' => $nilai_penyusutan,
            'nilai_buku' => $nilai_buku,
            'tanggal_penyusutan' => $request->tanggal_penyusutan,
        ]);

        return redirect()
            ->route('penyusutan.index')
            ->with('success', 'Data penyusutan berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $penyusutan = Penyusutan::findOrFail($id);

        return view('penyusutan.edit', compact('penyusutan'));
    }

    public function update(Request $request, $id)
    {
        $penyusutan = Penyusutan::findOrFail($id);

        $request->validate([
            'nama_aset' => 'required',
            'harga_perolehan' => 'required|numeric|min:0',
            'umur_ekonomis' => 'required|integer|min:1',
            'tanggal_penyusutan' => 'required|date',
        ]);

        $nilai_penyusutan = $request->harga_perolehan / $request->umur_ekonomis;
        $nilai_buku = $request->harga_perolehan - $nilai_penyusutan;

        $penyusutan->update([
            'nama_aset' => $request->nama_aset,
            'harga_perolehan' => $request->harga_perolehan,
            'umur_ekonomis' => $request->umur_ekonomis,
            'nilai_penyusutan' => $nilai_penyusutan,
            'nilai_buku' => $nilai_buku,
            'tanggal_penyusutan' => $request->tanggal_penyusutan,
        ]);

        return redirect()
            ->route('penyusutan.index')
            ->with('success', 'Data penyusutan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $penyusutan = Penyusutan::findOrFail($id);

        $penyusutan->delete();

        return redirect()
            ->route('penyusutan.index')
            ->with('success', 'Data penyusutan berhasil dihapus!');
    }
}