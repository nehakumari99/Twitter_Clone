<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      
    <link rel="stylesheet" href="http://localhost/twitter/styles.css">
  </head>
  <body>
      
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="http://localhost/twitter/index.php">Twitter</a>
  <ul class="nav navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="?page=timeline">Your timeline</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="?page=yourtweets">Your tweets</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="?page=publicprofiles">Public Profiles</a>
    </li>
  </ul>
  <div class="form-inline pull-xs-right">
      
      <!-- if getting session id, it means we log in/finish signing up, then change the button to be Logout-->
      <?php
       if (isset($_SESSION['id']))
        { ?>
      
        <a class="btn btn-success-outline" href="?function=logout">Logout</a>
      
      <?php } else { ?>
      
        <button class="btn btn-success-outline" data-toggle="modal" data-target="#myModal">Login/Signup</button>
      
      <?php } ?>
  </div>
</nav>