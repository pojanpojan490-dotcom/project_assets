@extends('layouts.app')

@section('title', 'Data Assets')

@section('styles')
<style>
    /* =========================
       HEADER
    ========================= */
    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 24px;
        flex-wrap: wrap;
        gap: 16px;
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

    .btn-tambah {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: #2563eb;
        color: white;
        text-decoration: none;
        padding: 10px 18px;
        border-radius: 8px;
        font-size: 14px;
        font-weight: 600;
        box-shadow: 0 2px 4px rgba(37, 99, 235, 0.2);
        transition: all 0.2s ease;
    }

    .btn-tambah:hover {
        background: #1d4ed8;
        transform: translateY(-1px);
        box-shadow: 0 4px 6px rgba(37, 99, 235, 0.3);
    }

    /* =========================
       ALERT
    ========================= */
    .alert-success {
        background-color: #f0fdf4;
        border: 1px solid #bbf7d0;
        color: #166534;
        padding: 12px 16px;
        border-radius: 8px;
        margin-bottom: 20px;
        font-size: 14px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    /* =========================
       CARD & TABLE
    ========================= */
    .card {
        background: white;
        border-radius: 12px;
        padding: 24px;
        border: 1px solid #e2e8f0;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
    }

    .card-title {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    .card-title h2 {
        font-size: 16px;
        font-weight: 600;
        color: #1e293b;
    }

    .total-badge {
        background: #eff6ff;
        color: #2563eb;
        padding: 6px 14px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        border: 1px solid #dbeafe;
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
        padding: 12px 16px;
        color: #475569;
        font-size: 12px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        border-bottom: 1px solid #e2e8f0;
        text-align: left;
    }

    th.text-center, td.text-center {
        text-align: center;
    }

    td {
        padding: 16px;
        border-bottom: 1px solid #f1f5f9;
        font-size: 14px;
        color: #334155;
    }

    tbody tr {
        transition: background-color 0.15s ease;
    }

    tbody tr:hover {
        background-color: #f8fafc;
    }

    .nomor {
        color: #94a3b8;
        font-weight: 600;
    }

    .asset-name {
        font-weight: 600;
        color: #0f172a;
    }

    /* =========================
       BADGES
    ========================= */
    .badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 4px 10px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
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
        gap: 8px;
    }

    .btn-action {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 32px;
        height: 32px;
        border-radius: 6px;
        border: none;
        cursor: pointer;
        text-decoration: none;
        transition: all 0.2s ease;
        font-size: 13px;
    }

    .btn-edit {
        background: #eff6ff;
        color: #2563eb;
    }

    .btn-edit:hover {
        background: #2563eb;
        color: white;
    }

    .btn-delete {
        background: #fef2f2;
        color: #dc2626;
    }

    .btn-delete:hover {
        background: #dc2626;
        color: white;
    }

    .empty {
        padding: 48px 20px;
        text-align: center;
        color: #94a3b8;
    }

    .empty i {
        font-size: 36px;
        margin-bottom: 12px;
        color: #cbd5e1;
    }

    .footer {
        text-align: center;
        margin-top: 32px;
        color: #94a3b8;
        font-size: 12px;
    }

    @media (max-width: 640px) {
        .page-header {
            flex-direction: column;
            align-items: flex-start;
        }

        .btn-tambah {
            width: 100%;
            justify-content: center;
        }
    }
</style>
@endsection

@section('content')

<!-- HEADER -->
<div class="page-header">
    <div>
        <h1 class="page-title">
            <i class="fa-solid fa-box-archive" style="color: #2563eb;"></i> Data Assets
        </h1>
        <p class="page-subtitle">Kelola dan pantau seluruh data aset perusahaan secara terpusat.</p>
    </div>

    <a href="{{ route('assets.create') }}" class="btn-tambah">
        <i class="fa-solid fa-plus"></i> Tambah Asset
    </a>
</div>

<!-- PESAN NOTIFIKASI SUKSES -->
@if(session('success'))
    <div class="alert-success">
        <i class="fa-solid fa-circle-check"></i> {{ session('success') }}
    </div>
@endif

<!-- CARD & TABLE -->
<div class="card">
    <div class="card-title">
        <h2>Daftar Asset</h2>
        <div class="total-badge">
            Total: {{ count($assets) }} Asset
        </div>
    </div>

    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th class="text-center" style="width: 60px;">No</th>
                    <th>Nama Asset</th>
                    <th>Kategori</th>
                    <th>Lokasi</th>
                    <th>Tanggal Pembelian</th>
                    <th class="text-center">Status</th>
                    <th class="text-center" style="width: 120px;">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($assets as $index => $asset)
                <tr>
                    <td class="text-center nomor">{{ $index + 1 }}</td>

                    <td class="asset-name">
                        {{ $asset->name }}
                    </td>

                    <td>
                        <span style="display: inline-flex; align-items: center; gap: 6px;">
                            <i class="fa-solid fa-folder" style="color: #94a3b8; font-size: 12px;"></i>
                            {{ $asset->category->name ?? '-' }}
                        </span>
                    </td>

                    <td>
                        <span style="color: #64748b;">
                            <i class="fa-solid fa-location-dot" style="color: #94a3b8; font-size: 12px; margin-right: 4px;"></i>
                            {{ $asset->location ?? '-' }}
                        </span>
                    </td>

                    <td>
                        <span style="color: #64748b;">
                            <i class="fa-regular fa-calendar" style="color: #94a3b8; font-size: 12px; margin-right: 4px;"></i>
                            {{ $asset->purchase_date ? date('d M Y', strtotime($asset->purchase_date)) : '-' }}
                        </span>
                    </td>

                    <td class="text-center">
                        @php
                            $status = strtolower($asset->status);
                        @endphp

                        @if (in_array($status, ['available', 'tersedia', 'aktif']))
                            <span class="badge bg-success">
                                <i class="fa-solid fa-circle-check" style="font-size: 10px;"></i> {{ $asset->status }}
                            </span>
                        @elseif (in_array($status, ['borrowed', 'dipinjam', 'maintenance', 'pemeliharaan']))
                            <span class="badge bg-warning">
                                <i class="fa-solid fa-clock-rotate-left" style="font-size: 10px;"></i> {{ $asset->status }}
                            </span>
                        @else
                            <span class="badge bg-danger">
                                <i class="fa-solid fa-circle-xmark" style="font-size: 10px;"></i> {{ $asset->status }}
                            </span>
                        @endif
                    </td>

                    <td class="text-center">
                        <div class="aksi">
                            <a href="{{ route('assets.edit', $asset->id) }}" class="btn-action btn-edit" title="Edit Asset">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>

                            <form action="{{ route('assets.destroy', $asset->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-action btn-delete" title="Hapus Asset" onclick="return confirm('Yakin ingin menghapus asset ini?')">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="empty">
                        <i class="fa-solid fa-inbox"></i>
                        <p>Belum ada data asset yang tersimpan.</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="footer">
    © {{ date('Y') }} Asset Management System
</div>

@endsection