<?php
require '../dashboard_header.php';
require '../db.php';
$select_extertise = "SELECT * FROM expertises";
$extertise_result = mysqli_query($db_connection, $select_extertise);
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
            <h3> Expertise List </strong> </h3>
          </div>

          <div class="card-body">
            <table class="table table-striped">
              <tr>
                <th>SL</th>
                <th>Expertis name</th>
                <th>Expertis persent</th>
                <th>Expertis status</th>
                <th>Action Button</th>
              </tr>
              <?php foreach ($extertise_result as $sl => $expertise) { ?>
              <tr>
                <td><?= $sl + 1 ?></td>
                <td><?= $expertise['name'] ?></td>
                <td><?= $expertise['persent'] ?>% </td>
                <td><a href="expertise_status.php?id=<?= $expertise['id'] ?>"
                    class="btn btn-<?= $expertise['status'] == 0 ? 'light' : 'success' ?> shadow btn-xs sharp mr-1"><?= $expertise['status'] == 0 ? 'off' : 'on' ?>
                </td>
                <td><a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                  <button data_link="extertis_delet.php?id=<?= $expertise['id'] ?>"
                    class="btn btn-danger shadow btn-xs sharp delet-btn"><i class="fa fa-trash"></i></button>
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
            <h3> Add Expertise </strong> </h3>
          </div>
          <?php if (isset($_SESSION['e_success'])) { ?>
          <div class="alert alert-success"><?= $_SESSION['e_success'] ?></div>
          <?php }
          unset($_SESSION['e_success']) ?>

          <form action="expertise_post.php" method="POST">
            <div class="card-body">
              <div class="mb-3">
                <label for="" class="form-lable">Expertise name</label>
                <input type="text" class="form-control" name="e_name">
              </div>
              <div class="mb-3">
                <label for="" class="form-lable">Expertise Persent</label>
                <input type="number" class="form-control" name="e_persent">
              </div>
              <div class="mb-3">
                <button type="submit" class="btn btn-primary">Add Expertise</button>
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
if (isset($_SESSION['expertis_delet'])) { ?>
<script>
Swal.fire({
  title: "Deleted!",
  text: "Your file has been deleted.",
  icon: "success"
});
</script>
<?php }
unset($_SESSION['expertis_delet']) ?>

<?php
if (isset($_SESSION['limit'])) { ?>
<script>
Swal.fire({
  icon: "error",
  title: "Oops...",
  text: "<?= $_SESSION['limit'] ?>",
});
</script>
<?php }
unset($_SESSION['limit']) ?>

<?php
if (isset($_SESSION['e_warning'])) { ?>
<script>
Swal.fire({
  icon: "warning",
  title: "Oops...",
  text: "<?= $_SESSION['e_warning'] ?>",
});
</script>
<?php }
unset($_SESSION['e_warning']) ?>