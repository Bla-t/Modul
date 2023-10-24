<?php
include "../config.php";
session_start();
if (empty($_SESSION['username']) && empty($_SESSION['pass'])) {
  session_destroy();
  header('location:../index.php?pesan=kick');
} elseif ($_SESSION['type'] == "stok" || $_SESSION['type'] == "leasing") {
  session_destroy();
  header('location:..index.php?pesan=kick');
}
//get data karyawan
$id = $_POST['id'];
$dat = mysqli_query($conn, "SELECT * FROM `daftar_pegawai` WHERE `id` = '$id'");
$daftar_get = mysqli_fetch_assoc($dat);
$kode = '00' . $daftar_get['ko_jbtn'];

/// gaji pokok
$gajii = mysqli_query($conn, "SELECT * FROM `gaji_gaji_golongan` WHERE `id` ='2'");
$gaji_pk = mysqli_fetch_assoc($gajii);

//kenaikan /thun
$gaji = mysqli_query($conn, "SELECT * FROM `gaji_gaji_golongan` WHERE `id` ='3'");
$tm_g = mysqli_fetch_assoc($gaji);

//tunjangan gaji
$tunjg = mysqli_query($conn, "SELECT * FROM `gaji_gaji_golongan` WHERE `golongan` = '$kode'");
$t_gaji = mysqli_fetch_assoc($tunjg);

//get kebutuhan um
//um interval
$msakrj = $daftar_get['ms_krj'];
$r = mysqli_query($conn, "SELECT * FROM `gaji_tmbahum`");
$num = mysqli_num_rows($r);
if ($num > 0) {
  while ($row = mysqli_fetch_assoc($r)) {
    $arrum[] = array('masa' => $row['msa_krja'], 'nom' => $row['nominal']);
  }
}

//um pokok
$ums = mysqli_query($conn, "SELECT * FROM `gaji_um_golongan` WHERE `id` ='1'");
$nilums = mysqli_fetch_assoc($ums); //tambahan um

//tunjangan
$tunjum = mysqli_query($conn, "SELECT * FROM `gaji_um_golongan` WHERE `golongan` ='$kode'");
$tunj_um = mysqli_fetch_assoc($tunjum);

///hitungs
$gjs = ($tm_g['tonase'] * $msakrj) + $gaji_pk['tonase'];
$gtnj = $t_gaji['tunjangan'];

$um = $nilums['tonase'] + $tunj_um['tunjangan'] + $arrum[$msakrj]['nom'];


//insert into laporan
$namnam = $daftar_get['nama'];
$nib = $daftar_get['nib'];
$cabs = $daftar_get['cbg'];
$jbtan = $daftar_get['jbtn'];
$kojabs = $daftar_get['ko_jbtn'];
$msak = $_POST['msa'];
$jumask = $_POST['j_msk'];
$pot_bpjs = $_POST['bpjs'];
$pot_lln = $_POST['pln'];
$pot_kas = $_POST['bon'];
$total_um = $jumask * $um;
$jupot = $pot_kas + $pot_bpjs + $pot_lln;
if ($daftar_get['kas_bon'] == 0) {
  $sisbon = 0;
} else {
  $sisbon = $daftar_get['kas_bon'] - $pot_kas;
}
$gajifinal = $gjs + $gtnj - $jupot;
$tgl = date('y-m-d');
$ket = 'N';
$bonus = $_POST['bonus'];
$lembur = $_POST['lmbur'];
$lemb_v = $_POST['lmbur'] * $um;


mysqli_query($conn, "INSERT INTO `gaji_laporans`(nama,nib,cabang,jabatan,ko_jbtn,ms_krj,t_masuk,gaji_pk,gaji_tunj,um,bonus,lembur,tot_lem,pot_bpjs,pot_kasbon,pot_lln,potongan,siskasb,gaji_fin,tgl,kets) VALUE ('$namnam','$nib','$cabs','$jbtan','$kojabs','$msak','$jumask','$gjs','$gtnj','$total_um','$bonus','$lemb_v','$lembur','$pot_bpjs','$pot_kas','$pot_lln','$jupot','$sisbon','$gajifinal','$tgl','$ket')") or die(mysqli_error($conn));

header('location: index.php?sukses=y');
