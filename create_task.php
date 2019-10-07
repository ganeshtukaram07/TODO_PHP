<?php include("header.php");?>

	<div class="container">
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
			<h1>Create Task</h1>
		
		<?php 
		//4th step
		if(isset($_POST['create']))
		{
			//4.1 collect the form data
			$tname=(isset($_POST['tname']))? $_POST['tname']:"";
			$tdescription=(isset($_POST['tdescription']))?$_POST['tdescription']:"";
			
			//4.3 insert data into users tables
			mysqli_query($con,"insert into tasks(t_name,t_description,u_id,t_status) values('$tname','$tdescription','".$_SESSION['uid']."','1')");
			
			
			
			if(mysqli_affected_rows($con)>0)
			{
				$_SESSION['msg']="Task created successfully.";
				header("location:task_list.php");
				exit;
				
			}
			else
			{
				echo mysqli_error($con);
				$_SESSION['msg']="Sorry! Unable to Insert a Task. Try again";
				
			}
			
		}
		?>
		
		
		<form name="task" method="POST" action="" onsubmit="return validate()" enctype="multypart/form-data">
			<table class="table" style="border:none">
				<tr>
					<td>Task Name</td>
					<td><input type="text" name="tname" id="tname" class="form-control"></td>
				</tr>
				<tr>
					<td>Task Description</td>
					<td><input type="text" name="tdescription" id="tdescription" class="form-control"></td>
				</tr>
					
				<tr>
					<td></td>
					<td><input type="submit" name="create" value="Create" class="btn btn-primary" ></td>
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