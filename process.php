<?php
include 'db.php';

function uploadImage($file) {
    $filename = time() . '_' . basename($file['name']);
    $target = "uploads/" . $filename;
    move_uploaded_file($file['tmp_name'], $target);
    return $filename;
}

// Create
if (isset($_POST['create'])) {
    $nama = $_POST['nama_rokok'];
    $harga = $_POST['harga'];
    $gambar = uploadImage($_FILES['gambar']);
    $conn->query("INSERT INTO rokok (nama_rokok, harga, gambar) VALUES ('$nama', '$harga', '$gambar')");
    header('Location: index.php');
}

// Update
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama_rokok'];
    $harga = $_POST['harga'];

    if (!empty($_FILES['gambar']['name'])) {
        $gambar = uploadImage($_FILES['gambar']);
        $conn->query("UPDATE rokok SET nama_rokok='$nama', harga='$harga', gambar='$gambar' WHERE id=$id");
    } else {
        $conn->query("UPDATE rokok SET nama_rokok='$nama', harga='$harga' WHERE id=$id");
    }
    header('Location: index.php');
}
?>
