<?php
include_once("../helper/koneksi.php");
include_once("../helper/function.php");


$login = cekSession();
if ($login == 0) {
  redirect("login.php");
}

if(post("usernamenew")){
  $username = post("usernamenew");
  $password = sha1(post("passwordnew"));
  $api_key = sha1(date("Y-m-d H:i:s") . rand(100000, 999999));
  $role = post("levelnew");
  $date = date('Y-m-d H:i:s');
  $query = "INSERT INTO account VALUES(NULL,'$username','$password','$api_key','$role','60','0','$date')";
  $cek = mysqli_query($koneksi, "SELECT * FROM account WHERE username = '$username'");
  if ($cek->num_rows > 0) {
    toastr_set("error", "Username Sudah dipakai");
  } else {
    $q = mysqli_query($koneksi, $query);
    toastr_set("success", "Registrasi berhasil. Hubungi admin untuk aktivasi");
  }
}
if(post("judul")){
  $tags = post("tags");
  var_dump($tags);
  exit;
}
if (get("act") == "hapus") {
  $id = get("id");
  $q = mysqli_query($koneksi, "DELETE FROM post WHERE id='$id'");
  toastr_set("success", "Sukses hapus posting");
}

if (post("chunk")) {
  $username = $_SESSION['username'];
  $chunk = post("chunk");
  if ($chunk > 100) {
    toastr_set("error", "Maximal pesan masal adalah 100 per menit");
  } else {
    mysqli_query($koneksi, "UPDATE account SET chunk = '$chunk' WHERE username='$username'");
    toastr_set("success", "Sukses edit pengaturan");
  }
}
if (post("apikey")) {
  $username = $_SESSION['username'];
  $api_key = sha1(date("Y-m-d H:i:s") . rand(100000, 999999));
  mysqli_query($koneksi, "UPDATE account SET api_key='$api_key' WHERE username='$username'");
  toastr_set("success", "Sukses generate api key baru");
}

require('../templates/header.php');
?>


<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- DataTales Example -->
  <?php
  if($_SESSION['level'] == "1"){

    ?>
    <div class="row">
      <div class="col-12">
        <div class="card shadow mb-4">
          <div class="card-header">Daftar Posting</div>
          <div class="card-body">
            <button class="btn btn-primary mb-4" data-toggle="modal" data-target="#tambahpost">List Posting</button>
            <div class="card">
              <div class="card-body">
                <form action="" method="POST">
                  <label> Judul </label>
                  <input type="text" name="judul" required class="form-control">
                  <br>
                  <label> Category </label>
                  <select class='form-control' name='category'>
                    <?php
                    $datacategory = getDataByTable('post_category',NULL,"status = '1'");
                    var_dump($datacategory);
                    if(is_array($datacategory)){
                      foreach ($datacategory['message'] as $category) {
                        echo "<option value='{$category['id']}'>{$category['category_name']}</option>";
                      }
                    }
                    ?>
                  </select>
                  <br>
                  <label> Thumbnail </label>
                  <input type="file" name="thumb" class="form-control">
                  <br>
                  <label> Tags </label>
                  <input type="text" id='tags-input' name="tags" required class="form-control">
                  <br>
                  <label> Content </label>
                  <!-- <textarea name = "content" id = "summernote"></textarea> -->
                  <textarea name="content" id = "summernote"></textarea>
                  <br>
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
              </div>
            </div>
            <br>
          </div>
        </div>

      </div>
    </div>
  <?php } ?>
  <br>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
  <div class="container my-auto">
    <div class="copyright text-center my-auto">
      <span>Copyright &copy; <a href="https://wa.me/6282140647578">Febri Kukuh</a></span>
    </div>
  </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a class="btn btn-primary" href="<?= $dashboard_url; ?>auth/logout.php">Logout</a>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="tambahpost" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">List Posting</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="table table-responsive">
          <table class="table table-bordered" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Category</th>
                <th>Thumbnail</th>
                <th>Tags</th>
                <th>Creator</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody id="tablenya">
            </tbody>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?= $dashboard_url; ?>vendor/jquery/jquery.min.js"></script>
  <script src="<?= $dashboard_url; ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= $dashboard_url; ?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= $dashboard_url; ?>js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="<?= $dashboard_url; ?>vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= $dashboard_url; ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?= $dashboard_url; ?>js/demo/datatables-demo.js"></script>
  <script src="<?= $dashboard_url; ?>js/custom.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous"></script>
  <script>

  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/3.1.0/socket.io.js" integrity="sha512-+l9L4lMTFNy3dEglQpprf7jQBhQsQ3/WvOnjaN/+/L4i0jOstgScV0q2TjfvRF4V+ZePMDuZYIQtg5T4MKr+MQ==" crossorigin="anonymous"></script>
  <script src="<?=$main_url;?>asset/css/summernote.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js" integrity="sha512-9UR1ynHntZdqHnwXKTaOm1s6V9fExqejKvg5XMawEMToW4sSw+3jtLrYfZPijvnwnnE8Uol1O9BcAskoxgec+g==" crossorigin="anonymous"></script>

  <script>
  $(document).ready(function() {
    var tagInputEle = $('#tags-input');
    tagInputEle.tagsinput();
    $('#summernote').summernote({
      height: 500,
    });
  });
  <?php

  toastr_show();

  ?>
  setInterval( function () {gettable('post','<?=$dashboard_url."ajax/gettable.php";?>')}, 1000);
</script>
</body>

</html>
