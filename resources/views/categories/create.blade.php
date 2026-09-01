<!DOCTYPE html>
<html>

<head>
    <title>Tambah Category</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        h3 {
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .btn-submit {
            padding: 10px 18px;
            background: #3490dc;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }

        .btn-submit:hover {
            background: #2779bd;
        }

        .btn-back {
            display: inline-block;
            padding: 10px 18px;
            background: #6c757d;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 14px;
            margin-right: 5px;
        }

        .btn-back:hover {
            background: #5a6268;
        }

        .error-text {
            color: red;
            font-size: 13px;
            margin-top: 5px;
            display: block;
        }
    </style>
</head>

<body>

<div class="container">

    <h3>➕ Tambah Category</h3>

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Name Category</label>
            <input type="text" 
                   name="name" 
                   id="name" 
                   value="{{ old('name') }}" 
                   placeholder="Masukkan nama kategori"
                   required>

            {{-- Pesan Error Validasi --}}
            @error('name')
                <span class="error-text">{{ $message }}</span>
            @enderror
        </div>

        <div style="margin-top: 20px;">
            <a href="{{ route('categories.index') }}" class="btn-back">
                Kembali
            </a>
            <button type="submit" class="btn-submit">
                Simpan
            </button>
        </div>

    </form>

</div>

</body>
</html>