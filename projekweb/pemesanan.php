<!DOCTYPE html>
<html lang="en">
<?php
$koneksi = new mysqli ("localhost","root","","db_herbaloutdoor");
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HERBAL OUTDOOR</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;700&display=swap" rel="stylesheet">

<script src="https://unpkg.com/feather-icons"></script>

    <link rel="stylesheet" href="css/style.css">
</head>
<nav class="navbar">
    <a href="#"class="navbar-logo">Herbal <span>Outdoor</span></a>

    <div class="navbar-nav">
        <a href="home.php">Home</a>
        <a href="tentangkami.php">Tentang Kami</a>
        <a href="pemesanan.php">Pemesanan</a>
        <a href="kontakkami.php">Kontak</a>
        <a href="login.php">Login</a>
    </div> 

</nav>

<section id="pemesanan" class="pemesanan">
    <h2><span>List</span> Barang</h2>
    <p>Untuk Lebih Detail Silahkan Datang Ke Store!</p>
   
    

    

        <?php
							$sql_tampil = "SELECT * FROM tb_barang";
							$query_tampil = mysqli_query($koneksi, $sql_tampil);
							$no=1;
							while ($data = mysqli_fetch_array($query_tampil,MYSQLI_BOTH)) {
						?>

                        <div class="row">
                        <div class="pemesanan-card">
						<tr>
                        <td>
								<img src="foto/<?php echo $data['foto']; ?>" width="150px" />
							</td>
							<td>
                            <h3 class="pemesanan-card-title"> </h3>
								<?php echo $no; ?>
							</td>
                            <h3 class="pemesanan-card-title"> </h3>
								<?php echo $data['nama_barang']; ?>
							</td>
							
						</tr>
						<?php
							$no++;
							}
						?>
       
        
    </div>
</section>