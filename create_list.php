<?php 
include("header.php");
?>

	<div class="container">
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
			<h1>Create List</h1>
		
		<?php 
		//4th step
		if(isset($_POST['create']))
		{
			//4.1 collect the form data
			$lname=(isset($_POST['lname']))? $_POST['lname']:"";
			$ldescription=(isset($_POST['ldescription']))?$_POST['ldescription']:"";
			
			//4.3 insert data into users tables
			mysqli_query($con,"insert into lists (l_name,l_description,t_id,l_status) values('$lname','$ldescription','".$_GET['id']."','1')");
			
			
			
			if(mysqli_affected_rows($con)>0)
			{
				$_SESSION['msg']="List created successfully.";
				header("location:task_list.php");
				exit;
				
			}
			else
			{
				echo mysqli_error($con);
				$_SESSION['msg']="Sorry! Unable to Insert a List. Try again";
				
			}
			
		}
		?>
		
		
		<form name="task" method="POST" action="" onsubmit="return validate()" enctype="multypart/form-data">
			<table class="table" style="border:none">
				<tr>
					<td>List Name</td>
					<td><input type="text" name="lname" id="lname" class="form-control"></td>
				</tr>
				<tr>
					<td>List Description</td>
					<td><input type="text" name="ldescription" id="ldescription" class="form-control"></td>
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
			
			if(document.getElementById("lname").value=="")
			{
				alert("Enter List Name");
				return false;
			}
			if(document.getElementById("ldescription").value=="")
			{
				alert("Enter List Description");
				return false;
			}
			
			
		}
		</script>
				
			
			</div>
			<div class="col-md-4"></div>
		</div>
	</div>

<?php include("footer.php");?>