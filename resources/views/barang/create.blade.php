@extends('layouts.app')

@section('title', 'Tambah Barang')

@section('content')

<style>
    .form-card {
        background: white;
        border-radius: 14px;
        padding: 30px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06);
        border: 1px solid #e5e7eb;
        max-width: 700px;
        margin: auto;
    }

    .form-header {
        margin-bottom: 25px;
    }

    .form-header h1 {
        font-size: 28px;
        color: #111827;
        margin-bottom: 6px;
    }

    .form-header p {
        color: #6b7280;
        font-size: 14px;
    }

    .form-title {
        font-size: 18px;
        font-weight: bold;
        color: #111827;
        margin-bottom: 25px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-label {
        display: block;
        margin-bottom: 8px;
        font-size: 14px;
        font-weight: bold;
        color: #374151;
    }

    .form-control {
        width: 100%;
        padding: 12px 14px;
        border: 1px solid #d1d5db;
        border-radius: 8px;
        font-size: 14px;
        color: #374151;
        background: white;
        outline: none;
        transition: 0.2s;
    }

    .form-control:focus {
        border-color: #2563eb;
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
    }

    .error {
        color: #dc2626;
        font-size: 13px;
        margin-top: 5px;
    }

    .buttons {
        display: flex;
        justify-content: flex-end;
        gap: 10px;
        margin-top: 30px;
    }

    .btn {
        padding: 11px 18px;
        border-radius: 8px;
        font-size: 14px;
        font-weight: bold;
        text-decoration: none;
        border: none;
        cursor: pointer;
    }

    .btn-simpan {
        background: #2563eb;
        color: white;
    }

    .btn-simpan:hover {
        background: #1d4ed8;
    }

    .btn-kembali {
        background: #f1f5f9;
        color: #475569;
    }

    .btn-kembali:hover {
        background: #e2e8f0;
    }

    @media (max-width: 700px) {
        .form-card {
            padding: 20px;
        }

        .buttons {
            flex-direction: column-reverse;
        }

        .btn {
            width: 100%;
            text-align: center;
        }
    }
</style>

<div class="form-card">

    <div class="form-header">
        <h1>📦 Tambah Barang</h1>
        <p>Tambahkan data barang baru ke dalam sistem.</p>
    </div>

    <div class="form-title">
        Informasi Barang
    </div>

    <form action="{{ route('barang.store') }}" method="POST">

        @csrf

        <!-- KODE BARANG -->
        <div class="form-group">
            <label for="kode_barang" class="form-label">
                Kode Barang
            </label>

            <input
                type="text"
                id="kode_barang"
                name="kode_barang"
                class="form-control"
                value="{{ old('kode_barang') }}"
                placeholder="Contoh: BRG-001"
                required
            >

            @error('kode_barang')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <!-- NAMA BARANG -->
        <div class="form-group">
            <label for="nama_barang" class="form-label">
                Nama Barang
            </label>

            <input
                type="text"
                id="nama_barang"
                name="nama_barang"
                class="form-control"
                value="{{ old('nama_barang') }}"
                placeholder="Contoh: Meja"
                required
            >

            @error('nama_barang')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <!-- KATEGORI -->
        <div class="form-group">
            <label for="category_id" class="form-label">
                Kategori
            </label>

            <select
                name="category_id"
                id="category_id"
                class="form-control"
                required
            >
                <option value="">-- Pilih Kategori --</option>

                @foreach($categories as $category)
                    <option
                        value="{{ $category->id }}"
                        {{ old('category_id') == $category->id ? 'selected' : '' }}
                    >
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>

            @error('category_id')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <!-- JUMLAH -->
        <div class="form-group">
            <label for="jumlah" class="form-label">
                Jumlah
            </label>

            <input
                type="number"
                id="jumlah"
                name="jumlah"
                class="form-control"
                value="{{ old('jumlah') }}"
                placeholder="Masukkan jumlah barang"
                min="1"
                required
            >

            @error('jumlah')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <!-- TANGGAL BELI -->
        <div class="form-group">
            <label for="tanggal_beli" class="form-label">
                Tanggal Pembelian
            </label>

            <input
                type="date"
                id="tanggal_beli"
                name="tanggal_beli"
                class="form-control"
                value="{{ old('tanggal_beli') }}"
                required
            >

            @error('tanggal_beli')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <!-- HARGA BELI -->
        <div class="form-group">
            <label for="harga_beli" class="form-label">
                Harga Beli
            </label>

            <input
                type="number"
                id="harga_beli"
                name="harga_beli"
                class="form-control"
                value="{{ old('harga_beli') }}"
                placeholder="Contoh: 500000"
                min="0"
                required
            >

            @error('harga_beli')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <!-- BUTTON -->
        <div class="buttons">

            <a
                href="{{ route('barang.index') }}"
                class="btn btn-kembali"
            >
                ← Kembali
            </a>

            <button
                type="submit"
                class="btn btn-simpan"
            >
                ✓ Simpan Barang
            </button>

        </div>

    </form>

</div>

@endsection