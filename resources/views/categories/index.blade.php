@extends('layouts.app')

@section('title', 'Data Categories')

@section('content')

<style>
    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
    }

    .page-header h2 {
        margin: 0;
        font-size: 28px;
        color: #1f2937;
    }

    .page-header p {
        margin: 6px 0 0;
        color: #6b7280;
        font-size: 14px;
    }

    .btn {
        display: inline-block;
        padding: 10px 16px;
        background: #3490dc;
        color: white;
        text-decoration: none;
        border-radius: 7px;
        font-size: 14px;
        font-weight: 600;
        transition: 0.2s;
    }

    .btn:hover {
        background: #2779bd;
    }

    .alert {
        background: #d4edda;
        color: #155724;
        padding: 12px 15px;
        margin-bottom: 20px;
        border-radius: 8px;
        border: 1px solid #c3e6cb;
    }

    .table-card {
        background: white;
        border-radius: 12px;
        padding: 20px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.06);
        overflow-x: auto;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        text-align: center;
    }

    th {
        background: #3490dc;
        color: white;
        padding: 14px;
        font-size: 14px;
    }

    th:first-child {
        border-radius: 8px 0 0 0;
    }

    th:last-child {
        border-radius: 0 8px 0 0;
    }

    td {
        padding: 14px;
        border-bottom: 1px solid #e5e7eb;
        color: #374151;
        font-size: 14px;
    }

    tbody tr {
        transition: 0.2s;
    }

    tbody tr:hover {
        background: #f8fafc;
    }

    .category-name {
        font-weight: 600;
        color: #1f2937;
    }

    .aksi {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 8px;
    }

    .btn-edit {
        background: #f59e0b;
        color: white;
        padding: 7px 12px;
        text-decoration: none;
        border-radius: 6px;
        font-size: 13px;
        font-weight: 600;
        transition: 0.2s;
    }

    .btn-edit:hover {
        background: #d97706;
    }

    .btn-delete {
        background: #ef4444;
        color: white;
        border: none;
        padding: 7px 12px;
        cursor: pointer;
        border-radius: 6px;
        font-size: 13px;
        font-weight: 600;
        transition: 0.2s;
    }

    .btn-delete:hover {
        background: #dc2626;
    }

    .empty-state {
        padding: 35px !important;
        color: #9ca3af !important;
        font-style: italic;
    }

    .total-category {
        display: inline-block;
        background: #eff6ff;
        color: #2563eb;
        padding: 5px 10px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        margin-left: 8px;
    }

    @media (max-width: 768px) {
        .page-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 15px;
        }

        .page-header .btn {
            width: 100%;
            text-align: center;
        }

        .aksi {
            flex-direction: column;
        }
    }
</style>

<div class="page-header">
    <div>
        <h2>
            📂 Data Categories
            <span class="total-category">
                {{ $categories->count() }} Category
            </span>
        </h2>

        <p>Kelola data kategori asset yang tersedia.</p>
    </div>

    <a href="{{ route('categories.create') }}" class="btn">
        + Tambah Category
    </a>
</div>

{{-- Pesan berhasil --}}
@if(session('success'))
    <div class="alert">
        ✓ {{ session('success') }}
    </div>
@endif

<div class="table-card">

    <table>
        <thead>
            <tr>
                <th width="80">No</th>
                <th>Name</th>
                <th width="180">Aksi</th>
            </tr>
        </thead>

        <tbody>

            @forelse ($categories as $index => $category)

                <tr>
                    <td>
                        {{ $index + 1 }}
                    </td>

                    <td class="category-name">
                        📁 {{ $category->name }}
                    </td>

                    <td>
                        <div class="aksi">

                            {{-- Tombol Edit --}}
                            <a
                                href="{{ route('categories.edit', $category->id) }}"
                                class="btn-edit">
                                ✏ Edit
                            </a>

                            {{-- Tombol Hapus --}}
                            <form
                                action="{{ route('categories.destroy', $category->id) }}"
                                method="POST"
                                onsubmit="return confirm('Yakin hapus category ini?')">

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="btn-delete">
                                    🗑 Hapus
                                </button>

                            </form>

                        </div>
                    </td>
                </tr>

            @empty

                <tr>
                    <td colspan="3" class="empty-state">
                        📂 Belum ada data category.
                    </td>
                </tr>

            @endforelse

        </tbody>
    </table>

</div>

@endsection