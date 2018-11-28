								
<?php 
session_start();

 ?>
<?php include 'koneksi.php'; ?>


<!DOCTYPE html>
<html>
<head>
	<title>login</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>
<body>


<div class="container">
	<div class="row">
		<div class="col-md-4">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Login</h3>
				</div>
				<div class="panel-body">
					<form method="post">
						<div class="form-group">
							<label>Email</label>
							<input type="text" class="form-control" name="email">
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="password" class="form-control" name="password">
						</div>
						<div class="row">
							<div class="col-md-4">
								
								<button class="btn btn-primary" name="login">Login</button>
								<button class="btn btn-default" name="kembali">Kembali</button>

							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<?php 

// jika ada tombol login(tombol login di tekan)
if(isset($_POST["login"]))
{
	$email = $_POST["email"];
	$password = $_POST["password"];
	//lakukan query ngecek akun di tabel anggota di db
	$ambilpelanggan = $koneksi->query("SELECT * FROM pelanggan 
		WHERE email='$email' AND password='$password'");

	// ngitung akun yang terambil
	$akunpelangganyangcocok = $ambilpelanggan->num_rows;

	// jika 1 akun yang cocok, maka diloginkan
	if($akunpelangganyangcocok==1)
	{
		// anda sukses login
		// mendapatkan akun dlm bentuk array
		$akun = $ambilpelanggan->fetch_assoc();
		// simpan di session 
		$_SESSION["pelanggan"] = $akun;
		echo "<script>alert('login anda sukses');</script>";
		echo "<script>location='index.php';</script>";
	}
	else
	{
		// anda gagal login
		echo "<script>alert('anda gagal login, username atau password anda salah!');</script>";
		echo "<script>location='login.php';</script>";
	}
}
elseif(isset($_POST["kembali"]))
{
	echo "<script>location='menu.php';</script>";
}

 ?>
</body>
</html>