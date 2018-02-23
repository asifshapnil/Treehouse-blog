<?php error_reporting(0); ?>
<?php session_start(); ?>
<?php $session = $_SESSION['uid'];
  if ($session == "") {
    include'inc/header.php';
  }else {
    include'inc/headertwo.php';
  }
 ?>

<?php
if (isset($_GET['cid'])) {
  $catid = $_GET['cid'];
}

 ?>


<div class="row">
  <div class="col-lg-12" style="background-image: url(free-wallpaper-14.jpg); height: 200px; width: 100%; height: 500px; background-attachment: fixed;">
         <div class="text">
            <h1><center>Everything You Need to Evaluate Before Saying Yes to Your First Dev Jobv</center></h1>
             <center>   <a href="#" class="btn btn-lg button"><b>Continue Reading</b></a> </center>
         </div>

  </div>
  <!-- catagory -->
  <?php   $sql = "SELECT * FROM catagory";
        $cresult = $db->selectDB($sql);
    ?>
  <div class="col-lg-12">

  <div class="catagory navbar-default">
    <div class="catnav container-fluid">
      <button type="button" name="button" class="navbar-toggle" data-toggle="collapse" data-target="#catagory">
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>

      </button>
      <div class="collapse navbar-collapse" id="catagory">

<ul class="nav navbar-nav cat">
  <?php if ($cresult) { ?>
    <?php while($crow = $cresult->fetch_assoc()) {?>
      <?php $cid = $crow['id']; ?>
      <li><a href="catagory.php?cid=<?php echo $cid; ?>"><h4><?php echo $crow['catagory_name']; ?></h4></a></li>
   <?php } ?>
 <?php } ?>
</div>
   </ul>
 </div>
 </div>
</div>
</div>
  <!-- catagory -->





<!-- post echo -->

<?php   $sql = "SELECT * FROM post
               WHERE catagory='$catid'";
      $result = $db->selectDB($sql);
  ?>
<div class="row">
  <div class="container">
  <?php if ($result) { ?>
<?php while($row = $result->fetch_assoc()) {?>

  <div class="col-lg-3 post">
    <a href = "readmore.php?pid=<?php echo $row['id'];?>">

    <div class="panel panel-default post-panel" title="click to read more">
<div class="panel-heading">

  <img src="<?php echo $row['image'];?>" alt="" width="270px" height="200px" style="margin-top:-20px;margin-left:-20px;margin-right:-20px;margin-bottom:-10px;" >

</div>
<div class="panel-body">
    <h4 class="title"><?php echo $row['title']; ?></h4>
    <?php echo $row['date']; ?> <br> <br>
    <?php echo $nf->textFormat($row['body'],300); ?>
</div>
</div> </a>
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
