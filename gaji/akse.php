<?php
include "../config.php";
// if (empty($_SESSION['username']) && empty($_SESSION['pass'])) {
//   session_destroy();
//   header('location:../index.php?pesan=kick');
// } else if ($_SESSION['type'] != "gaji") {
//   session_destroy();
//   header('location:..index.php?pesan=cit');
// }

///mulai edit
$nama = $_POST['nama'];
$tmplahir = $_POST['tempatl'];
$tgllahir = $_POST['tgll'];
$pendid = $_POST['pendi'];
$kktp = $_POST['kk'] . '/' . $_POST['ktp'];
$psngan = $_POST['nm_psg'];
$tanak = $_POST['jmlh_ank'];
$nohp = $_POST['nhp'];
$almt = $_POST['almt'];
$almt_ktp = $_POST['almt_ktp'];
$cabang = $_POST['cab'];
$asrn = $_POST['asrn'];
$sjbtan = $_POST['jab'];
if (empty($sjbtan)) {
  $sjbtn = $_POST['deflt'];
} else {
  $sjbtn = $sjbtan;
}
/*if (empty($_POST['bpjk']) || $_POST['jht'] == 0) {
  $bpjs_k = 0;
  # code...
} else {
  $bpjs_k = $_POST['bpjk'];
  # code...
}
if (empty($_POST['jht']) || $_POST['jht'] == 0) {
  $jht = 0;
  # code...
} else {
  $jht = $_POST['jht'];
  # code...
}*/
$jbtn = substr($sjbtn, 3);
$kod_jbtn = substr($sjbtn, 0, 3);
$stat = $_POST['stat'];
/*if ($stat == 'aktif') {
  $alasan = '-';
} else {
  $alasan = $_POST['alsn'];
}*/
$alasan = $_POST['ktrg'];
//var_dump($sjbtn);
mysqli_query($conn, "UPDATE `daftar_pegawai` SET 
`nama`= '$nama',
`alamat` = '$almt',
`almt_ktp` = '$almt_ktp',
`pddk`='$pendid',
`nma_psng`='$psngan',
`juml_anak`='$tanak',
`tmpt_l` = '$tmplahir',
`tgl_lahir` = '$tgllahir',
`kk_ktp` = '$kktp',
`n_hp` = '$nohp',
`asrn` = '$asrn',
`cbg`='$cabang',
`jbtn` = '$jbtn', 
`ko_jbtn` = '$kod_jbtn',
`keterangan`='$alasan',
`status` ='$stat'
 WHERE `id` = '$_POST[id]' ") or die(mysqli_error($conn));
if ($_GET['tipe'] == "staff") {
  header("location:daftar.php?yes=$nama+$jbtn");
  # code...
} else {
  header("location:daft_nonstaf.php?yes=$nama+$jbtn");
  # code...
}
