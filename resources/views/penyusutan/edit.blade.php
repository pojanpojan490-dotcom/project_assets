@extends('layouts.app')

@section('title', 'Edit Penyusutan')

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

    .card {
        background: white;
        border-radius: 10px;
        padding: 30px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);

        /* Lebih lebar dan posisi di tengah */
        width: 100%;
        max-width: 900px;
        margin: 0 auto;

        box-sizing: border-box;
    }

    .form-group {
        margin-bottom: 18px;
    }

    label {
        display: block;
        margin-bottom: 7px;
        font-size: 14px;
        font-weight: 600;
    }

    input {
        width: 100%;
        padding: 10px 12px;
        border: 1px solid #ddd;
        border-radius: 6px;
        font-size: 14px;
        box-sizing: border-box;
        font-family: inherit;
    }

    input:focus {
        outline: none;
        border-color: #0d6efd;
    }

    .button-group {
        display: flex;
        gap: 10px;
        margin-top: 20px;
    }

    .btn-update {
        background: #0d6efd;
        color: white;
        border: none;
        padding: 10px 18px;
        border-radius: 6px;
        cursor: pointer;
        font-size: 14px;
    }

    .btn-update:hover {
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
    }

    .error {
        color: #dc3545;
        font-size: 13px;
        margin-top: 5px;
    }

    .info {
        background: #f8f9fa;
        padding: 12px;
        border-radius: 6px;
        color: #666;
        font-size: 13px;
        margin-bottom: 20px;
    }

    /* Responsive */
    @media (max-width: 950px) {
        .card,
        .header {
            max-width: 100%;
        }
    }
</style>

<div class="header">
    <h2>Edit Penyusutan</h2>
    <p>Perbarui data penyusutan aset</p>
</div>

<div class="card">

    <div class="info">
        Nilai penyusutan dan nilai buku akan dihitung ulang setelah data diperbarui.
    </div>

    <form action="{{ route('penyusutan.update', $penyusutan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Nama Aset</label>

            <input
                type="text"
                name="nama_aset"
                value="{{ old('nama_aset', $penyusutan->nama_aset) }}"
            >

            @error('nama_aset')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Harga Perolehan</label>

            <input
                type="number"
                name="harga_perolehan"
                value="{{ old('harga_perolehan', $penyusutan->harga_perolehan) }}"
                min="0"
            >

            @error('harga_perolehan')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Umur Ekonomis (Tahun)</label>

            <input
                type="number"
                name="umur_ekonomis"
                value="{{ old('umur_ekonomis', $penyusutan->umur_ekonomis) }}"
                min="1"
            >

            @error('umur_ekonomis')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Tanggal Penyusutan</label>

            <input
                type="date"
                name="tanggal_penyusutan"
                value="{{ old('tanggal_penyusutan', $penyusutan->tanggal_penyusutan) }}"
            >

            @error('tanggal_penyusutan')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="button-group">
            <button type="submit" class="btn-update">
                Update
            </button>

            <a href="{{ route('penyusutan.index') }}" class="btn-kembali">
                Kembali
            </a>
        </div>

    </form>
</div>

@endsection