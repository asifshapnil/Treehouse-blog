<?php session_start(); ?>
<?php include 'inc/headertwo.php'; ?>

<?php
  if (isset($_POST['add'])) {
     $catagory = $_POST['catagory'];
     $sql = "INSERT INTO catagory(catagory_name) VALUES('$catagory')";
     $result = $db->selectDB($sql);


  }


 ?>


<form class="form-horizontal" action="addcatagory.php" method="POST" enctype="multipart/form-data">
  <div class="form-group">

    <div class="col-sm-8">
      <input class="form-control" type="text" name="catagory" id="post-title" placeholder="New Catagory Name">

    </div>
    <div class="col-sm-2">
           <input type="submit" name="add" id="post-title" value="Add" class="btn btn-sm btn-danger">
    </div>

  </div>
     </form>



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
       "<div class='alert alert-danger'>Post status could not be update</div>";
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
          $sql = "SELECT * FROM catagory";
          $result = $db->selectDB($sql);
          if ($result) {
            while ($rows = $result->fetch_assoc()) {
              echo '<tr>
                <td>'.$rows['id'].'</td>
                <td>'.$rows['catagory_name'].'</td>
                <td><a href="editcat.php?cid='.$rows['id'].'" class="btn btn-sm btn-success">Edit</a></td>
              </tr>';
            }
          } else {
            throw new Exception("Database Error [{$this->database->errno}] {$this->database->error}");
          }

         ?>

        </tbody>

  </table>
 </div></div>
