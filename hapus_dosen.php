<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $nip = $_GET['id'];

    $query = "DELETE FROM dosen WHERE nip = '$nip'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $_SESSION['message'] = "Data dosen berhasil dihapus.";
        header("Location: crud_dosen.php");
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