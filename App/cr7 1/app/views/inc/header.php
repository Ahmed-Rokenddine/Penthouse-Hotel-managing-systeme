 <!doctype html>
<html lang="en">
  <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">
  <title><?php echo SITENAME; ?></title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
      .navbar-nav > li > a:hover {
          color: #000;
          background-color:#eeb609;
     }
     body{
      background-color: rgba(0, 0, 0, .1);
     }
     #id2 {
  display: none;
}


    </style>
  </head>
  
  <body onload="myFunction()">



      
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-5">
        

        <div class="container-fluid container d-flex align-items-center justify-content-between" style="gap: 30%;">
          
          <a href="index.html" class="navbar-brand"  max-width="150%"><img src="assets/img/logo.png" max-width="150%" style="height: 60px;" alt="" class="img-fluid"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-between" id="navbarText">
            <ul class="navbar-nav   mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URLROOT;?>">Home</a>
                </li>
                <li class="nav-item">
                    <a  class="nav-link" href="<?php echo URLROOT;?>pages/about">Reservation</a>
                </li>
                <?php if(isset($_SESSION['user_id'])) : ?>
                  <li class="nav-item">
                  <a class="nav-link" href="<?php echo URLROOT; ?>/rooms/index">Dashboard</a>
                  </li>
                <?php else : ?>
                  <li class="nav-item">
                   <a class="nav-link  disabled">Dashboard</a>
                  </li>
                <?php endif; ?>
              </ul>
              <div class="d-flex align-items-center ">
              <ul class="navbar-nav ml-auto">
          <?php if(isset($_SESSION['user_id'])) : ?>
          <li class="nav-item">
              <a class="nav-link" href="<?php echo URLROOT; ?>/users/logout">Logout</a>
            </li>
          <?php else : ?>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo URLROOT; ?>/users/register">Register</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo URLROOT; ?>/users/login">Login</a>
            </li>
          <?php endif; ?>
        </ul>
                
              </div>
          </div>
        
         </div>
      </nav>
      <section class="container">