<?php
include 'koneksi.php';
if (isset($_GET['id'])) {
    $nip = $_GET['id'];
    $query = "SELECT * FROM dosen WHERE nip = '$nip'";
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
    $nip = $_POST['nip'];
    $nama = $_POST['nama'];
    $kode_prodi = $_POST['kode_prodi'];
    $query = "UPDATE dosen SET nama = '$nama', kode_prodi = '$kode_prodi' WHERE nip = '$nip'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $_SESSION['message'] = "Data mahasiswa berhasil diupdate.";
        header("Location: crud_dosen.php");
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
    <title>Edit Data Dosen</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <h2>Edit Data Dosen</h2>
    <form method="POST">
        <input type="hidden" name="nip" value="<?php echo $data['nip']; ?>">
        <label>Nama :</label>
        <input type="text" name="nama" value="<?php echo $data['nama']; ?>" required>
        <label>Kode Prodi :</label>
        <input type="text" name="kode_prodi" value="<?php echo $data['kode_prodi']; ?>" required>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="crud_dosen.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
