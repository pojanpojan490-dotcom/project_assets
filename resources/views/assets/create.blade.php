<!DOCTYPE html>
<html>
<head>
    <title>Tambah Asset</title>
    <style>
        body { font-family: Arial; background:#f4f6f9; padding:20px; }
        .container { max-width:700px; margin:auto; background:white; padding:25px; border-radius:10px; }
        input { width:100%; padding:10px; margin-bottom:15px; }
        button { padding:10px 15px; background:#38c172; color:white; border:none; }
    </style>
</head>
<body>

<div class="container">
    <h1>➕ Tambah Asset</h1>

    <form action="/assets" method="POST">
        @csrf

        <input type="text" name="name" placeholder="Nama Asset" required>
        <input type="text" name="category" placeholder="Kategori" required>
        <input type="text" name="location" placeholder="Lokasi" required>
        <input type="date" name="purchase_date" required>
        <select name="status" class="form-control">
    <option value="available">Available</option>
    <option value="borrowed">Borrowed</option>
    <option value="maintenance">Maintenance</option>
</select>

        <button type="submit">Simpan</button>
    </form>
</div>

</body>
</html>