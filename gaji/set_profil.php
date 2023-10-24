<?php
session_start();
if (empty($_SESSION['username']) && empty($_SESSION['pass'])) {
  header("location:../formlog.php?pesan=gagal");
} else if ($_SESSION['type'] == "leasing") {
  header("location:../formlog.php?pesan=gagal");
}
include "header.php";
?>
<TITLE>Profil</TITLE>
<section class="recent">
  <?php
  $prof = mysqli_query($conn, "SELECT * FROM `dat_uss` WHERE `id` = '$iduser'") or die(mysqli_error($conn));
  while ($cek = mysqli_fetch_array($prof)) {

  ?>
    <div class="activity-card">
      <div class="form-inline" style="border-bottom: 2px solid #D5D8DC;">
        <h4><img src="../gamb_user/<?php echo $cek['gamb']; ?>" class="profgam" alt="gambar">Profil |"<?php echo $cek['nama']; ?>"</h4>
      </div>
      <?php

      ?>
      <form method="POST" action="" enctype="multipart/form-data">
        <div class="col-md-12">
          <div class="form-row">
            <div class="col">
              <label for="type">Bagian :</label>
              <input type="hidden" name="isi_gambar" value="<?php echo $cek['gamb']; ?>">
              <input type="text" name="" id="type" class="form-control form-control-sm" readonly value="<?php echo $cek['type']; ?>">
            </div>
            <div class="col">
              <label for="levl">level user :</label>
              <input type="text" name="" id="levl" class="form-control form-control-sm" readonly value="<?php echo $cek['levl']; ?>">
            </div>
          </div>
          <div class="form-row">
            <div class="col">
              <label for="user">Username :</label>
              <input type="text" name="Username_user" id="user" class="form-control form-control-sm" value="<?php echo $cek['username']; ?>">
            </div>
            <div class="col">
              <label for="nama">Nama :</label>
              <input type="text" name="nama_user" id="nama" class="form-control form-control-sm" value="<?php echo $cek['nama']; ?>">
            </div>
          </div>
          <input type="hidden" name="id" value="<?php echo $cek['id']; ?>">
          <div class="form-row">
            <div class="col">
              <label for="pasword">Password | Rubah Password :</label>
              <input type="password" name="" id="pasword" class="form-control form-control-sm" value="<?php echo $cek['password']; ?>">
            </div>
            <div class="col">
              <label for="password_baru">Verifikasi Password</label>
              <input type="password" name="password_baru" id="password_baru" class="form-control form-control-sm">
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-3">
              <label for="file_gambars">Ganti Gambar</label>
              <div class="custom-file" id="file_gambar">
                <input type="file" class="custom-file-input form-control-sm" id="customFile" name="file">
                <label class="custom-file-label" for="customFile">Cari Gambar</label>
              </div>
            </div>
          </div>
        </div><br>
        <div class="col-md-12">
          <div class="form-inline d-flex">
            <a href="index.php" class="btn btn-warning btn-sm">Batal</a>
            <button class="btn btn-danger btn-sm ml-1" id="simpan_profil" name="Simpan_propil" value="<?php echo $cek['id']; ?>">Simpan</button>
          </div>
        </div>
      <?php
    }
      ?>
      <?php
      if (isset($_POST['Simpan_propil'])) {

        $pass = $_POST['password_baru'];
        $nama_user = $_POST['nama_user'];
        $Username = $_POST['Username_user'];
        //$id = $_POST['id'];
        $file = $_FILES['file']['name'];
        if ($gam != "icon_none.png" && $gam != $gam || !empty($file)) {
          $rand = rand();
          $ekstensi_diperbolehkan  = array('png', 'jpg', 'jpeg', 'gif');
          $nama = $_FILES['file']['name'];
          $x = explode('.', $nama);
          $ekstensi = strtolower(end($x));
          $ukuran  = $_FILES['file']['size'];
          $file_tmp = $_FILES['file']['tmp_name'];
          $xx = $rand . '_' . $nama;
          if (in_array($ekstensi, $ekstensi_diperbolehkan) == true) {
            if ($ukuran < 2044070) {
              move_uploaded_file($file_tmp, '../gamb_user/' . $rand . '_' . $nama);
            } else {
              echo " ukuran terlalu besar. . !!";
            }
          } else {
            echo "jenis tidak di perbolehkan";
          }
          unlink("../gamb_user/" . $_POST['isi_gambar']);
        } else if (empty($file)) {
          $xx = $_POST['isi_gambar'];
        }

        mysqli_query($conn, "UPDATE `dat_uss` SET `nama`='$nama_user', `username`='$Username', `password`='$pass',`gamb`='$xx' WHERE `id` = '$_POST[Simpan_propil]'") or die(mysqli_error($conn));
        echo "<script>window.location.href='index.php?ow';</script>";
        exit;
      }
      ?>
      </form>
    </div>
</section>
<script>
  // Add the following code if you want the name of the file appear on select
  $(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
  });


  $(function() {
    $("#simpan_profil").click(function() {
      var pass1 = $("#pasword").val();
      var pass2 = $("#password_baru").val();
      if (pass1 != pass2) {
        alert("Password / Kata sandi Harus sama..!");
        return false;
      } else if (pass1 == pass2) {
        confirm("anda Yakin.!!??");
        return true;

      }
      return true;
    });
  });
</script>
<?php include "footer.php"; ?>