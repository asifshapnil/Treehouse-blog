<?php include 'inc/headertwo.php';?>

<?php

if (isset($_POST['submit'])) {

  $post = $_POST['body'];
  $pid = $_POST['pid'];

   $sql = "UPDATE post SET body = '$post' WHERE id = '$pid'";

   $result = $db->selectDB($sql);
   if ($result) {
     echo "successfull";
   }else {
     echo "update failed";
   }

}



?><div class="row">
  <div class="col-lg-12">


<div class="log">
<form class="form-horizontal" action="edit.php" method="POST">
  <?php
  if (isset($_GET['pid'])) {
    $pid = $_GET['pid'];
  }
  $esql = "SELECT * FROM post WHERE id = $pid";
   $eresult = $db->selectDB($esql);
   $erow = $eresult->fetch_assoc(); ?>
   <div class="form-group">
     <div class="btn btn-lg btn-block submit">Edit Post </div>
   </div>
   <div class="form-group">
     <textarea name="body" rows="8" cols="136"value=""><?php echo $erow['body'];?></textarea> <br>
   </div>
   <div class="form-group">
     <input type="hidden" name="pid"value="<?php echo $pid; ?>" > <br>
   </div>
  <div class="form-group">
    <input type="submit" class="btn btn-block btn-lg submit"name="submit" value="Save">
  </div>


</form>
</div>
</div>
</div>
