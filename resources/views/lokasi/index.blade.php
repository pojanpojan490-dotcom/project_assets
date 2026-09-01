<!DOCTYPE html>
<html>
<head>
    <title>Data Lokasi</title>
</head>
<body>

    <h1>Data Lokasi</h1>

    <a href="{{ route('lokasis.create') }}">
        Tambah Lokasi
    </a>

    <br><br>

    @if(session('success'))
        <p style="color: green;">
            {{ session('success') }}
        </p>
    @endif

    <table border="1" cellpadding="10">
        <tr>
            <th>No</th>
            <th>Nama Lokasi</th>
            <th>Keterangan</th>
            <th>Aksi</th>
        </tr>

        @foreach($lokasis as $lokasi)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $lokasi->nama_lokasi }}</td>
            <td>{{ $lokasi->keterangan }}</td>
            <td>

                <a href="{{ route('lokasis.edit', $lokasi->id) }}">
                    Edit
                </a>

                <form action="{{ route('lokasis.destroy', $lokasi->id) }}"
                      method="POST"
                      style="display:inline">

                    @csrf
                    @method('DELETE')

                    <button type="submit"
                        onclick="return confirm('Yakin ingin menghapus?')">
                        Hapus
                    </button>

                </form>

            </td>
        </tr>
        @endforeach

    </table>

</body>
</html>