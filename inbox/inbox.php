<?php
session_start();
require '../dashboard_header.php';
$select = "SELECT * FROM messages";
$result_message = mysqli_query($db_connection, $select);
// $accoc_message = mysqli_fetch_assoc($result_message)
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
            <h3>Messages </h3>
          </div>
          <div class="card-body">
            <table class="table table-hover" id="example">
              <thead>
                <tr>
                  <th>Sl</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>subject</th>
                  <th>Message</th>
                  <th>Action Button</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($result_message as $sl => $message) { ?>
                <tr class="<?= $message['status'] == 0 ? 'bg-light' : '' ?>">
                  <td><a href="show_message.php?id=<?= $message['id'] ?>"><?= $sl + 1 ?></a></td>
                  <td><a href="show_message.php?id=<?= $message['id'] ?>"><?= $message['name'] ?></a></td>
                  <td><a href="show_message.php?id=<?= $message['id'] ?>"><?= $message['email'] ?></a></td>
                  <td><a href="show_message.php?id=<?= $message['id'] ?>"><?= $message['subject'] ?></a></td>

                  <td><a href="show_message.php?id=<?= $message['id'] ?>"><?= $message['message'] ?></a></td>

                  <td>
                    <a href="delet_message.php?id=<?= $message['id'] ?>" class="btn btn-danger">Delet</a>
                  </td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
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

<?php if (isset($_SESSION['delet'])) { ?>
<script>
Swal.fire({
  // position: "top-end",
  icon: "success",
  title: "<?= $_SESSION['delet'] ?>",
  showConfirmButton: false,
  timer: 1500
});
</script>
<?php }
unset($_SESSION['delet']) ?>