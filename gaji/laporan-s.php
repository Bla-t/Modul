<?php
include "header.php";
$data = mysqli_query($conn, "SELECT * FROM `gaji_laporans` WHERE `kets` = 'y'");
?>

<section>
  <div class="activity-card">
    <form action="" method="POST">
      <div class="row">
        <div class="col">
          <div class="form-inline d-flex">
            <a href="index.php" class="btn btn-info btn-sm mb-2"> kembali</a>
            <h3 class="ml-2">laporan gaji bulanan</h3>
          </div>
        </div>
        <div class="form-inline d-flex">
          <div class="col">
            <input type="text" class="form-control form-control-sm" value="cari" id="isi">
            <?php
            $tnglan = date('Y-d-m');
            ?>
            <input type="date" class="form-control form-control-sm ml-2" value="<?= $tnglan; ?>" id="tgl" name="per" required>
            <button class="btn btn-sm ml-1 btn-primary" name="srch"> cari</button>
          </div>
        </div>
      </div>
    </form>
    <div class="row">
      <div class="col">
        <button class="btn btn-success btn-sm">Download excel</button>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="table table-responsive">
        <table class="table-hover">
          <thead>
            <tr>
              <th>no.</th>
              <th>Nama</th>
              <th>NIB</th>
              <th>cabang</th>
              <th>Jabatan</th>
              <th>kode Jabatan</th>
              <th>Jumlah masuk</th>
              <th>Gaji</th>
              <th>Uang Makan</th>
              <th>potongan</th>
              <th>sisa kasbon</th>
              <th>gaji akhir</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $n = 1;
            while ($isi = mysqli_fetch_array($data)) {
            ?><tr>
                <td><?= $n++; ?></td>
                <td><?= $isi['nama']; ?></td>
                <td><?= $isi['nib']; ?></td>
                <td><?= $isi['cabang']; ?></td>
                <td><?= $isi['jabatan']; ?></td>
                <td><?= $isi['ko_jbtn']; ?></td>
                <td><?= $isi['t_masuk']; ?></td>
                <td><?= rupiah($isi['gaji']); ?></td>
                <td><?= rupiah($isi['um']); ?></td>
                <td><?= rupiah($isi['potongan']); ?></td>
                <td><?= rupiah($isi['siskasb']); ?></td>
                <td><?= rupiah($isi['gaji_fin']); ?></td>
              </tr>
            <?php
            } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>
<?php
include "footer.php";
?>