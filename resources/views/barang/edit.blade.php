@extends('layouts.app')

@section('title', 'Edit Barang')

@section('content')

<style>
    .header {
        margin-bottom: 25px;
        max-width: 900px;
        margin-left: auto;
        margin-right: auto;
    }

    .header h2 {
        margin: 0;
        font-size: 25px;
        font-weight: 600;
    }

    .header p {
        margin: 5px 0 0;
        color: #777;
        font-size: 14px;
    }

    .form-card {
        background: white;
        border-radius: 10px;
        padding: 30px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        width: 100%;
        max-width: 900px;
        margin: 0 auto;
        box-sizing: border-box;
    }

    .form-title {
        font-size: 25px;
        font-weight: 600;
        margin-bottom: 25px;
        color: #172033;
    }

    .mb-3,
    .mb-4 {
        margin-bottom: 18px !important;
    }

    .form-label {
        display: block;
        margin-bottom: 7px;
        font-size: 14px;
        font-weight: 600;
    }

    .form-control {
        width: 100%;
        padding: 10px 12px;
        border: 1px solid #ddd;
        border-radius: 6px;
        font-size: 14px;
        box-sizing: border-box;
        font-family: inherit;
    }

    .form-control:focus {
        outline: none;
        border-color: #0d6efd;
        box-shadow: none;
    }

    .btn-simpan {
        background: #0d6efd;
        color: white;
        border: none;
        padding: 10px 18px;
        border-radius: 6px;
        cursor: pointer;
        font-size: 14px;
        text-decoration: none;
    }

    .btn-simpan:hover {
        background: #0b5ed7;
    }

    .btn-kembali {
        background: #6c757d;
        color: white;
        padding: 10px 18px;
        border-radius: 6px;
        text-decoration: none;
        font-size: 14px;
    }

    .btn-kembali:hover {
        background: #5c636a;
        color: white;
    }

    @media (max-width: 950px) {
        .form-card,
        .header {
            max-width: 100%;
        }
    }
</style>

<div class="header">
    <h2>Edit Barang</h2>
    <p>Perbarui data barang yang tersimpan di dalam sistem</p>
</div>

<div class="form-card">

    <div class="form-title">
        ✏️ Edit Barang
    </div>

    <form action="{{ route('barang.update', $barang->id_barang) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Kode Barang</label>

            <input
                type="text"
                name="kode_barang"
                class="form-control"
                value="{{ old('kode_barang', $barang->kode_barang) }}"
                required
            >
        </div>

        <div class="mb-3">
            <label class="form-label">Nama Barang</label>

            <input
                type="text"
                name="nama_barang"
                class="form-control"
                value="{{ old('nama_barang', $barang->nama_barang) }}"
                required
            >
        </div>

        <div class="mb-3">
            <label class="form-label">Jumlah</label>

            <input
                type="number"
                name="jumlah"
                class="form-control"
                value="{{ old('jumlah', $barang->jumlah) }}"
                min="1"
                required
            >
        </div>

        <div class="mb-3">
            <label class="form-label">Tanggal Beli</label>

            <input
                type="date"
                name="tanggal_beli"
                class="form-control"
                value="{{ old('tanggal_beli', $barang->tanggal_beli) }}"
            >
        </div>

        <div class="mb-4">
            <label class="form-label">Harga Beli</label>

            <input
                type="number"
                name="harga_beli"
                class="form-control"
                value="{{ old('harga_beli', $barang->harga_beli) }}"
                min="0"
            >
        </div>

        <button type="submit" class="btn-simpan">
            💾 Update
        </button>

        <a href="{{ route('barang.index') }}" class="btn-kembali ms-2">
            Kembali
        </a>

    </form>

</div>

@endsection