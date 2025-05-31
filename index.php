<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Rokok</title>
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
            max-width: 900px;
            margin: auto;
        }

        h1 {
            color: #ffeb3b;
            text-align: center;
        }

        .btn {
            background: #28a745;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
            margin-bottom: 15px;
        }

        .search-box {
            margin-bottom: 15px;
            display: flex;
            gap: 10px;
        }

        .search-box input[type="text"] {
            padding: 8px;
            width: 100%;
            border: none;
            border-radius: 5px;
        }

        .search-box button {
            padding: 8px 15px;
            border: none;
            border-radius: 5px;
            background: #2196f3;
            color: white;
            cursor: pointer;
        }

        table {
            width: 100%;
            background: #3a3a3a;
            border-collapse: collapse;
            border-radius: 5px;
            overflow: hidden;
        }

        th, td {
            padding: 12px;
            text-align: center;
            border: 1px solid #555;
        }

        th {
            background: #444;
            color: #ffeb3b;
        }

        td img {
            border-radius: 5px;
        }

        a {
            color: #4fc3f7;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        td a + a {
            margin-left: 10px;
            color: #f44336;
        }

        td a + a:hover {
            color: #e53935;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Data Rokok</h1>
    
    <a href="create.php" class="btn">+ Tambah Rokok</a>

    <!-- Form Pencarian -->
    <form method="GET" class="search-box">
        <input type="text" name="search" placeholder="Cari nama rokok..." value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">
        <button type="submit">Cari</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $search = isset($_GET['search']) ? $_GET['search'] : '';
        $stmt = $conn->prepare("SELECT * FROM rokok WHERE nama_rokok LIKE ?");
        $param = "%$search%";
        $stmt->bind_param("s", $param);
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()):
        ?>
        <tr>
            <td><?= $row['id']; ?></td>
            <td><?= $row['nama_rokok']; ?></td>
            <td>Rp<?= number_format($row['harga'], 0, ',', '.'); ?></td>
            <td><img src="uploads/<?= $row['gambar']; ?>" width="80"></td>
            <td>
                <a href="edit.php?id=<?= $row['id']; ?>">Edit</a>
                <a href="delete.php?id=<?= $row['id']; ?>" onclick="return confirm('Hapus data?')">Hapus</a>
            </td>
        </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
</div>
</body>
</html>
