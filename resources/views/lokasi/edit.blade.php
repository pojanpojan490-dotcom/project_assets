<!DOCTYPE html>
<html>
<head>
    <title>Edit Lokasi</title>
</head>
<body>

    <h1>Edit Lokasi</h1>

    <form action="{{ route('lokasis.update', $lokasi->id) }}" method="POST">

        @csrf
        @method('PUT')

        <label>Nama Lokasi</label>
        <br>

        <input type="text"
               name="nama_lokasi"
               value="{{ $lokasi->nama_lokasi }}">

        <br><br>

        <label>Keterangan</label>
        <br>

        <textarea name="keterangan">{{ $lokasi->keterangan }}</textarea>

        <br><br>

        <button type="submit">
            Update
        </button>

    </form>

    <br>

    <a href="{{ route('lokasis.index') }}">
        Kembali
    </a>

</body>
</html>