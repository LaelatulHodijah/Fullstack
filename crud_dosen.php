
<?php  
include 'koneksi.php';
if (isset($_SESSION['message'])) {
    echo "<div class='alert alert-success alert-dismissable'>
      <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
      <strong>Berhasil!</strong> ".$_SESSION['message']."
    </div>";
}
if (isset($_GET['a']) && $_GET['a'] == 'input') {
    // Form to add new data
    echo "<h2>Tambah Data Dosen</h2>";
    echo "<form action='crud_dosen.php?a=insert' method='post'>
            <input type='text' name='nip' placeholder='NIP' required>
            <input type='text' name='nama' placeholder='Nama' required>
            <input type='text' name='kode_prodi' placeholder='Kode Prodi' required>
            <button type='submit' class='btn btn-primary'>Tambah</button>
          </form>";
}

if (isset($_GET['a']) && $_GET['a'] == 'insert') {
    // Insert new data
    $nip = $_POST['nip'];
    $nama = $_POST['nama'];
    $kode_prodi = $_POST['kode_prodi'];

    $query = "INSERT INTO dosen (nip, nama, kode_prodi) VALUES ('$nip', '$nama', '$kode_prodi')";
    $exec = mysqli_query($conn, $query);

    if ($exec) {
        $_SESSION['message'] = "Data mahasiswa berhasil ditambahkan.";
    } else {
        $_SESSION['message'] = "Gagal menambahkan data mahasiswa. Error: " . mysqli_error($conn);
    }

    header("Location: crud_dosen.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD DOSEN</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css2.css">

</head>
<body>
<hr>
    <h2>Read Data Dosen</h2>
<center>
    <a class="btn btn-success" href="crud_dosen.php?a=input">Tambah</a></center>

    <table class="table table-hover">
					<thead>
						<tr>
							<th><b>No</b></th>
							<th><b>NIP</b></th>
							<th><b>Nama</b></th>
                            <th><b>Kode Prodi</b></th>
							<th><b>Action</b></th>

						</tr>
					</thead>
				    <tbody>
				    	
                    <?php  
                    $query = "SELECT * FROM dosen";

                    $exec  = mysqli_query($conn,$query);

                    if ($exec) {
                        $count = mysqli_num_rows($exec);
                        if ($count > 0) {
                            $no = 0;
                            while ($rows = mysqli_fetch_array($exec)) {   
                    ?>
						    			<tr>
											<td><?php echo ++$no; ?></td>
                                            <td><?php echo $rows['nip'] ?></td>
                                            <td><?php echo $rows['nama'] ?></td>
                                            <td><?php echo $rows['kode_prodi'] ?></td>
											<td>
												<a href="edit_dosen.php?id=<?php echo $rows['nip'] ?>" class="btn btn-secondary" >Edit</i></a>
												<a href="hapus_dosen.php?id=<?php echo $rows['nip'] ?>" class="btn btn-danger">Hapus</i></a>
											</td>
										</tr>
				    	<?php
				    				}
				    			}else{
				    	?>
				    			<tr>
									<td colspan="6" align="center"><h4><b>Kosong</b></h4></td>
								</tr>
				    	<?php
				    			}
				    		}else{
				    			echo mysqli_error($conn);
				    		}

				    	?>

						
				    </tbody>
				</table>
                </div>
        </div>
    </div>
</div>

<?php  

unset($_SESSION['message']);
?>