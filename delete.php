<?php
include 'db.php';

$id = $_GET['id'];
$data = $conn->query("SELECT gambar FROM rokok WHERE id=$id")->fetch_assoc();
if ($data && file_exists("uploads/" . $data['gambar'])) {
    unlink("uploads/" . $data['gambar']);
}

$conn->query("DELETE FROM rokok WHERE id=$id");
header('Location: index.php');
?>
