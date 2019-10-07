<?php
 include("header.php");
			//echo $_GET['id'];
			
			$res=mysqli_query($con,"select * from lists where l_id=".$_GET['id']);
			$row = mysqli_fetch_assoc($res);
 ?>

	<div class="container">
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
			<h1>Edit List</h1>
		
		<?php 
		//4th step
		if(isset($_POST['save']))
		{
			//4.1 collect the form data
			$lname=(isset($_POST['lname']))? $_POST['lname']:"";
			$ldescription=(isset($_POST['ldescription']))?$_POST['ldescription']:"";
			
			
			//4.3 insert data into users tables
			
			mysqli_query($con,"UPDATE lists SET `l_name` = '$lname', `l_description` = '$ldescription' WHERE l_id =".$_GET['id']);
			
			
			
			if(mysqli_affected_rows($con)>0)
			{
				$_SESSION['msg']="List Updated successfully.";
				header("location:task_list.php");
				exit;
			}
			else
			{
				echo mysqli_error($con);
				echo "<p>Sorry! Unable to update list. Try again</p>";
			}
			
		}
		?>
		
		
		<form method="POST" action="" onsubmit="return validate()">
			<table class="table" style="border:none">
				<tr>
					<td>List Name</td>
					<td><input type="text" name="lname" id="lname" value="<?php echo $row['l_name'];?>" class="form-control"></td>
				</tr>
				<tr>
					<td>List Description</td>
					<td><input type="text" name="ldescription" id="ldescription" value="<?php echo $row['l_description'];?>" class="form-control"></td>
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