@extends('layouts.app')

@section('title', 'Tambah Category')

@section('styles')

<style>
    .category-container {
        max-width: 650px;
        margin: 40px auto;
        background: #ffffff;
        padding: 35px;
        border-radius: 18px;
        box-shadow: 0 10px 35px rgba(15, 23, 42, 0.10);
        border: 1px solid #e5e7eb;
        position: relative;
        overflow: hidden;
    }

    /* Garis dekorasi bagian atas */
    .category-container::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 5px;
        background: linear-gradient(90deg, #4f46e5, #7c3aed, #2563eb);
    }

    /* Header */
    .category-container h3 {
        margin: 0 0 30px;
        color: #111827;
        font-size: 26px;
        font-weight: 700;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    /* Form */
    .form-group {
        margin-bottom: 25px;
    }

    .form-group label {
        display: block;
        margin-bottom: 10px;
        font-size: 14px;
        font-weight: 600;
        color: #374151;
    }

    /* Input */
    .form-group input[type="text"] {
        width: 100%;
        padding: 14px 16px;
        border: 2px solid #e5e7eb;
        border-radius: 10px;
        box-sizing: border-box;
        font-size: 15px;
        color: #111827;
        background: #f9fafb;
        outline: none;
        transition: all 0.25s ease;
    }

    .form-group input[type="text"]::placeholder {
        color: #9ca3af;
    }

    .form-group input[type="text"]:hover {
        border-color: #c7d2fe;
        background: #ffffff;
    }

    .form-group input[type="text"]:focus {
        border-color: #6366f1;
        background: #ffffff;
        box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.12);
    }

    /* Error */
    .error-text {
        color: #dc2626;
        font-size: 13px;
        margin-top: 8px;
        display: block;
    }

    /* Button area */
    .category-container form > div:last-child {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-top: 30px !important;
    }

    /* Tombol Simpan */
    .btn-submit {
        padding: 13px 25px;
        background: linear-gradient(135deg, #6366f1, #4f46e5);
        color: white;
        border: none;
        border-radius: 9px;
        cursor: pointer;
        font-size: 14px;
        font-weight: 600;
        transition: all 0.25s ease;
        box-shadow: 0 5px 15px rgba(79, 70, 229, 0.25);
    }

    .btn-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(79, 70, 229, 0.35);
    }

    .btn-submit:active {
        transform: translateY(0);
    }

    /* Tombol Kembali */
    .btn-back {
        display: inline-block;
        padding: 13px 25px;
        background: #f3f4f6;
        color: #374151;
        text-decoration: none;
        border: 1px solid #e5e7eb;
        border-radius: 9px;
        font-size: 14px;
        font-weight: 600;
        transition: all 0.25s ease;
    }

    .btn-back:hover {
        background: #e5e7eb;
        color: #111827;
        transform: translateY(-2px);
    }

    /* Responsive */
    @media (max-width: 768px) {

        .category-container {
            margin: 20px;
            padding: 25px;
        }

        .category-container h3 {
            font-size: 22px;
        }

        .category-container form > div:last-child {
            flex-direction: column-reverse;
            align-items: stretch;
        }

        .btn-submit,
        .btn-back {
            width: 100%;
            text-align: center;
            box-sizing: border-box;
        }
    }
</style>

@endsection


@section('content')

<div class="category-container">

    <h3>
        ➕ Tambah Category
    </h3>

    <form action="{{ route('categories.store') }}" method="POST">

        @csrf

        <div class="form-group">

            <label for="name">
                Name Category
            </label>

            <input
                type="text"
                name="name"
                id="name"
                value="{{ old('name') }}"
                placeholder="Masukkan nama kategori"
                required
            >

            @error('name')
                <span class="error-text">
                    {{ $message }}
                </span>
            @enderror

        </div>


        <div style="margin-top: 20px;">

            <a
                href="{{ route('categories.index') }}"
                class="btn-back"
            >
                Kembali
            </a>

            <button
                type="submit"
                class="btn-submit"
            >
                Simpan
            </button>

        </div>

    </form>

</div>

@endsection
