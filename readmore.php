
<?php error_reporting(0); ?>
<?php session_start(); ?>
<?php $session = $_SESSION['uid'];
  if ($session == "") {
    include'inc/header.php';
  }else {
    include'inc/headertwo.php';
  }
 ?>


<?php if (isset($_GET['pid'])) {
    $pid = $_GET['pid'];

} ?>





<!-- comment -->
<?php
if(isset($_SESSION['uid'])){
$uid = $_SESSION['uid'];

     $nsql = "SELECT uname FROM user WHERE uid =  '$uid' ";
     $nresult = $db->selectDB($nsql);
     if ($nresult) {
       $nrow =  $nresult->fetch_assoc();
       $name = $nrow['uname'];
     }
}
   if (isset($_POST['submit'])) {
     $comment = $_POST['comment'];
     $pid = $_POST['pid'];
     $csql = "INSERT INTO comment(pid,name,comment)
     VALUES('$pid','$name','$comment')";
     $cresult = $db->selectDB($csql);
   }


 ?>

<!-- comment end -->


<!-- reply -->

<?php
 if (isset($_GET['cid'])) {
   $cid = $_GET['cid'];
 }

 if (isset($_POST['rsubmit'])) {
   $reply = $_POST['reply'];
   $cid = $_POST['cid'];
   $pid = $_POST['pid'];
   $rsql = "INSERT INTO reply(cid,name,reply)VALUES('$cid','$name','$reply')";
   $rresult = $db->selectDB($rsql);
 }
 ?>


<div class="row">
  <?php $sql = "SELECT * FROM post WHERE id = '$pid'";
    $result = $db->selectDB($sql);
    $row = $result->fetch_assoc(); ?>
    <?php $userid = $row['uid'];
    $usql = "SELECT * FROM user WHERE uid = '$userid'";
    $uresult = $db->selectDB($usql);
    $urow = $uresult->fetch_assoc(); ?>

  <div class="col-lg-12">

    <img src="<?php echo $row['image'];?>" alt="" max-height="500px"  width="100%" class="img-responsive cover">
</div>
  <div class="pro">
     <img src="<?php echo $urow['image'];?>" class="propic">
     <h5><a href="visituser.php?uid=<?php echo $urow['uid'];?>"><?php echo $urow['uname'];?></a></h5>
     <h5><?php echo $urow['email'];?></h5>
  </div>
  <!-- catagory -->
  <?php   $sql = "SELECT * FROM catagory";
        $cresult = $db->selectDB($sql);
    ?>

</div>
<br> <br>

<div class="row">
  <div class="col-lg-12">
    <div class="read">


          <h4><?php echo $row['title']; ?> </h4>
          <h5><?php echo $row['author']?></h5>
          <h5><?php echo $row['date']?></h5> <hr>


      <?php echo $row['body']; ?>

    </div>
  </div>
</div>

<!-- comment -->

<div class="row">
  <div class="col-lg-12">
     <div class="read">
       <div class="">
       <form class="form-horizontal" action="readmore.php" method="POST">
           <div class="form-group">
             <label for="comment"><h3>Comment here</h3></label> <hr>
             <input name="comment" type="text" class="form-control input-lg" id="inputlg" style="">
             <input type="hidden" name="pid" value="<?php echo $pid; ?>"> <br>
             <input class="pull-right btn btn-sm submit"type="submit" name="submit" value="submit comment">
           </div>
       </form>

       <hr>
       <h5><b>Comments</b></h5> <hr>
       <?php
        $ccsql = "SELECT * FROM comment WHERE pid = '$pid'";
       $ccresult = $db->selectDB($ccsql);
        if ($ccresult) {
          while ($ccrow = $ccresult->fetch_assoc()) {
       ?>

       <!-- Left-aligned -->
    <div class="media alert alert-info">

    <div class="media-body">
     <h4 class="media-heading"><?php echo $ccrow['name']; ?></h4>
     <p><?php echo $ccrow['comment']; ?></p>
     <a href="readmore.php?cid=<?php echo $ccrow['cid'];?>&pid=<?php echo$pid;?>"class="btn btn-sm submit pull right">Reply</a>
      <!-- reply box -->
     <?php

       if(isset($_GET['cid'])){
         if ($ccrow['cid'] == $cid) {  ?>

          <div class="col-md-12"> <form class="form-horizontal no-italics" action="readmore.php" method="POST">
               <div class="form-group">

                 <input name="reply" type="text" class="form-control input-lg" id="inputlg" style="">

                 <input type="hidden" name="cid" value="<?php echo $cid; ?>">
                 <input type="hidden" name="pid" value="<?php echo $pid;?>">
                 <input class="pull-right btn btn-sm submit"type="submit" name="rsubmit" value="Submit reply" >
               </div>
           </form> </div>
         <?php }} ?>
         <!-- cid -->

      <!-- reply box -->

    </div>
    <div class="media-right">
     <img src="img_avatar1.png" class="media-object" style="width:60px">
    </div>
    </div>





    <!-- Right-aligned -->
    <div class="media">

      <div class="media-right">
       <img src="img_avatar1.png" class="media-object" style="width:60px">
      </div>


            <?php
            if(isset($_GET['cid'])) {

               if ($ccrow['cid'] == $cid) {
                 echo " <div class='media-body alert alert-warning class='no-italics'>";
                  $ssql = "SELECT * FROM reply WHERE cid = '$cid'";
                  $sresult = $db->selectDB($ssql);
                while ( $srow = $sresult->fetch_assoc()){
                  if ($srow['reply'] == true) {
                    echo"<h4 class='media-heading'>".$srow['name']."</h4>";
                    echo "<p>".$srow['reply']."</p>";

                    if ($srow['name']==$name) {
                      echo "<a href='readmore.php?reply=".$srow['rid']."' class='btn btn-xs btn-danger' style='margin-left=10px'>Delete</a>";
                    }
                    echo "<hr>";

                  }
                }
    echo "</div>";
  } }
             ?>
    </div>
    <!-- media object end -->
 <?php } ?>
          <?php } ?>

</div>

     </div>
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
