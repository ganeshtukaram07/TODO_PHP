<?php
 include("header.php");

			$res=mysqli_query($con,"DELETE FROM tasks WHERE  t_id=".$_GET['id']);
			if(mysqli_affected_rows($con)>0)
			{
				$_SESSION['msg']="Task Deleted successfully.";
				header("location:task_list.php");
				exit;
				
			}
			else
			{
				echo mysqli_error($con);
				$_SESSION['msg']="Sorry! Unable to Delete a Task. Try again";
				header("location:task_list.php");
				exit;
			}
 ?>

