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
		<div class="col-lg-12">
			<div class="page-header">
				<br>
				<br>
				<h2>LIST BARANG HERBAL OUTDOOR
					<a href="add_admin.php" class="btn btn-success">Tambah Data</a>
					<a href="logout_admin.php" class="btn btn-danger">Log Out</a>
				</h2>
			</div>
			<br>
			<div>
				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>No</th>
							<th>KODE</th>
							<th>NAMA BARANG</th>
							<th>HARGA</th>
							<th>FOTO</th>
							<th>AKSI</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$sql_tampil = "SELECT * FROM tb_barang";
							$query_tampil = mysqli_query($koneksi, $sql_tampil);
							$no=1;
							while ($data = mysqli_fetch_array($query_tampil,MYSQLI_BOTH)) {
						?>
						<tr>
							<td>
								<?php echo $no; ?>
							</td>
							<td>
								<?php echo $data['kode_barang']; ?>
							</td>
							<td>
								<?php echo $data['nama_barang']; ?>
							</td>
							<td>
								<?php echo $data['jumlah_barang']; ?>
							</td>
							<td>
								<img src="foto/<?php echo $data['foto']; ?>" width="70px" />
							</td>
					

							<td>
								<a href="edit_admin.php?kode=<?php echo $data['kode_barang']; ?>" class='btn btn-warning btn-sm'>Ubah</a>
								<a href="del_admin.php?kode=<?php echo $data['kode_barang']; ?>" onclick="return confirm('Hapus Data Ini ?')"
								 class='btn btn-danger btn-sm'>Hapus</a>
							</td>
						</tr>
						<?php
							$no++;
							}
						?>
					</tbody>
				</table>

			</div>
		</div>
	</div>

</body>

</html>
<!-- Elseif Channel -->