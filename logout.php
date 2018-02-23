<?php

session_start();
include 'inc/header.php';
if(isset($_SESSION['uid'])){
  $session = $_SESSION['uid'];
}

if ($session == "" ) {
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
           $url = "userprofile.php?nullsession=$nullsession";
       redirect($url);
}else{
    if (isset($_GET['logout'])) {
        $logout = $_GET['logout'];
        if ($logout == 1) {
          session_destroy();
          $nullsession = "<div class='error'><h3>You have Signed Out</h3></div>";
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
      }
}
