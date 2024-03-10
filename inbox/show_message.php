<?php
$id = $_GET['id'];
require '../db.php';
$update = "UPDATE messages SET status=1 WHERE id=$id";
$update_message = mysqli_query($db_connection, $update);
require '../dashboard_header.php';
$id = $_GET['id'];
$select = "SELECT * FROM messages WHERE id=$id";
$result_message = mysqli_query($db_connection, $select);
$accoc_mresult = mysqli_fetch_assoc($result_message);

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
            <h3>Message </h3>
          </div>
          <div class="card-body">

            <table class="table table-hover">
              <tr>
                <th>Received at</th>
                <td><?= $accoc_mresult['creat_at'] ?></td>
              </tr>
              <tr>
                <th>Name</th>
                <td><?= $accoc_mresult['name'] ?></td>
              </tr>
              <tr>
                <th>email</th>
                <td><?= $accoc_mresult['email'] ?></td>
              </tr>
              <tr>
                <th>message</th>
                <td><?= $accoc_mresult['message'] ?></td>
              </tr>
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