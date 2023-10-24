<?php
include "../config.php";
ini_set('allow_url_fopen', 1);

//keterangna leasing//

if (isset($_POST['smp'])) {
    $id = $_POST['id'];
    $ids = $_POST['aisd'];
    $kets = $_POST['ket'];

    mysqli_query($conn, "UPDATE `dat_leasing` SET `Keterangan`='$kets' WHERE `product_id`='$ids'") or die(mysqli_error($conn));
    header("location:index.php?gud=gud");
}
if (isset($_POST['delt'])) {
    $id = $_POST['id'];
    $ids = $_POST['aisd'];
    $kets = $_POST['ket'];

    mysqli_query($conn, "DELETE FROM `dat_leasing` WHERE `product_id`='$ids'") or die(mysqli_error($conn));
    mysqli_query($conn, "DELETE FROM `dat_tenor` WHERE `No_pol`='$id'") or die(mysqli_error($conn));

    header("location:index.php?gud=yet");
}

//akoens//


if (isset($_POST['rub'])) {
    $aidi = $_POST['ides'];
    $nem = $_POST['name'];
    $useer = $_POST['uss'];
    $pass = $_POST['pass'];

    mysqli_query($conn, "UPDATE `dat_uss` SET `nama`='$nem', `username`='$useer', `password`='$pass' WHERE `id` = '$aidi'") or die(mysqli_error($conn));

    header("location:akuns.php?akoens=ups");
}

if (isset($_POST['haps'])) {
    $ids = $_POST['hii'];
    mysqli_query($conn, "DELETE FROM `dat_uss` WHERE `id`='$ids'") or die(mysqli_error($conn));

    header("location:akuns.php?akoens=haps");
}


//daerah tarif
if (isset($_POST['hap'])) {
    $ide = $_POST['idi'];
    mysqli_query($conn, "DELETE FROM `daerah_tarif` WHERE `id`='$ide'") or die(mysqli_error($conn));
    header("location:tambahdaerah.php?isi=haps$ide");
}
if (isset($_GET['hapusdari'])) {
    $id = $_GET['id_dari'];
    $nama = $_GET['name'];
    $query = mysqli_query($conn, "DELETE FROM `cek_dari` WHERE `id`='$id'") or die(mysqli_error($conn));
    // API
    $url = "http://api.bst-ekspres.com?ket=dari&nama=$nama";
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
    $response = curl_exec($curl);
    curl_close($curl);
    
    header("location:tarifs.php?id=haps$id&nama=$nama");
}
if (isset($_GET['hapustujuan'])) {
    $id = $_GET['id_tujuan'];
    $nama = $_GET['name'];
    mysqli_query($conn, "DELETE FROM `cek_tujuan` WHERE `id`='$id'") or die(mysqli_error($conn));
    //API//
    $url = "http://api.bst-ekspres.com?ket=tujuan&nama=$nama";
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
    $response = curl_exec($curl);
    curl_close($curl);
    header("location:tarifs.php?id=haps$id&nama=$nama");
}

//stoks
if (isset($_POST['edits'])) {
    $ids = $_POST['sicm'];
    $stok = $_POST['stoks'];
    if ($_POST['dari'] == "ARM") {
        $milks = "armada";
    } else {
        $milks = "gudang";
    }
    mysqli_query($conn, "UPDATE `stok_databarang` SET `stok`='$stok' WHERE `id`='$ids'") or die(mysqli_error($conn));
    header("location:stok_cek.php?cek=$milks&&id=$ids");
}

if (isset($_POST['hapusstok'])) {
    $ide = $_POST['hacm'];
    if ($_POST['dari'] == "ARM") {
        $milks = "armada";
    } else {
        $milks = "gudang";
    }
    mysqli_query($conn, "DELETE FROM `stok_databarang` WHERE `id`='$ide'") or die(mysqli_error($conn));
    header("location:stok_cek.php?cek=$milks&&id=$ide");
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    mysqli_query($conn, "DELETE FROM `daftar_pegawai` WHERE `id` = '$id'") or die(mysqli_error($conn));
    header("location:daftpeg.php?cek=$id(terdelete)");
}
