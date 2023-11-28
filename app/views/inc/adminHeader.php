<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/admin.css">
  <title><?php echo SITENAME; ?></title>
  <style>
    .thumb{
      align-self:center; 
       
      width:407px;
      display: block;
      align-items: center;
      /* height:60px; */
    }
    .myPub-thumb{
      align-self:center; 
       
      width: 241px;
      display: block;
      align-items: center;
      /* height:60px; */
    }

  </style>
</head>

<nav class="navbar-container nav-admin">
    <div class="left">
      <h2 class="logo">DASHBOARD</h2>
    </div>
    <div class="center">
        <ul>
            <li>
                <img src="<?php echo URLROOT; ?>/img/home-icon.png" >
                <a href="<?php echo URLROOT; ?>/admin">Home</a>
            </li>
            <li>
                <img src="<?php echo URLROOT; ?>/img/icons-users.png" >
                <a href="<?php echo URLROOT; ?>/admin/users">Users</a>
            </li>
            
        </ul>
    </div>
    <div class="right">
      <?php if(isset($_SESSION['admin_id'])  ) : ?>
          <a href="<?php echo URLROOT . "/users/profile/" . $_SESSION['admin_id']; ?>"><img src="<?php echo URLROOT . "/img/" . $_SESSION['admin_img']; ?>" alt="" srcset="" class="profile-img"></a>
          <a class="login-btn" href="<?php echo URLROOT; ?>/users/logout">Logout</a>
      <?php else : ?>
          <img src="<?php echo URLROOT . "/img/" . $_SESSION['user_img']; ?>" alt="" srcset="" class="profile-img">
          <a class="login-btn" href="<?php echo URLROOT; ?>/users/logout">Logout</a>
        <?php endif; ?>
      
      
    </div>
    
</nav>
<body>
  
