<?php
include "header.php";
?>
<section>
  <div class="form-inline d-flex">
    <h4>Pesan ||</h4>
    <a href="index.php" class="btn btn-info btn-sm ml-2 text-align-right">Kembali</a>
  </div>
  <div class="row d-flex justify-content-between">
    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#perpesan">Pesan Baru</button>
    <!-- modal pesanan ... -->
    <!-- The Modal -->
    <div class="modal fade" id="perpesan">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Modal Heading</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            Modal body..
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>

        </div>
      </div>
    </div>
    <div class="form-inline">
      <form action="" method="POST">
        <select class="form-control form-control-sm justify-content-right" name="pos" id="pos" onchange="this.form.submit();">
          <?php
          if (isset($_POST['pos'])) {
            echo '<option value="' . $_POST['pos'] . '">' . $_POST['pos'] . '</option>';
          } else {
            echo '<option value="">Pesan Masuk</option>';
          }
          ?>
          <option value="Pesan Masuk">Pesan masuk</option>
          <option value="Pesan Keluar">Pesan keluar</option>
        </select>
    </div>
  </div>
  <div class="row activity-card">
    <div class="table table-responsive table-hover">
      <table>
        <thead>
          <tr>
            <th>No.</th>
            <th>Dari</th>
            <th>Tujuan</th>
            <th>Id Pesan</th>
            <th>Isi Pesanan</th>
            <th>Keterangan</th>
            <th>Tanggal</th>
            <th>Tanggapan</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $take = $_POST['pos'];
          $no = 1;
          switch ($take) {
            case 'Pesan Masuk':
              if ($bse == "pusat") {
                $psps = mysqli_query($conn, "SELECT * FROM `pessans` WHERE `tanggap` = 'BELUM' ORDER BY `tanggal` ASC") or die(mysqli_error($conn));
              } else {
                $psps = mysqli_query($conn, "SELECT * FROM `pessans` WHERE `pesan_tu` = '$bse' AND `tanggap` = 'BELUM' ORDER BY `tanggal` ASC") or die(mysqli_error($conn));
              }
              break;
            case 'Pesan Keluar':
              if ($bse == "pusat") {
                $psps = mysqli_query($conn, "SELECT * FROM `pessans` ORDER BY `tanggal` ASC") or die(mysqli_error($conn));
              } else {
                $psps = mysqli_query($conn, "SELECT * FROM `pessans` WHERE `pesan_dari` = '$bse' ORDER BY `tanggal` ASC") or die(mysqli_error($conn));
              }
              break;
            default:
              if ($bse == "pusat") {
                $psps = mysqli_query($conn, "SELECT * FROM `pessans` WHERE `tanggap` = 'BELUM' ORDER BY `pesan_dari` AND `tanggal` ASC") or die(mysqli_error($conn));
              } else {
                $psps = mysqli_query($conn, "SELECT * FROM `pessans` WHERE `pesan_tu` = '$bse' AND `tanggap` = 'BELUM' ORDER BY `tanggal` AND `pesan_tu` ='$bse' ASC ") or die(mysqli_error($conn));
              }
              break;
          }
          while ($isps = mysqli_fetch_array($psps)) {
          ?>
            <tr>
              <td><?= $no++ ?></td>
              <td><?= $isps['pesan_dari'] ?></td>
              <td><?= $isps['pesan_tu'] ?></td>
              <td><?= $isps['pesan_id'] ?></td>
              <td><?= $isps['pesan_isi'] ?></td>
              <td><?= $isps['keterangan'] ?></td>
              <td><?= $isps['tanggal'] ?></td>
              <td>
                <div class="form-inline d-flex">
                  <button class="btn btn-info btn-sm" id="pesan_tnggap"><span class="ti-new-window"></span></button>
                  <button class="btn btn-danger btn-sm ml-1" id="hapoes"><span class="ti-trash"></span></button>
                </div>
              </td>
            </tr>
          <?php
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
  </form>

</section>
<?php
include "footer.php";
?>