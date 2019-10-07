<?php include("header.php");?>
	<div class="container">
		<div class="row">
			<div class="col-md-4">
			<?php echo $_SESSION['msg'];if(!empty($_SESSION['msg']))unset($_SESSION['msg']);?></div>
			<div class="col-md-4">
				
				<h1 align="center">Login Here</h1>
		<?php 
		//4th step
		if(isset($_POST['login']))
		{
			$email=(isset($_POST['email']))? $_POST['email']: "";
			$pwd=(isset($_POST['pwd']))?$_POST['pwd']:"";
			
			$email=trim(strip_tags(addslashes($email)));
			$pwd=trim(strip_tags(addslashes($pwd)));
			
			//check the credentials
			$res=mysqli_query($con,"select *from users where u_email='$email'");
			
			if(mysqli_num_rows($res)==1)
			{
				$row=mysqli_fetch_assoc($res);
				if(password_verify($pwd,$row['u_password']))
				{
					if($row['u_status']=="1")
					{
						$_SESSION['msg']="Welcome To Application.";
						$_SESSION['logintrue']=$row['token'];
						$_SESSION['uid']=$row['u_id'];
						header("Location:task_list.php");
						exit;
					}
					else
					{
							$_SESSION['msg']="your  activate is Inactive.";
						
					}
				}
				else
				{
					echo "<p class='alert alert-danger'>Wrong Password entered for email</p>";
				}
			}
			else
			{
				echo "<p class='alert alert-danger'>Wrong email entered</p>";
			}
			
			
		}
		?>
		
		
		<form method="POST" action="" onsubmit="return validateLogin()">
			<table class="table">
				<tr>
					<td>Email</td>
					<td><input type="text" name="email" id="email" class="form-control"></td>
				</tr>
				<tr>
					<td>Password</td>
					<td><input type="password" name="pwd" id="pwd" class="form-control"></td>
				</tr>
				<tr>
					<td></td>
					<td align="center"><input type="submit" name="login" value="Login" class="btn btn btn-primary">
					<!-- <a href="forgot.php">Forgot Password?</a> -->
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
				
				if(document.getElementById("pwd").value=="")
				{
					alert("Enter Password");
					return false;
				}
			}                                                         
		</script>
			
			</div>
			<div class="col-md-4"></div>
		</div>
	</div>
	<style>

	input[type="submit"]:hover{
		transform:scale(1.2);
		transition:transform 0.6s ease-in;
	

	}

</style>
<?php include("footer.php");?>