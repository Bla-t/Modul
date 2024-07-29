<?php
include "nav.php";
$pilih = mysqli_query($conn, "SELECT * FROM `daerah_tarif` ORDER BY `nama_daerah`") or die(mysqli_error($conn));
?>
<style>
    th{
        font-size:0.5rem;
    }
</style>
<section>
  <div class="activity-card">
    <div class="form-inline d-flex">
      <h3>DAFTAR HARGA TES || </h3>
      <a href="tarifs.php" class="btn btn-sm btn-warning ml-2">KEMBALI</a>
      <form action="" method="post">
    </div><br>
    <div class="row">
      <div class="form-inline d-flex">
        <select class="form-control" name="tipe" id="tipe" required onchange="this.form.submit();">
          <?php
          if (isset($_POST['tipe'])) {
            echo '<option value="" selected disabled>' . $_POST['tipe'] . '</option>';
          } else {
          ?>
            <option value="" selected disabled>daftar harga</option>
          <?php
          }
          while ($cek = mysqli_fetch_array($pilih)) {
            echo '<option value="' . $cek["kode"] . '">' . $cek["nama_daerah"] . '</option>';
          }
          ?>
        </select>
        <label class="ml-2" for="#input">cari :</label>
        <input class="form-control ml-2" type="text" id="input">
      </div>
    </div><br>
    <div class="row">
      <style>
        .table-responsive {
          height: 600px;
          overflow: scroll;
        }
         .kolm .form-control {
            width: 80px;
        }
         table th {
            font-size: 0.8rem;
        }

        /*.table-responsive::-webkit-scrollbar {
          width: 1px;
        }*/
      </style>
      <div class="table table-responsive table-hover">
        <?php
        $no = 1;
        $get = $_POST['tipe'];
        if (!isset($get)) {
          # code...
          echo "<br><p id='tek'>Harap Pilih dulu daftar harga mana yang akan di rubah.. ..!</p>";
          $tips = '';
        }
        if (isset($get)) {
          $tnhtosmt = mysqli_query($conn, "SELECT * FROM `tarif_dev` WHERE `dari` = '$get'") or die(mysqli_error($conn));
          $daera = mysqli_fetch_assoc($pilih);
          $tiep = mysqli_query($conn, "SELECT * FROM `daerah_tarif` WHERE `kode` = '$get' ORDER BY `nama_daerah`") or die(mysqli_error($conn));
          $daera = mysqli_fetch_assoc($tiep);
          $tips = 'tarif ' . $daera['nama_daerah'];
        }
        ?>
        <h4><?= strtoupper($tips); ?></h4>
        <div class="table table-responsive table-sm scroll">
        <table class="table table-hover">
          <thead class="thead-dark">
            <tr>
              <th>no</th>
              <th>Dari</th>
              <th>Tujuan</th>
              <th class="kolm">Min1-10</th>
              <th class="kolm">Kons1-10</th>
              <th class="kolm">Kg1-10</th>
              <th class="kolm">Min11-20</th>
              <th class="kolm">Kons11-20</th>
              <th class="kolm">Kg11-20</th>
              <th class="kolm">Min21-50</th>
              <th class="kolm">Kons21-50</th>
              <th class="kolm">Kg21-50</th>
              <th class="kolm">Min51-100</th>
              <th class="kolm">Kons51-100</th>
              <th class="kolm">Kg51-100</th>
              <th class="kolm">Min101</th>
              <th class="kolm">Kons101</th>
              <th class="kolm">Kg101</th>
              <th class="kolm">Kubikasi</th>
              <th class="kolm">estimasi</th>
              <th>aksi</th>
            </tr>
          </thead>
          <tbody id="table">
            <?php
            while ($isi = mysqli_fetch_array($tnhtosmt)) {
            ?>
              <tr>
                <td><?= $no++ ?>.</td>
                <td><?= $isi['dari'] ?></td>
                <td><?= $isi['tujuan'] ?></td>
                <td class="kolm"><input class="form-control form-control-sm" type="text" value="<?= $isi['min1-10'] ?>"></td>
                <td class="kolm"><input class="form-control form-control-sm" type="text" value="<?= $isi['kons1-10'] ?>"></td>
                <td class="kolm"><input class="form-control form-control-sm" type="text" value="<?= $isi['kg1-10'] ?>"></td>
                <td class="kolm"><input class="form-control form-control-sm" type="text" value="<?= $isi['min11-20'] ?>"></td>
                <td class="kolm"><input class="form-control form-control-sm" type="text" value="<?= $isi['kons11-20'] ?>"></td>
                <td class="kolm"><input class="form-control form-control-sm" type="text" value="<?= $isi['kg11-20'] ?>"></td>
                <td class="kolm"><input class="form-control form-control-sm" type="text" value="<?= $isi['min21-50'] ?>"></td>
                <td class="kolm"><input class="form-control form-control-sm" type="text" value="<?= $isi['kons21-50'] ?>"></td>
                <td class="kolm"><input class="form-control form-control-sm" type="text" value="<?= $isi['kg21-50'] ?>"></td>
                <td class="kolm"><input class="form-control form-control-sm" type="text" value="<?= $isi['min101'] ?>"></td>
                <td class="kolm"><input class="form-control form-control-sm" type="text" value="<?= $isi['kons101'] ?>"></td>
                <td class="kolm"><input class="form-control form-control-sm" type="text" value="<?= $isi['kg101'] ?>"></td>
                <td class="kolm"><input class="form-control form-control-sm" type="text" value="<?= $isi['kubikasi'] ?>"></td>
                <td class="kolm"><input class="form-control form-control-sm" type="text" value="<?= $isi['estimasi'] ?>"></td>
                <td class="d-flex">
                  <a href="#" class="btn btn-outline-warning btn-sm"><span class="ti-save"></span></a>
                  <a href="#" class="btn btn-outline-danger btn-sm ml-1"><span class="ti-trash"></span></a>
                </td>
              </tr>
            <?php
            }
            ?>
          </tbody>
        </table>
        </div>
      </div>
    </div>
    </form>
  </div>
</section>
<?php
include "footer.php";
?>