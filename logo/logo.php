<?php
require '../dashboard_header.php';

$select_logo = "SELECT * FROM logos";
$logo_result = mysqli_query($db_connection, $select_logo);
$assoc_logo = mysqli_fetch_assoc($logo_result);
// echo $assoc_logo['logo'];
?>

<div class="content-body">
  <!-- row -->
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-6">
        <div class="card">
          <div class="card-header">
            <h3>Update Nav Logo</h3>
          </div>
          <div class="card-body">
            <form action="logo_post.php" method="POST" enctype="multipart/form-data">
              <div class="mb-3">
                <img id="nav_logo" width="200" src="/project/uplodes/logo/<?= $assoc_logo['logo'] ?>" alt="">
              </div>
              <div class=" mb-3">
                <input type="file" name="logo" class="form-control" onchange="document.getElementById('nav_logo').src = window.URL.createObjectURL(this.files[0])">>
              </div>
              <div class="mb-3">
                <button type="submit" class="btn btn-primary">Update</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
require '../dashboard_footer.php'
?>