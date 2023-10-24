<?php
include "header.php";
?>
<section class="recent">
  <div class="activity-card">
    <div class="row">
      <div class="form-inline">
        <h3>Daftar Stok |</h3>
        <span></span>
        <a href="index.php" class="btn btn-secondary btn-sm mb-2"> Kembali</a>
      </div>
    </div>
    <div class="row">
      <div class="col-md-5">
        <div class="form-inline mb-3">
          <input type="text" id="input" class="form-control form-control-sm" placeholder="cari">
          <form method="POST" action="">
            <select name="cabs" id="cabs" class="form-control form-control-sm ml-2" required>
              <?php
              if (isset($_POST['cabs'])) {
                echo '<option value="' . $_POST['cabs'] . '" selected>' . $_POST['cabs'] . '</option>';
              } else {
                echo '<option value="" selected disabled>pilih</option>';
              }
              ?>
              <option value="ARM">arm</option>
              <option value="GA">ga</option>
              <option value="SEMUA">Semua</option>
            </select>
            <button type="submit" name="get" class="btn btn-info btn-sm ml-1">cari</button>
          </form>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="table table-responsive scroll">
        <table class="table table-hover">
          <thead class="thead-dark">
            <tr>
              <th>No.</th>
              <th>SKU</th>
              <th>Nama</th>
              <th>merk</th>
              <th>Kategori</th>
              <th>Jumlah Stok</th>
              <th>harga</th>
              <th>harga total</th>
              <th>milik</th>
            </tr>
          </thead>
          <tbody id="table">
            <?php
            if (!isset($_POST['get'])) {
              $cabs = $_POST['cabs'];
              $n = 1;
              if ($cabs = "OPS") {
                $isi = mysqli_query($conn, " SELECT * FROM `stok_databarang` ORDER BY `milik` ASC") or die(mysqli_error($conn));
              } else {
                $isi = mysqli_query($conn, " SELECT * FROM `stok_databarang` WHERE `milik` = '$cabs' ORDER BY `milik` ASC") or die(mysqli_error($conn));
              }
            }
            if (isset($_POST['get'])) {
              $cabs = $_POST['cabs'];
              $n = 1;
              if ($cabs == "SEMUA") {
                $isi = mysqli_query($conn, " SELECT * FROM `stok_databarang` ORDER BY `milik` ASC") or die(mysqli_error($conn));
              } else {
                $isi = mysqli_query($conn, " SELECT * FROM `stok_databarang` WHERE `milik` ='$cabs' ORDER BY `milik` ASC") or die(mysqli_error($conn));
              }
            }
            while ($data = mysqli_fetch_array($isi)) {

            ?>
              <tr>
                <td><?= $n++ . '.'; ?></td>
                <td><?= $data['id_barang']; ?></td>
                <td><?= $data['nama_barang']; ?></td>
                <td><?= $data['merk'] ?></td>
                <td><?= $data['kategori']; ?></td>
                <td><?= $data['stok']; ?> pcs</td>
                <td><?= rupiah($data['harga_beli']); ?></td>
                <td>
                  <?= rupiah($data['harga_beli'] * $data['stok']); ?>
                  <input type="hidden" class="sumal" value="<?= $data['harga_beli'] * $data['stok']; ?>">
                </td>
                <td><?= $data['milik']; ?></td>
              </tr>
            <?php } ?>
            <tr>
              <?php
              for ($i = 0; $i < 6; $i++) {
                echo '<td id="' . $i . '"></td>';
              }
              ?>
              <td>Total :</td>
              <td>
                <p id="cekto">
                  <!-- isinya total.!! -->
                </p>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>
<script>
  var su = 0;
  $(".sumal").each(function() {
    var take = su += parseFloat(this.value)
    $("#cekto").text('Rp.' + take);
  });
</script>
<?php
include "footer.php";
