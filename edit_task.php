<?php
 include("header.php");

			$res=mysqli_query($con,"select * from tasks where t_id=".$_GET['id']);
			$row = mysqli_fetch_assoc($res);
 ?>

	<div class="container">
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
			<h1>Edit Task</h1>
		
		<?php 
		//4th step
		if(isset($_POST['save']))
		{
			//4.1 collect the form data
			$tname=(isset($_POST['tname']))? $_POST['tname']:"";
			$tdescription=(isset($_POST['tdescription']))?$_POST['tdescription']:"";
			
			
			//4.3 insert data into users tables
			
			mysqli_query($con,"UPDATE tasks SET `t_name` = '$tname', `t_description` = '$tdescription' WHERE t_id =".$_GET['id']);
			
			
			
			if(mysqli_affected_rows($con)>0)
			{
				$_SESSION['msg']="Task Updated successfully.";
				header("location:task_list.php");
				exit;
			}
			else
			{
				echo mysqli_error($con);
				echo "<p>Sorry! Unable to Update Task. Try again</p>";
			}
			
		}
		?>
		
		
		<form method="POST" action="" onsubmit="return validate()">
			<table class="table" style="border:none">
				<tr>
					<td>Task Name</td>
					<td><input type="text" name="tname" id="tname" value="<?php echo $row['t_name'];?>" class="form-control"></td>
				</tr>
				<tr>
					<td>Task Description</td>
					<td><input type="text" name="tdescription" id="tdescription" value="<?php echo $row['t_description'];?>" class="form-control"></td>
				</tr>
					
				<tr>
					<td></td>
					<td><input type="submit" name="save" value="Save" class="btn btn-primary" ></td>
				</tr>
			</table>
		</form>
		
		<script>
		function validate()
		{
			
			if(document.getElementById("tname").value=="")
			{
				alert("Enter Task Name");
				return false;
			}
			if(document.getElementById("tdescription").value=="")
			{
				alert("Enter Task Description");
				return false;
			}
			
			
		}
		</script>
				
			
			</div>
			<div class="col-md-4"></div>
		</div>
	</div>

<?php include("footer.php");?>