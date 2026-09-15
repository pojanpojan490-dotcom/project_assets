<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Asset</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f5f7fb;
            color: #1f2937;
            padding: 40px 20px;
        }

        .container {
            max-width: 700px;
            margin: auto;
        }

        .header {
            margin-bottom: 25px;
        }

        .header h1 {
            font-size: 28px;
            color: #111827;
            margin-bottom: 6px;
        }

        .header p {
            color: #6b7280;
            font-size: 14px;
        }

        .card {
            background: white;
            border-radius: 14px;
            padding: 30px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06);
            border: 1px solid #e5e7eb;
        }

        .card-title {
            font-size: 18px;
            font-weight: bold;
            color: #111827;
            margin-bottom: 25px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            font-weight: bold;
            color: #374151;
        }

        input,
        select {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 14px;
            color: #374151;
            background: white;
            outline: none;
            transition: 0.2s;
        }

        input:focus,
        select:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        input::placeholder {
            color: #9ca3af;
        }

        .buttons {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 30px;
        }

        .btn {
            padding: 11px 18px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: bold;
            text-decoration: none;
            border: none;
            cursor: pointer;
            transition: 0.2s;
        }

        .btn-kembali {
            background: #f1f5f9;
            color: #475569;
        }

        .btn-kembali:hover {
            background: #e2e8f0;
        }

        .btn-simpan {
            background: #2563eb;
            color: white;
        }

        .btn-simpan:hover {
            background: #1d4ed8;
            transform: translateY(-1px);
        }

        @media (max-width: 700px) {
            body {
                padding: 20px 10px;
            }

            .card {
                padding: 20px;
            }

            .buttons {
                flex-direction: column-reverse;
            }

            .btn {
                width: 100%;
                text-align: center;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <div class="header">
        <h1>Tambah Asset</h1>
        <p>Tambahkan data asset baru ke dalam sistem.</p>
    </div>

    <div class="card">

        <div class="card-title">
            Informasi Asset
        </div>

        <form action="{{ route('assets.store') }}" method="POST">

            @csrf

            <!-- NAMA ASSET -->
            <div class="form-group">
                <label for="name">Nama Asset</label>

                <input
                    type="text"
                    id="name"
                    name="name"
                    placeholder="Masukkan nama asset"
                    value="{{ old('name') }}"
                    required
                >
            </div>

            <!-- CATEGORY -->
            <div class="form-group">
                <label for="category_id">Kategori</label>

                <select name="category_id" id="category_id" required>
                    <option value="">-- Pilih Kategori --</option>

                    @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- TANGGAL PEMBELIAN -->
            <div class="form-group">
                <label for="purchase_date">Tanggal Pembelian</label>

                <input
                    type="date"
                    id="purchase_date"
                    name="purchase_date"
                    value="{{ old('purchase_date') }}"
                    required
                >
            </div>

            <!-- STATUS -->
            <div class="form-group">
                <label for="status">Status Asset</label>

                <select name="status" id="status" required>
                    <option value="Available">Tersedia</option>
                    <option value="Borrowed">Dipinjam</option>
                    <option value="Maintenance">Pemeliharaan</option>
                </select>
            </div>

            <!-- BUTTON -->
            <div class="buttons">

                <a href="{{ route('assets.index') }}" class="btn btn-kembali">
                    ← Kembali
                </a>

                <button type="submit" class="btn btn-simpan">
                    ✓ Simpan Asset
                </button>

            </div>

        </form>

    </div>

</div>

</body>
</html>