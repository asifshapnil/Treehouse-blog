<?php session_start() ;
include 'inc/header.php'; ?>

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
            $url = "userprofile.php?noentry=$noentry";
        redirect($url);
 }
 }

 ?>

<?php

  if (isset($_POST['submit'])) {


    $name = $_POST['name'];
    $name = mysqli_real_escape_string($db->link,$name);

    $email  = $_POST['email'];
    $email = mysqli_real_escape_string($db->link,$email);

    $password = $_POST['pass'];
    $password = mysqli_real_escape_string($db->link,$password);

    $c_password = $_POST['cpass'];
    $c_password = mysqli_real_escape_string($db->link,$c_password);

    if($name == "" || $email == "" ||  $password == "" || $c_password == ""){

      $empty = "<div class='error'><h5>Each field required</h5> </div>";

    }else{

    if ($password != $c_password ) {
        $passErr = "<div class='error'><h5>Password doesn't match</h5> </div>";

    } else {

      $sql = "INSERT INTO user(uname,email,password) VALUES('$name','$email','$password')";
      $result = $db->selectDB($sql);
      if ($result) {

        $message = "<div class='success'><h5>You have signed up successfully</h5> </div>";
      }
    }
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

if($sname == "" || $spass == "" || $semail == ""){
  $sempty = "<div class='error'><h5>Each field required</h5> </div>";

}else{

     $sql = "SELECT * FROM user
             WHERE uname = '$sname' AND password = '$spass' AND email = '$semail' ";

   $result = $db->selectDB($sql);
   $row = $result->fetch_assoc();
   if ($row['uname'] == $sname && $row['password']== $spass && $row['email'] == $semail) {

     $_SESSION['uid'] = $row['uid'] ;
     $smsg = "<div class='container success'><h3>You have logged in successfully</h3> </div>";
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
              $url = "userprofile.php?smsg=$smsg";
          redirect($url);


   }
   else{
       $signinerr = "<div class='error'><h5>Username or Password invalid</h5> </div>";
   }
}
}

?>






<div class="row">
  <div class="log">
    <div class="col-lg-6 sign">
        <form class="form-horizontal" action="sign.php" method="post">
          <div class="form-group">
            <div class="btn btn-lg btn-block submit"><span class="glyphicons glyphicons-user-add"></span>Sign Up here</div>
          </div>
           <div class="form-group">
             <input class="form-control" type="text" name="name" placeholder="First Name">
           </div>
           <div class="form-group">
             <input class="form-control" type="text" name="lname" placeholder="Last Name">
           </div>
           <div class="form-group">
             <input class="form-control" type="text" name="email" placeholder="Email Address">
           </div>
           <div class="form-group">
             <input class="form-control" type="password" name="pass" placeholder="Password">
           </div>
           <div class="form-group">
             <input class="form-control" type="password" name="cpass" placeholder="Confirm Password">
           </div>

           <div class="form-group">
             <input class="btn btn-md btn-block submit" type="submit" name="submit" value="Sign UP">
           </div>
           <?php
               if (isset($message)) {
                 echo $message;
               }
               if (isset($empty)) {
                 echo $empty;
               }
               if (isset($passErr)) {
                   echo $passErr;
               }
           ?>
        </form>
    </div>


    <div class="col-lg-6 sign">
           <form class="form-horizontal" action="sign.php" method="post">
             <div class="form-group">
               <div class="btn btn-lg btn-block submit"><span class="glyphicons glyphicons-log-in"></span>Sign In here</div>
             </div>
             <div class="form-group">
               <input class="form-control" type="text" name="sname" placeholder="Your Name">
             </div>
             <div class="form-group">
               <input class="form-control" type="email" name="semail" placeholder="Your Email address">
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
