<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Category;

class BarangController extends Controller
{
    public function index()
    {
        $barangs = Barang::with('category')->get();
        return view('barang.index', compact('barangs'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('barang.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_barang' => 'required|unique:barangs,kode_barang',
            'nama_barang' => 'required',
            'category_id' => 'required|exists:categories,id',
            'jumlah' => 'required|integer|min:1',
            'tanggal_beli' => 'nullable|date',
            'harga_beli' => 'nullable|numeric|min:0',
        ]);

        Barang::create($request->only([
            'kode_barang',
            'nama_barang',
            'category_id',
            'jumlah',
            'tanggal_beli',
            'harga_beli',
        ]));

        return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        $categories = Category::all();

        return view('barang.edit', compact('barang', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_barang' => 'required|unique:barangs,kode_barang,' . $id . ',id_barang',
            'nama_barang' => 'required',
            'category_id' => 'required|exists:categories,id',
            'jumlah' => 'required|integer|min:1',
            'tanggal_beli' => 'nullable|date',
            'harga_beli' => 'nullable|numeric|min:0',
        ]);

        $barang = Barang::findOrFail($id);

        $barang->update($request->only([
            'kode_barang',
            'nama_barang',
            'category_id',
            'jumlah',
            'tanggal_beli',
            'harga_beli',
        ]));

        return redirect()->route('barang.index')->with('success', 'Barang berhasil diupdate!');
    }

    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();

        return redirect()->route('barang.index')->with('success', 'Barang berhasil dihapus!');
    }
}