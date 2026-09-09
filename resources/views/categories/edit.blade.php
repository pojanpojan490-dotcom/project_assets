@extends('layouts.app')

@section('title', 'Data Assets')

@section('styles')
<style>
    .page-header {
        margin-bottom: 30px;
    }

    .page-header h1 {
        font-size: 28px;
        color: #111827;
        margin-bottom: 6px;
    }

    .page-header p {
        color: #6b7280;
        font-size: 14px;
    }

    .form-card {
        background: white;
        border-radius: 12px;
        padding: 30px;
        max-width: 700px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        border: 1px solid #e5e7eb;
    }

    .form-group {
        margin-bottom: 22px;
    }

    .form-group label {
        display: block;
        font-size: 14px;
        font-weight: 600;
        color: #374151;
        margin-bottom: 8px;
    }

    .form-control {
        width: 100%;
        padding: 12px 14px;
        border: 1px solid #d1d5db;
        border-radius: 8px;
        font-size: 14px;
        color: #1f2937;
        background: #fff;
        outline: none;
        transition: 0.2s;
    }

    .form-control:focus {
        border-color: #2563eb;
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
    }

    .form-error {
        color: #dc2626;
        font-size: 13px;
        margin-top: 6px;
    }

    .button-group {
        display: flex;
        gap: 10px;
        margin-top: 10px;
    }

    .btn {
        display: inline-block;
        padding: 11px 20px;
        border-radius: 8px;
        border: none;
        text-decoration: none;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        transition: 0.2s;
    }

    .btn-primary {
        background: #2563eb;
        color: white;
    }

    .btn-primary:hover {
        background: #1d4ed8;
    }

    .btn-secondary {
        background: #e5e7eb;
        color: #374151;
    }

    .btn-secondary:hover {
        background: #d1d5db;
    }

    @media (max-width: 768px) {
        .form-card {
            padding: 20px;
        }

        .button-group {
            flex-direction: column;
        }

        .btn {
            text-align: center;
        }
    }
</style>
@endsection

@section('content')

    <div class="page-header">
        <h1>Edit Category</h1>
        <p>Ubah informasi category asset.</p>
    </div>

    <div class="form-card">

        <form action="{{ route('categories.update', $category->id) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Nama Category</label>

                <input
                    type="text"
                    id="name"
                    name="name"
                    class="form-control"
                    value="{{ old('name', $category->name) }}"
                    placeholder="Masukkan nama category"
                    required
                >

                @error('name')
                    <div class="form-error">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="button-group">

                <button type="submit" class="btn btn-primary">
                    Update Category
                </button>

                <a href="{{ route('categories.index') }}" class="btn btn-secondary">
                    Kembali
                </a>

            </div>

        </form>

    </div>

@endsection
