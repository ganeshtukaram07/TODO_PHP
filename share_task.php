<?php
include("header.php");

$res=mysqli_query($con,"select u_email from users");
?>
	<div class="container">
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				
				<h1>Share Task</h1>
		<?php 
		//4th step
		if(isset($_POST['sahre']))
		{
			//4.1 collect the form data
						
			
			$userres=mysqli_query($con,"select * from users WHERE u_email LIKE '".$_POST['email']."'");
			$userrow = mysqli_fetch_assoc($userres);
			
			//echo $userrow['u_id'];exit;
			
			$tname=(isset($_POST['tname']))? $_POST['email']:"";
			$tdescription=(isset($_POST['tdescription']))?$_POST['tdescription']:"";
			
			
			//echo "insert into assign(su_id,du_id,t_id) values('".$_SESSION['uid']."','".$userrow['u_id']."','".$_GET['id']."')";
			//4.3 insert data into users tables
			mysqli_query($con,"insert into assign(su_id,du_id,t_id) values('".$_SESSION['uid']."','".$userrow['u_id']."','".$_GET['id']."')");
						
			if(mysqli_affected_rows($con)>0)
			{
				$_SESSION['msg']="Task shared successfully.";
				header("location:task_list.php");
				exit;
				
			}
			else
			{
				echo mysqli_error($con);
				$_SESSION['msg']="Sorry! Unable to shared a Task. Try again";
				
			}
			
		}
		?>
		
		
		<form method="POST" action="" onsubmit="return validateLogin()">
			<table class="table">
				<tr>
					<td>User Name</td>
					<td>

<input type="text" name="email" id="email" placeholder="search by User Email" class="form-control" list="email" autocomplete=off>
<datalist id="email">
<?php
while($row = mysqli_fetch_assoc($res))
	{
?>
<option value="<?php echo $row['u_email'];?>"><?php echo $row['u_email'];?></option>
<?php
			}
			?>
</datalist>
</td>
				</tr>
				
				<tr>
					<td></td>
					<td><input type="submit" name="sahre" value="Share" class="btn btn btn-primary">
					
					</td>
				</tr>
			</table>
		</form>
		<script>
			function validateLogin()
			{
				if(document.getElementById("email").value=="")
				{
					alert("Enter Email");
					return false;
				}
				
			}                                                         
		</script>
			
			</div>
			<div class="col-md-4"></div>
		</div>
	</div>
<?php include("footer.php");?>