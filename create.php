<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Tambah Rokok</title>
    <style>
        body {
            background: #1e1e1e;
            color: #f1f1f1;
            font-family: Arial, sans-serif;
            padding: 20px;
        }

        .container {
            background: #2c2c2c;
            padding: 20px;
            border-radius: 10px;
            max-width: 600px;
            margin: auto;
        }

        h2 {
            color: #ffeb3b;
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"],
        input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: none;
            border-radius: 5px;
        }

        button {
            background: #28a745;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            margin-bottom: 15px;
        }

        button:hover {
            background: #218838;
        }

        a {
            color: #4fc3f7;
            text-decoration: none;
            display: inline-block;
            text-align: center;
            width: 100%;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Tambah Data Rokok</h2>
    <form action="process.php" method="POST" enctype="multipart/form-data">
        <label>Nama Rokok</label>
        <input type="text" name="nama_rokok" required>

        <label>Harga</label>
        <input type="number" name="harga" required>

        <label>Gambar</label>
        <input type="file" name="gambar" accept="image/*" required>

        <button type="submit" name="create">Simpan</button>
    </form>
    <a href="index.php">← Kembali</a>
</div>
</body>
</html>
