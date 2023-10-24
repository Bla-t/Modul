<?php
date_default_timezone_set('Asia/Jakarta');
include "../config.php";
function rupiah($angka)
{

  $hasil_rupiah = "Rp." . number_format($angka, 0, ',', '.');
  return $hasil_rupiah;
}
function tgl($tanggal)
{
  $bulan = array(
    1 =>
    'Januari',
    'Pebruari',
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

  return $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
}
$id = $_GET['id'];
$date = date('Y-m');
$sql = mysqli_query($conn, "SELECT * FROM `gaji_laporans` WHERE `kets` ='N' AND `id` = '$id'");
$spctk = mysqli_fetch_assoc($sql);
$penbul = $spctk['gaji_pk'] + $spctk['gaji_tunj'];
$tot1 = $spctk['gaji_pk'] + $spctk['gaji_tunj'] + 58000;
$tot2 = $spctk['um'] + $tot1;
$tot3 = $spctk['pot_bpjs'] + $spctk['pot_kasbon'] + $spctk['pot_lln'];
$tot4 = $penbul - $tot3;
/*$id = $_GET['id'];
$sql = mysqli_query($conn, "SELECT * FROM `gaji_laporans` WHERE `id` ='$id'");
$sctk = mysqli_fetch_assoc($sql);*/
?>

<head>
  <!--<link rel="stylesheet" href="print.css">-->
  <script>
    function lod() {
      window.print();
    }
  </script>
</head>

<body onload="lod();">
  <?php
  for ($i = 0; $i < 2; $i++) {
  ?>
    <div id="cetak" style="page-break-before:always; margin-top:12px;">
      <table style="border: solid 1px black;">
        <tbody>
          <tr>
            <td>
              <input type="hidden" value="<?= $i; ?>">
              <img src="../gamb/beeste.png" alt="gambar" style="width: 80px;">
            </td>
            <td style="text-align: center; width:46mm;" colspan="3">
              <strong style="font-size:8px;">PT.BARAKA SARANA TAMA</strong><br>
              <div style="font-size: 6px;">
                <strong>SLIP GAJI <?= tgl($spctk['tgl']); ?></strong>
              </div>
            </td>
          </tr>
          <tr>
            <td style="border-top: solid 1px black;" colspan="4">
              <div style="text-align: left; font-size:8px">
                NAMA <span style="padding-left: 55px;">: <?= $spctk['nama'] ?></span><br>
                JABATAN <span style="padding-left: 37px;">: <?= $spctk['jabatan'] ?></span><br>
                KODE JABATAN : 00<?= $spctk['ko_jbtn'] ?><br>
                CABANG <span style="padding-left: 39px;">: <?= $spctk['cabang'] ?></span><br>
                MASA KERJA <span style="padding-left:15px;"> : <?= $spctk['ms_krj'] ?></span> thn<br>
              </div>
            </td>
          </tr>
          <tr>
            <td style="border-top: solid 1px black;" colspan="4">
              <div style="text-align: left; font-size:1px;">
                <strong style="text-align: center;"> PENDAPATAN</strong><br><br>
                <strong>JMLH. MASUK :</strong> <?= $spctk['t_masuk']; ?> HARI<br>
                <strong>UANG MAKAN </strong> : <?= rupiah($spctk['um']); ?><br>
                <strong>BONUS</strong><span style="padding-left: 44px;">: <?= rupiah($spctk['bonus']); ?></span><br>
                <strong>LEMBUR</strong><span style="padding-left:36px;">: <?= rupiah($spctk['lembur']); ?>, [ <?= $spctk['tot_lem']; ?> / Hari ]</span><br><br>
                <strong>BULANAN</strong><br>
                GAJI POKOK <span style="padding-left: 56px;">: <?= rupiah($spctk['gaji_pk']); ?></span><br>
                TUNJANGAN JABATAN : <?= rupiah($spctk['gaji_tunj']); ?><br>
                BPJS KESEHATAN <span style="padding-left: 25px;">:</span><br>
                BPJS JHT <span style="padding-left:74px;">:</span><br>
                SUBSIDI GAJI <span style="padding-left: 51px;"></span> :<br><br>
                <strong>PENDAPATAN BULANAN</strong> : <?= rupiah($penbul); ?><br><br>
                <strong>TOTAL PENDAPATAN</strong><span style="padding-left: 21px;"> : <?= rupiah($tot2); ?></span><br>
              </div>
            </td>
          </tr>
          <tr>
            <td style="border-top: solid 1px black;" colspan="4">
              <div style="text-align: left; font-size:12px;">
                <strong>POTONGAN</strong><br><br>

                <strong>TOTAL KASBON</strong><span style="padding-left: 23px;"><strong>: <?= rupiah(0); ?></strong></span><br>
                <strong>SISA KASBON</strong><span style="padding-left: 31px;"><strong> : <?= rupiah(0); ?></strong></span><br><br>
                POT.KASBON <span style="padding-left: 25%;"> : <?= rupiah(0); ?></span><br>
                POT.BPJS KESEHATAN <span style="padding-left: 4%;"> : <?= rupiah(0); ?></span><br>
                POT.BPJS JHT <span style="padding-left: 23%;">: <?= rupiah(0); ?></span><br>
                POT.LAIN-LAIN <span style="padding-left: 22%;">: <?= rupiah(0); ?></span><br><br>
                <strong>TOTAL POTONGAN </strong><span style="padding-left:11%;"><strong>: <?= Rupiah($tot3); ?></strong></span><br>
              </div>
            </td>
          </tr>
          <tr>
            <td style="border-top: solid 1px black;" colspan="4">
              <div style="text-align: left; font-size:8px"><br>
                <strong>GAJI YANG DI BAYARKAN</strong> : <strong><?= rupiah($tot4); ?></strong><br><br><br>
                <div style="text-align-last: right; margin-right:12px;">
                  MENGETAHUI<br><br><br><br>
                  PERSONALIA<br>
                </div>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  <?php
  }
  ?>
</body>
<div class="tgl">
</div>
<script>
//   window.onload = function() {
//      window.print();
//   }
//   window.document.close();
//   window.location.href = "location: laporan.php";
   //direct after print !!//
   window.setTimeout(function() {
     location.href = "laporan.php";
   }, 2000);
</script>