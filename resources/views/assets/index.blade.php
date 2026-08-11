<!DOCTYPE html>
<html>
<head>
    <title>Data Assets</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background: #f4f6f9;
        margin: 0;
        padding: 20px;
    }

    .container {
        max-width: 1000px;
        margin: auto;
        background: white;
        padding: 25px;
        border-radius: 10px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);  
    }

    h3 {
        margin-bottom: 20px;
    }

    .btn {
        display: inline-block;
        padding: 8px 14px;
        background: #3490dc;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        margin-bottom: 15px;
    }

    .btn:hover {
        background: #2779bd;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        text-align: center; /* 🔥 biar semua rata tengah */
    }

    th {
        background: #3490dc;
        color: white;
        padding: 12px;
    }

    td {
        padding: 12px;
        border-bottom: 1px solid #ddd;
    }

    tr:hover {
        background: #f1f1f1;
    }

    .aksi {
        display: flex;
        justify-content: center;
        gap: 5px;
    }

    .btn-edit {
        background: orange;
        color: white;
        padding: 5px 10px;
        text-decoration: none;
        border-radius: 4px;
    }

    .btn-delete {
        background: red;
        color: white;
        border: none;
        padding: 5px 10px;
        cursor: pointer;
        border-radius: 4px;
    }

    .badge {
        padding: 5px 10px;
        border-radius: 5px;
        color: white;
        font-size: 12px;
    }

    .bg-success {
        background: green;
    }

    .bg-warning {
        background: orange;
    }

    .bg-danger {
        background: red;
    }
</style>
</head>
<body>

<div class="container mt-4">
    <div class="card p-4 shadow">
        <h3 class="mb-3">📦 Data Assets</h3>

        <a href="{{ route('assets.create') }}" class="btn btn-primary mb-3">
            + Tambah Asset
        </a>

        <table class="table table-bordered text-center align-middle">
            <thead class="table-primary">
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Location</th>
                    <th>Purchase Date</th>
                    <th>Dapa ga kerja</th>
                    <th>Status</th>
                    <th style="width: 150px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($assets as $index => $asset)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $asset->name }}</td>
                    <td>{{ $asset->category }}</td>
                    <td>{{ $asset->location }}</td>
                    <td>{{ $asset->purchase_date }}</td>
                    <td>
                        <span class="badge bg-success">
                            {{ $asset->status }}
                        </span>
                    </td>
                    <td>
    <div class="aksi">
        <a href="{{ route('assets.edit', $asset->id) }}" class="btn-edit">
            Edit
        </a>

        <form action="{{ route('assets.destroy', $asset->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn-delete" onclick="return confirm('Yakin hapus?')">
                Hapus
            </button>
        </form>
    </div>
</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

</body>
</html>