<?php session_start() ;
include 'inc/headertwo.php'; ?>

<!-- php code -->

<?php
 if (isset($_SESSION['uid'])) {
   $session = $_SESSION['uid'];

 if ($session != "" ) {
   $noentry = "<div class='error'><h3>You are alreay logged In</h3></div>";
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
            $url = "index.php?noentry=$noentry";
        redirect($url);
 }
 }

 ?>

<!-- php for sign in -->
<?php
if (isset($_POST['ssubmit'])) {

     $sname = $_POST['sname'];
     $sname = mysqli_real_escape_string($db->link,$sname);
     $spass = $_POST['spass'];
     $spass = mysqli_real_escape_string($db->link,$spass);
     $semail = $_POST['semail'];
     $semail = mysqli_real_escape_string($db->link,$semail);

if($sname == "" || $spass == ""){
  $sempty = "<div class='error'><h5>Each field required</h5> </div>";

}else{

     $sql = "SELECT * FROM mainadmin
             WHERE name = '$sname' AND pass = '$spass' ";

   $result = $db->selectDB($sql);
   $row = $result->fetch_assoc();
   if ($row['name'] == $sname && $row['pass']== $spass ) {

     $_SESSION['uid'] = $row['id'] ;
     $smsg = "<div class='container success'><h3>Wellcome Admin</h3> </div>";
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
              $url = "mainadmin.php?smsg=$smsg";
          redirect($url);


   }
   else{
       $signinerr = "<div class='error'><h5>Username or Password invalid</h5> </div>";
   }
}
}

?>


<?php /*
if (isset($_POST['submit'])) {

     $name = $_POST['sname'];
     $name = mysqli_real_escape_string($db->link,$sname);
     $pass = $_POST['spass'];
     $pass = mysqli_real_escape_string($db->link,$spass);


if($name == "" || $pass == "" ){
  $empty = "<div class='error'><h5>Each field required</h5> </div>";

}else{

     $sql = "INSERT INTO mainadmin(name,pass)VALUES('$name','$pass')";

   $sresult = $db->selectDB($sql);


}
}
*/
?>



<div class="row">
  <div class="log">

    <!-- <div class="col-lg-12 sign">
           <form class="form-horizontal" action="adminsign.php" method="post">
             <div class="form-group">
               <div class="btn btn-lg btn-block submit"><span class="glyphicons glyphicons-log-in"></span>Sign In here</div>
             </div>
             <div class="form-group">
               <input class="form-control" type="text" name="sname" placeholder="Your Name">
             </div>

             <div class="form-group">
               <input class="form-control" type="Password" name="spass" placeholder="Your Password">
             </div>
             <div class="form-group">
               <input class="btn btn-md btn-block submit" type="submit" name="submit" value="Sign Up">
             </div>
             <?php
                if (isset($signinerr)) {
                  echo $signinerr;
                }
                if (isset($sempty)) {
                  echo $sempty;
                }


              ?>
           </form>
    </div> -->



    <div class="col-lg-12 sign">
           <form class="form-horizontal" action="adminsign.php" method="post">
             <div class="form-group">
               <div class="btn btn-lg btn-block submit"><span class="glyphicons glyphicons-log-in"></span>Sign In here</div>
             </div>
             <div class="form-group">
               <input class="form-control" type="text" name="sname" placeholder="Your Name">
             </div>

             <div class="form-group">
               <input class="form-control" type="Password" name="spass" placeholder="Your Password">
             </div>
             <div class="form-group">
               <input class="btn btn-md btn-block submit" type="submit" name="ssubmit" value="Sign In">
             </div>
             <?php
                if (isset($signinerr)) {
                  echo $signinerr;
                }
                if (isset($sempty)) {
                  echo $sempty;
                }


              ?>
           </form>
    </div>
  </div>
</div>
