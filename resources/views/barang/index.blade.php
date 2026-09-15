@extends('layouts.app')

@section('title', 'Data Barang')

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
        transition: 0.2s;
    }

    .btn-tambah:hover {
        background: #1d4ed8;
        transform: translateY(-1px);
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
        min-width: 950px;
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

    .nomor {
        color: #94a3b8;
        font-weight: bold;
    }

    .kode {
        color: #475569;
        font-weight: bold;
    }

    .barang-name {
        font-weight: bold;
        color: #1e293b;
    }

    .category {
        color: #475569;
    }

    .jumlah {
        color: #475569;
        font-weight: bold;
    }

    .date {
        color: #64748b;
    }

    .harga {
        color: #1e293b;
        font-weight: 600;
    }

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

    .empty {
        padding: 40px;
        text-align: center;
        color: #94a3b8;
    }

    .alert-success {
        background: #dcfce7;
        color: #15803d;
        padding: 12px 16px;
        border-radius: 8px;
        margin-bottom: 20px;
    }

    .footer {
        text-align: center;
        margin-top: 20px;
        color: #94a3b8;
        font-size: 12px;
    }

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

<div class="header">

    <div class="header-left">
        <h1>📦 Data Barang</h1>

        <p>
            Kelola dan pantau seluruh data barang dengan mudah.
        </p>
    </div>

    <a href="{{ route('barang.create') }}" class="btn-tambah">
        + Tambah Barang
    </a>

</div>

@if(session('success'))
    <div class="alert-success">
        <strong>Berhasil!</strong> {{ session('success') }}
    </div>
@endif

<div class="card">

    <div class="card-title">

        <h2>
            Daftar Barang
        </h2>

        <div class="total">
            Total: {{ count($barangs) }} Barang
        </div>

    </div>

    <div class="table-wrapper">

        <table>

            <thead>

                <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Jumlah</th>
                    <th>Tanggal Beli</th>
                    <th>Harga Beli</th>
                    <th>Aksi</th>
                </tr>

            </thead>

            <tbody>

                @forelse ($barangs as $index => $barang)

                <tr>

                    <td class="nomor">
                        {{ $index + 1 }}
                    </td>

                    <td class="kode">
                        {{ $barang->kode_barang }}
                    </td>

                    <td class="barang-name">
                        {{ $barang->nama_barang }}
                    </td>

                    <td class="category">
                        {{ $barang->category->name ?? '-' }}
                    </td>

                    <td class="jumlah">
                        {{ $barang->jumlah }}
                    </td>

                    <td class="date">
                        {{ $barang->tanggal_beli ? \Carbon\Carbon::parse($barang->tanggal_beli)->format('d-m-Y') : '-' }}
                    </td>

                    <td class="harga">
                        {{ $barang->harga_beli ? 'Rp ' . number_format($barang->harga_beli, 0, ',', '.') : '-' }}
                    </td>

                    <td>

                        <div class="aksi">

                            <a href="{{ route('barang.edit', $barang->id_barang) }}" class="btn-edit">
                                ✏ Edit
                            </a>

                            <form action="{{ route('barang.destroy', $barang->id_barang) }}" method="POST">

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="btn-delete"
                                    onclick="return confirm('Yakin ingin menghapus barang ini?')"
                                >
                                    🗑 Hapus
                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="8" class="empty">
                        📭 Belum ada data barang.
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