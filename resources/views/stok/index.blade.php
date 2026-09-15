@extends('layouts.app')

@section('title', 'Data Stok')

@section('content')

<style>

    .header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
    }

    .header-left h1 {
        font-size: 28px;
        color: #111827;
        margin-bottom: 6px;
    }

    .header-left p {
        color: #6b7280;
        font-size: 14px;
    }

    .btn-tambah {
        display: inline-block;
        background: #2563eb;
        color: white;
        text-decoration: none;
        padding: 11px 18px;
        border-radius: 8px;
        font-size: 14px;
        font-weight: bold;
    }

    .btn-tambah:hover {
        background: #1d4ed8;
        color: white;
    }

    .card {
        background: white;
        border-radius: 14px;
        padding: 25px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06);
        border: 1px solid #e5e7eb;
    }

    .card-title {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    .card-title h2 {
        font-size: 18px;
        color: #111827;
    }

    .total {
        background: #eff6ff;
        color: #2563eb;
        padding: 7px 12px;
        border-radius: 20px;
        font-size: 13px;
        font-weight: bold;
    }

    .table-wrapper {
        overflow-x: auto;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        min-width: 800px;
    }

    thead {
        background: #f8fafc;
    }

    th {
        padding: 14px 12px;
        color: #64748b;
        font-size: 12px;
        text-transform: uppercase;
        border-bottom: 2px solid #e5e7eb;
        text-align: center;
    }

    td {
        padding: 15px 12px;
        border-bottom: 1px solid #eef0f3;
        font-size: 14px;
        text-align: center;
    }

    tbody tr:hover {
        background: #f8fafc;
    }

    .nomor {
        color: #94a3b8;
        font-weight: bold;
    }

    .stok-name {
        font-weight: bold;
        color: #1e293b;
    }

    .stok-masuk {
        color: #15803d;
        font-weight: bold;
    }

    .stok-keluar {
        color: #dc2626;
        font-weight: bold;
    }

    .stok-tersedia {
        color: #2563eb;
        font-weight: bold;
    }

    .aksi {
        display: flex;
        justify-content: center;
        gap: 7px;
    }

    .btn-edit,
    .btn-delete {
        border: none;
        padding: 7px 12px;
        border-radius: 6px;
        font-size: 12px;
        font-weight: bold;
        cursor: pointer;
        text-decoration: none;
    }

    .btn-edit {
        background: #eff6ff;
        color: #2563eb;
    }

    .btn-delete {
        background: #fef2f2;
        color: #dc2626;
    }

    .empty {
        padding: 40px;
        text-align: center;
        color: #94a3b8;
    }

</style>


<div class="header">

    <div class="header-left">

        <h1>📊 Data Stok</h1>

        <p>
            Kelola dan pantau seluruh data stok barang.
        </p>

    </div>

    <a href="{{ route('stok.create') }}" class="btn-tambah">
        + Tambah Stok
    </a>

</div>


@if(session('success'))

    <div class="alert alert-success">
        {{ session('success') }}
    </div>

@endif


<div class="card">

    <div class="card-title">

        <h2>
            Daftar Stok
        </h2>

        <div class="total">
            Total: {{ count($stoks) }} Data
        </div>

    </div>


    <div class="table-wrapper">

        <table>

            <thead>

                <tr>

                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Stok Masuk</th>
                    <th>Stok Keluar</th>
                    <th>Stok Tersedia</th>
                    <th>Aksi</th>

                </tr>

            </thead>


            <tbody>

                @forelse($stoks as $index => $stok)

                <tr>

                    <td class="nomor">
                        {{ $index + 1 }}
                    </td>

                    <td class="stok-name">
                        {{ $stok->nama_barang }}
                    </td>

                    <td class="stok-masuk">
                        + {{ $stok->stok_masuk }}
                    </td>

                    <td class="stok-keluar">
                        - {{ $stok->stok_keluar }}
                    </td>

                    <td class="stok-tersedia">
                        {{ $stok->stok_tersedia }}
                    </td>

                    <td>

                        <div class="aksi">

                            <a
                                href="{{ route('stok.edit', $stok->id) }}"
                                class="btn-edit"
                            >
                                ✏ Edit
                            </a>


                            <form
                                action="{{ route('stok.destroy', $stok->id) }}"
                                method="POST"
                            >

                                @csrf

                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="btn-delete"
                                    onclick="return confirm('Yakin ingin menghapus data stok ini?')"
                                >
                                    🗑 Hapus
                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="6" class="empty">
                        📭 Belum ada data stok.
                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection