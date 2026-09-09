@extends('layouts.app')

@section('title', 'Data Assets')

@section('content')

<style>

    /* =========================
       HEADER
    ========================= */

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
        transition: 0.2s;
    }

    .btn-tambah:hover {
        background: #1d4ed8;
        transform: translateY(-1px);
    }


    /* =========================
       CARD
    ========================= */

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


    /* =========================
       TABLE
    ========================= */

    .table-wrapper {
        overflow-x: auto;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        min-width: 850px;
    }

    thead {
        background: #f8fafc;
    }

    th {
        padding: 14px 12px;
        color: #64748b;
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        border-bottom: 2px solid #e5e7eb;
        text-align: center;
    }

    td {
        padding: 15px 12px;
        border-bottom: 1px solid #eef0f3;
        font-size: 14px;
        text-align: center;
    }

    tbody tr {
        transition: 0.2s;
    }

    tbody tr:hover {
        background: #f8fafc;
    }


    /* =========================
       TEXT
    ========================= */

    .nomor {
        color: #94a3b8;
        font-weight: bold;
    }

    .asset-name {
        font-weight: bold;
        color: #1e293b;
    }

    .category {
        color: #475569;
    }

    .location {
        color: #64748b;
    }

    .date {
        color: #64748b;
    }


    /* =========================
       STATUS
    ========================= */

    .badge {
        display: inline-block;
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: bold;
    }

    .bg-success {
        background: #dcfce7;
        color: #15803d;
    }

    .bg-warning {
        background: #fef3c7;
        color: #b45309;
    }

    .bg-danger {
        background: #fee2e2;
        color: #dc2626;
    }


    /* =========================
       AKSI
    ========================= */

    .aksi {
        display: flex;
        justify-content: center;
        align-items: center;
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
        transition: 0.2s;
    }

    .btn-edit {
        background: #eff6ff;
        color: #2563eb;
    }

    .btn-edit:hover {
        background: #dbeafe;
    }

    .btn-delete {
        background: #fef2f2;
        color: #dc2626;
    }

    .btn-delete:hover {
        background: #fee2e2;
    }


    /* =========================
       EMPTY DATA
    ========================= */

    .empty {
        padding: 40px;
        text-align: center;
        color: #94a3b8;
    }


    /* =========================
       FOOTER
    ========================= */

    .footer {
        text-align: center;
        margin-top: 20px;
        color: #94a3b8;
        font-size: 12px;
    }


    /* =========================
       RESPONSIVE
    ========================= */

    @media (max-width: 700px) {

        .header {
            flex-direction: column;
            align-items: flex-start;
            gap: 15px;
        }

        .btn-tambah {
            width: 100%;
            text-align: center;
        }

        .card {
            padding: 15px;
        }

    }

</style>


<!-- =========================
     HEADER
========================= -->

<div class="header">

    <div class="header-left">

        <h1>📦 Data Assets</h1>

        <p>
            Kelola dan pantau seluruh data aset dengan mudah.
        </p>

    </div>


    <a href="{{ route('assets.create') }}" class="btn-tambah">
        + Tambah Asset
    </a>

</div>


<!-- =========================
     CARD
========================= -->

<div class="card">

    <div class="card-title">

        <h2>
            Daftar Asset
        </h2>

        <div class="total">
            Total: {{ count($assets) }} Asset
        </div>

    </div>


    <!-- =========================
         TABLE
    ========================= -->

    <div class="table-wrapper">

        <table>

            <thead>

                <tr>

                    <th>No</th>

                    <th>Name</th>

                    <th>Category</th>

                    <th>Location</th>

                    <th>Purchase Date</th>

                    <th>Status</th>

                    <th>Aksi</th>

                </tr>

            </thead>


            <tbody>

                @forelse ($assets as $index => $asset)

                <tr>

                    <td class="nomor">
                        {{ $index + 1 }}
                    </td>


                    <td class="asset-name">
                        {{ $asset->name }}
                    </td>


                    <td class="category">
                        {{ $asset->category }}
                    </td>


                    <td class="location">
                        📍 {{ $asset->location }}
                    </td>


                    <td class="date">
                        {{ $asset->purchase_date }}
                    </td>


                    <td>

                        @if (
                            strtolower($asset->status) == 'available' ||
                            strtolower($asset->status) == 'tersedia' ||
                            strtolower($asset->status) == 'aktif'
                        )

                            <span class="badge bg-success">
                                {{ $asset->status }}
                            </span>

                        @elseif (
                            strtolower($asset->status) == 'borrowed' ||
                            strtolower($asset->status) == 'dipinjam' ||
                            strtolower($asset->status) == 'maintenance'
                        )

                            <span class="badge bg-warning">
                                {{ $asset->status }}
                            </span>

                        @else

                            <span class="badge bg-danger">
                                {{ $asset->status }}
                            </span>

                        @endif

                    </td>


                    <td>

                        <div class="aksi">

                            <a
                                href="{{ route('assets.edit', $asset->id) }}"
                                class="btn-edit"
                            >
                                ✏ Edit
                            </a>


                            <form
                                action="{{ route('assets.destroy', $asset->id) }}"
                                method="POST"
                            >

                                @csrf

                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="btn-delete"
                                    onclick="return confirm('Yakin ingin menghapus asset ini?')"
                                >
                                    🗑 Hapus
                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="7" class="empty">
                        📭 Belum ada data asset.
                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>


<!-- FOOTER -->

<div class="footer">

    © {{ date('Y') }} Asset Management System

</div>

@endsection