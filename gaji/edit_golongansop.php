<?php
include "header.php";
?>
<section>
  <div class="card">
    <?php
    switch ($_GET['method']) {
      case 'tambah':
        $judul = "golongan";
        $judul2 = "tunjangan";
        $tip = $_GET['tipe'];
        if ($_GET['type'] == "gaji") {
          $text = "tambah golongan gaji";
          $data = "gaji_gaji_golongan";
        } elseif ($_GET['type'] == "um") {
          $text = "tambah golongan um";
          $data = "gaji_um_golongan";
        } elseif ($_GET['type'] == "estigaj") {
          $judul = "tonase";
          $judul2 = "estimasi";
          $text = "tambah estimasi gaji";
          $data = "gaji_gaji_golongan";
        } elseif ($_GET['type'] == "jabatan") {
          $judul = "jabatan";
          $judul2 = "kode";
          $text = "tambah jabatan";
          $data = "gaji_jabatan";
          $isi1 = "jabatan";
          $isi2 = "pendidikan";
        }
    ?>
        <h4><?= $text; ?></h4>
        <form action="" method="POST">
          <div class="row">
            <div class="form-group">
              <div class="col">
                <label for="golongan"><?= $judul; ?>: </label>
                <input id="golongan" type="text" name="gol" class="form-control form-control-sm" required>
              </div>
              <div class="col">
                <label for="tunjangan"><?= $judul2; ?>: </label>
                <input id="tunjangan" type="text" name="gol1" class="form-control form-control-sm" required>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <a href="gol-tunjsop.php" class="btn btn-info btn-sm">batal</a>
              <button name="eksek" id="eks" class="btn btn-success btn-sm">simpan</button>
            </div>
          </div>
          <?php
          if (isset($_POST['eksek'])) {
            $a = $_POST['gol'];
            $b = $_POST['gol1'];
            mysqli_query($conn, "INSERT INTO `$data`(`$judul`,`$judul2`,`tipe`) VALUES ('$a','$b','$tip')") or die(mysqli_error($conn));
            echo "<script>window.location.href='gol-tunjsop.php?ow=yeah';</script>";
          }
          ?>
        </form>
      <?php
        break;
      case 'edit':
        $id = $_GET['id'];
        $judul = "golongan";
        $judul2 = "tunjangan";
        $tip = $_GET['tipe'];
        if ($_GET['type'] == "gaji") {
          $text = "edit golongan gaji";
          $data = "gaji_gaji_golongan";
        } elseif ($_GET['type'] == "um") {
          $text = "edit golongan um";
          $data = "gaji_um_golongan";
        } elseif ($_GET['type'] == "jabatan") {
          $judul = "jabatan";
          $judul2 = "kode";
          $text = "edit jabatan";
          $data = "gaji_jabatan";
        } elseif ($_GET['type'] == "tonase_um") {
          $judul = "tonase";
          $judul2 = "estimasi";
          $text = "edit tambahan UM";
          $data = "gaji_um_golongan";
        } elseif ($_GET['type'] == "tonase_gaji") {
          $judul = "tonase";
          $judul2 = "estimasi";
          $text = "edit tambahan gaji";
          $data = "gaji_gaji_golongan";
        } elseif ($_GET['type'] == "um_bnyak") {
          $judul = "msa_krja";
          $judul2 = "nominal";
          $text = "edit uang makan";
          $data = "gaji_tmbahum";
        }
        $q = mysqli_query($conn, "SELECT * FROM `$data` WHERE `id` ='$id'");
        $get = mysqli_fetch_assoc($q);
      ?>
        <h4><?= $text; ?></h4>
        <form action="" method="POST">
          <div class="row">
            <div class="form-group">
              <div class="col">
                <label for="golongan"><?= $judul; ?>: </label>
                <input id="golongan" type="text" name="gol" class="form-control form-control-sm" value="<?= $get[$judul]; ?>" required>
              </div>
              <div class="col">
                <label for="tunjangan"><?= $judul2; ?>: </label>
                <input id="tunjangan" type="text" name="tunj" class="form-control form-control-sm" value="<?= $get[$judul2]; ?>" required>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <a href="gol-tunjsop.php" class="btn btn-info btn-sm">batal</a>
              <button type="submit" name="eksek" id="eks" class="btn btn-success btn-sm">simpan</button>
            </div>
          </div>
          <?php
          if (isset($_POST['eksek'])) {
            $a = $_POST['gol'];
            $b = $_POST['tunj'];
            mysqli_query($conn, "UPDATE `$data` SET  `$judul` = '$a', `$judul2` = '$b' WHERE `id` =$id ") or die(mysqli_error($conn));
            echo "<script>window.location.href='gol-tunjsop.php?ow=yeah';</script>";
          }
          ?>
        </form>
    <?php
        break;
      case 'hapus':
        $id = $_GET['id'];
        $tip = $_GET['tipe'];
        if ($_GET['type'] == "gaji") {
          $data = "gaji_gaji_golongan";
        } elseif ($_GET['type'] == "um") {
          $data = "gaji_um_golongan";
        } elseif ($_GET['type'] == "jabatan") {
          $data = "gaji_jabatan";
        }
        mysqli_query($conn, "DELETE FROM `$data` WHERE `id` ='$id'");
        echo "<script>window.location.href='gol-tunjsop.php?ow=ded&&id=" . $id . "'</script>";
        break;
    }

    ?>
  </div>
</section>
<script>
  $(document).ready(function() {
    $("input[type=text]").keyup(function() {
      $(this).val($(this).val().toUpperCase());
    });
  });
</script>
<?php
include "footer.php";
?>