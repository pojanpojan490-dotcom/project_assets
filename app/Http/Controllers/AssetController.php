<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asset;

class AssetController extends Controller
{
    // 🔹 TAMPIL DATA
    public function index()
    {
        $assets = Asset::all();
        return view('assets.index', compact('assets'));
    }

    // 🔹 FORM CREATE
    public function create()
    {
        return view('assets.create');
    }

    // 🔹 SIMPAN DATA
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'location' => 'required',
            'purchase_date' => 'required',
            'status' => 'required'
        ]);

        Asset::create($request->only([
            'name',
            'category',
            'location',
            'purchase_date',
            'status'
        ]));

        return redirect('/assets')->with('success', 'Data berhasil ditambahkan!');
    }

    // 🔹 FORM EDIT
    public function edit($id)
    {
        $asset = Asset::findOrFail($id);
        return view('assets.edit', compact('asset'));
    }

    // 🔹 UPDATE DATA
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'location' => 'required',
            'purchase_date' => 'required',
            'status' => 'required'
        ]);

        $asset = Asset::findOrFail($id);

        $asset->update($request->only([
            'name',
            'category',
            'location',
            'purchase_date',
            'status'
        ]));

        return redirect('/assets')->with('success', 'Data berhasil diupdate!');
    }

    // 🔹 HAPUS DATA
    public function destroy($id)
    {
        $asset = Asset::findOrFail($id);
        $asset->delete();

        return redirect('/assets')->with('success', 'Data berhasil dihapus!');
    }
}