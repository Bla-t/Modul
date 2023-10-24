<?php
include "header.php";
?>
<style>
  th,
  td {
    font-size: 0.8rem;
  }
</style>
<section>
  <div class="activity-card">
    <div class="col">
      <div class="form-inline d-flex">
        <h4>Cetak struk</h4>
        <a href="index.php" class="btn btn-info btn-sm ml-3 mb-1"> kembali</a>
      </div><br>
    </div>
    <div class="col">
      <div class="form-inline">
        <input type="text" class="form-control form-control-sm ml-4" id="myInpt" placeholder="cari data">
      </div><br>
      <div class="table-responsive table-sm">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>No.</th>
              <th>Nama</th>
              <th>NIB</th>
              <th>Cabang</th>
              <th>Jabatan</th>
              <th>Kode Jbtn</th>
              <th>Jmlh. Masuk</th>
              <th>Gaji</th>
              <th>UM</th>
              <th>potongan</th>
              <th>Sisa Kasbon</th>
              <th>Gaji Akhir</th>
              <th>Cetak</th>
            </tr>
          </thead>
          <tbody id="myTabl">
            <?php
            $no = 1;
            $date = date('m');
            $sql = mysqli_query($conn, "SELECT * FROM `gaji_laporans` WHERE `kets` = 'N'") or die(mysqli_error($conn));
            while ($spctk = mysqli_fetch_array($sql)) {
            ?>
              <tr>
                <form action="" method="POST">
                  <td><?= $no++; ?>.</td>
                  <input type="hidden" name="dels" value="<?= $spctk['id']; ?>" class="btn btn-danger btn-sm">
                  <td><?= $spctk['nama']; ?></td>
                  <td><?= $spctk['nib']; ?></td>
                  <td><?= $spctk['cabang']; ?></td>
                  <td><?= $spctk['jabatan']; ?></td>
                  <td style="text-align: center;">00<?= $spctk['ko_jbtn']; ?></td>
                  <td><?= $spctk['t_masuk']; ?> Hari</td>
                  <td><?= rupiah($spctk['gaji_pk'] + $spctk['gaji_tunj']); ?></td>
                  <td><?= rupiah($spctk['um']); ?></td>
                  <td><?= rupiah($spctk['potongan']); ?></td>
                  <td><?= rupiah($spctk['siskasb']); ?></td>
                  <td><?= rupiah($spctk['gaji_fin']); ?></td>
                  <td>
                    <a href="prints.php?id=<?= $spctk['id']; ?>" class="btn btn-info btn-sm">cetak</a>
                    <button class="btn btn-danger btn-sm" name="bton"><span class="bx bx-trash" style="color: bisque;"></span></button>
                  </td>
                </form>
              </tr>
            <?php
            }
            if (isset($_POST['bton'])) {
              $kod = $_POST['dels'];
              mysqli_query($conn, "DELETE FROM `gaji_laporans` WHERE `id` ='$kod'") or die(mysqli_error($conn));
              echo '<script> window.location.href="laporan.php?haps=1";</script>';
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>
<script>
  $(document).ready(function() {
    $("#myInpt").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#myTabl tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
    $("#myInpt").focus();
  });
</script>
<?php
include "footer.php";
?>