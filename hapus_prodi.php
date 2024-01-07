<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $nim = $_GET['id'];

    $query = "DELETE FROM prodi WHERE kode_prodi = '$nim'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $_SESSION['message'] = "Data prodi berhasil dihapus.";
        header("Location: crud_prodi.php");
        exit;
    } else {
        echo mysqli_error($conn);
        exit;
    }
} else {
    echo "ID tidak ditemukan.";
    exit;
}
?>