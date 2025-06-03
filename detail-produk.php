<?php 
	error_reporting(0);
	include 'db.php';
	$kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id = 1");
	$a = mysqli_fetch_object($kontak);

	$produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_id = '".$_GET['id']."' ");
	$p = mysqli_fetch_object($produk);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Warungrizqi</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body>
	<!-- header -->
	<header>
		<div class="container">
			<h1><a href="index.php">Warungrizqi</a></h1>
			<ul>
				<li><a href="produk.php">Produk</a></li>
			</ul>
		</div>
	</header>

	<!-- search -->
	<div class="search">
		<div class="container">
			<form action="produk.php">
				<input type="text" name="search" placeholder="Cari Produk" value="<?php echo $_GET['search'] ?>">
				<input type="hidden" name="kat" value="<?php echo $_GET['kat'] ?>">
				<input type="submit" name="cari" value="Cari Produk">
			</form>
		</div>
	</div>

	<!-- product detail -->
	<div class="section">
    <div class="container">
        <h3>Detail Produk</h3>
        <div class="box detail-produk-flex">
            <div class="detail-img">
                <img src="produk/<?php echo $p->product_image ?>" alt="<?php echo $p->product_name ?>" style="width:260px; max-width:230px; border-radius:14px; box-shadow:0 6px 24px var(--shadow-color), 0 0 0 4px #e3f2fd; background:#fff; padding:14px; transition:transform 0.3s cubic-bezier(.4,0,.2,1), box-shadow 0.3s cubic-bezier(.4,0,.2,1);">
            </div>
            <div class="detail-info">
                <div class="info-box">
                    <h3><?php echo $p->product_name ?></h3>
                    <h4>Rp. <?php echo number_format($p->product_price) ?></h4>
                    <div class="deskripsi-box">
                        <h5>Deskripsi Produk</h5>
                        <p><?php echo $p->product_description ?></p>
                    </div>
                    <div class="wa-contact-box">
                        <a href="https://api.whatsapp.com/send?phone=<?php echo $a->admin_telp ?>&text=Hai, saya tertarik dengan produk Anda." target="_blank" class="btn">
                            Hubungi via Whatsapp
                        </a>
                        <span class="wa-icon">
                            <img src="img/wa.png" width="32" alt="Whatsapp">
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

	<!-- footer -->
	<div class="footer">
		<div class="container">
			<h4>Alamat</h4>
			<p><?php echo $a->admin_address ?></p>

			<h4>Email</h4>
			<p><?php echo $a->admin_email ?></p>

			<h4>No. Hp</h4>
			<p><?php echo $a->admin_telp ?></p>
			<small>Copyright &copy; 2025 - WarungRizqi.</small>
		</div>
	</div>
</body>
</html>