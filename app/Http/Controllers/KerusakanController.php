<?php

namespace App\Http\Controllers;

use App\Models\Kerusakan;
use Illuminate\Http\Request;

class KerusakanController extends Controller
{
    public function index()
    {
        $kerusakans = Kerusakan::all();
        return view('kerusakan.index', compact('kerusakans'));
    }

    public function create()
    {
        return view('kerusakan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required',
            'jenis_kerusakan' => 'required',
            'tanggal_kerusakan' => 'required|date',
            'status' => 'required',
            'keterangan' => 'nullable',
        ]);

        Kerusakan::create($request->all());

        return redirect()
            ->route('kerusakan.index')
            ->with('success', 'Data kerusakan berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $kerusakan = Kerusakan::findOrFail($id);
        return view('kerusakan.edit', compact('kerusakan'));
    }

    public function update(Request $request, $id)
    {
        $kerusakan = Kerusakan::findOrFail($id);

        $request->validate([
            'nama_barang' => 'required',
            'jenis_kerusakan' => 'required',
            'tanggal_kerusakan' => 'required|date',
            'status' => 'required',
            'keterangan' => 'nullable',
        ]);

        $kerusakan->update($request->all());

        return redirect()
            ->route('kerusakan.index')
            ->with('success', 'Data kerusakan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $kerusakan = Kerusakan::findOrFail($id);
        $kerusakan->delete();

        return redirect()
            ->route('kerusakan.index')
            ->with('success', 'Data kerusakan berhasil dihapus!');
    }
}