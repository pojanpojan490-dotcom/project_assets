<!DOCTYPE html>

<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

```
<title>Edit Asset</title>

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

    /* HEADER */

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

    /* CARD */

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

    /* FORM */

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

    /* BUTTON */

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

    .btn-update {
        background: #2563eb;
        color: white;
    }

    .btn-update:hover {
        background: #1d4ed8;
        transform: translateY(-1px);
    }

    /* RESPONSIVE */

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
```

</head>

<body>

<div class="container">

```
<!-- HEADER -->

<div class="header">

    <h1>✏️ Edit Asset</h1>

    <p>Perbarui informasi asset yang sudah tersimpan.</p>

</div>


<!-- FORM CARD -->

<div class="card">

    <div class="card-title">
        Informasi Asset
    </div>


    <form action="{{ route('assets.update', $asset->id) }}" method="POST">

        @csrf
        @method('PUT')


        <!-- NAMA -->

        <div class="form-group">

            <label for="name">
                Nama Asset
            </label>

            <input
                type="text"
                id="name"
                name="name"
                value="{{ $asset->name }}"
                placeholder="Masukkan nama asset"
                required
            >

        </div>


        <!-- CATEGORY -->

        <div class="form-group">

            <label for="category">
                Kategori
            </label>

            <input
                type="text"
                id="category"
                name="category"
                value="{{ $asset->category }}"
                placeholder="Contoh: Laptop, Komputer, Printer"
                required
            >

        </div>


        <!-- LOCATION -->

        <div class="form-group">

            <label for="location">
                Lokasi
            </label>

            <input
                type="text"
                id="location"
                name="location"
                value="{{ $asset->location }}"
                placeholder="Contoh: Ruang IT, Lab Komputer"
                required
            >

        </div>


        <!-- PURCHASE DATE -->

        <div class="form-group">

            <label for="purchase_date">
                Tanggal Pembelian
            </label>

            <input
                type="date"
                id="purchase_date"
                name="purchase_date"
                value="{{ $asset->purchase_date }}"
                required
            >

        </div>


        <!-- STATUS -->

        <div class="form-group">

            <label for="status">
                Status Asset
            </label>

            <select
                name="status"
                id="status"
                required
            >

                <option value="available"
                    {{ $asset->status == 'available' ? 'selected' : '' }}>
                    Available
                </option>

                <option value="borrowed"
                    {{ $asset->status == 'borrowed' ? 'selected' : '' }}>
                    Borrowed
                </option>

                <option value="maintenance"
                    {{ $asset->status == 'maintenance' ? 'selected' : '' }}>
                    Maintenance
                </option>

            </select>

        </div>


        <!-- BUTTON -->

        <div class="buttons">

            <a
                href="{{ route('assets.index') }}"
                class="btn btn-kembali"
            >
                ← Kembali
            </a>

            <button
                type="submit"
                class="btn btn-update"
            >
                ✓ Update Asset
            </button>

        </div>

    </form>

</div>
```

</div>

</body>

</html>
