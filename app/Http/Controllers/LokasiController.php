<?php

namespace App\Http\Controllers;

use App\Models\Lokasi;
use Illuminate\Http\Request;

class LokasiController extends Controller
{
    // Menampilkan data
    public function index()
    {
        $lokasis = Lokasi::all();

        return view('lokasis.index', compact('lokasis'));
    }

    // Halaman tambah
    public function create()
    {
        return view('lokasis.create');
    }

    // Menyimpan data
    public function store(Request $request)
    {
        $request->validate([
            'nama_lokasi' => 'required',
            'keterangan' => 'nullable',
        ]);

        Lokasi::create($request->all());

        return redirect()->route('lokasis.index')
            ->with('success', 'Lokasi berhasil ditambahkan!');
    }

    // Halaman edit
    public function edit(Lokasi $lokasi)
    {
        return view('lokasis.edit', compact('lokasi'));
    }

    // Update data
    public function update(Request $request, Lokasi $lokasi)
    {
        $request->validate([
            'nama_lokasi' => 'required',
            'keterangan' => 'nullable',
        ]);

        $lokasi->update($request->all());

        return redirect()->route('lokasis.index')
            ->with('success', 'Lokasi berhasil diubah!');
    }

    // Hapus data
    public function destroy(Lokasi $lokasi)
    {
        $lokasi->delete();

        return redirect()->route('lokasis.index')
            ->with('success', 'Lokasi berhasil dihapus!');
    }
}