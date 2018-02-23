<?php
session_start();
include 'inc/headertwo.php';
$session = $_SESSION['uid'];

  ?>

<div class="log">
  <form class="form-horizontal" action="editprofile.php" method="POST" enctype="multipart/form-data">

  <div class="form-group">
    Upload Image <br>
    <input type="file" name="myfile"  id="file-upload">
</div>
<div class="form-group">
  <input type="submit" name="submit" value="submit">
</div>

</form>
</div>

<?php
if (isset($_POST['submit'])) {

 $fileName = $_FILES['myfile']['name'];
 $fileSize = $_FILES['myfile']['size'];
 $fileType = $_FILES['myfile']['type'];
 $fileError = $_FILES['myfile']['error'];
 $fileTmp = $_FILES['myfile']['tmp_name'];
 $fileExt = explode(".",$fileName);
 $fileActExt = strtolower(end($fileExt));
 $newFileName = uniqid();

      if ($fileError > 0) {
           die("error occured");

      }else {
        move_uploaded_file($fileTmp,"uploads/".$newFileName.".".$fileActExt);

        $url ="uploads/".$newFileName.".".$fileActExt;
  }

  $sql = "UPDATE user SET image = '$url' WHERE uid = '$session' ";
  $result = $db->selectDB($sql);
  if($result){
    echo "updated piture";
  }


}
 ?>
