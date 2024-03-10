<?php
require '../dashboard_header.php';
$id = $_GET['id'];

$select = "SELECT * FROM portfolios WHERE id=$id";
$select_result = mysqli_query($db_connection, $select);
$assoc_portfolio = mysqli_fetch_assoc($select_result);
?>
<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
  <!-- row -->
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-8 m-auto">
        <div class="card">
          <div class="card-header">
            <h3>Portfolio Edit </h3>
          </div>
          <div class="card-body">
            <form action="portfolio_edit_post.php" method="POST" enctype="multipart/form-data">
              <div class="mb-3">
                <input type="hidden" value="<?= $assoc_portfolio['id'] ?>" name="id">
                <label for="" class="form-lable">Title</label>
                <input type="text" class="form-control" value="<?= $assoc_portfolio['title'] ?>" name="title">
              </div>
              <div class="mb-3">
                <label for="" class="form-lable">Sub-Title</label>
                <input type="text" class="form-control" value="<?= $assoc_portfolio['subtitle'] ?>" name="subtitle">
              </div>
              <div class="mb-3">
                <label for="" class="form-lable">Image</label>
                <input type="file" name="img" class="form-control" onchange="document.getElementById('port_img').src = window.URL.createObjectURL(this.files[0])">>
              </div>
              <div class="mb-3">
                <img id="port_img" width="150" src="../uplodes/portfolio/<?= $assoc_portfolio['img'] ?>" alt="img">
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
<!--**********************************
            Content body end
        ***********************************-->
<?php
require '../dashboard_footer.php';
?>