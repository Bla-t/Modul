<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
include "../config.php";
session_start();
if (empty($_SESSION['username']) && empty($_SESSION['pass'])) {
	header("location:../index.php?pesan=gagal");
}
date_default_timezone_set('Asia/Jakarta');

$time = date('Y-m-d H:i:s');
$sku = $_POST['barcod'];
$nama = $_POST['nama'];
$merk = $_POST['merk'];
$harbel = $_POST['harga_beli'];
$kategor = $_POST['kategori'];
$ket = $_POST['ket'];
$acc = $_SESSION['nama'];
$milk = $_SESSION['bagian'];
$id = $_POST['id'];
$idkategori = $_POST['aidi'];
$kategori = $_POST['kateg'];


if (isset($_POST['simpan'])) {

	$isi = mysqli_query($conn, " SELECT * FROM `stok_databarang` WHERE `id_barang`= '$sku'") or die(mysqli_error($conn));
	$cek = mysqli_fetch_array($isi, MYSQLI_NUM);
	if ($cek[0] > 1) {
		header('location:../tambah-jenisbarang.php?gag');
	} else {
		mysqli_query($conn, "INSERT INTO `stok_databarang` (id_barang,nama_barang,merk,kategori,harga_beli,harga_jual,stok,keterangan,acc,tanggal_ket,milik) VALUES ('$sku','$nama','$merk','$kategor','$harbel','$harjual','0','$ket','$acc','$time','$milk')") or die(mysqli_error($conn));
		header('location:../data_barang.php');
	}
} else if (isset($_POST['haps'])) {

	mysqli_query($conn, "DELETE FROM `stok_databarang` WHERE `id` = '$_POST[haps]'") or die(mysqli_error($conn));

	header('location:../data_barang.php');
} else if (isset($_POST['simpkat'])) {
	mysqli_query($conn, "INSERT INTO `stok_kategor` (nama,milik) VALUES ('$kategori','$milk')") or die(mysqli_error($conn));

	header('location:../kategori_id.php');
} else if (isset($_GET['hapus'])) {
    $idkategori = $_GET['hapus'];
	mysqli_query($conn, "DELETE FROM `stok_kategor` WHERE `id` = '$idkategori'") or die(mysqli_error($conn));

	header('location:../kategori_id.php');
} else if (isset($_POST['rubah_data'])) {
	mysqli_query($conn, " UPDATE `stok_databarang` SET `nama_barang`='$nama',`harga_beli`='$harbel',`harga_jual`='$harjual',`kategori`='$kategor',`keterangan`='$ket',`acc`='$acc',`tanggal_ket`='$time' WHERE `id` = '$id'") or die(mysqli_error($conn));

	header('location:../data_barang.php');
} else if (isset($_POST['simpanna'])) {

	$nopol = $_POST['Nopol'];
	$mesin = $_POST['nomes'];
	$merek = $_POST['merek'];
	$ketket = $_POST['ket2'];

	mysqli_query($conn, " INSERT INTO `stok_member` (nopol,nomesin,merk,jenis) VALUES ('$nopol','$mesin','$merek','$ketket')") or die(mysqli_error($conn));

	header('location:../data_member.php');
}

if (isset($_POST['haps_nopol'])) {

	//$id_nopol = $_POST['id_nopol'];
	mysqli_query($conn, "DELETE FROM `stok_member` WHERE `id` = '$_POST[haps_nopol]'") or die(mysqli_error($conn));

	header('location:../data_member.php');
}


if (isset($_POST['nota_pakai'])) {
	$tgl = date('Y-m-d H:i:s');
	$notalaporan = $_POST['nota'];
	$nopol = $_POST['plat'];
	$acc = $_SESSION['nama'];
	$milik = $_SESSION['bagian'];

	mysqli_query($conn, "INSERT `stok_lappakai`(nota,nopol,tgl,acc,milik,status) VALUES ('$notalaporan','$nopol','$tgl','$acc','$milik','BELUM')") or die(mysqli_error($conn));
	mysqli_query($conn, "UPDATE `stok_isibeli` SET `keterangan`='$keterangan_nota' WHERE `nota`= '$notalaporan'") or die(mysqli_error($conn));
	if ($milik == 'ARM') {
		header('location:../pem_armada.php');
	} elseif ($milik == 'GA') {
		header('location:../distribusi.php');
	}
}
