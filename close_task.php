<?php
 include("header.php");
 
			//echo "UPDATE tasks SET `t_status` = '2' WHERE t_id ='".$_GET['id']."'";		exit;
			$res=mysqli_query($con,"UPDATE tasks SET `t_status` = '2' WHERE t_id ='".$_GET['id']."'");
			if(mysqli_affected_rows($con)>0)
			{
				$_SESSION['msg']="Task Colsed successfully.";
				header("location:index.php");
				exit;
				
			}
			else
			{
				echo mysqli_error($con);
				$_SESSION['msg']="Sorry! Unable to Close a Task. Try again";
				header("location:index.php");
				exit;
			}
 ?>

