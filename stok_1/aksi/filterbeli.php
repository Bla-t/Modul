<!-- tampilan Default -->
<?php
session_start();
$level = $_SESSION['levl'];
$username = $_SESSION['nama'];
$milik = $_SESSION['bagian'];
$a = date('Y');
$m = date('m');
if ($level == "sudo") {
  $TOT = mysqli_query($conn, "SELECT SUM(total) AS 'tot' FROM `stok_isibeli` WHERE MONTH(tgl) = '$m' AND YEAR(tgl) = '$a'");
} else {
  $TOT = mysqli_query($conn, "SELECT SUM(total) AS 'tot' FROM `stok_isibeli` WHERE MONTH(tgl) = '$m' AND YEAR(tgl) = '$a' AND `milik` = '$milik'");
}

$has = mysqli_fetch_assoc($TOT);
if (!isset($_POST['lacak'])) {
?>
  <div class="row">
    <div class="scroll table-responsive" id="tabp">
      <table class=" table-hover">
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
        <?php
        $n = 1;
        if ($level == "sudo") {
          $isi = mysqli_query($conn, " SELECT * FROM `stok_isibeli` WHERE MONTH(tgl) = '$m' AND YEAR(tgl) = '$a' ORDER BY `tgl` ASC") or die(mysqli_error($conn));
        } else {
          $isi = mysqli_query($conn, " SELECT * FROM `stok_isibeli` WHERE MONTH(tgl) = '$m' AND YEAR(tgl) = '$a' AND `milik`='$milik' ORDER BY `tgl` ASC") or die(mysqli_error($conn));
        } ?>
        <tbody id="table">
          <?php
          while ($data = mysqli_fetch_array($isi)) {

          ?>
            <tr>
              <td><?php echo $n++ . '.'; ?></td>
              <td><?php echo $data['nota']; ?></td>
              <td><?= $data['kode_barang']; ?></td>
              <td><?= $data['nama']; ?></td>
              <td><?php echo date('d M, Y', strtotime($data['tgl'])); ?></td>
              <td><?php echo $data['keterangan']; ?></td>
              <td><?php echo $data['acc']; ?></td>
              <td><?php echo $data['jumlah']; ?> Pcs</td>
              <td><?php echo rupiah($data['total']); ?></td>
            </tr>
          <?php } ?>
          <tr>
            <?php
            for ($o = 0; $o <= 6; $o++) {
              echo "<td $o></td>";
            }
            ?>
            <td class="font-weight-bold">Total:</td>
            <td class="font-weight-bold"><?= rupiah($has['tot']); ?></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
<?php
}
if (isset($_POST['lacak'])) {
  $bul = $_POST['bulan'];
  $thn = $_POST['tahun'];
?>
  <div class="row">
    <div class="scroll table-responsive" id="tabp">
      <table class=" table-hover">
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
        <?php
        $n = 1;
        if ($level == "sudo") {
          $isi = mysqli_query($conn, " SELECT * FROM `stok_isibeli` WHERE MONTH(tgl) = '$bul' AND YEAR(tgl) = '$thn' ORDER BY `tgl` ASC") or die(mysqli_error($conn));

          $TOT = mysqli_query($conn, "SELECT SUM(total) AS 'tot' FROM `stok_isibeli` WHERE MONTH(tgl) = '$bul' AND YEAR(tgl) = '$thn'");
        } else {
          $isi = mysqli_query($conn, " SELECT * FROM `stok_isibeli` WHERE MONTH(tgl) = '$bul' AND YEAR(tgl) = '$thn' AND `milik`='$milik' ORDER BY `tgl` ASC") or die(mysqli_error($conn));

          $TOT = mysqli_query($conn, "SELECT SUM(total) AS 'tot' FROM `stok_isibeli` WHERE MONTH(tgl) = '$bul' AND YEAR(tgl) = '$thn' AND `milik` = '$milik'");
        }
        $has = mysqli_fetch_assoc($TOT);
        ?>
        <tbody id="table">
          <?php
          while ($data = mysqli_fetch_array($isi)) {

          ?>
            <tr>
              <td><?php echo $n++ . '.'; ?></td>
              <td><?php echo $data['nota']; ?></td>
              <td><?= $data['kode_barang']; ?></td>
              <td><?= $data['nama']; ?></td>
              <td><?php echo date('d M, Y', strtotime($data['tgl'])); ?></td>
              <td><?php echo $data['keterangan']; ?></td>
              <td><?php echo $data['acc']; ?></td>
              <td><?php echo $data['jumlah']; ?> Pcs</td>
              <td><?php echo rupiah($data['total']); ?></td>
            </tr>
          <?php } ?>
          <tr>
            <?php
            for ($o = 0; $o <= 6; $o++) {
              echo "<td $o></td>";
            }
            ?>
            <td class="font-weight-bold">Total:</td>
            <td class="font-weight-bold"><?= rupiah($has['tot']); ?></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
<?php

}

?>