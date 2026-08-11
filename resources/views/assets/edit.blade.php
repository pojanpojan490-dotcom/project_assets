<!DOCTYPE html>
<html>
<head>
    <title>Edit Asset</title>
    <style>
        body { font-family: Arial; background:#f4f6f9; padding:20px; }
        .container { max-width:700px; margin:auto; background:white; padding:25px; border-radius:10px; }
        input { width:100%; padding:10px; margin-bottom:15px; }
        button { padding:10px 15px; background:#f6993f; color:white; border:none; }
    </style>
</head>
<body>

<div class="container">
    <h1>✏️ Edit Asset</h1>

    <form action="/assets/{{ $asset->id }}" method="POST">
        @csrf
        @method('PUT')

        <input type="text" name="name" value="{{ $asset->name }}" required>
        <input type="text" name="category" value="{{ $asset->category }}" required>
        <input type="text" name="location" value="{{ $asset->location }}" required>
        <input type="date" name="purchase_date" value="{{ $asset->purchase_date }}" required>
        <select name="status">
    <option value="available" {{ $asset->status == 'available' ? 'selected' : '' }}>
        Available
    </option>
    <option value="borrowed" {{ $asset->status == 'borrowed' ? 'selected' : '' }}>
        Borrowed
    </option>
    <option value="maintenance" {{ $asset->status == 'maintenance' ? 'selected' : '' }}>
        Maintenance
    </option>
</select>

        <button type="submit">Update</button>
    </form>
</div>

</body>
</html>