<?php
include '../config.php';
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
$cek = $_GET['export'];
$bul = $_GET['buln'];
$thn = $_GET['tahn'];
$text_tgl = tgln(date('m', strtotime($thn . "-" . $bul)));

header("Content-type: application/vnd-ms-excel");
// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=LAPORAN PEMBELIAN " . $text_tgl . " " . $thn . ".xls");
switch ($cek) {
  case "GA":
    // Tambahkan table
?>
    <meta charset="UTF-8">
    <table border="1">
      <h2 style="text-align: center;"> LAPORAN PEMBELIAN (GA)</h2>
      <thead>
        <tr>
          <th>No.</th>
          <th>Nota</th>
          <th>SKU</th>
          <th>Nama</th>
          <th>tgl.transaksi</th>
          <th>Keterangan</th>
          <th>acc</th>
          <th>Jumlah</th>
          <th>Total</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        $TOT = mysqli_query($conn, "SELECT SUM(total) AS 'tot' FROM `stok_isibeli` WHERE MONTH(tgl) = '$bul' AND YEAR(tgl) = '$thn' AND `milik` = '$cek'");
        $has = mysqli_fetch_assoc($TOT);
        $isi_ga = mysqli_query($conn, " SELECT * FROM `stok_isibeli` WHERE MONTH(tgl) = '$bul' AND YEAR(tgl) = '$thn' AND `milik` = '$cek' ORDER BY `tgl` ASC") or die(mysqli_error($conn));
        while ($take = mysqli_fetch_array($isi_ga)) {
        ?>
          <tr>
            <td style="text-align: center;"><?= $no++; ?></td>
            <td><?= $take['nota']; ?></td>
            <td><?= $take['kode_barang']; ?></td>
            <td><?= $take['nama']; ?></td>
            <td><?= date('d M, Y', strtotime($take['tgl'])); ?></td>
            <td><?= $take['keterangan']; ?></td>
            <td><?= $take['acc']; ?></td>
            <td><?= $take['jumlah']; ?> Pcs</td>
            <td><?= rupiah($take['total']); ?></td>
          </tr>
        <?php } ?>
        <tr>
          <?php
          for ($o = 0; $o <= 6; $o++) {
            echo '<td ' . $o . ' style="border:none;"></td>';
          }
          ?>
          <td style="font-weight: bold;">Total:</td>
          <td style="font-weight: bold;"><?= rupiah($has['tot']); ?></td>
        </tr>
      </tbody>
    </table>
  <?php
    break;
  case "ARM":
    // Tambahkan table
  ?>
    <meta charset="UTF-8">
    <table border="1">
      <h2 style="text-align: center;"> LAPORAN PEMBELIAN (ARM)</h2>
      <thead>
        <tr>
          <th>No.</th>
          <th>Nota</th>
          <th>SKU</th>
          <th>Nama</th>
          <th>tgl.transaksi</th>
          <th>Keterangan</th>
          <th>acc</th>
          <th>Jumlah</th>
          <th>Total</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        $TOT = mysqli_query($conn, "SELECT SUM(total) AS 'tot' FROM `stok_isibeli` WHERE MONTH(tgl) = '$bul' AND YEAR(tgl) = '$thn' AND `milik` = '$cek'");
        $has = mysqli_fetch_assoc($TOT);
        $isi_ga = mysqli_query($conn, " SELECT * FROM `stok_isibeli` WHERE MONTH(tgl) = '$bul' AND YEAR(tgl) = '$thn' AND `milik` = '$cek' ORDER BY `tgl` ASC") or die(mysqli_error($conn));
        while ($take = mysqli_fetch_array($isi_ga)) {
        ?>
          <tr>
            <td style="text-align: center;"><?= $no++; ?></td>
            <td><?= $take['nota']; ?></td>
            <td><?= $take['kode_barang']; ?></td>
            <td><?= $take['nama']; ?></td>
            <td><?= date('d M, Y', strtotime($take['tgl'])); ?></td>
            <td><?= $take['keterangan']; ?></td>
            <td><?= $take['acc']; ?></td>
            <td><?= $take['jumlah']; ?> Pcs</td>
            <td><?= rupiah($take['total']); ?></td>
          </tr>
        <?php } ?>
        <tr>
          <?php
          for ($o = 0; $o <= 6; $o++) {
            echo '<td ' . $o . ' style="border:none;"></td>';
          }
          ?>
          <td style="font-weight: bold;">Total:</td>
          <td style="font-weight: bold;"><?= rupiah($has['tot']); ?></td>
        </tr>
      </tbody>
    </table>
  <?php
    break;
  default:
    // Tambahkan table
  ?>
    <meta charset="UTF-8">
    <table border="1">
      <h2 style="text-align: center;"> LAPORAN PEMBELIAN</h2>
      <thead>
        <tr>
          <th>No.</th>
          <th>Nota</th>
          <th>SKU</th>
          <th>Nama</th>
          <th>tgl.transaksi</th>
          <th>Keterangan</th>
          <th>acc</th>
          <th>Jumlah</th>
          <th>Total</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        $TOT = mysqli_query($conn, "SELECT SUM(total) AS 'tot' FROM `stok_isibeli` WHERE MONTH(tgl) = '$bul' AND YEAR(tgl) = '$thn'");
        $has = mysqli_fetch_assoc($TOT);
        $isi_ga = mysqli_query($conn, " SELECT * FROM `stok_isibeli` WHERE MONTH(tgl) = '$bul' AND YEAR(tgl) = '$thn' ORDER BY `tgl` ASC") or die(mysqli_error($conn));
        while ($take = mysqli_fetch_array($isi_ga)) {
        ?>
          <tr>
            <td style="text-align: center;"><?= $no++; ?></td>
            <td><?= $take['nota']; ?></td>
            <td><?= $take['kode_barang']; ?></td>
            <td><?= $take['nama']; ?></td>
            <td><?= date('d M, Y', strtotime($take['tgl'])); ?></td>
            <td><?= $take['keterangan']; ?></td>
            <td><?= $take['acc']; ?></td>
            <td><?= $take['jumlah']; ?> Pcs</td>
            <td><?= rupiah($take['total']); ?></td>
          </tr>
        <?php } ?>
        <tr>
          <?php
          for ($o = 0; $o <= 6; $o++) {
            echo '<td ' . $o . ' style="border:none;"></td>';
          }
          ?>
          <td style="font-weight: bold;">Total:</td>
          <td style="font-weight: bold;"><?= rupiah($has['tot']); ?></td>
        </tr>
      </tbody>
    </table>
<?php
    break;
}

function rupiah($angka)
{

  $hasil_rupiah = "Rp." . number_format($angka, 0, ',', '.');
  return $hasil_rupiah;
}
