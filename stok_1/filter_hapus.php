<?php include "config.php"; 
		
	if (isset($_POST['hapus_isi'])) {

	$kode= $_POST['kode'];
	$idi_isi= $_POST['id_isi'];
	$stok = $_POST['stok_kurang'] - $_POST['jumlah'];
	mysqli_query($conn, "UPDATE `stok_databarang` SET `stok`='$stok' WHERE `id_barang` = '$kode'"), ($conn, "DELETE FROM `stok_isibeli` WHERE `id` = '$idi_isi' ")or die(mysqli_error($conn));	
	
	header('location:menu_pembelian.php');

}