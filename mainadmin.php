<!-- include files -->

<?php session_start(); ?>

<?php include 'inc/headertwo.php'; ?>

<?php
  if (isset($_GET['smsg'])) {
  $smsg =  $_GET['smsg'];
  echo $smsg;
  }
 ?>


<?php  $adsql = "SELECT * FROM mainadmin";
$adresult = $db->selectDB($adsql);
$adrow = $adresult->fetch_assoc();
$admin = $adrow['id'];


  $session = $_SESSION['uid'];
  if ($session != $admin) {
    $notadmin = "<div class='container'><div class='error'><h3>You are not an admin</h3> </div></div>";
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
             $url = "index.php?notadmin=$notadmin";
         redirect($url);
  }

   $sql = "SELECT * FROM post";
   $result = $db->selectDB($sql);
      $total_rows = mysqli_num_rows($result);
   ?>

<div class="row">
   <div class="col-lg-2">
     <div id="sidebar-wrapper">
       <div id="sidebar-nav">
         <ul>
           <li><a href="index.php"><i class="glyphicon glyphicon-dashboard"></i> Dashboar</a></li>
           <li data-toggle="collapse" data-target="#demo"><a href="#"><i class="glyphicon glyphicon-plus"></i> Add New Item <span class="caret"></span></a>
             <ul id="demo" class="collapse">
               <li id="inner-li"><a href="newpost.php"><i class="glyphicon glyphicon-pencil"></i> Add Post</a></li>
               <li id="inner-li"><a href="addcatagory.php"><i class="glyphicon glyphicon-th-list"></i> Add Category</a></li>
             </ul>
           </li>
           <li><a href="posts.php"><i class="glyphicon glyphicon-book"></i> Posts</a></li>
           <li><a href="seecatagory.php"><i class="glyphicon glyphicon-book"></i> catagories</a></li>

           <li><a href="editusers.php"><i class="glyphicon glyphicon-user"></i> Users</a></li>
         </ul>
       </div>
     </div> <!-- sidebar ends -->

  </div>
         <div class="col-lg-10">
           <div class="row">
                  <div class="col-md-4">
                    <div class="panel panel-info">
                      <div class="panel-heading">
                        <div class="row">
                          <div class="col-xs-8">
                            <h1><i class="glyphicon glyphicon-signal"></i></h1>
                          </div>
                          <div class="col-xs-4">
                          <?php echo "  <h1>".$total_rows."</h1>"; ?>
                          </div>
                        </div>
                      </div> <!-- panel header ends -->
                      <div class="panel-footer">
                        <div class="row">
                          <div class="col-xs-9">
                            <a href="viewpost.php">View Posts</a>
                          </div>
                          <div class="col-xs-3">
                            <span class="glyphicon glyphicon-chevron-right pull-right"></span>
                          </div>
                        </div>
                      </div> <!--panel footer ends-->
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="panel panel-success">
                      <div class="panel-heading">
                        <div class="row">
                          <div class="col-xs-8">
                            <h1><i class="glyphicon glyphicon-th-list"></i></h1>
                          </div>
                          <div class="col-xs-4">
                            <?php $sql = "SELECT * FROM catagory";
                            $result = $db->selectDB($sql);
                            $total_rows = mysqli_num_rows($result);
                             ?>
                            <h1><?php echo $total_rows; ?></h1>
                          </div>
                        </div>
                      </div> <!-- panel header ends -->
                      <div class="panel-footer">
                        <div class="row">
                          <div class="col-xs-9">
                            <a href="seecatagory.php">View Categories</a>
                          </div>
                          <div class="col-xs-3">
                            <span class="glyphicon glyphicon-chevron-right pull-right"></span>
                          </div>
                        </div>
                      </div> <!--panel footer ends-->
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="panel panel-danger">
                      <div class="panel-heading">
                        <div class="row">
                          <div class="col-xs-8">
                            <h1><i class="glyphicon glyphicon-comment"></i></h1>
                          </div>
                          <div class="col-xs-4">
                            <h1>19</h1>
                          </div>
                        </div>
                      </div> <!-- panel header ends -->
                      <div class="panel-footer">
                        <div class="row">
                          <div class="col-xs-9">
                            <a href="#">View Comments</a>
                          </div>
                          <div class="col-xs-3">
                            <span class="glyphicon glyphicon-chevron-right pull-right"></span>
                          </div>
                        </div>
                      </div> <!--panel footer ends-->
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="container">
                    <h4>Recent posts by all</h4> <hr>
                    <?php
                    $sql = "SELECT * FROM post
                            ORDER BY id  DESC";
                    $result = $db->selectDB($sql);

                     if ($result) {
                    while ($row = $result->fetch_assoc()) {
                     ?>

                     <div class="col-lg-4 post">
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
                  <?php } ?>

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
