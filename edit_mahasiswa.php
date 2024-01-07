<?php
include 'koneksi.php';
if (isset($_GET['id'])) {
    $nim = $_GET['id'];
    $query = "SELECT * FROM mahasiswa WHERE nim = '$nim'";
    $result = mysqli_query($conn, $query);
    if ($result) {
        $data = mysqli_fetch_assoc($result);
    } else {
        echo mysqli_error($conn);
        exit;
    }
} else {
    echo "ID tidak ditemukan.";
    exit;
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $kode_prodi = $_POST['kode_prodi'];
    $query = "UPDATE mahasiswa SET nama = '$nama', alamat = '$alamat', kode_prodi = '$kode_prodi' WHERE nim = '$nim'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $_SESSION['message'] = "Data mahasiswa berhasil diupdate.";
        header("Location: crud_mahasiswa.php");
        exit;
    } else {
        echo mysqli_error($conn);
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Mahasiswa</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <h2>Edit Data Mahasiswa</h2>
    <form method="POST">
        <input type="hidden" name="nim" value="<?php echo $data['nim']; ?>">
        <label>Nama:</label>
        <input type="text" name="nama" value="<?php echo $data['nama']; ?>" required>
        <label>Alamat:</label>
        <input type="text" name="alamat" value="<?php echo $data['alamat']; ?>" required>
        <label>Prodi:</label>
        <input type="text" name="kode_prodi" value="<?php echo $data['kode_prodi']; ?>" required>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="crud_mahasiswa.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
