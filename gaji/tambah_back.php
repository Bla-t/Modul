<?php
include "header.php";
//take awal gaji um
$gaji_awal = mysqli_query($conn, "SELECT * FROM `gaji_gaji_golongan` WHERE `id` = '2'");
$ga = mysqli_fetch_assoc($gaji_awal);
$um_awal = mysqli_query($conn, "SELECT * FROM `gaji_um_golongan` WHERE `id` = '1'");
$u = mysqli_fetch_assoc($um_awal);
?>

<section>
  <div class="card">
    <h4>Tambah data Karyawan</h4>
  </div>
  <div class="activity-card">
    <form action="" method="POST">
      <div class="row">
        <div class="col">
          <div class="form-group">
            <label for="nama">Nama :</label>
            <input type="text" id="nama" name="nama" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="almt">Alamat :</label>
            <textarea id="almt" name="almt" class="form-control" required></textarea>
          </div>
          <div class="form-row">
            <div class="col">
              <label for="nib">NIB :</label>
              <input id="almt" name="nib" class="form-control" required>
            </div>
            <div class="col">
              <label for="pddk">Pendidikan :</label>
              <input type="text" id="pddk" name="pddk" class="form-control" required>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="form-row">
            <div class="col">
              <label for="slt">golongan :</label>
              <select type="date" id="slt" name="slec" class="form-control" required>
                <option value="" selected disabled>pilih golongan</option>
                <option value="baru">staff baru</option>
                <option value="staff">staff</option>
                <option value="nonstaff">nonstaf</option>
              </select>
            </div>
            <div class="col">
              <label for="tgl">tanggal Masuk :</label>
              <input type="date" id="tgl" name="join" class="form-control" required>
            </div>
          </div>
          <?php
          $ceks = mysqli_query($conn, "SELECT * FROM `gaji_jabatan` ORDER BY `id`");
          // $jab = mysqli_fetch_assoc($ceks);

          ?>
          <div class="form-row">
            <div class="col">
              <label for="cab">Cabang :</label>
              <input type="text" id="cab" name="cab" class="form-control" required>
            </div>
            <div class="col">
              <label for="jbt">Jabatan :</label>
              <select name="jbt" id="jbt" class="form-control" required>
                <option value="" selected disabled>pilih jabatan</option>
                <?php while ($jbtn = mysqli_fetch_array($ceks)) {
                ?>
                  <option value="<?= $jbtn['kode'] . $jbtn['jabatan']; ?>"><?= $jbtn['jabatan']; ?></option>
                <?php
                }
                ?>
              </select>
            </div>
          </div>
          <div class="form-group">
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary" id="simps" name="simpan_karyawan">simpan</button>
            <a href="index.php" class="btn btn-warning">batal</a>
          </div>
        </div>
      </div>
      <?php
      if (isset($_POST['simpan_karyawan'])) {
        $th = date('Y');
        $mth = date('m');
        $nama = $_POST['nama'];
        $almt = $_POST['almt'];
        $pddk = $_POST['pddk'];
        $nib = $_POST['nib'];
        $join = $_POST['join'];
        $mnth = date('m', strtotime($join));
        $sstm = date('m-d', strtotime($join));

        if ($_POST['slec'] == "nonstaff") {
          $gabsn = $join;
          $jo_in = date('Y-m-d');
          $tipe = "nonstaff";
          if ($mth != $mnth) {
            $masuk = ($th - date('Y', strtotime($join))) - 1;
            $ms_krj = round($masuk, 0, PHP_ROUND_HALF_DOWN);
          } else {
            $masuk = $th - date('Y', strtotime($join));
            $ms_krj = round($masuk, 0, PHP_ROUND_HALF_DOWN);
          }
          $esstmss = date('Y') . '-' . $sstm;
        } else if ($_POST['slec'] == "staff") {
          $gabsn = '0000-00-00';
          $jo_in = $_POST['join'];
          $tipe = "staff";
          if ($mth != $mnth) {
            $ms_krj = ($th - date('Y', strtotime($join))) - 1;
          } else {
            $ms_krj = $th - date('Y', strtotime($join));
          }
          $thuns = date('Y') - 1;
          $esstmss =  $thuns . '-' . $sstm;
        } else {
          $gabsn = '0000-00-00';
          $jo_in = $_POST['join'];
          $tipe = "staff";
          $ms_krj = date('Y', strtotime($join));
          $esstmss = date('Y');
        }
        $cab = $_POST['cab'];
        $k_o = $_POST['jbt'];
        $jbt = substr($k_o, 3);
        $kode = substr($k_o, 0, 3);

        //estimasi kenaikan
        $date = date_create(date("Y-m-d", strtotime($esstmss)));
        date_add($date, date_interval_create_from_date_string('1 year'));
        $est_naik = date_format($date, 'Y-m-d');


        mysqli_query($conn, "INSERT INTO `daftar_pegawai` (nama,alamat,pddk,nib,cbg,jbtn,ko_jbtn,ms_krj,tipe,gb_nonstaff,th_gb,est_naikgaji,status) VALUE('$nama','$almt','$pddk','$nib','$cab','$jbt','$kode','$ms_krj','$tipe','$gabsn','$jo_in','$est_naik','aktif')") or die(mysqli_error($conn));
        echo '<script>window.location.href="daftar.php?akoens=yups";</script>';
      }

      ?>
    </form>
  </div>
</section>
<?php
include "footer.php";
?>