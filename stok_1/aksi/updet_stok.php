<?php
include '../config.php';
session_start();
if (empty($_SESSION['username']) && empty($_SESSION['pass'])) {
    header('location:../index.php?pesan=gagal');
}
date_default_timezone_set('Asia/Jakarta');

if (isset($_POST['stoksmpn'])) {
    $id = $_POST['id'];
    $stok = $_POST['stok'] + $_POST['jumblah'];

    $not = $_POST['nota1'];
    $nama_barang = $_POST['nama'];
    $merk = $_POST['merk'];
    $kategori = $_POST['kategori'];
    $jumlah = $_POST['jumblah'];
    $keterangan = 'R';
    $tgl = date('Y-m-d H:i:s');
    $acc = $_SESSION['nama'];
    $milik = $_SESSION['bagian'];
    $harga = $_POST['harga'];
    $total = $_POST['harga_total'];

    mysqli_query(
        $conn,
        "UPDATE `stok_databarang` SET `stok`='$stok' WHERE `id_barang` = '$id' "
    ) or die(mysqli_error($conn));
    mysqli_query(
        $conn,
        "INSERT `stok_isibeli` (nota,kode_barang,nama,harga,jumlah,total,tgl,keterangan,acc,milik) VALUES ('$not','$id','$nama_barang','$harga','$jumlah','$total','$tgl','$keterangan','$acc','$milik')"
    ) or die(mysqli_error($conn));
    header('location:../menu_pembelian.php');
}

if (isset($_POST['simpan_nota'])) {
    $tgl = date('Y-m-d H:i:s');
    $isi_jumlah = $_POST['jumlahisi'];
    $notalaporan = $_POST['nextnota'];
    $total_nota = $_POST['total_nota'];
    $acc = $_SESSION['nama'];
    $milik = $_SESSION['bagian'];
    $keterangan_nota = $_POST['keterangan_nota'];

    mysqli_query(
        $conn,
        "INSERT `stok_lapbeli`(nota,harga_total,keterangan,jumlah,status,tgl,acc,milik) VALUES ('$notalaporan','$total_nota','$keterangan_nota','$isi_jumlah','SELESAI','$tgl','$acc','$milik')"
    ) or die(mysqli_error($conn));
    mysqli_query(
        $conn,
        "UPDATE `stok_isibeli` SET `keterangan`='$keterangan_nota' WHERE `nota`= '$notalaporan'"
    ) or die(mysqli_error($conn));
    header('location:../menu_pembelian.php');
}

if (isset($_POST['pemakaian'])) {
    $id_pakai = $_POST['id_pakai'];
    $stok = $_POST['stok_pakai'] - $_POST['jumlah_pakai'];

    $not = $_POST['nomor_nota'];
    $nama_barang = $_POST['nama_pakai'];
    $jumlah = $_POST['jumlah_pakai'];
    //$keterangan = 'R';
    $tgl = date('Y-m-d H:i:s');
    $acc = $_SESSION['nama'];
    $milik = $_SESSION['bagian'];
    $harga = $_POST['harga_pakai'] * $_POST['jumlah_pakai'];

    mysqli_query(
        $conn,
        "UPDATE `stok_databarang` SET `stok`='$stok' WHERE `id_barang` = '$id_pakai' "
    ) or die(mysqli_error($conn));
    //mysqli_query($conn, "UPDATE `stok_lappakai` SET `status` = 'ISI' WHERE `nota` = $not") or die(mysqli_error($conn));
    mysqli_query(
        $conn,
        "INSERT `stok_isipakai` (nota,kode_barang,nama,harga,jumlah,tgl,acc,milik) VALUES ('$not','$id_pakai','$nama_barang','$harga','$jumlah','$tgl','$acc','$milik')"
    ) or die(mysqli_error($conn));
    header('location:../pemakaian_armada.php?nota=' . $not);
}

if (isset($_POST['hapus_isi'])) {
    //$idi_isi= $_POST['id_isi'];
    //$kode= ;
    $stok = $_POST['stok_kurang'] - $_POST['jumlah'];
    mysqli_query(
        $conn,
        "UPDATE `stok_databarang` SET `stok`='$stok' WHERE `id_barang` = '$_POST[kode]'"
    ) or die(mysqli_error($conn));
    mysqli_query(
        $conn,
        "DELETE FROM `stok_isibeli` WHERE `id` = '$_POST[hapus_isi]' "
    ) or die(mysqli_error($conn));
    header('location:../menu_pembelian.php');
}

/*if (isset($_POST['batal_nota'])) {	

	mysqli_query($conn,"DELETE FROM `stok_isibeli` WHERE `nota`= '$'") or die(mysqli_error($conn));
	header('location:../pem_armada.php');
}*/

if (isset($_POST['pemakaian_simpan'])) {
    // $id_pakai = $_POST['id_pakai'];
    // $stok = $_POST['stok_pakai'] - $_POST['jumlah_pakai'];

    $nota_pakai = $_POST['pemakaian_simpan'];
    // $nama_barang = $_POST['nama_pakai'];
    $jumlah_total = $_POST['jumlahisi'];
    $keterangan = $_POST['keterangan_nota'];
    $tgl = date('Y-m-d H:i:s');
    $acc = $_SESSION['nama'];
    $milik = $_SESSION['bagian'];
    $harga_total = $_POST['total_harga'];

    mysqli_query(
        $conn,
        "UPDATE `stok_lappakai` SET `harga_total` = '$harga_total', `jumlah` = '$jumlah_total', `keterangan` = '$keterangan', `status` = 'KOMPLIT', `tgl_acc` = '$tgl', `acc` = '$acc' WHERE `nota` = '$nota_pakai'"
    ) or die(mysqli_error($conn));
    mysqli_query(
        $conn,
        "UPDATE `stok_isipakai` SET `keterangan`='$keterangan' WHERE `nota`= '$nota_pakai'"
    ) or die(mysqli_error($conn));
    //mysqli_query($conn,"UPDATE `stok_barang`") or die(mysqli_error($conn));
    if ($milik == 'ARM') {
        header('location:../pem_armada.php');
    } elseif ($milik == 'GA') {
        header('location:../distribusi.php');
    }
}
#n-+9 bug == executed..???
if (isset($_GET['nota'])) {

    $not = $_GET['nota'];
    $id = $_GET['idb'];
    $id_pakai = $_GET['ipak'];


    // $j_awal = $_GET[''];

    //ambil nilai stok ..
    $stok_akr = $_GET['jml1'] + $_GET['jml2'];

    /*
    echo $stok_akr;
    echo "&nbsp&nbsp";
    echo '<a href="../pemakaian_armada.php?nota='.$not.'">kembali</a>';*/


    //update menjadi nilai sebelumnya ... 
    mysqli_query(
        $conn,
        "UPDATE `stok_databarang` SET `stok`='$stok_akr' WHERE `id` = '$id'"
    ) or die(mysqli_error($conn));

    //hapus dari table pemakaian/distribusi..
    mysqli_query($conn, "DELETE FROM `stok_isipakai` WHERE `id` = '$id_pakai'") or die(mysqli_error($conn));
    //kembali ke form pebelian / pemakaian..
    header('location:../pemakaian_armada.php?nota=' . $not);
}
