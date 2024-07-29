<?php
include "header.php";
?>
<section class="recent">
  <div class="activity-card">
    <?php
    $a = date('Y');
    $m = date('m');
    if ($level == "sudo") {
      $TOT = mysqli_query($conn, "SELECT SUM(total) AS 'tot' FROM `stok_isibeli` WHERE MONTH(tgl) = '$m' AND YEAR(tgl) = '$a'");
    } else {
      $TOT = mysqli_query($conn, "SELECT SUM(total) AS 'tot' FROM `stok_isibeli` WHERE MONTH(tgl) = '$m' AND YEAR(tgl) = '$a' AND `milik` = '$milik'");
    }

    $has = mysqli_fetch_assoc($TOT);
    ?>
    <div class="row">
      <div class="form-inline mb-2">
        <h4 style="margin-top: 0.2rem;"> Laporan Pembelian</h4>
        <a href="index.php" class="btn btn-secondary ml-2">Kembali</a>
      </div>
    </div>
    <div class="row">
      <div class="col-md-5">
        <div class="input-group mb-2">
          <input type="text" class="form-control" id="input" placeholder="cari">
          <div class="input-group-append">
            <span class="input-group-text ti-search"></span>
          </div>
        </div>
      </div>
      <div class="col-md-5">
        <div class="form-inline d-flex">
          <form method="POST" action="">
            <input type="hidden" name="levl" value="<?= $level; ?>">
            <input type="hidden" name="milik" value="<?= $milik; ?>">
            <select class="form-control ml-2" name="bulan" id="" required>
              <?php
              if (isset($_POST['bulan'])) {
                echo '<option value="' . date($_POST['bulan']) . '" selected>' . tgln(date($_POST['bulan'])) . '</option>';
              } else {
                echo '<option value="' . date('m') . '" selected>' . tgln(date('m')) . ' </option>';
              }

              for ($i = 1; $i <= 12; $i++) {
                echo '<option value="' . $i . '">' . tgln(date('m', strtotime($a . '-' . $i))) . '</option></br>';
              }
              ?>
            </select>
            <select class="form-control ml-2" name="tahun" id="" required>
              <?php
              echo '<option selected value="' . $a . '">' . $a . '</option></br>';
              for ($i = 2018; $i <= $a; $i++) {
                echo '<option value="' . $i . '">' . $i . '</option></br>';
              }
              ?>
            </select>
            <input class="btn btn-primary ml-1" type="submit" name="lacak" value="Cari">
          </form>
        </div>
      </div>
    </div>
    <!-- tampilan Default -->
    <?php
    if (!isset($_POST['lacak'])) {
    ?>
      <div class="row">
        <form method="get" action="aksi/downexcel30.php">

          <input type="hidden" name="buln" value="<?= date('m'); ?>">
          <input type="hidden" name="tahn" value="<?= date('Y'); ?>">
          <div class="form-inline mb-2">
            <button class="btn btn-secondary mr-2" onclick="PrintDiv();"><span class="ti-printer"></span></button>
            <button class="btn btn-success">
              <span class="ti-import">
                <input type="hidden" name="export" value="<?= $milik; ?>">
              </span>
            </button>
          </div>
        </form>
      </div>
      <div class="row">
        <div class="table table-responsive scroll" id="tabp">
          <table class="table table-hover">
            <thead class="thead-dark">
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
      <!-- tampilan cari -->
      <div class="row mb-2">
      <form method="get" action="aksi/downexcel30.php">
        <input type="hidden" name="buln" value="<?= $bul; ?>">
        <input type="hidden" name="tahn" value="<?= $thn; ?>">
        <button class="btn btn-secondary ml-4" onclick="PrintDiv();"><span class="ti-printer"></span></button>
        <button class="btn btn-success ml-1"><span class="ti-import"><input type="hidden" name="export" value="<?= $milik; ?>"></span></button>
      </form>
      </div>
      <div class="row">
        <div class="table table-responsive scroll" id="tabp">
          <table class=" table-hover">
            <thead class="thead-dark">
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
  </div>
  <div class="summary">
    <div class="summary-card">
      <div class="card-body">

      </div>
    </div>
  </div>
  <script type="text/javascript">
    function PrintDiv() {
      var divToPrint = document.getElementById('tabp');
      window.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
      window.document.close();
      //direct after print !!//
      window.setTimeout(function() {
        location.href = "rekap_beli.php";
      }, 1000);
    }
  </script>

</section>

<?php include "footer.php" ?>