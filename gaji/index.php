<?php
include "header.php";

$date = date('Y-m');
$up_date = mysqli_query($conn, "SELECT COUNT(nama) AS 'ttl' FROM `daftar_pegawai` WHERE `est_naikgaji` LIKE '$date%' AND `status` NOT LIKE 'tidak'");
$update = mysqli_fetch_assoc($up_date) or die(mysqli_error($conn));

//est naik
if ($update['ttl'] > 0) {

  /*
  $gaji = mysqli_query($conn, "SELECT * FROM `gaji_gaji_golongan` WHERE `id` ='3'");
  $nilgaji = mysqli_fetch_assoc($gaji);*/

  $naik = date_create(date('Y-m-d'));
  date_add($naik, date_interval_create_from_date_string('1 year'));
  $est_next = date_format($naik, 'Y-m-d');

  //update
  mysqli_query($conn, "UPDATE `daftar_pegawai` SET `ms_krj` = `ms_krj` + 1, `est_naikgaji`='$est_next' WHERE `est_naikgaji` LIKE '$date%' AND `status` NOT LIKE 'tidak'");
}
?>
<div class="dash-cards">
  <a href="daftar.php" style="text-decoration: none;">
    <div class="card-single bg-info">
      <div class="card-body">
        <span class='bx bxs-group'></span>
        <div>
          <?php
          $karyawan = mysqli_query($conn, "SELECT COUNT(nama) AS 'total' FROM `daftar_pegawai`");
          $jumlah_k = mysqli_fetch_assoc($karyawan);
          ?>
          <h3>Karyawan</h3>
          <h4><?= $jumlah_k['total']; ?> pegawai</h4>
        </div>
      </div>
    </div>
  </a>
  <a href="laporan.php" style="text-decoration: none;">
    <div class="card-single bg-warning ">
      <div class="card-body">
        <span class="bx bx-printer"></span>
        <div>
          <?php
          $laporan = mysqli_query($conn, "SELECT COUNT(id) AS 'laporan' FROM `gaji_laporans` WHERE `kets` = 'N'");
          $lapor = mysqli_fetch_assoc($laporan);
          ?>
          <h3>cetak</h3>
          <h4><?= $lapor['laporan']; ?> data</h4>
        </div>
      </div>
    </div>
  </a>
  <a href="laporan-s.php" style="text-decoration: none;">
    <div class="card-single bg-success">
      <div class="card-body">
        <span class="bx bx-spreadsheet"></span>
        <div>
          <?php
          $laporan2 = mysqli_query($conn, "SELECT COUNT(id) AS 'laporan' FROM `gaji_laporans` WHERE `kets` = '1'");
          $fixlapor = mysqli_fetch_assoc($laporan2);
          ?>
          <h3>laporan</h3>
          <h4><?= $fixlapor['laporan'] . ' /' . date('M'); ?></h4>
        </div>
      </div>
    </div>
  </a>
  <!--<div class="card-single bg-secondary">-->
  <!--  <div class="card-body">-->
  <!--    <span class="ti-search"></span>-->
  <!--    <div>-->
  <!--      <h3>secondary</h3>-->
  <!--      <h4>???</h4>-->
  <!--    </div>-->
  <!--  </div>-->
  <!--</div>-->
