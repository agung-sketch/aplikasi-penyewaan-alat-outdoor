<!DOCTYPE html>
<html>
<?php
$koneksi = new mysqli ("localhost","root","","db_herbaloutdoor");
if(isset($_GET['kode'])){
	$sql_cek = "SELECT * FROM tb_barang WHERE kode_barang='".$_GET['kode']."'";
	$query_cek = mysqli_query($koneksi, $sql_cek);
	$data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
}
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
				<h2>UBAH DATA BARANG</h2>
			</div>
			<br>
			<form method="POST" enctype="multipart/form-data">

				<div class="form-group">
					<label>KODE</label>
					<input type="text" name="kode_barang" class="form-control" value="<?php echo $data_cek['kode_barang']; ?>"
					 readonly/>
				</div>

				<div class="form-group">
					<label>Nama</label>
					<input type="text" name="nama_barang" class="form-control" value="<?php echo $data_cek['nama_barang']; ?>"
					/>
				</div>

				<div class="form-group">
					<label>Jumlah</label>
					<input type="text" name="jumlah_barang" class="form-control" value="<?php echo $data_cek['jumlah_barang']; ?>"
					/>
				</div>

				<div class="form-group">
					<label>FOTO</label>
					<br>
					<img src="foto/<?php echo $data_cek['foto']; ?>" width="70px" />
					<br>
					<br>
					<input type="file" name="foto">
				</div>
				<br>

				<div class="form-group">
					<input type="submit" name="Simpan" value="Ubah Data" class="btn btn-primary">
					<a href="index.php" class="btn btn-warning">Batal</a>
				</div>
			</form>
		</div>
	</div>

</body>

<?php	
    if (isset ($_POST['Simpan'])){

	$sumber = $_FILES['foto']['tmp_name'];
	$nama_file = $_FILES['foto']['name'];
	

	if(!empty($sumber)){
        $foto= $data_cek['foto'];
            if (file_exists("foto/$foto")){
            unlink("foto/$foto");}

        $sql_ubah = "UPDATE tb_barang SET
			nama_barang='".$_POST['nama_barang']."',
			jumlah_barang='".$_POST['jumlah_barang']."',
			foto='".$nama_file."'		
            WHERE kode_barang='".$_POST['kode_barang']."'";
		$query_ubah = mysqli_query($koneksi, $sql_ubah);
		$pindah = move_uploaded_file($sumber, 'foto/'.$nama_file);

    }elseif(empty($sumber)){
		$sql_ubah = "UPDATE tb_barang SET
			nama_barang='".$_POST['nama']."',
			jumlah_barang='".$_POST['jumlah']."',	
			WHERE kode_barang='".$_POST['kode']."'";
		$query_ubah = mysqli_query($koneksi, $sql_ubah);
        }

    if ($query_ubah) {
        echo "<script>alert('Ubah Data Sukses')</script>";
            echo "<meta http-equiv='refresh' content='0; url=index_admin.php'>";
        }else{
            echo "<script>alert('Ubah Data Gagal')</script>";
            echo "<meta http-equiv='refresh' content='0; url=edit_admin.php'>";
        }
        }
?>

</html>
<!-- Elseif Channel -->