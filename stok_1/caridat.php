<?php
include "header.php";
?>
<section class="recent">
  <div class="activity-card">
    <?php
    /*$a = date('Y');
    $m = date('m');*/
    if ($level == "sudo") {
      $TOT = mysqli_query($conn, "SELECT SUM(harga) AS 'tot' FROM `stok_isipakai` WHERE MONTH(tgl) = '$m' AND YEAR(tgl) = '$a'");
    } else {
      $TOT = mysqli_query($conn, "SELECT SUM(harga) AS 'tot' FROM `stok_isipakai` WHERE MONTH(tgl) = '$m' AND YEAR(tgl) = '$a' AND `milik` = '$milik'");
    }
    $has = mysqli_fetch_assoc($TOT);
    ?>
    <div class="form-inline d-flex">
      <h4 style="margin-top: 0.2rem;"> Cari data</h4>
      <a href="index.php" class="btn btn-secondary ml-2">Kembali</a>
    </div>
    <div class="row">
      <div class="col-md-5">
        <div class="input-group mb-3">
          <input type="text" class="form-control" id="input" placeholder="cari">
          <div class="input-group-append">
            <span class="input-group-text ti-search"></span>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-inline">
          <form method="POST" action="">
            <input type="hidden" name="levl" value="<?= $level; ?>">
            <input type="hidden" name="milik" value="<?= $milik; ?>">
            <select class="form-control" name="cars" id="" required placeholder="masukan nama barang">
              <?php
              $dabar = mysqli_query($conn, "SELECT * FROM `stok_databarang` ORDER BY `nama_barang` ASC") or die(mysqli_error($conn));
              while ($isibar = mysqli_fetch_array($dabar)) {
              ?>
                <option value="<?= $isibar['nama_barang']; ?>"><?= $isibar['nama_barang']; ?></option>
              <?php
              }
              ?>
            </select>
            <input class="btn btn-primary btn-sm ml-1" type="submit" name="lacak" value="Cari">
          </form>
        </div>
      </div>
    </div>
    <?php
    if (!isset($_POST['lacak'])) {
      echo '<p class="text-warning" font-weight-bold >isi dulu..</p>';
    }
    if (isset($_POST['lacak'])) {

      $lacak = $_POST['cars'];
      $bul = $_POST['bulan'];
      $thn = $_POST['tahun'];
      $cekisi = mysqli_query($conn, "SELECT COUNT(`nama`) as 'if' FROM `stok_isipakai` WHERE `nama` = 'cars'") or die(mysqli_error($conn));
      $take = mysqli_fetch_assoc($cekisi);
      if (empty($take['if'])) {
        echo '<p class="text-danger font-weight-bold">&emsp;data tidak ditemukan</p>';
      } else {
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
                $isi = mysqli_query($conn, " SELECT * FROM `stok_isipakai` WHERE `nama` = '$lacak' ORDER BY `tgl` ASC") or die(mysqli_error($conn));

                $TOT = mysqli_query($conn, "SELECT SUM(harga) AS 'tot' FROM `stok_isipakai` WHERE MONTH(tgl) = '$bul' AND YEAR(tgl) = '$thn'");
              } else {
                $isi = mysqli_query($conn, " SELECT * FROM `stok_isipakai` WHERE `nama`='$lacak' ORDER BY `tgl` ASC") or die(mysqli_error($conn));

                $TOT = mysqli_query($conn, "SELECT SUM(harga) AS 'tot' FROM `stok_isipakai` WHERE `nama` = '$lacak' AND `milik` = '$milik'");
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
                    <td><?php echo rupiah($data['harga']); ?></td>
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



  <?php include "footer.php" ?>