</div>
<section>
  <br>
  <?php
  $up_dat = mysqli_query($conn, "SELECT * FROM `daftar_pegawai` WHERE `est_naikgaji` LIKE '$date%'");
  while ($ap = mysqli_fetch_array($up_dat)) {
    echo '<p>' . $ap['nama'] . ' && ' . $ap['ms_krj'] . 'th</p>';
  }
  if ($update['ttl'] > 0) {
    # code...
    echo '
    <div class="activity-card">
    <div class="alert alert-warning alert-dismissible fade show text-center">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <p><strong>' . $update['ttl'] . '</strong> data Kenaikan Gaji Di Update </p>
    </div>
    </div>';
  }
  ?>
  <div class="activity-card">
    <div class="row">
      <div class="form-inline d-flex" style="margin-left: 1rem;">
        <h2>buat laporan :</h2>
        <form action="" method="POST">
          <input type="text" class="form-control form-control-sm ml-2" name="index" id="index" placeholder="masukan NIB" required>
          <button class="btn btn-info btn-sm ml-2" type="submit">Cari</button>
          <div class="col">
            <?php $get_d = date('Y-m-d'); ?>
          </div>
        </form>
      </div>
    </div>
    <?php
    if (isset($_POST['index'])) {
      $ddte = date('Y-m-d');
      $nomb = $_POST['index']; //is_numeric();
      $data = mysqli_query($conn, "SELECT * FROM `daftar_pegawai` WHERE `nib` ='$nomb' OR `nama` = '$nomb' AND `status` = 'aktif'");

      $cekif = mysqli_query($conn, "SELECT * FROM `gaji_laporans` WHERE `nib` = '$nomb' OR `nama` = '$nomb' AND MONTH(`tgl`) = '$ddte'");
      $if = mysqli_num_rows($cekif);

      $jmlh = mysqli_query($conn, "SELECT COUNT(`nama`) AS 'jumlah' FROM `daftar_pegawai` WHERE `nib` = '$nomb' OR `nama` LIKE '%$nomb%'");
      $jumlah = mysqli_fetch_assoc($jmlh);

      if ($if > 0) {
        echo '<div class="row" style="font-weight:bold; color: #FF5C04;" >data sudah di buat..!!</div>';
      } else {
    ?>
        <div class="from-inline">
          <!--<h4>jumlah data "<?= $jumlah['jumlah']; ?>"</h4>-->
        </div>
        <?php
        while ($get = mysqli_fetch_array($data)) {
        ?>
          <form id="sess" action="tex.php" method="POST">
            <div class="row border d-flex">
              <!-- data form -->
              <div class="col-md-7">
                <label for="data">
                  <h5>Data Karyawan</h5>
                </label>
                <div class="row" id="data">
                  <div class="col">
                    <div class="form-row">
                      <label for="nama"><strong>Nama :&nbsp;</strong></label>
                      <!-- kebth-->
                      <input type="hidden" name="id" value="<?= $get['id']; ?>">
                      <!----------------------------------->
                      <p id="nama"> <?= $get['nama'] ?></p>
                    </div>
                    <div class="form-row">
                      <label for="nib"><strong>NIB :&nbsp;</strong></label>
                      <p id="nib"><?= $get['nib'] ?></p>
                    </div>
                    <div class="form-row">
                      <label for="pddk"><strong>Pendidikan :&nbsp;</strong></label>
                      <p id="pddk"><?= $get['pddk'] ?></p>
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-row">
                      <label for="kode"><strong>Kode Jbtn:&nbsp;</strong></label>
                      <p id="pddk"><?= '00' . $get['ko_jbtn'] ?></p>
                    </div>
                    <div class="form-row">
                      <label for="jbt"><strong>Jabatan :&nbsp;</strong></label>
                      <p id="jbt"><?= $get['jbtn'] ?></p>
                    </div>
                    <div class="form-row">
                      <label for="Cabang"><strong>Cabang :&nbsp;</strong></label>
                      <p id="cabang"><?= $get['cbg'] ?></p>
                    </div>
                  </div>
                </div>
              </div>
              <!--input form -->
              <div class="col-md-5">
                <label for="potong">
                  <h5>Bonus, Potongan | jumlah masuk</h5>
                </label>
                <div class="row" id="potong">
                  <div class="col">
                    <div class="form-group">
                      <label for="bpjs"><strong>pot.BPJS :&nbsp;</strong></label>
                      <input type="hidden" name="msa" value="<?= $get['ms_krj']; ?>">
                      <input type="number" id="bpjs" name="bpjs" class="form-control form-control-sm fms" required>
                      <label for="bon"><strong>pot.kas bon :&nbsp;</strong></label>
                      <input type="number" id="bon" name="bon" class="form-control form-control-sm fms" required>
                      <label for="bonus"><strong>Bonus/Kropak :&nbsp;</strong></label>
                      <input type="number" id="bonus" name="bonus" class="form-control form-control-sm fms" required>
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-group">
                      <label for="dln"><strong>pot. Lain-lain :&nbsp;</strong></label>
                      <input type="number" id="dln" name="pln" class="form-control form-control-sm fms" required>
                      <label for="lmbr"><strong>Lembur/Hari :&nbsp;</strong></label>
                      <input type="number" id="lmbr" name="lmbur" class="form-control form-control-sm fms" required>
                      <label for="jblhmsk"><strong>jumlah Masuk :&nbsp;</strong></label>
                      <input type="number" id="jblhmsk" name="j_msk" class="form-control form-control-sm fms" required>
                    </div>
                    <div class="form-group d-flex">
                      <input type="hidden" name="gaji" value="<?= $gaji; ?>">
                      <input type="hidden" name="um" value="<?= $um; ?>">
                      <!-- <a href="#" class="btn btn-primary btn-sm">Cetak</a> -->
                      <button type="submit" class="btn btn-success btn-sm ml-1" id="simps">Simpan</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
    <?php
        }

        if ($jumlah['jumlah'] == 0) {
          echo '<br><div class="row" style="margin-left:1rem;"><div class="col"><p style="color:#C42D00; font-weight:bold">Data tidak di temukan... !! </p></div></div>';
        }
      }
    }
    if (!isset($_POST['index'])) {
      echo '<br><div class="row" style="margin-left:0.7rem;"><p style="font-weight:bold">Harap isi Kolom dengan NIB untuk mebuat Laporan Struk Gaji..!!</p></div>';
    }
    ?>
  </div>
</section>
<script>
  $(document).ready(function() {
    $("#index").focus();
  });
</script>
<?php
include "footer.php";
?>