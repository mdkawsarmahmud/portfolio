<?php
require '../dashboard_header.php';

$select_users = "SELECT * FROM users WHERE status=0";
$result_users = mysqli_query($db_connection, $select_users);

$select_trash_users = "SELECT * FROM users WHERE status=1";
$result_trash_users = mysqli_query($db_connection, $select_trash_users);
?>
<div class="content-body">
  <!-- row -->
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-8">
        <div class="card h-auto">
          <?php if (isset($_SESSION['move_trash'])) { ?>
            <div class="alert alert-success"><?= $_SESSION['move_trash'] ?></div>
          <?php }
          unset($_SESSION['move_trash']) ?>
          <div class="card-header">
            <h3>Users List</h3>
          </div>
          <div class="card-body">
            <table class="table table-bordered">
              <tr class="table-info">
                <th>id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
              </tr>
              <?php foreach ($result_users as $key => $user) { ?>
                <tr class="table-primary">
                  <td><?= $key + 1 ?></td>
                  <td><?= $user['name'] ?></td>
                  <td><?= $user['email'] ?></td>
                  <td><a href="delete_user.php?id=<?= $user['id'] ?>" class="btn btn-danger">Trash</a></td>
                </tr>
              <?php } ?>
            </table>
          </div>
        </div>

        <!-- trash user -->
        <div class="card h-auto">
          <?php if (isset($_SESSION['delet_user'])) { ?>
            <div class="alert alert-success"><?= $_SESSION['delet_user'] ?></div>
          <?php }
          unset($_SESSION['delet_user']) ?>
          <div class="card-header">
            <h3>Trash Users List</h3>
          </div>
          <div class="card-body">
            <table class="table table-bordered">
              <tr class="table-danger">
                <th>id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
              </tr>
              <?php foreach ($result_trash_users as $key => $user) { ?>
                <tr class="table-danger">
                  <td><?= $key + 1 ?></td>
                  <td><?= $user['name'] ?></td>
                  <td><?= $user['email'] ?></td>
                  <td><a href="final_delete_user.php?id=<?= $user['id'] ?>" class="btn btn-danger mb-2">delet</a>
                    <a href="final_delete_user.php?id=<?= $user['id'] . '.del' ?>" class="btn btn-info mb-2">restor</a>
                  </td>
                </tr>
              <?php } ?>
            </table>
          </div>
        </div>
      </div>

      <!-- insert user -->

      <div class="col-lg-4">
        <div class="card h-auto">
          <div class="card-header">
            <h3>Inser user</h3>
          </div>
          <div class="card-body">
            <?php if (isset($_SESSION['success'])) { ?>
              <div class="alert alert-success"><?= $_SESSION['success'] ?></div>
            <?php }
            unset($_SESSION['success']) ?>

            <?php if (isset($_SESSION['exist'])) { ?>
              <div class="alert alert-warning"><?= $_SESSION['exist'] ?></div>
            <?php }
            unset($_SESSION['exist']) ?>

            <form action="reg_user_post.php" method="POST">
              <div class="mb-3">
                <label for="name" class="form-lable">Name</label>
                <input id="name" type="text" name="name" class="form-control">
              </div>
              <div class="mb-3">
                <label for="email" class="form-lable">email</label>
                <input id="email" type="email" name="email" class="form-control">
              </div>
              <div class="mb-3">
                <label for="password" class="form-lable">Password</label>
                <input id="password" type="password" name="password" class="form-control">
              </div>
              <div class="mb-3">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php require '../dashboard_footer.php' ?>