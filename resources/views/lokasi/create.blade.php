<!DOCTYPE html>
<html>
<head>
    <title>Tambah Lokasi</title>
</head>
<body>

    <h1>Tambah Lokasi</h1>

    <form action="{{ route('lokasis.store') }}" method="POST">

        @csrf

        <label>Nama Lokasi</label>
        <br>
        <input type="text" name="nama_lokasi">
        <br><br>

        <label>Keterangan</label>
        <br>
        <textarea name="keterangan"></textarea>
        <br><br>

        <button type="submit">
            Simpan
        </button>

    </form>

    <br>

    <a href="{{ route('lokasis.index') }}">
        Kembali
    </a>

</body>
</html>