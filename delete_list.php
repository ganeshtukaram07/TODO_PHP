<?php
 include("header.php");

			$res=mysqli_query($con,"DELETE FROM lists  WHERE  l_id=".$_GET['id']);
			if(mysqli_affected_rows($con)>0)
			{
				$_SESSION['msg']="List Deleted successfully.";
				header("location:task_list.php");
				exit;
				
			}
			else
			{
				echo mysqli_error($con);
				$_SESSION['msg']="Sorry! Unable to Delete a list. Try again";
				header("location:task_list.php");
				exit;
			}
 ?>

