<?php
require '../dashboard_header.php';
$select = "SELECT * FROM portfolios";
$select_result = mysqli_query($db_connection, $select);
?>
<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
  <!-- row -->
  <div class="container-fluid">
    <div class="row">
      <div class="col-mb 4 col-lg-8">
        <div class="card">
          <div class="card-header">
            <h3> Portfolio </h3>
          </div>

          <div class="card-body">
            <table class="table table-striped">
              <tr>
                <th>SL</th>
                <th>Title</th>
                <th> Sub Title</th>
                <th>Img</th>
                <th>Action Button</th>
              </tr>
              <?php foreach ($select_result as $sl => $portfolio) { ?>
              <tr>
                <td><?= $sl + 1 ?></td>
                <td><?= $portfolio['title'] ?></td>
                <td><?= $portfolio['subtitle'] ?></td>
                <td>
                  <img width="150" src="../uplodes/portfolio/<?= $portfolio['img'] ?>" alt="portfolio image">
                </td>
                <td>
                  <a href="portfolio_edit.php?id=<?= $portfolio['id'] ?>" class="btn btn-info mb-3">Edit</a>
                  <button d_link="portfolio_delet.php?id=<?= $portfolio['id'] ?>"
                    class="d_button btn btn-danger mb-3">Delet</button>
                </td>
              </tr>
              <?php } ?>

            </table>
          </div>
        </div>
      </div>
      <div class="col-mb 4 col-lg-4">
        <div class="card">
          <div class="card-header">
            <h3> Add Portfolio </strong> </h3>
          </div>

          <form action="portfolio_post.php" method="POST" enctype="multipart/form-data">
            <div class="card-body">
              <div class="mb-3">
                <label for="" class="form-lable">Title</label>
                <input type="text" class="form-control" name="title">
              </div>
              <div class="mb-3">
                <label for="" class="form-lable">Sub Title</label>
                <input type="text" class="form-control" name="subtitle">
              </div>
              <div class="mb-3">
                <label for="" class="form-lable">Image</label>
                <input type="file" class="form-control" name="p_img">
              </div>
              <div class="mb-3">
                <button type="submit" class="btn btn-primary">Add title</button>
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
$('.d_button').click(function() {
  var link = $(this).attr('d_link')
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
});
</script>
<?php
if (isset($_SESSION['add_portfolio'])) { ?>
<script>
Swal.fire({
  icon: "success",
  title: "yahu...",
  text: "<?= $_SESSION['add_portfolio'] ?>",
});
</script>
<?php }
unset($_SESSION['add_portfolio']) ?>

<?php
if (isset($_SESSION['p_update'])) { ?>
<script>
Swal.fire({
  icon: "success",
  title: "yahu...",
  text: "<?= $_SESSION['p_update'] ?>",
});
</script>
<?php }
unset($_SESSION['p_update']) ?>