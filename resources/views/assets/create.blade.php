@extends('layouts.app')

@section('title', 'Tambah Asset Baru')

@section('styles')
<style>
    .page-header {
        margin-bottom: 24px;
    }

    .page-title {
        font-size: 24px;
        font-weight: 700;
        color: #0f172a;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .page-subtitle {
        color: #64748b;
        font-size: 14px;
        margin-top: 4px;
    }

    .form-card {
        background: #ffffff;
        border-radius: 12px;
        border: 1px solid #e2e8f0;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -2px rgba(0, 0, 0, 0.05);
        padding: 32px;
        max-width: 800px;
    }

    .card-header-title {
        font-size: 16px;
        font-weight: 600;
        color: #1e293b;
        padding-bottom: 16px;
        margin-bottom: 24px;
        border-bottom: 1px solid #f1f5f9;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .form-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
    }

    .form-group {
        display: flex;
        flex-direction: column;
    }

    .form-group.full-width {
        grid-column: span 2;
    }

    .form-group label {
        font-size: 13px;
        font-weight: 600;
        color: #334155;
        margin-bottom: 8px;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .input-wrapper {
        position: relative;
    }

    .input-wrapper i.input-icon {
        position: absolute;
        left: 14px;
        top: 50%;
        transform: translateY(-50%);
        color: #94a3b8;
        font-size: 14px;
    }

    .form-control {
        width: 100%;
        padding: 11px 14px 11px 40px;
        border: 1px solid #cbd5e1;
        border-radius: 8px;
        font-size: 14px;
        color: #0f172a;
        background-color: #f8fafc;
        transition: all 0.2s ease;
        outline: none;
    }

    .form-control:focus {
        background-color: #ffffff;
        border-color: #2563eb;
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.15);
    }

    .form-control.is-invalid {
        border-color: #ef4444;
        background-color: #fef2f2;
    }

    .error-text {
        color: #ef4444;
        font-size: 12px;
        margin-top: 6px;
    }

    .form-actions {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        gap: 12px;
        margin-top: 32px;
        padding-top: 20px;
        border-top: 1px solid #f1f5f9;
    }

    .btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        padding: 10px 20px;
        border-radius: 8px;
        font-size: 14px;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.2s ease;
        text-decoration: none;
        border: none;
    }

    .btn-secondary {
        background-color: #f1f5f9;
        color: #475569;
    }

    .btn-secondary:hover {
        background-color: #e2e8f0;
        color: #1e293b;
    }

    .btn-primary {
        background-color: #2563eb;
        color: #ffffff;
        box-shadow: 0 2px 4px rgba(37, 99, 235, 0.2);
    }

    .btn-primary:hover {
        background-color: #1d4ed8;
        transform: translateY(-1px);
        box-shadow: 0 4px 6px rgba(37, 99, 235, 0.3);
    }

    @media (max-width: 640px) {
        .form-grid {
            grid-template-columns: 1fr;
        }

        .form-group.full-width {
            grid-column: span 1;
        }

        .form-actions {
            flex-direction: column-reverse;
        }

        .btn {
            width: 100%;
        }
    }
</style>
@endsection

@section('content')
<div class="page-header">
    <h1 class="page-title">
        <i class="fa-solid fa-square-plus" style="color: #2563eb;"></i> Tambah Asset Baru
    </h1>
    <p class="page-subtitle">Isi formulir di bawah ini untuk mencatatkan data asset ke dalam sistem.</p>
</div>

<div class="form-card">
    <div class="card-header-title">
        <i class="fa-solid fa-circle-info" style="color: #64748b;"></i> Informasi Asset
    </div>

    <form action="{{ route('assets.store') }}" method="POST">
        @csrf

        <div class="form-grid">
            <!-- NAMA ASSET -->
            <div class="form-group full-width">
                <label for="name">
                    <i class="fa-solid fa-box"></i> Nama Asset
                </label>
                <div class="input-wrapper">
                    <i class="fa-solid fa-pen-to-square input-icon"></i>
                    <input 
                        type="text" 
                        id="name" 
                        name="name" 
                        class="form-control @error('name') is-invalid @enderror" 
                        placeholder="Contoh: Laptop MacBook Pro M2" 
                        value="{{ old('name') }}" 
                        required
                    >
                </div>
                @error('name')
                    <span class="error-text"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</span>
                @enderror
            </div>

            <!-- KATEGORI -->
            <div class="form-group">
                <label for="category_id">
                    <i class="fa-solid fa-tags"></i> Kategori Asset
                </label>
                <div class="input-wrapper">
                    <i class="fa-solid fa-folder input-icon"></i>
                    <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror" required>
                        <option value="" disabled selected>Pilih Kategori</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                @error('category_id')
                    <span class="error-text"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</span>
                @enderror
            </div>

            <!-- TANGGAL PEMBELIAN -->
            <div class="form-group">
                <label for="purchase_date">
                    <i class="fa-solid fa-calendar-days"></i> Tanggal Pembelian
                </label>
                <div class="input-wrapper">
                    <i class="fa-solid fa-calendar input-icon"></i>
                    <input 
                        type="date" 
                        id="purchase_date" 
                        name="purchase_date" 
                        class="form-control @error('purchase_date') is-invalid @enderror" 
                        value="{{ old('purchase_date') }}" 
                        required
                    >
                </div>
                @error('purchase_date')
                    <span class="error-text"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</span>
                @enderror
            </div>

            <!-- STATUS -->
            <div class="form-group full-width">
                <label for="status">
                    <i class="fa-solid fa-signal"></i> Status Awal Asset
                </label>
                <div class="input-wrapper">
                    <i class="fa-solid fa-list-check input-icon"></i>
                    <select name="status" id="status" class="form-control @error('status') is-invalid @enderror" required>
                        <option value="Available" {{ old('status') == 'Available' ? 'selected' : '' }}>Tersedia (Available)</option>
                        <option value="Borrowed" {{ old('status') == 'Borrowed' ? 'selected' : '' }}>Dipinjam (Borrowed)</option>
                        <option value="Maintenance" {{ old('status') == 'Maintenance' ? 'selected' : '' }}>Pemeliharaan (Maintenance)</option>
                    </select>
                </div>
                @error('status')
                    <span class="error-text"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</span>
                @enderror
            </div>
        </div>

        <!-- TOMBOL AKSI -->
        <div class="form-actions">
            <a href="{{ route('assets.index') }}" class="btn btn-secondary">
                <i class="fa-solid fa-arrow-left"></i> Batal & Kembali
            </a>
            <button type="submit" class="btn btn-primary">
                <i class="fa-solid fa-floppy-disk"></i> Simpan Asset
            </button>
        </div>
    </form>
</div>
@endsection