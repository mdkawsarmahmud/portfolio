<?php
require '../dashboard_header.php';
$select_banner = "SELECT * FROM banners";
$banner_result = mysqli_query($db_connection, $select_banner);
$assoc_banner = mysqli_fetch_assoc($banner_result);
?>
<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
  <!-- row -->
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <h3>Home-Banner </h3>
          </div>
          <div class="card-body">
            <form action="banner_post.php" method="POST" enctype="multipart/form-data">
              <div class="row">
                <div class="col-lg-4">
                  <div class="mb-3">
                    <label for="" class="form-label">Designation</label>
                    <input type="text" name="deg" class="form-control" value=" <?= $assoc_banner['deg'] ?>">
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="mb-3">
                    <label for="" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" value="<?= $assoc_banner['name'] ?>">
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="mb-3">
                    <label for="" class="form-label">Watermark</label>
                    <input type="text" name="w_mark" class="form-control" value="<?= $assoc_banner['watermark'] ?>">
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="mb-3">
                    <label for="" class="form-label">Description</label>
                    <input type="text" name="desp" class="form-control" value="<?= $assoc_banner['description'] ?>">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="mb-3">
                    <label for="" class="form-label">Action Button</label>
                    <input type="text" name="a_button" class="form-control" value="<?= $assoc_banner['a_button'] ?>">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="mb-3">
                    <label for="" class="form-label">Action Link</label>
                    <input type="text" name="a_link" class="form-control" value="<?= $assoc_banner['a_link'] ?>">
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="mb-3">
                    <img height="200" id="banner" src="../uplodes/banner/<?= $assoc_banner['b_img'] ?>" alt="Banner img">
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="mb-3">
                    <label for="" class="form-label">Bnanner_Image</label>
                    <input type="file" name="b_img" class="form-control" onchange="document.getElementById('banner').src = window.URL.createObjectURL(this.files[0])">
                  </div>
                </div>
                <div class="mb-3">
                  <button type="submit" class=" btn btn-primary">Submit</button>
                </div>
              </div>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!--**********************************
            Content body end
        ***********************************-->
<?php
require '../dashboard_footer.php';
?>