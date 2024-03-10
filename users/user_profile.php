<?php
require '../dashboard_header.php';
?>
<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
  <!-- row -->
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-6">
        <div class="card">
          <div class="card-header">
            Update Profile-<?= $assoc_user['name'] ?>
          </div>
          <div class="card-body">
            <?php if (isset($_SESSION['profile_up'])) { ?>
              <div class="alert alert-success"><?= $_SESSION['profile_up'] ?></div>
            <?php }
            unset($_SESSION['profile_up']) ?>
            <form action="/project/users/profile_post.php" method="POST">
              <input type="hidden" value="<?= $assoc_user['id'] ?>" name="id"> <!-- define id -->
              <div class="mb-3">
                <label for="">Name</label>
                <input class="form-control" type="text" name="name" value="<?= $assoc_user['name'] ?>">
              </div>
              <div class="mb-3">
                <label for="">Password</label>
                <input class="form-control" type="password" name="password">
              </div>
              <div class="mb-3">
                <label for="">Current Password</label>
                <input class="form-control" type="password" name="current_password">
                <?php if (isset($_SESSION['wrong_pass'])) { ?>
                  <strong class="text-danger"><?= $_SESSION['wrong_pass'] ?></strong>
                <?php }
                unset($_SESSION['wrong_pass']) ?>
              </div>
              <button class="btn btn-primary">Update</button>
            </form>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="card h-auto">
          <div class="card-header">
            Update Profile Picture
          </div>
          <div class="card-body">
            <?php if (isset($_SESSION['pp_update'])) { ?>
              <div class="arert alert-success mb-3"><?= $_SESSION['pp_update'] ?></div>
            <?php }
            unset($_SESSION['pp_update']) ?>

            <form action="/project/users/picture_post.php" method="POST" enctype="multipart/form-data">
              <div class="mb-3">
                <input type="file" class="form-control" name="photo" onchange="document.getElementById('u_mg').src = window.URL.createObjectURL(this.files[0])">>
                <?php if (isset($_SESSION['extention_err'])) { ?>
                  <strong class="text-danger"><?= $_SESSION['extention_err'] ?></strong>
                <?php }
                unset($_SESSION['extention_err']) ?>
              </div>
              <div class="my-2">
                <img width="200" src="" alt="" id="u_mg">
              </div>
              <div class="mb-3">
                <button class="btn btn-primary">Submit</button>
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