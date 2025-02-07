<!DOCTYPE html>
<html>
<?php
$koneksi = new mysqli ("localhost","root","","db_herbaloutdoor");
?>

<head>
	<title>HERBAL OUTDOOR</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>

<body>

	<div class="container">
		<div class="col-lg-8">
			<div class="page-header">
				<br>
				<br>
				<h2>TAMBAH DATA BARANG</h2>
			</div>
			<br>
			<form method="POST" enctype="multipart/form-data">

				<div class="form-group">
					<label>KODE</label>
					<input type="text" name="kode_barang" class="form-control" required>
				</div>

				<div class="form-group">
					<label>NAMA BARANG</label>
					<input type="text" name="nama_barang" class="form-control" required>
				</div>

				<div class="form-group">
					<label>JUMLAH BARANG</label>
					<input type="text" name="jumlah_barang" class="form-control" required>
				</div>
				<div class="form-group">
					<label>FOTO</label>
					<br>
					<input type="file" name="foto" required>
				</div>
				<br>
				

				<div class="form-group">
					<input type="submit" name="Simpan" value="Simpan Data" class="btn btn-primary">
					<a href="index_admin.php" class="btn btn-warning">Batal</a>
				</div>
			</form>
		</div>
	</div>

</body>

<?php	
    if (isset ($_POST['Simpan'])){

	$sumber = $_FILES['foto']['tmp_name'];
    $nama_file = $_FILES['foto']['name'];
	$pindah = move_uploaded_file($sumber, 'foto/'.$nama_file);
        
        $sql_simpan = "INSERT INTO tb_barang (`kode_barang`, `nama_barang`, `jumlah_barang`, `foto`) VALUES (
			'".$_POST['kode_barang']."',
			'".$_POST['nama_barang']."',
			'".$_POST['jumlah_barang']."',
			'".$nama_file."')";
		$query_simpan = mysqli_query($koneksi, $sql_simpan);

        if ($query_simpan) {
            echo "<script>alert('Tambah Data Sukses')</script>";
            echo "<meta http-equiv='refresh' content='0; url=index_admin.php'>";
        }else{
            echo "<script>alert('Tambah Data Gagal')</script>";
            echo "<meta http-equiv='refresh' content='0; url=add_admin.php'>";
        }
        }
?>

</html>
<!-- Elseif Channel -->