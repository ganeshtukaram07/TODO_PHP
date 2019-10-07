<?php 
error_reporting("NULL");
session_start();
include("connect.php");
	
		
?>
<!DOCTYPE html>
<html lang="en">

<head>
<style>

.container .navbar-header{
    position:absolute;
    background-color:rgb(0, 0, 0);
  
  }

  /* .container{
   
    background-image: linear-gradient(to right , rgb(44, 44, 44), rgb(190, 190, 187))

  } */


  }

  </style>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Project - My Company</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

  <!-- Custom styles for this template -->
  
  <link href="css/style.css" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<body>

  <!-- Navigation -->
 <nav class="navbar navbar-inverse">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">&nbsp;&nbsp;Deepthi Project</a>
    </div>
    <ul class="nav navbar-nav">
      
      
    </ul>
	
    <ul class="nav navbar-nav navbar-right">
	<?php

	if(isset($_SESSION['logintrue']))
	{
		$taskres=mysqli_query($con,"select count(*) as noofunread from assign where du_id='".$_SESSION['uid']."' AND  a_status='0'");
		$taskrow = mysqli_fetch_assoc($taskres);
	?>
	<li class=""><a href="index.php"><span class="glyphicon glyphicon-home"></span> Received Tasks<span class="badge"><?php echo $taskrow['noofunread'];?></span></a></li>
      <li><a href="task_list.php"> <span class="glyphicon glyphicon-plus"></span> Task List</a></li>
	  <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Log Out</a></li>
      
	<?php
	}
	else
	{
		?>
	<li><a href="register.php"><span class="glyphicon glyphicon-user"></span> Register</a></li>
      <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>	
		<?php 
	}
	?>
	
  </div>
</nav>
