<?php
$daftar_get = mysqli_fetch_assoc($data);
$kode = '00' . $daftar_get['ko_jbtn'];

//get kebutuhan gaji
// tunjangan
$gajiambil = mysqli_query($conn, "SELECT * FROM `gaji_gaji_golongan` WHERE `golongan` = '$kode'");
$ambilgaji = mysqli_fetch_assoc($gajiambil);
/// 0 tahun
$gajii = mysqli_query($conn, "SELECT * FROM `gaji_gaji_golongan` WHERE `id` ='2'");
$nilgajii = mysqli_fetch_assoc($gajii);
//tambahan kenaikan
$gaji = mysqli_query($conn, "SELECT * FROM `gaji_gaji_golongan` WHERE `id` ='3'");
$nilgaji = mysqli_fetch_assoc($gaji);
//////////////////////////////////////////////////////////////

//get kebutuhan um
//tunjangan
$umambil = mysqli_query($conn, "SELECT * FROM `gaji_um_golongan` WHERE `golongan` ='$kode'");
$ambilum = mysqli_fetch_assoc($umambil);
//tambahan um
$ums = mysqli_query($conn, "SELECT * FROM `gaji_um_golongan` WHERE `id` ='1'");
$nilums = mysqli_fetch_assoc($ums); //tambahan um
//tambahan um
$um = mysqli_query($conn, "SELECT * FROM `gaji_um_golongan` WHERE `id` ='2'");
$nilum = mysqli_fetch_assoc($um); //tambahan um

#end of region

//gaji
//ambil data gaji (tunjangan jabatan)
//$kode_gaji = $gaji[''];
//$kode_um = $um[''];

// cek kenaikan
$interval_gaji = date('y-m', strtotime($daftar_get['est_naikgaji'])); //get_method
$interval_um = date('y-m', strtotime($daftar_get['est_naikum'])); //get_method
$date = date('y-m');

//jika naik gaji / tidak
$mskrj = $daftar_get['ms_krj'];
$umak = $daftar_get['um'];

///cek gaji naik
if ($interval_gaji == $date) {
  $msakerja = $mskrj + 1;
} else {
  $msakerja = $mskrj;
}
//cek um naik
if ($interval_um == $date) {
  $umaks = $umak + $nilum['tonase'];
} else {
  $umaks = $umak;
}

//gaji
$gaji = (($nilgaji['tonase'] * $msakerja) + $nilgajii['tonase']) + $ambilgaji['tunjangan'];
//um
$um = $umaks + $nilums['tonase'] + $ambilum['tunjangan'];
