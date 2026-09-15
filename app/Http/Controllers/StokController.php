<?php

namespace App\Http\Controllers;

use App\Models\Stok;
use Illuminate\Http\Request;

class StokController extends Controller
{
    public function index()
    {
        $stoks = Stok::all();

        return view('stok.index', compact('stoks'));
    }

    public function create()
    {
        return view('stok.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required',
            'stok_masuk' => 'required|integer|min:0',
            'stok_keluar' => 'required|integer|min:0',
        ]);

        $stok_tersedia = $request->stok_masuk - $request->stok_keluar;

        Stok::create([
            'nama_barang' => $request->nama_barang,
            'stok_masuk' => $request->stok_masuk,
            'stok_keluar' => $request->stok_keluar,
            'stok_tersedia' => $stok_tersedia,
        ]);

        return redirect()
            ->route('stok.index')
            ->with('success', 'Data stok berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $stok = Stok::findOrFail($id);

        return view('stok.edit', compact('stok'));
    }

    public function update(Request $request, $id)
    {
        $stok = Stok::findOrFail($id);

        $request->validate([
            'nama_barang' => 'required',
            'stok_masuk' => 'required|integer|min:0',
            'stok_keluar' => 'required|integer|min:0',
        ]);

        $stok_tersedia = $request->stok_masuk - $request->stok_keluar;

        $stok->update([
            'nama_barang' => $request->nama_barang,
            'stok_masuk' => $request->stok_masuk,
            'stok_keluar' => $request->stok_keluar,
            'stok_tersedia' => $stok_tersedia,
        ]);

        return redirect()
            ->route('stok.index')
            ->with('success', 'Data stok berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $stok = Stok::findOrFail($id);

        $stok->delete();

        return redirect()
            ->route('stok.index')
            ->with('success', 'Data stok berhasil dihapus!');
    }
}