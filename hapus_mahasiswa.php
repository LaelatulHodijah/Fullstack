<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $nim = $_GET['id'];

    $query = "DELETE FROM mahasiswa WHERE nim = '$nim'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $_SESSION['message'] = "Data mahasiswa berhasil dihapus.";
        header("Location: crud_mahasiswa.php");
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