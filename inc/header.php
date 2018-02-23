<?php include 'lib/database.php'; ?>
<?php include 'helpers/phpformats.php'; ?>
<?php $db = new Database(); ?>
<?php $nf = new Format(); ?>



<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>treehouse</title>
    <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/style5.css">
  </head>
  <body>

    <nav class="navbar navbar-default navbar-fixed-top">
 <div class="container-fluid">
   <div class="container">
     <button type="button" name="button" class="navbar-toggle pull-left" data-toggle="collapse" data-target="#example">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>

     </button>
   <div class="navbar-header navbar-brand">
     <a class="" href="index.php">WebSiteName</a>
   </div>


<div class="collapse navbar-collapse" id="example">
   <ul class="nav navbar-nav">

     <li><a href="index.php">Home</a></li>
     <li><a href="#">Page 1</a></li>
     <li><a href="#">Page 2</a></li>
     <li><a href="#">Page 3</a></li>
   </ul>
   <form class="navbar-form navbar-right" action="search.php" method="post">
      <div class="form-group">
        <input type="text" name="search" value="search" class="form-control">

          <button class="btn btn-default" type="submit" name="submit">
            <span class="glyphicon glyphicon-search"></span>
          </button>

      </div>
   </form>
 </div>
 </div>
 </div>
</nav>
