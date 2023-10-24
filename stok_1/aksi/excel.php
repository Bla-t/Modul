<?php
include "../config.php";
date_default_timezone_set('Asia/Jakarta');
function rupiah($angka)
{

  $hasil_rupiah = "Rp." . number_format($angka, 0, ',', '.');
  return $hasil_rupiah;
}

$part = $_GET['extr'];
$nota = $_GET['nota'];
$part2 =  substr($nota, 0, 3);
$num = 1;
// Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-excel");

// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename= " . $nota . ".xls");

// Tambahkan table
switch ($part) {
    #laporan beli..!!
  case 'beli':
?>
    <meta charset="UTF-8">
    <table border=1>
      <h3 style="text-align: center;"> NOTA PEMBELIAN <?= $nota; ?></h3>
      <thead>
        <tr>
          <th>No.</th>
          <th>SKU</th>
          <th>Nama</th>
          <th>jumlah</th>
          <th>Total</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $query = mysqli_query($conn, "SELECT * FROM `stok_isibeli` WHERE `nota` = '$nota'") or die(mysqli_error($conn));
        $sum = mysqli_query($conn, "SELECT SUM(total) AS 'ttl' FROM `stok_isibeli` WHERE `nota` = '$nota'") or die(mysqli_error($conn));
        $total_harga = mysqli_fetch_assoc($sum);
        while ($rinci = mysqli_fetch_array($query)) { ?>
          <tr>
            <td><?php echo $num++; ?></td>
            <td><?php echo $rinci['kode_barang']; ?></td>
            <td><?php echo $rinci['nama']; ?></td>
            <td><?php echo $rinci['jumlah']; ?> Pcs</td>
            <td><?php echo rupiah($rinci['total']); ?></td>
          </tr>
        <?php } ?>
        <tr>
          <?php
          for ($t = 0; $t <= 2; $t++) {
            echo '<td style = "border:none;"' . $t . '></td>';
          }

          ?>
          <td>Total :</td>
          <td> <?= rupiah($total_harga['ttl']); ?></td>
        </tr>
      </tbody>
    </table>
    <?php

    break;
}
switch ($part2) {
  case 'SRV':
    $npl = $_GET['nopol'];
    $nop_pol = mysqli_query($conn, " SELECT * FROM `stok_member` WHERE `nopol` = '$npl'") or die(mysqli_error($conn));
    while ($nopol = mysqli_fetch_array($nop_pol)) {
    ?>
      <meta charset="UTF-8">
      <table border=1>
        <h3 style="text-align: center;"> NOTA PEMAKAIAN <?= $nota; ?></h3>
        <div>
          <div class="row" style="border-bottom: 1px solid #cccc;">
            <div class="col">
              <p><span class="font-weight-bold">No. Nota : </span><?php echo $nota; ?></p>
              <p><span class="font-weight-bold">No. Mesin : </span><?php echo $nopol['nomesin']; ?></p>
            </div>
            <div class="col">
              <p><span class="font-weight-bold">No.Polisi :</span> <?php echo $nopol['nopol']; ?></p>
              <p><span class="font-weight-bold">Jenis :</span> <?php echo $nopol['jenis']; ?></p>
            </div>
          </div>
        <?php } ?>
        <thead>
          <tr>
            <th>No.</th>
            <th>SKU</th>
            <th>Nama</th>
            <th>jumlah</th>
            <th>Total</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $query = mysqli_query($conn, "SELECT * FROM `stok_isipakai` WHERE `nota` = '$nota'") or die(mysqli_error($conn));
          $sum = mysqli_query($conn, "SELECT SUM(harga) AS 'ttl' FROM `stok_isipakai` WHERE `nota` = '$nota'") or die(mysqli_error($conn));
          $total_harga = mysqli_fetch_assoc($sum);
          while ($rinci = mysqli_fetch_array($query)) {
          ?>
            <tr>
              <td><?php echo $num++; ?></td>
              <td><?php echo $rinci['kode_barang']; ?></td>
              <td><?php echo $rinci['nama']; ?></td>
              <td><?php echo $rinci['jumlah']; ?> Pcs</td>
              <td><?php echo rupiah($rinci['harga']); ?></td>
            </tr>
          <?php } ?>
          <tr>
            <?php
            for ($i = 0; $i <= 2; $i++) {
              echo '<td style="border:none;"' . $i . '></td>';
            }
            ?>
            <td>Total : </td>
            <td><?= rupiah($total_harga['ttl']); ?></td>
          </tr>
        </tbody>
      </table>
      </div>
      </div>
    <?php
    break;
  case 'DIS';
    ?>
      <table border=1>
        <thead>
          <h3 style="text-align: center; border:box 1px;"> NOTA DISTRIBUSI <?= $nota; ?></h3>
          <tr>
            <th>No.</th>
            <th>SKU</th>
            <th>Nama</th>
            <th>jumlah</th>
            <th>Total</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $query = mysqli_query($conn, "SELECT * FROM `stok_isipakai` WHERE `nota` = '$nota'") or die(mysqli_error($conn));
          $sum = mysqli_query($conn, "SELECT SUM(harga) AS 'ttl' FROM `stok_isipakai` WHERE `nota` = '$nota'") or die(mysqli_error($conn));
          $total_harga = mysqli_fetch_assoc($sum);
          while ($rinci = mysqli_fetch_array($query)) {
          ?>
            <tr>
              <td><?php echo $num++; ?></td>
              <td><?php echo $rinci['kode_barang']; ?></td>
              <td><?php echo $rinci['nama']; ?></td>
              <td><?php echo $rinci['jumlah']; ?> Pcs</td>
              <td><?php echo rupiah($rinci['harga']); ?></td>
            </tr>
          <?php } ?>
          <tr>
            <?php
            for ($i = 0; $i <= 2; $i++) {
              echo '<td style="border:none;"' . $i . '></td>';
            }
            ?>
            <td>Total : </td>
            <td><?= rupiah($total_harga['ttl']); ?></td>
          </tr>
        </tbody>
      </table>
  <?php
    break;
}
