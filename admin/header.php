<?php
    session_start();
    //comprobacion de que la variable sesion no contiene el subindice usuario
    if(!isset($_SESSION['usuario'])) {
    //como no lo contiene redirige nuevamente a login.php
        echo '<script> window.location="login.php"; </script>';
    }
    //database.php que contiene todos las funciones utilizadas en mi sistema
    include("resources/includes/database.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Web Nutricion y Odontologia</title>

        <!-- Bootstrap CSS -->    
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- bootstrap theme -->
        <link href="css/bootstrap-theme.css" rel="stylesheet">
        <!--external css-->
        <!-- font icon -->
        <link href="css/elegant-icons-style.css" rel="stylesheet" />
        <link href="css/font-awesome.min.css" rel="stylesheet" />    
        <!-- full calendar css-->
        <link href="assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
        <link href="assets/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" />
        <!-- easy pie chart-->
        <link href="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
        <!-- owl carousel -->
        <link rel="..stylesheet" href="css/owl.carousel.css" type="text/css">
        <link href="css/jquery-jvectormap-1.2.2.css" rel="stylesheet">
        <!-- Custom styles -->
        <link rel="stylesheet" href="css/fullcalendar.css">
        <link href="css/widgets.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <link href="css/style-responsive.css" rel="stylesheet" />
        <link href="css/xcharts.min.css" rel=" stylesheet"> 
        <link href="css/jquery-ui-1.10.4.min.css" rel="stylesheet">
  </head>
    
    <a href="logout.php"></a>
   <header class="header dark-bg">
        <div class="toggle-nav">
            <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class=""></i></div>
        </div>

  
    <a href="index.php" class="logo">Sistema de Manejador de Contenido<span class="lite"></span></a>
        <!--vista de dropdown para cierre de sesion de usuario -->
        <div class="top-nav notification-row">                
            <!-- notificatoin dropdown start-->
            <ul class="nav pull-right top-menu">
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="profile-ava">
                        </span>
                        <span class="username"><?php echo $_SESSION['nombres'];?></span>
                        <b class="fa fa-user fa-fw"></b>
                    </a>
                <ul class="dropdown-menu extended logout">
                    <div class="log-arrow-up"></div>
                        <li class="eborder-top">
                            <li>
                                <a href="logout.php"><i class="icon_key_alt"></i> Log Out</a>
                            </li>
                        </li>
                    <!-- user login dropdown end -->
                </ul>
            <!-- notificatoin dropdown end-->
        </div>
    </header>     
<!--header end-->
