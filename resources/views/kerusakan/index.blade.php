@extends('layouts.app')

@section('title', 'Data Kerusakan')

@section('content')

<style>
    .header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
    }

    .header-left h2 {
        margin: 0;
        font-size: 25px;
        font-weight: 600;
    }

    .header-left p {
        margin: 5px 0 0;
        color: #777;
        font-size: 14px;
    }

    .btn-tambah {
        background: #0d6efd;
        color: white;
        padding: 10px 18px;
        border-radius: 6px;
        text-decoration: none;
        font-size: 14px;
    }

    .btn-tambah:hover {
        background: #0b5ed7;
        color: white;
    }

    .card {
        background: white;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
    }

    .card-title {
        font-size: 18px;
        font-weight: 600;
        margin-bottom: 5px;
    }

    .total {
        color: #777;
        font-size: 14px;
        margin-bottom: 20px;
    }

    .table-wrapper {
        overflow-x: auto;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th {
        background: #f8f9fa;
        padding: 12px;
        text-align: left;
        font-size: 14px;
        border-bottom: 1px solid #ddd;
    }

    td {
        padding: 12px;
        font-size: 14px;
        border-bottom: 1px solid #eee;
    }

    .aksi {
        display: flex;
        gap: 6px;
    }

    .btn-edit {
        background: #ffc107;
        color: #000;
        padding: 7px 12px;
        border-radius: 5px;
        text-decoration: none;
        font-size: 13px;
    }

    .btn-delete {
        background: #dc3545;
        color: white;
        padding: 7px 12px;
        border: none;
        border-radius: 5px;
        font-size: 13px;
        cursor: pointer;
    }

    .alert {
        padding: 12px 15px;
        background: #d1e7dd;
        color: #0f5132;
        border-radius: 6px;
        margin-bottom: 20px;
    }

    .badge {
        padding: 5px 10px;
        border-radius: 20px;
        font-size: 12px;
        background: #dc3545;
        color: white;
    }

    @media (max-width: 768px) {
        .header {
            flex-direction: column;
            align-items: flex-start;
            gap: 15px;
        }

        .aksi {
            flex-direction: column;
        }
    }
</style>

<div class="header">
    <div class="header-left">
        <h2>Data Kerusakan</h2>
        <p>Kelola data barang yang mengalami kerusakan</p>
    </div>

    <a href="{{ route('kerusakan.create') }}" class="btn-tambah">
        + Tambah Kerusakan
    </a>
</div>

@if(session('success'))
    <div class="alert">
        {{ session('success') }}
    </div>
@endif

<div class="card">
    <div class="card-title">Daftar Kerusakan</div>
    <div class="total">Total data: {{ $kerusakans->count() }}</div>

    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Jenis Kerusakan</th>
                    <th>Tanggal Kerusakan</th>
                    <th>Status</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($kerusakans as $kerusakan)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $kerusakan->nama_barang }}</td>
                        <td>{{ $kerusakan->jenis_kerusakan }}</td>
                        <td>{{ $kerusakan->tanggal_kerusakan }}</td>
                        <td>
                            <span class="badge">
                                {{ $kerusakan->status }}
                            </span>
                        </td>
                        <td>{{ $kerusakan->keterangan ?? '-' }}</td>
                        <td>
                            <div class="aksi">
                                <a href="{{ route('kerusakan.edit', $kerusakan->id) }}" class="btn-edit">
                                    Edit
                                </a>

                                <form action="{{ route('kerusakan.destroy', $kerusakan->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-delete">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" style="text-align: center; padding: 25px;">
                            Belum ada data kerusakan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection