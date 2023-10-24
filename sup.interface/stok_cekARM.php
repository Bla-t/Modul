<?php
include "nav.php";
$isi = mysqli_query($conn, "SELECT * FROM `stok_databarang` WHERE `milik` = 'ARM' ") or die(mysqli_error($conn));
?>

<section>
  <div class="activity-card">
    <div class="row">
      <div class="form-inline d-flex">
        <h4>Edit Stok ARMADA| </h4>
        <a href="editlaporan_beliARM.php" class="btn btn-warning btn-sm ml-2 mb-2">Laporan Beli</a>
        <!-- <a href="" class="btn btn-primary btn-sm"></a> -->
      </div>
    </div>
    <div class="row">
      <div class="form-inline d-flex">
        <input class="form-control form-control-sm ml-2" type="text" placeholder="Cari" id="input">
      </div>
    </div><br>
    <div class="row">
      <div class="table table-responsive scroll">
        <table class="table table-hover table-sm">
          <thead class="thead-dark">
            <tr>
              <th>No.</th>
              <th>id barang</th>
              <th>Nama Barang</th>
              <th>Merk</th>
              <th>kategori</th>
              <th>harga Beli</th>
              <th>stok</th>
              <th>milik</th>
              <th>aksi</th>
            </tr>
          </thead>
          <tbody id="table">
            <?php
            $ket = $_POST['carh'];
            switch ($ket) {
              case 'armada':
                $isi = mysqli_query($conn, "SELECT * FROM `stok_databarang` WHERE `milik` = 'ARM' ") or die(mysqli_error($conn));
                break;
              case 'gudang':
                $isi = mysqli_query($conn, "SELECT * FROM `stok_databarang` WHERE `milik` = 'GA' ") or die(mysqli_error($conn));
                break;
            }
            $no = 1;
            while ($tulis = mysqli_fetch_array($isi)) {
            ?>
              <form action="updell.php" method="POST">
                <tr class="align-conten-center">
                  <td><input type="hidden" name="dari" value="<?= $tulis['milik'] ?>"><?= $no++ ?> .</td>
                  <td><?= $tulis['id_barang'] ?></td>
                  <td><?= $tulis['nama_barang'] ?></td>
                  <td><?= $tulis['merk'] ?></td>
                  <td><?= $tulis['kategori'] ?></td>
                  <td><?= $tulis['harga_beli'] ?></td>
                  <td><input class="form-control form-control-sm" type="text" name="stoks" value="<?= $tulis['stok'] ?>"></td>
                  <td><?= $tulis['milik'] ?></td>
                  <td class="d-flex">
                    <button class="btn btn-outline-warning btn-sm stok" name="edits"><input type="hidden" name="sicm" value="<?= $tulis['id'] ?>"><span class="ti-save"></span></button>
                    <button class="btn btn-outline-danger btn-sm ml-2 stok" name="hapusstok"><input type="hidden" name="hacm" value="<?= $tulis['id'] ?>"><span class="ti-trash"></span></button>
                  </td>
                </tr>
              </form>
            <?php
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>
<?php
include "footer.php";
?>