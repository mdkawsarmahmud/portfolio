<?php
require '../dashboard_header.php';
require '../db.php';
$select_secvice = "SELECT * FROM services";
$secvice_result = mysqli_query($db_connection, $select_secvice);
?>
<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
  <!-- row -->
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-8">
        <div class="card">
          <div class="card-header">
            <h3>Service</h3>
          </div>
          <div class="card-body">
            <table class="table tabel-striped">
              <tr>
                <th>SL</th>
                <th>Service Name</th>
                <th>Service discription</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
              <?php foreach ($secvice_result as $sl => $service) { ?>
                <tr>
                  <td><?= $sl + 1 ?></td>
                  <td><?= $service['name'] ?></td>
                  <td><?= $service['description'] ?></td>
                  <td><a href="service_status.php?id=<?= $service['id'] ?>">
                      <button class="btn btn-<?= $service['status'] == 0 ? 'light' : 'primary' ?> shadow btn-xs sharp delet-btn"><?= $service['status'] == 0 ? 'off' : 'on' ?></button></a>
                  </td>
                  <td>
                    <button data_link="service_delet.php?id=<?= $service['id'] ?>" class="btn btn-danger shadow btn-xs sharp delet-btn"><i class="fa fa-trash"></i></button>
                  </td>
                </tr>
              <?php } ?>

            </table>

          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="card">
          <div class="card-header">
            <h3>Add Service</h3>
          </div>
          <form action="service_post.php" method="POST">
            <div class="card-body">
              <div class="mb-3">
                <label for="" class="form-label">Service Name</label>
                <input type="text" class="form-control" name="name">
              </div>
              <div class="mb-3">
                <label for="" class="form-label">Service Discription</label>
                <textarea class="form-control" name="discription" id="" cols="30" rows="5"></textarea>
              </div>
              <div class="mb-3">
                <button type="submit" class="btn btn-primary">Submit</button>
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
<script>
  $('.delet-btn').click(function() {
    var link = $(this).attr('data_link');
    Swal.fire({
      title: "Are you sure?",
      text: "You won't be able to revert this!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, delete it!"
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = link;
      }
    });
  })
</script>

<?php
if (isset($_SESSION['services_delet'])) { ?>
  <script>
    Swal.fire({
      icon: "success",
      title: "Yes ('_')...",
      text: "<?= $_SESSION['services_delet'] ?>!",
    });
  </script>
<?php }
unset($_SESSION['services_delet']) ?>

<?php
if (isset($_SESSION['s_success'])) { ?>
  <script>
    Swal.fire({
      icon: "success",
      title: "Yes ('_')...",
      text: "<?= $_SESSION['s_success'] ?>!",
    });
  </script>
<?php }
unset($_SESSION['s_success']) ?>

<?php
if (isset($_SESSION['s_warning'])) { ?>
  <script>
    Swal.fire({
      icon: "warning",
      title: "Oops.(!_!).",
      text: "<?= $_SESSION['s_warning'] ?>!",
    });
  </script>
<?php }
unset($_SESSION['s_warning']) ?>