<?php include'inc/headertwo.php'; ?>
<?php
   if (isset($_GET['did'])) {
       $did = $_GET['did'];

   $sql = "DELETE FROM user WHERE uid = '$did'";
   $psql = "DELETE FROM post WHERE uid = '$did'";
   $result = $db->selectDB($sql);
   $presult = $db->selectDB($psql);
 }
 if (isset($_GET['rid'])) {
     $rid = $_GET['rid'];

 $sql = "DELETE FROM admin WHERE uid = '$rid'";

 $result = $db->selectDB($sql);

}

 if (isset($_GET['aid'])&&isset($_GET['uname'])) {
     $aid = $_GET['aid'];
     $uname = $_GET['uname'];



     $sql = "INSERT INTO admin(uid,uname)VALUES('$aid','$uname')";
     $result = $db->selectDB($sql);


}

 ?>

<div class="row">
  <div class="col-lg-12" style="background-image: url(bg_body.jpg); height: 200px; width: 100%; height: 500px;">
         <div class="text">
            <h1><center>Everything You Need to Evaluate Before Saying Yes to Your First Dev Jobv</center></h1>
             <center>   <a href="sign.php" class="btn btn-lg button"><b>User Sign Up/In</b></a> </center>
             <center>   <a href="adminsign.php" class="btn btn-lg  button"><b>Admin Sign Up/In</b></a> </center>

         </div>

  </div>
  <!-- catagory -->


  <!-- catagory -->





<!-- post echo -->
<?php
if (isset($_GET['page'])) {
$page = $_GET['page'];
} else {
$page = 1;
}

$perpage = 15;
$start = ($page-1)*$perpage;
 ?>





<div class="row">
  <div class="container">

    <?php   $sql = "SELECT * FROM user LIMIT $start,$perpage";
          $result = $db->selectDB($sql);
      ?>
  <?php if ($result) { ?>
<?php while($row = $result->fetch_assoc()) {?>
  <?php $uid = $row['uid']; ?>
  <div class="col-lg-4 post">
    <a href = "userspost.php">
<center>
<div class="col-md-12">
<div class=" user alert alert-success">
  <img src="<?php echo $row['image'];?>" alt="" width="100%" > <br>
</div>
<div class="alert alert-warning">
     <?php echo $row['uname']; ?> <br>
</div>
<a href="editusers.php?aid=<?php echo $row['uid'];?>&uname=<?php echo $row['uname'];?>" class="btn btn-sm btn-block btn-primary">Make Admin</a>
<a href="editusers.php?did=<?php echo $row['uid'];?>" class="btn btn-sm btn-block btn-danger">Bann User</a>



  <a href="editusers.php?rid=<?php echo $row['uid'];?>" class="btn btn-sm btn-block btn-danger">Remove</a>



</div>
</center>
 </a>
  </div>

<?php } ?>
<br>
<!--paginate  -->

<?php $sql = "SELECT *  FROM user";
     $result = $db->selectDB($sql);
     $total_rows = mysqli_num_rows($result);
     $total_page = ceil($total_rows/$perpage);
     ?>
<center>
<nav aria-label="Page navigation example">
<ul class="pagination">
<li class="page-item">
<a class="page-link" href="#" aria-label="Previous">
  <span aria-hidden="true">&laquo;</span>
  <span class="sr-only">Previous</span>
</a>
</li>
<?php  echo "<li class=".'page-item'."><a class=".'page-link'." href='editusers.php?page=1'>".'1'."</a></li>";
for ($i=2; $i < $total_page ; $i++) {
  echo "  <li class=".'page-item'."><a class=".'page-link'." href='editusers.php?page=".$i."'>".$i."</a></li>";
}

echo "<li class=".'page-item'."><a class=".'page-link'." href='editusers.php?page=".$total_page."'>".$total_page."</a></span></li>";  ?>
<li class="page-item">
<a class="page-link" href="#" aria-label="Next">
  <span aria-hidden="true">&raquo;</span>
  <span class="sr-only">Next</span>
</a>
</li>
</ul>
</nav>
</center>

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
