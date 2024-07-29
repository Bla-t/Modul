<?php
if (empty($_SESSION['username']) && empty($_SESSION['pass'])) {
  session_destroy();
  header("location:../index.php?pesan=gagal");
} else if ($_SESSION['type'] != "stok" && $_SESSION['type'] != "supus") {
  session_destroy();
  header("location:../index.php?pesan=cit");
}
date_default_timezone_set('Asia/Jakarta');
function tgln($tanggal)
{
  $bulan = array(
    1 =>
    'Januari',
    'Februari',
    'Maret',
    'April',
    'Mei',
    'Juni',
    'Juli',
    'Agustus',
    'September',
    'Oktober',
    'November',
    'Desember'
  );
  $pecahkan = explode('-', $tanggal);
  // variabel pecahkan 0 = tanggal
  // variabel pecahkan 1 = bulan
  // variabel pecahkan 2 = tahun

  return $bulan[(int)$pecahkan[0]];
}

function rupiah($angka)
{

  $hasil_rupiah = "Rp." . number_format($angka, 0, ',', '.');
  return $hasil_rupiah;
}

/////// LOGIN TIPE ///////////////
$level = $_SESSION['levl'];
$username = $_SESSION['nama'];
$bse = $_SESSION['cabang'];
$milik = $_SESSION['bagian'];
$iduser = $_SESSION['ID'];
if (empty($_SESSION['gamb'])) {
  $gam = "icon_none.png";
} else {
  $gam = $_SESSION['gamb'];
}
if ($milik == 'GA') {
  $title = 'MODUL BARAKA | STOK GUDANG';
} else if ($milik == 'ARM') {
  $title = 'MODUL BARAKA | STOK ARMADA';
}
#updater
//update per bulan.!!!
/*
$mn = date('m');
$tgl_b = date('Y');
$wheres = "WHERE MONTH(tgl) = '12' AND YEAR(tgl) ='2021'";
mysqli_query($conn, "INSERT INTO `backup_stok_isipakai` SELECT * FROM `stok_isipakai` $wheres") or die(mysqli_error($conn));
mysqli_query($conn, "DELETE FROM `stok_isipakai` $wheres") or die(mysqli_error($conn));
*/
