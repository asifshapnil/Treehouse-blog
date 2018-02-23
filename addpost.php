<?php
session_start(); ?>
<!-- inclde files -->
<?php include 'inc/headertwo.php'; ?> <!-- header part -->
  <?php
      $session = $_SESSION['uid'];
      if ($session == "") {
    $nullsession = "<div class='container'><div class='error'><h5>You are not logged in</h5> </div></div>";
    function redirect($url){
         if (!headers_sent())
         {
             header('Location: '.$url);
             exit;
             }
         else
             {
             echo '<script type="text/javascript">';
             echo 'window.location.href="'.$url.'";';
             echo '</script>';
             echo '<noscript>';
             echo '<meta http-equiv="refresh" content="0;url='.$url.'" />';
             echo '</noscript>'; exit;
           }
         }
             $url = "index.php?nullsession=$nullsession";
         redirect($url);
  }




      $sql = "SELECT * FROM catagory";
      $result = $db->selectDB($sql);
   ?><!-- sidebar part -->
<!-- php script -->



<!--php script  -->






  <div class="row">
  <div class="add">
    <div class="col-lg-12">


  <form class="form-horizontal" action="addpost.php" method="POST" enctype="multipart/form-data">
     <div class="form-group">
        <div class="submit btn btn-block">Add New Post</div>
     </div>

    <div class="form-group">


        <input class="form-control" type="text" name="title" id="post-title" placeholder="Post title">

    </div>
    <div class="form-group">
      Category <br>

        <select name="catagory" class="form-control" id="post-category">
          <?php if ($result) {
          while ($row = $result->fetch_assoc()) {
           ?>
          <?php echo "<option value=".$row['id'].">".$row['catagory_name']."</option>"; ?>
             <?php } ?> <?php } ?>
        </select>

    </div>
    <!-- post-content -->
    <div class="form-group">
      Your Thoughts <br>

        <textarea name="content" rows="8" cols="80" class="form-control" id="content"></textarea>

    </div>
    <!-- upload image -->
    <div class="form-group">
      Upload Image <br>

        <input type="file" name="myfile"  id="file-upload">

    </div>
    <!-- post status -->
    <div class="form-group">


        <select name="status" class="form-control" id="post-status">
          <option value="publish">Publish</option>
          <option value="draft">Draft</option>
        </select>

    </div>

    <!-- submit button -->
    <div class="form-group">
        <input class="btn btn-block submit" type="submit" name="submit" value="Submit Your Post">

    </div>
    <?php if(isset($success)){
      echo $success;
    } ?>
  </form>
</div>
</div>
</div>
  <!-- php script for post submition -->


  <!-- <form class="" action="index.php" method="post" enctype="multipart/form-data">
     <div class="form-group">
          <input type="file" name="myfile" > <br>
          <input type="submit" name="submit" value="upload image">
     </div>
  </form> -->

  <div class="row">
    <div class="col-lg-12 well">
     <div class="stay">
      <center> <h3>Stay Current</h3>
        <p>Sign up for our newsletter, and we'll send
          you news and tutorials on web design, coding,
          business, and more!</p> </center>
          <center>
            <form class="form-horizontal" action="index.html" method="post">
              <div class="form-group">
                <input class="form-control" type="text" name="" value="">
                <br>
                <input class="btn btn-lg btn-block submit" type="submit" name="" value="subscribe">
              </div>
            </form>
          </center>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-12">
      <div class="stayone">
        <center> treehouse <br>
        &copy 2017 Tree house.inc <br>

        <ul class="ul">
           <li class="link"><a href="#">f</a></li>
           <li class="link"><a href="#">t</a></li>
           <li class="link"><a href="#">g</a></li>
           <li class="link"><a href="#">e</a></li>
           <li class="link"><a href="#">l</a></li>
         </ul>
  </center>
      </div>
    </div>
  </div>

<!-- footer part -->


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


   $uid = $_SESSION['uid'];
   $sql = "SELECT uname FROM user WHERE uid = '$uid'";
   $result = $db->selectDB($sql);
   $row = $result->fetch_assoc();


     $author = $row['uname'];
     $title =  $_POST['title'];
     $catagory = $_POST['catagory'];
     $content = $_POST['content'];
     $status = $_POST['status'];

     $sql = "INSERT INTO post(uid,title,author,catagory,image,body,status) VALUES('$uid','$title','$author','$catagory','$url','$content','$status')";
     $result = $db->selectDB($sql);
     if ($result) {
         $success =  "<div class='success'>Post has been submitted</div>";
     }
}

 ?>
