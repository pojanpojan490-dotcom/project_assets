@extends('layouts.app')

@section('title', 'Edit Stok')

@section('content')

<style>

    .form-card {
        background: white;
        max-width: 700px;
        padding: 30px;
        border-radius: 14px;
        border: 1px solid #e5e7eb;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06);
    }

    .form-header {
        margin-bottom: 25px;
    }

    .form-header h1 {
        font-size: 25px;
        color: #111827;
        margin-bottom: 6px;
    }

    .form-header p {
        color: #6b7280;
        font-size: 14px;
    }

    .form-group {
        margin-bottom: 18px;
    }

    .form-group label {
        display: block;
        margin-bottom: 7px;
        font-weight: bold;
        color: #374151;
        font-size: 14px;
    }

    .form-control {
        width: 100%;
        padding: 11px 13px;
        border: 1px solid #d1d5db;
        border-radius: 8px;
        outline: none;
    }

    .form-control:focus {
        border-color: #2563eb;
    }

    .btn-update {
        background: #2563eb;
        color: white;
        border: none;
        padding: 11px 18px;
        border-radius: 8px;
        font-weight: bold;
        cursor: pointer;
    }

    .btn-kembali {
        background: #f1f5f9;
        color: #475569;
        text-decoration: none;
        padding: 11px 18px;
        border-radius: 8px;
        font-weight: bold;
        margin-left: 8px;
    }

</style>


<div class="form-card">

    <div class="form-header">

        <h1>✏ Edit Stok</h1>

        <p>
            Ubah data stok barang.
        </p>

    </div>


    <form action="{{ route('stok.update', $stok->id) }}" method="POST">

        @csrf

        @method('PUT')


        <div class="form-group">

            <label>Nama Barang</label>

            <input
                type="text"
                name="nama_barang"
                class="form-control"
                value="{{ old('nama_barang', $stok->nama_barang) }}"
                required
            >

        </div>


        <div class="form-group">

            <label>Stok Masuk</label>

            <input
                type="number"
                name="stok_masuk"
                class="form-control"
                value="{{ old('stok_masuk', $stok->stok_masuk) }}"
                min="0"
                required
            >

        </div>


        <div class="form-group">

            <label>Stok Keluar</label>

            <input
                type="number"
                name="stok_keluar"
                class="form-control"
                value="{{ old('stok_keluar', $stok->stok_keluar) }}"
                min="0"
                required
            >

        </div>


        <button type="submit" class="btn-update">
            💾 Update
        </button>

        <a href="{{ route('stok.index') }}" class="btn-kembali">
            Kembali
        </a>

    </form>

</div>

@endsection