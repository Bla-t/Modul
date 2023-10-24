<?php
include "nav.php";
?>
<section>
  <div class="activity-card">
    <div class="form-inline d-flex mb-3 mt-2">
      <h4>tambah daerah | </h4>
      <a href="tarifs.php" class="btn btn-success btn-sm ml-1 mb-2">kembali</a>
    </div>
    <div class="row" style="border-top:solid 2px;">
      <div class="col mt-3">
      <form action="" method="POST">
        <div class="form-row">
          <label for="daerah">nama daerah</label>
            <input type="text" id="daerah" class="form-control form-control-sm" required name="daerah">
          <label for="kode">kode daerah</label>
            <input type="text" id="kode" class="form-control form-control-sm" required name="kode">
            <button type="submit" name="sumpit" class="btn btn-primary btn-sm mt-2">simpan</button>
            <?php
            if (isset($_POST['sumpit'])) {
              $daerah = $_POST['daerah'];
              $kode = $_POST['kode'];
              mysqli_query($conn, "INSERT INTO `daerah_tarif`(`nama_daerah`,`kode`) VALUE('$daerah','$kode')") or die(mysqli_error($conn));
            }
            ?>
        </div>
      </form>
      </div>
      <div class="col mt-3">
        <div class="table table-responsive scroll">
          <table>
            <thead>
              <tr>
                <th>no.</th>
                <th>daerah</th>
                <th>kode</th>
                <th></th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              $daerah = mysqli_query($conn, "SELECT * FROM `daerah_tarif` ORDER BY `nama_daerah`") or die(mysqli_error($conn));
              while ($is = mysqli_fetch_array($daerah)) {
              ?>
                <tr>
                  <form action="updell.php" method="POST">
                    <td><?= $no++ ?>.</td>
                    <td><?= $is['nama_daerah'] ?></td>
                    <td><?= $is['kode'] ?></td>
                    <td>
                      <button name="edit" class="btn btn-warning btn-sm hils"><input name="edit" type="hidden" value="<?= $is['id'] ?>"><span class="ti-settings" style="color:black;"></span></button>
                    </td>
                    <td>
                      <button name="hap" class="btn btn-danger btn-sm hils"><input name="idi" type="hidden" value="<?= $is['id'] ?>"><span class="ti-trash" style="color:black;"></span></button>
                    </td>
                  </form>
                </tr>
              <?php
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
<?php
include "footer.php";
?>