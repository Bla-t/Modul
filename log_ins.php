<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
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

	// cek jika user login sebagai admin
	if ($data['levl'] == "admin") {

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

		// cek jika user login sebagai pegawai
	} else if ($data['levl'] == "operator" && $data['type'] == "leasing") {
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
		header("location:home.php");

		// cek jika user login sebagai pegawai
	} else if ($data['levl'] == "operator" && $data['type'] == "stok") {
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
		header("location:stok_1");
		// cek jika user login sebagai pengurus
	} else if ($data['levl'] == "operator" && $data['type'] == "stok") {
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
		header("location:stok_1");
		// cek jika user login sebagai pengurus
	} else if ($data['levl'] == "operator" && $data['type'] == "gaji") {
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
		header("location:gaji");
	} else if ($data['levl'] == "visitor" && $data['type'] == "stok") {
		// buat session login dan username
		$_SESSION['ID'] = $data['id'];
		$_SESSION['username'] = $username;
		$_SESSION['levl'] = "visitor";
		$_SESSION['nama'] = $data['nama'];
		$_SESSION['pass'] = $data['password'];
		$_SESSION['bagian'] = $data['bagian'];
		$_SESSION['type'] = $data['type'];
		$_SESSION['gamb'] = $data['gamb'];
		$_SESSION['cabang'] = $data['cabang'];
		// alihkan ke halaman dashboard pengurus
		header("location:stok_1");
	} else if ($data['levl'] == "visitor" && $data['type'] == "leasing") {
		// buat session login dan username
		$_SESSION['ID'] = $data['id'];
		$_SESSION['username'] = $username;
		$_SESSION['levl'] = "visitor";
		$_SESSION['nama'] = $data['nama'];
		$_SESSION['pass'] = $data['password'];
		$_SESSION['bagian'] = $data['bagian'];
		$_SESSION['type'] = $data['type'];
		$_SESSION['gamb'] = $data['gamb'];
		$_SESSION['cabang'] = $data['cabang'];
		// alihkan ke halaman dashboard pengurus
		header("location:home.php");
	} else if ($data['levl'] == "sudo") {
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
	} else if ($data['levl'] == "pengawas") {
		// buat session login dan username
		$_SESSION['ID'] = $data['id'];
		$_SESSION['username'] = $username;
		$_SESSION['levl'] = "sudo";
		$_SESSION['nama'] = $data['nama'];
		$_SESSION['pass'] = $data['password'];
		$_SESSION['gamb'] = $data['gamb'];
		$_SESSION['cabang'] = $data['cabang'];
		// alihkan ke halaman dashboard pengurus
		header("location:home.php");
	} else {

		// alihkan ke halaman login kembali
		header("location:index.php?pesan=gagal");
	}
} else {
	header("location:index.php?pesan=gagal");
}
