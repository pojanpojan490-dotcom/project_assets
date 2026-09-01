<!DOCTYPE html>
<html>

<head>

    <title>Data Categories</title>

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
            text-align: center;
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

        .btn-delete:hover {
            background: darkred;
        }

        .alert {
            background: #d4edda;
            color: #155724;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
        }
    </style>

</head>

<body>

<div class="container">

    <h3>📂 Data Categories</h3>

    {{-- Pesan berhasil --}}
    @if(session('success'))
        <div class="alert">
            {{ session('success') }}
        </div>
    @endif

    {{-- Tombol Tambah --}}
    <a href="{{ route('categories.create') }}" class="btn">
        + Tambah Category
    </a>

    <table>

        <thead>

            <tr>
                <th>No</th>
                <th>Name</th>
                <th style="width: 150px;">Aksi</th>
            </tr>

        </thead>

        <tbody>

            @forelse ($categories as $index => $category)

                <tr>

                    <td>
                        {{ $index + 1 }}
                    </td>

                    <td>
                        {{ $category->name }}
                    </td>

                    <td>

                        <div class="aksi">

                            {{-- Tombol Edit --}}
                            <a href="{{ route('categories.edit', $category->id) }}"
                               class="btn-edit">
                                Edit
                            </a>

                            {{-- Tombol Hapus --}}
                            <form action="{{ route('categories.destroy', $category->id) }}"
                                  method="POST">

                                @csrf

                                @method('DELETE')

                                <button type="submit"
                                        class="btn-delete"
                                        onclick="return confirm('Yakin hapus category ini?')">
                                    Hapus
                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="3">
                        Belum ada data category.
                    </td>

                </tr>

            @endforelse

        </tbody>

    </table>

</div>

</body>

</html>
