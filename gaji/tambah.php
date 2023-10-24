<?php
include "header.php";
//take awal gaji um
$gaji_awal = mysqli_query($conn, "SELECT * FROM `gaji_gaji_golongan` WHERE `id` = '2'");
$ga = mysqli_fetch_assoc($gaji_awal);
$um_awal = mysqli_query($conn, "SELECT * FROM `gaji_um_golongan` WHERE `id` = '1'");
$u = mysqli_fetch_assoc($um_awal);
$tip = array("staff", "nonstaff");
?>

<section>
  <div class="card">
    <h4>Tambah data Karyawan</h4>
  </div>
  <div class="activity-card">
    <form action="" method="POST">
      <div class="row">
        <div class="col">
          <div class="form-row">
            <div class="col">
              <label for="nama">Nama :</label>
              <input type="text" id="nama" name="nama" class="form-control form-control-sm" required>
            </div>
            <div class="col">
              <label for="nib">NIB :</label>
              <input id="nib" name="nib" class="form-control form-control-sm" required>
            </div>
          </div>
          <div class="form-row">
            <div class="col">
              <label for="kktp">KK/KTP :</label>
              <input type="text" id="kktp" name="kktp" class="form-control form-control-sm" required>
            </div>
            <div class="col">
              <label for="pddk">Pendidikan :</label>
              <input type="text" id="pddk" name="pddk" class="form-control form-control-sm" required>
            </div>
          </div>
          <div class="form-row">
            <div class="col">
              <label for="almt">Alamat KTP :</label>
              <textarea id="almt" name="almt_ktp" class="form-control" required></textarea>
            </div>
            <div class="col">
              <label for="almt">Alamat Sekarang :</label>
              <textarea id="almt" name="almt_skr" class="form-control" required></textarea>
            </div>
          </div>
          <div class="form-row">
            <div class="col">
              <label for="nm_psng">Nama Pasangan :</label>
              <input id="nm_sng" type="text" name="nm_psg" class="form-control form-control-sm">
            </div>
            <div class="col">
              <label for="jml_ank">Jumlah Anak :</label>
              <input id="jml_ank" type="number" name="jmlh_ank" class="form-control form-control-sm">
            </div>
          </div>
        </div>
        <div class="col">
          <div class="form-row">
            <div class="col">
              <label for="tmptl">tempat Lahir :</label>
              <input id="tmptl" type="text" name="tempatl" class="form-control form-control-sm">
            </div>
            <div class="col">
              <label for="tgll">tanggal Lahir :</label>
              <input id="tgll" type="date" name="tgll" class="form-control form-control-sm">
            </div>
          </div>
          <div class="form-row">
            <div class="col">
              <label for="nhp">No.HP :</label>
              <input type="number" id="nhp" class="form-control form-control-sm" name="nhp">
            </div>
            <div class="col">
              <label for="bpjs">BPJS :</label>
              <input type="text" id="bpjs" class="form-control form-control-sm" name="bjps">
            </div>
          </div>
          <div class="form-row">
            <div class="col">
              <label for="slt">golongan :</label>
              <select type="date" id="slt" name="slec" class="form-control form-control-sm" required>
                <option value="" selected disabled>pilih golongan</option>
                <!-- <option value="baru">staff baru</option> -->
                <option value="staff">staff</option>
                <option value="promosi">Promosi</option>
                <option value="nonstaff">Nonstaff</option>
              </select>
            </div>
            <div class="col">
              <label for="tgl">tanggal Masuk :</label>
              <input type="date" id="tgl" name="join" class="form-control form-control-sm" required>
            </div>
          </div>
          <?php

          // $jab = mysqli_fetch_assoc($ceks);
          ?>
          <div class="form-row">
            <div class="col">
              <label for="cab">Cabang :</label>
              <input type="text" id="cab" name="cab" class="form-control form-control-sm" required>
            </div>
            <div class="col">
              <label for="jbt">Jabatan :</label>
              <select name="jbt" id="jbt" class="form-control form-control-sm selectpicker border border-2" data-live-search="true" required>
                <option value="" selected disabled>Pilih Jabatan</option>
                <?php
                for ($i = 0; $i <= 1; $i++) {
                ?>
                  <optgroup class="tipe" style="color: #5E8180; font-weight:bold;" label="<?= $tip[$i]; ?>">
                    <?php
                    $ceks = mysqli_query($conn, "SELECT * FROM `gaji_jabatan` WHERE `tipe` = '$tip[$i]'  ORDER BY `id`") or die(mysqli_error($conn));
                    while ($jbtn = mysqli_fetch_array($ceks)) {
                    ?>
                      <option class="jab" data-tokens="<?= $jbtn['jabatan']; ?>" value="<?= $jbtn['kode'] . $jbtn['jabatan']; ?>"><?= $jbtn['jabatan']; ?></option>
                  <?php
                    }
                    echo "</optgroup>";
                  } ?>

              </select>
            </div>
          </div>
          <div class="form-group">
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary" id="simps" name="simpan_karyawan">Simpan</button>
            <a href="index.php" class="btn btn-warning">batal</a>
          </div>
        </div>
      </div>
      <?php
      if (isset($_POST['simpan_karyawan'])) {
        $th = date('Y');
        $mth = date('m');
        $nama = $_POST['nama'];
        $almt = $_POST['almt_skr'];
        $almt_ktp = $_POST['almt_ktp'];
        $pddk = $_POST['pddk'];
        $bojo = $_POST['nm_psg'];
        $jml_ank = $_POST['jmlh_ank'];
        $tglt = $_POST['tempatl'];
        $tgll = $_POST['tgll'];
        $kktp = $_POST['kktp'];
        $hp = $_POST['nhp'];
        $nib = $_POST['nib'];
        $asrn = $_POST['bjps'];
        $join = $_POST['join'];
        $mnth = date('m', strtotime($join));
        $sstm = date('m-d', strtotime($join));
        $yrs = date('Y', strtotime($join));

        if ($_POST['slec'] == "promosi") {
          $gabsn = $join;
          $jo_in = date('Y-m-d');
          $tipe = "promosi";
          if ($mth != $mnth) {
            $masuk = ($th - $yrs) - 1;
            $ms_krj = round($masuk, 0, PHP_ROUND_HALF_DOWN);
          } else {
            $masuk = $th - $yrs;
            $ms_krj = round($masuk, 0, PHP_ROUND_HALF_DOWN);
          }
          $esstmss = date('Y') . '-' . $sstm;
        } else if ($_POST['slec'] == "staff") {
          $gabsn = '0000-00-00';
          $jo_in = $_POST['join'];
          $tipe = "staff";
          if ($th != $yrs) {
            if ($mth != $mnth) {
              $ms_krj = ($th - $yrs) - 1;
              $thuns = date('Y') - 1;
            } else {
              $ms_krj = $th - $yrs;
              $thuns = date('Y');
            }
            $esstmss =  $thuns . '-' . $sstm;
          } else {
            $ms_krj = $th - $yrs;
            $thuns = date('Y');
            $esstmss =  $thuns . '-' . $sstm;
          }
        } else if ($_POST['slec'] == "nonstaff") {
          $gabsn = '0000-00-00';
          $jo_in = $_POST['join'];
          $tipe = "nonstaff";
          if ($th != $yrs) {
            if ($mth != $mnth) {
              $ms_krj = ($th - $yrs) - 1;
              $thuns = date('Y') - 1;
            } else {
              $ms_krj = $th - $yrs;
              $thuns = date('Y');
            }
            $esstmss =  $thuns . '-' . $sstm;
          } else {
            $ms_krj = $th - $yrs;
            $thuns = date('Y');
            $esstmss =  $thuns . '-' . $sstm;
          }
        }/*else {
          $gabsn = '0000-00-00';
          $jo_in = $_POST['join'];
          $tipe = "staff";
          $ms_krj = date('Y', strtotime($join));
          $esstmss = date('Y');
        }*/
        $cab = $_POST['cab'];
        $k_o = $_POST['jbt'];
        $jbt = substr($k_o, 3);
        $kode = substr($k_o, 0, 3);

        //estimasi kenaikan
        $date = date_create(date("Y-m-d", strtotime($esstmss)));
        date_add($date, date_interval_create_from_date_string('1 year'));
        $est_naik = date_format($date, 'Y-m-d');


        mysqli_query($conn, "INSERT INTO `daftar_pegawai` (nama,alamat,almt_ktp,pddk,nma_psng,juml_anak,tmpt_l,tgl_lahir,kk_ktp,n_hp,asrn,nib,cbg,jbtn,ko_jbtn,ms_krj,tipe,gb_nonstaff,th_gb,est_naikgaji,status) VALUE('$nama','$almt','$almt_ktp','$pddk','$bojo','$jml_ank','$tglt','$tgll','$kktp','$hp','$asrn','$nib','$cab','$jbt','$kode','$ms_krj','$tipe','$gabsn','$jo_in','$est_naik','aktif')") or die(mysqli_error($conn));
        echo '<script>window.location.href="daftar.php?akoens=yups&&tips=' . $tipe . ';</script>';
      }

      ?>
    </form>
  </div>
</section>
<?php
include "footer.php";
?>