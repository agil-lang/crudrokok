<?php
include 'db.php';
$id = $_GET['id'];
$data = $conn->query("SELECT * FROM rokok WHERE id=$id")->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Edit Rokok</title>
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
            background: #007bff;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            margin-bottom: 15px;
        }

        button:hover {
            background: #0056b3;
        }

        img {
            border: 2px solid #444;
            border-radius: 5px;
            margin-top: 5px;
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
    <h2>Edit Data Rokok</h2>
    <form action="process.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $data['id']; ?>">

        <label>Nama Rokok</label>
        <input type="text" name="nama_rokok" value="<?= $data['nama_rokok']; ?>" required>

        <label>Harga</label>
        <input type="number" name="harga" value="<?= $data['harga']; ?>" required>

        <label>Gambar Lama</label><br>
        <img src="uploads/<?= $data['gambar']; ?>" width="100"><br><br>

        <label>Ganti Gambar (Opsional)</label>
        <input type="file" name="gambar" accept="image/*">

        <button type="submit" name="update">Simpan Perubahan</button>
    </form>
    <a href="index.php">← Kembali</a>
</div>
</body>
</html>
