<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asset;
use App\Models\Category;

class AssetController extends Controller
{
    // TAMPIL DATA
    public function index()
    {
        $assets = Asset::with('category')->get();
        return view('assets.index', compact('assets'));
    }

    // FORM CREATE
    public function create()
    {
        $categories = Category::all();
        return view('assets.create', compact('categories'));
    }

    // SIMPAN DATA
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required|exists:categories,id',
            'purchase_date' => 'required|date',
            'status' => 'required'
        ]);

        Asset::create($request->only([
            'name',
            'category_id',
            'purchase_date',
            'status'
        ]));

        return redirect('/assets')->with('success', 'Data berhasil ditambahkan!');
    }

    // FORM EDIT
    public function edit($id)
    {
        $asset = Asset::findOrFail($id);
        $categories = Category::all();

        return view('assets.edit', compact('asset', 'categories'));
    }

    // UPDATE DATA
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required|exists:categories,id',
            'purchase_date' => 'required|date',
            'status' => 'required'
        ]);

        $asset = Asset::findOrFail($id);

        $asset->update($request->only([
            'name',
            'category_id',
            'purchase_date',
            'status'
        ]));

        return redirect('/assets')->with('success', 'Data berhasil diupdate!');
    }

    // HAPUS DATA
    public function destroy($id)
    {
        $asset = Asset::findOrFail($id);
        $asset->delete();

        return redirect('/assets')->with('success', 'Data berhasil dihapus!');
    }
}