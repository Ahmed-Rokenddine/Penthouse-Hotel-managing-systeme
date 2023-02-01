 <!doctype html>
<html lang="en">
  <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
  <title><?php echo SITENAME; ?></title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet'>
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  <link href="https://fonts.cdnfonts.com/css/qirkus" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="<?php echo URLROOT; ?>public/css/style.css">   
  <style>
    

  </style>
  </head>
  
  <body onload="putvalue();" style=" --bs-gutter-x: 0;" >



      
      <nav class="navbar navbar-expand-lg fixed-top transparent mb-5">
        

        <div class="container-fluid container d-flex align-items-center justify-content-between" style="gap: 22%;">
          
          <a href="index.html" class="navbar-brand"  max-width="150%"><img src="<?php echo URLROOT;?>/public/img/logo.png" max-width="150%" style="height: 60px;" alt="" class="img-fluid"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-between" id="navbarText">
            <ul class="navbar-nav   mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link f text-center" href="<?php echo URLROOT;?>">HOME</a>
                </li>
                <li class="nav-item">
                    <a  class="nav-link f text-center" href="<?php echo URLROOT;?>pages/about">ABOUT</a>
                </li>
                <?php if(isset($_SESSION['admin_id'])) : ?>
                  <li class="nav-item">
                  <a class="nav-link f text-center" href="<?php echo URLROOT; ?>/rooms/index">DASHBOARD</a>
                  </li>
                 
                  <?php elseif(isset($_SESSION['user_id'])) : ?>
                  <li class="nav-item">
                  <a class="nav-link f text-center" href="<?php echo URLROOT; ?>/reservations/index">RESERVATIONS</a>
                  
                  </li>
                  <li class="nav-item">
                  <a class="nav-link f text-center" href="<?php echo URLROOT; ?>/reservations/search">BOOKINGS</a>
                  </li>
                <?php else : ?>
                  <li class="nav-item">
                   <a class="nav-link f disabled text-center">DASHBOARD</a>
                  </li>
                  <li class="nav-item">
                   <a class="nav-link f disabled text-center">RESERVATIONS</a>
                  </li>
                <?php endif; ?>
              </ul>
              <div class="d-flex align-items-center justify-content-center ">
              <ul class="navbar-nav ">
          <?php if( isset($_SESSION['admin_id']) ) : ?>
          <li class="nav-item d-flex align-items-center">
          <div class="text-light align-items-center f"> ADMIN</div> <img src="<?php echo URLROOT;?>/public/img/ADMIN.png" width="40px" alt=""><a class="nav-link ml-3 f" href="<?php echo URLROOT; ?>/users/logout">Logout</a> 
              
          </li>
          <?php elseif(isset($_SESSION['user_id'])  ) : ?>
          <li class="nav-item d-flex align-items-center">
          <div class="text-light align-items-center mr-1 f"><?php echo $_SESSION['user_name'] ?> </div> <img src="<?php echo URLROOT;?>/public/img/User.png" width="40px" alt=""><a class="nav-link ml-3 f" href="<?php echo URLROOT; ?>/users/logout">Logout</a> 
              
          </li>
          <?php else : ?>
            <li class="nav-item">
              <a class="nav-link text-dark btn btn-light px-3 me-2" href="<?php echo URLROOT; ?>/users/register">Register</a>
            </li>
            <li class="nav-item ml-2 mt-1 mt-lg-0">
              <a class="nav-link text-white btn btn btn-outline-light me-3" href="<?php echo URLROOT; ?>/users/login">Login</a>
            </li>
          <?php endif; ?>
        </ul>
        
                
              </div>
          </div>
        
         </div>
      </nav>
      <div class="bg-white p-0 " style="overflow-x:hidden ">
      <section class="extra-margin align-items-center justify-content-center container bg-white  p-0" style="">
      