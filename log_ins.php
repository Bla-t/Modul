<?php
// error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
session_start();

// menghubungkan php dengan koneksi database
include 'config.php';

// menangkap data yang dikirim dari form login
$username = $_POST['user'];
$password = $_POST['pass'];


// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($conn, "select * from dat_uss where username='$username' and password='$password'") or die(mysqli_error($conn));
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database
if ($cek > 0) {

	$data = mysqli_fetch_assoc($login);
		switch ($data['levl']){
			case "sudo":
				// buat session login dan username
				$_SESSION['ID'] = $data['id'];
				$_SESSION['username'] = $username;
				$_SESSION['levl'] = "sudo";
				$_SESSION['nama'] = $data['nama'];
				$_SESSION['pass'] = $data['password'];
				$_SESSION['bagian'] = $data['bagian'];
				$_SESSION['type'] = $data['type'];
				$_SESSION['gamb'] = $data['gamb'];
				$_SESSION['cabang'] = $data['cabang'];
				// alihkan ke halaman dashboard pengurus
				header("location:sup.interface/");
				break;
			// cek jika user login sebagai admin
			case "admin":
				// buat session login dan username
				$_SESSION['ID'] = $data['id'];
				$_SESSION['username'] = $username;
				$_SESSION['levl'] = "admin";
				$_SESSION['nama'] = $data['nama'];
				$_SESSION['pass'] = $data['password'];
				$_SESSION['bagian'] = $data['bagian'];
				$_SESSION['type'] = $data['type'];
				$_SESSION['gamb'] = $data['gamb'];
				$_SESSION['cabang'] = $data['cabang'];
				// alihkan ke halaman dashboard admin
				header("location:home.php");
				break;
			case "operator":
				if($data['type'] == "leasing"){
					$location="home.php";
				} else if($data['type'] == "stok"){
					$location="stok_1/";
				} else if ($data['type'] == "gaji") {
					$location="gaji/";
				}
				// buat session login dan username
				$_SESSION['ID'] = $data['id'];
				$_SESSION['username'] = $username;
				$_SESSION['levl'] = "operator";
				$_SESSION['nama'] = $data['nama'];
				$_SESSION['pass'] = $data['password'];
				$_SESSION['bagian'] = $data['bagian'];
				$_SESSION['type'] = $data['type'];
				$_SESSION['gamb'] = $data['gamb'];
				$_SESSION['cabang'] = $data['cabang'];
				// alihkan ke halaman dashboard pegawai
				header("location:$location");
				break;
			// alihkan ke halaman login kembali
			default:
				header('location:index.php?pesan=gagal&cekid='.$data['levl']);
			break;
	}
} else {
	header("location:index.php?pesan=gagal&cekid=$cek");
}
