<?php
include 'koneksi.php';
if (isset($_GET['id'])) {
    $nim = $_GET['id'];
    $query = "SELECT * FROM prodi WHERE kode_prodi = '$nim'";
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
    $nim = $_POST['kode_prodi'];
    $nama_prodi = $_POST['nama_prodi'];
    $jurusan = $_POST['jurusan'];
    $query = "UPDATE prodi SET nama_prodi = '$nama_prodi', jurusan = '$jurusan' WHERE kode_prodi = '$nim'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $_SESSION['message'] = "Data mahasiswa berhasil diupdate.";
        header("Location: crud_prodi.php");
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
    <title>Edit Data Prodi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <h2>Edit Data Program Studi</h2>
    <form method="POST">
        <input type="hidden" name="kode_prodi" value="<?php echo $data['kode_prodi']; ?>">
        <label>Nama Prodi:</label>
        <input type="text" name="nama_prodi" value="<?php echo $data['nama_prodi']; ?>" required>
        <label>Jurusan:</label>
        <input type="text" name="jurusan" value="<?php echo $data['jurusan']; ?>" required>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="crud_prodi.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
