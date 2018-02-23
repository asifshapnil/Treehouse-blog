<?php
session_start();
include'inc/headertwo.php'; ?>
<?php

 if (isset($_GET['id'])) {
  $id = $_GET['id'];

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
  <?php   $sql = "SELECT * FROM catagory";
        $cresult = $db->selectDB($sql);
    ?>
  <div class="col-lg-12">
  <div class="catagory">
    <center>
<ul class="nav navbar-nav cat">
  <?php if ($cresult) { ?>
    <?php while($crow = $cresult->fetch_assoc()) {?>
      <?php $cid = $crow['id']; ?>
      <li><a href="catagory.php?cid=<?php echo $cid; ?>"><?php echo $crow['catagory_name']; ?></a></li>
   <?php } ?>
 <?php } ?>
</center>
   </ul>
 </div>
</div>

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

    <div class="col-lg-3 ">
      <h3>Recent Posts</h3>
  <!-- recent -->
  <div class="style">
     <?php
          $sql = "SELECT * FROM post ORDER BY id DESC LIMIT 5";
          $recent = $db->selectDB($sql);
          if($recent){
            while($rrow = $recent->fetch_assoc()){
              ?>
    <div class="recent">
       <a href = "">
         <div class="panel panel-default post-panel">
     <div class="panel-heading">

       <img src="<?php echo $rrow['image'];?>" alt="" width="100%" height="250px" >

     </div>
     <div class="panel-body">
         <h4><?php echo $rrow['title']; ?></h4>
         <?php echo $rrow['date']; ?> <br> <br>
         <?php echo $nf->textFormat($rrow['body'],300); ?>
     </div>
     </div> </a>
   </div>
   <?php }} ?>
     <!-- recent -->
   </div>
    </div>
    <?php   $sql = "SELECT * FROM post WHERE uid='$id' LIMIT $start,$perpage";
          $result = $db->selectDB($sql);
      ?>
  <?php if ($result) { ?>
<?php while($row = $result->fetch_assoc()) {?>

  <div class="col-lg-3 post">
    <a href = "">
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
  </div>

<?php } ?>
<br>
<!--paginate  -->

<?php $sql = "SELECT *  FROM post";
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
<?php  echo "<li class=".'page-item'."><a class=".'page-link'." href='index.php?page=1'>".'1'."</a></li>";
for ($i=2; $i < $total_page ; $i++) {
  echo "  <li class=".'page-item'."><a class=".'page-link'." href='index.php?page=".$i."'>".$i."</a></li>";
}

echo "<li class=".'page-item'."><a class=".'page-link'." href='index.php?page=".$total_page."'>".$total_page."</a></span></li>";  ?>
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
