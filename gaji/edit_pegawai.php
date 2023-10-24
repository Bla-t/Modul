<?php
include "header.php";
if (isset($_GET['id'])) {
  $rbh = mysqli_query($conn, "SELECT * FROM `daftar_pegawai` WHERE `id` = '$_GET[id]'");
  if ($_GET['tipe'] == "staff") {
    $jabt = 'staf';
    $tipe = 'Staff';
  } else {
    $jabt = 'nonstaff';
    $tipe = 'Nonstaff';
  }
  while ($a = mysqli_fetch_array($rbh)) {
    if (empty($a['bpjs_k'])) {
      $bpjsk = 0;
    } else {
      $bpjsk = $a['bpjs_k'];
    }
    if (empty($a['bpjs_jht'])) {
      $bpjht = 0;
    } else {
      $bpjht = $a['bpjs_jht'];
    }
    if (empty($a['kas_bon'])) {
      $kasbn = 0;
    } else {
      $kasbn = $a['kas_bon'];
    }
    $stt = $a['status'];
    if ($a['alamat'] == "-") {
      $almt = $a['almt_ktp'];
    } else {
      $almt = $a['alamat'];
    }
?>
    <section>
      <div class="row">
        <div class="form-inline d-flex">
          <h4 class="ml-4">edit data <?= $tipe; ?></h4>
          <a href="daftar.php" class="btn btn-info btn-sm ml-4 mb-2">Kembali </a>
        </div>
      </div>
      <div class="card" style="margin-top: 12px;">
        <form action="akse.php?tipe=<?= $a['tipe']; ?>" method="POST">
          <div class="row">
            <div class="col">
              <div class="form-row">
                <div class="col">
                  <input type="hidden" name="id" value="<?= $a['id']; ?>">
                  <label for="nib"> NIB :</label>
                  <input id="nib" name="nib" class="form-control form-control-sm" type="text" value="<?= $a['nib']; ?>" readonly>
                </div>
                <div class="col">
                  <label for="nama">Nama :</label>
                  <input id="nama" name="nama" class="form-control form-control-sm" type="text" value="<?= $a['nama']; ?>">
                </div>
                <div class="col">
                  <label for="tmptl">Tempat Lahir :</label>
                  <input id="tmptl" type="text" name="tempatl" class="form-control form-control-sm" value="<?= $a['tmpt_l']; ?>">
                </div>
                <div class="col">
                  <label for="tgl-l">Tanggal Lahir :</label>
                  <input id="tgl-l" type="date" name="tgll" class="form-control form-control-sm" value="<?= $a['tgl_lahir']; ?>">
                </div>
              </div>
              <div class="form-row">
                <div class="col">
                  <label for="pdk">Pendidikan :</label>
                  <input id="pdk" name="pendi" class="form-control form-control-sm" type="text" value="<?= $a['pddk']; ?>">
                </div>
                <div class="col">
                  <label for="kktp">No.KK :</label>
                  <input type="text" id="kktp" name="kk" class="form-control form-control-sm" required value="<?= substr($a['kk_ktp'], 0, 16); ?>">
                </div>
                <div class="col">
                  <label for="ktp">No.KTP :</label>
                  <input type="text" id="ktp" name="ktp" class="form-control form-control-sm" required value="<?= substr($a['kk_ktp'], 18); ?>">
                </div>
              </div>
              <div class="form-row">
                <div class="col">
                  <label for="nm_psng">Nama Pasangan :</label>
                  <input id="nm_sng" type="text" name="nm_psg" class="form-control form-control-sm" value="<?= $a['nma_psng']; ?>">
                </div>
                <div class="col">
                  <label for="jml_ank">Jumlah Anak :</label>
                  <input id="jml_ank" type="number" name="jmlh_ank" class="form-control form-control-sm" value="<?= $a['juml_anak']; ?>">
                </div>
                <div class="col">
                  <label for="nhp">No.HP :</label>
                  <input type="number" id="nhp" class="form-control form-control-sm" name="nhp" value="<?= $a['n_hp']; ?>">
                </div>
              </div>
              <div class="form-row">
                <div class="col">
                  <label for="alamat">Alamat Sekarang :</label>
                  <textarea id="alamat" name="almt" class="form-control form-control-sm" type="text"><?= $almt; ?></textarea>
                </div>
                <div class="col">
                  <label for="alamatktp">Alamat KTP :</label>
                  <textarea id="alamatktp" name="almt_ktp" class="form-control form-control-sm" type="text"><?= $a['almt_ktp']; ?></textarea>
                </div>
              </div>
              <!--<div class="form-row">
                <div class="col">
                  <label for="bpjk">BPJS Kesehatan:</label>
                  <input id="bpjk" name="bpjk" class="form-control form-control-sm" type="text" value="<?= $bpjsk; ?>">
                </div>
                <div class="col">
                  <label for="jht">BPJS JHT:</label>
                  <input id="jht" name="jht" class="form-control form-control-sm" type="text" value="<?= $bpjht; ?>">
                </div>
                <div class="col">
                  <label for="bon">kas bon:</label>
                  <input id="bon" name="bon" class="form-control form-control-sm" type="text" value="<?= $kasbn; ?>">
                </div>
              </div>-->
            </div>
            <div class="col">
              <div class="form-group">
                <div class="row">
                  <div class="col">
                    <label for="cbg">Cabang :</label>
                    <input id="cbg" name="cab" class="form-control form-control-sm" type="text" value="<?= $a['cbg']; ?>">
                  </div>
                  <div class="col">
                    <label for="est1">BPJS :</label>
                    <input id="est1" name="asrn" class="form-control form-control-sm" type="text" value="<?= $a['asrn']; ?>">
                  </div>
                </div>
                <div class="row">
                  <div class="col">
                    <input type="hidden" value="<?= '00' . $a['ko_jbtn'] . $a['jbtn'];; ?>" name="deflt">
                    <label for="jbt">Jabatan : </label>
                    <select id="jbt" name="jab" type="text" class="form-control form-control-sm">
                      <option value="<?= $a['ko_jbtn'] . $a['jbtn']; ?>" selected="selected" disabled><?= $a['jbtn']; ?></option>
                      <?php
                      $jabs = mysqli_query($conn, "SELECT * FROM `gaji_jabatan` WHERE `tipe` = '$jabt' ORDER BY `id`");
                      while ($kde = mysqli_fetch_array($jabs)) {
                        echo '<option value="' . $kde['kode'] . $kde['jabatan'] . '">' . $kde['jabatan'] . '</option>';
                      } ?>
                    </select>
                  </div>
                  <div class="col">
                    <label for="stat">Status : </label><select name="stat" id="stat" class="form-control form-control-sm">
                      <option value="<?= $a['status']; ?>" selected><?= $a['status']; ?></option>
                      <option value="Aktif">Aktif</option>
                      <option value="Resign">Resign</option>
                    </select>
                  </div>
                </div>
                <div class="col alsn">
                  <label for="alsn">keterangan:</label>
                  <textarea class="form-control" name="ktrg" id="alsn" cols="30"><?= $a['keterangan']; ?></textarea>
                </div><br>
                <div class="row">
                  <div class="form-inline d-flex">
                    <a href="daftar.php" id="batal" class="btn btn-danger btn-sm ml-4">batal</a>
                    <input type="submit" name="simpa" id="simpan" class="btn btn-warning btn-sm ml-2" value="simpan">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </section>

<?php
  }
}

include "footer.php";
?>