@extends('layouts.app')

@section('title', 'Edit Kerusakan')

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

        /* Lebih lebar dan berada di tengah */
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

    input,
    textarea,
    select {
        width: 100%;
        padding: 10px 12px;
        border: 1px solid #ddd;
        border-radius: 6px;
        font-size: 14px;
        box-sizing: border-box;
        font-family: inherit;
    }

    input:focus,
    textarea:focus,
    select:focus {
        outline: none;
        border-color: #0d6efd;
    }

    textarea {
        min-height: 100px;
        resize: vertical;
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

    /* Responsive */
    @media (max-width: 950px) {
        .card,
        .header {
            max-width: 100%;
        }
    }
</style>

<div class="header">
    <h2>Edit Kerusakan</h2>
    <p>Perbarui data barang yang mengalami kerusakan</p>
</div>

<div class="card">

    <form action="{{ route('kerusakan.update', $kerusakan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Nama Barang</label>

            <input
                type="text"
                name="nama_barang"
                value="{{ old('nama_barang', $kerusakan->nama_barang) }}"
            >

            @error('nama_barang')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Jenis Kerusakan</label>

            <textarea
                name="jenis_kerusakan"
            >{{ old('jenis_kerusakan', $kerusakan->jenis_kerusakan) }}</textarea>

            @error('jenis_kerusakan')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Tanggal Kerusakan</label>

            <input
                type="date"
                name="tanggal_kerusakan"
                value="{{ old('tanggal_kerusakan', $kerusakan->tanggal_kerusakan) }}"
            >

            @error('tanggal_kerusakan')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Status</label>

            <select name="status">
                <option value="Rusak"
                    {{ $kerusakan->status == 'Rusak' ? 'selected' : '' }}>
                    Rusak
                </option>

                <option value="Dalam Perbaikan"
                    {{ $kerusakan->status == 'Dalam Perbaikan' ? 'selected' : '' }}>
                    Dalam Perbaikan
                </option>

                <option value="Selesai Diperbaiki"
                    {{ $kerusakan->status == 'Selesai Diperbaiki' ? 'selected' : '' }}>
                    Selesai Diperbaiki
                </option>
            </select>

            @error('status')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Keterangan</label>

            <textarea
                name="keterangan"
            >{{ old('keterangan', $kerusakan->keterangan) }}</textarea>

            @error('keterangan')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="button-group">
            <button type="submit" class="btn-update">
                Update
            </button>

            <a href="{{ route('kerusakan.index') }}" class="btn-kembali">
                Kembali
            </a>
        </div>

    </form>
</div>

@endsection