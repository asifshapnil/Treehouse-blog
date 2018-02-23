<?php session_start();?>
<?php include 'inc/headertwo.php'; ?>




<!-- delete -->
<?php if (isset($_GET['did'])) {
  $did = $_GET['did'];
  $dsql = "DELETE FROM post WHERE id = '$did'";
  $dresult = $db->selectDB($dsql);

} ?>
<!-- delete -->



 <?php if ($session == "") {
    $nullsession = "<div class='error'><h3>You are not logged In</h3></div>";
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


  ?>




<div class="row">
  <div class="col-lg-12" style="background-image: url(bg_body.jpg); height: 200px; width: 100%; height: 500px;">
         <div class="text">
            <h1><center>Everything You Need to Evaluate Before Saying Yes to Your First Dev Jobv</center></h1>
             <center>   <a href="admin.php" class="btn btn-lg button"><b>Admin Panel</b></a> </center>
         </div>

  </div>
  <!-- catagory -->

</div>

  <!-- catagory -->





<!-- post echo -->


<?php   $sql = "SELECT * FROM post";
      $result = $db->selectDB($sql);
  ?>
<div class="row">
  <div class="container">

   <h4>Posts by all users</h4>
  <?php if ($result) { ?>
<?php while($row = $result->fetch_assoc()) {?>

  <div class="col-lg-4 post">
    <a href = "readmore.php?pid=<?php echo $row['id'];?>">
    <div class="panel panel-default post-panel">
<div class="panel-heading">

  <img src="<?php echo $row['image'];?>" alt="" width="100%" height="250px" >

</div>
<div class="panel-body">
    <h4><?php echo $row['title']; ?></h4>
    <?php echo $row['date']; ?> <br> <br>
    <?php echo $nf->textFormat($row['body'],300); ?>
</div>

</div> </a>
<a href="edit.php?pid=<?php echo $row['id'];?>" class="alert alert-info">edit</a>
<a href="userprofile.php?did=<?php echo $row['id'];?>" class="alert alert-danger">delete</a>

  </div>

<?php } ?>
<br>
<!--paginate  -->

<!-- paginate end -->
<?php } ?>
</div>
</div>


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
