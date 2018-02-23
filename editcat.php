<?php session_start(); ?>
<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php
  if (isset($_GET['cid'])) {
     $cid = $_GET['cid'];


  }

  if (isset($_POST['edit'])) {
     $editcat = $_POST['catagory'];
     $cid = $_POST['cid'];

     $sql = "UPDATE catagory SET catagory_name = '$editcat' WHERE id = '$cid'";
     $result = $db->selectDB($sql);
     header("location:addcatagory.php");

  }


 ?>


<h4>Edit any catagory name</h4> <hr>



<?php
$pid = "";
$content = "";
$status = "";
$message = "";
  if (isset($_GET['id']) && isset($_GET['status'])) {
    $pid = $_GET['id'];
    $status = $_GET['status'];

    $sql = "UPDATE post SET status = '$status' WHERE id = '$pid'";
    $result = $db->selectDB($sql);
    if ($result) {
      $message = "<div class='alert alert-success'>Post status has been updated</div>";
    } else {
       "<div class='alert alert-danger'>Post status could not be update</>";
    }
  }
 ?>
<!-- post table -->
<?php if (isset($_GET['id'])) {
   echo $message;
} ?>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">All Catagories</h3>
    </div>
    <div class="panel-body">
      <table class="table table-condensed table-responsive">
        <thead>
          <tr>
            <th>CatagoryID</th>
            <th>catagoryName</th>



          </tr>
        </thead>
        <tbody>
        <!-- php script for displaying posts in a table -->
        <?php
          $uid = $_SESSION['uid'];
          $sql = "SELECT * FROM catagory WHERE id ='$cid'";
          $result = $db->selectDB($sql);
          if ($result) {
            while ($rows = $result->fetch_assoc()) {
              echo '<tr>
                <td>'.$rows['id'].'</td>
                <td><form action="editcat.php" method="POST"><input type="text" name="catagory" value="'.$rows['catagory_name'].'"></td>
                <td><input type="submit" name="edit" value="Edit" class="btn btn-sm btn-success">
                       <input type="hidden" name="cid" value="'.$cid.'">
                </form></td>

              </tr>';
            }
          } else {
            throw new Exception("Database Error [{$this->database->errno}] {$this->database->error}");
          }

         ?>

        </tbody>
      </div>
    </div>
  </table>
<!--  -->
