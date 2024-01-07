
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
    echo "<h2>Tambah Data Prodi</h2>";
    echo "<form action='crud_prodi.php?a=insert' method='post'>
            <input type='text' name='kode_prodi' placeholder='Kode Prodi' required>
            <input type='text' name='nama_prodi' placeholder='Nama Prodi' required>
            <input type='text' name='jurusan' placeholder='Jurusan' required>
            <button type='submit' class='btn btn-primary'>Tambah</button>
          </form>";
}
if (isset($_GET['a']) && $_GET['a'] == 'insert') {
    // Insert new data
    $kode_prodi = $_POST['kode_prodi'];
    $nama_prodi = $_POST['nama_prodi'];
    $jurusan = $_POST['jurusan'];
    $query = "INSERT INTO prodi (kode_prodi, nama_prodi,jurusan) VALUES ('$kode_prodi', '$nama_prodi', '$jurusan')";
    $exec = mysqli_query($conn, $query);
    if ($exec) {
        $_SESSION['message'] = "Data mahasiswa berhasil ditambahkan.";
    } else {
        $_SESSION['message'] = "Gagal menambahkan data mahasiswa. Error: " . mysqli_error($conn);
    }
    header("Location: crud_prodi.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD PRODI</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css2.css">

</head>
<body>
<hr>
    <h2>Read Data Program Studi</h2>
<center>
    <a class="btn btn-success" href="crud_prodi.php?a=input">Tambah</a></center>

    <table class="table table-hover">
					<thead>
						<tr>
							<th><b>No</b></th>
							<th><b>Kode Prodi</b></th>
							<th><b>Nama Prodi</b></th>
							<th><b>Jurusan</b></th>
							<th><b>Action</b></th>

						</tr>
					</thead>
				    <tbody>
				    	
                    <?php  

$query = "SELECT * FROM prodi";

$exec  = mysqli_query($conn,$query);

if ($exec) {
    $count = mysqli_num_rows($exec);
    if ($count > 0) {
        $no = 0;
        while ($rows = mysqli_fetch_array($exec)) {
            
        
?>
						    			<tr>
											<td><?php echo ++$no; ?></td>
											<td><?php echo $rows['kode_prodi'] ?></td>
                                            <td><?php echo $rows['nama_prodi'] ?></td>
                                            <td><?php echo $rows['jurusan'] ?></td>
											<td>
												<a href="edit_prodi.php?id=<?php echo $rows['kode_prodi'] ?>" class="btn btn-secondary" >Edit</i></a>
												<a href="hapus_prodi.php?id=<?php echo $rows['kode_prodi'] ?>" class="btn btn-danger">Hapus</i></a>
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