<?php include("header.php");?>

	<div class="container">
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
			<h1>Register Here</h1>
		
		<?php 
		//4th step
		if(isset($_POST['register']))
		{
			//4.1 collect the form data
			$fname=$_POST['fname'];
			$lname=$_POST['lname'];
			$email=$_POST['email'];
			$pwd=$_POST['pass'];			
			$mobile=$_POST['mobile'];
			$ip=$_SERVER['REMOTE_ADDR'];
			$token=md5(str_shuffle($fname.$email.$pwd.time()));			
			$pwd=password_hash($pwd,PASSWORD_DEFAULT);
			
			//4.3 insert data into users tables			
mysqli_query($con,"insert into users(u_fname,u_lname,u_email,u_password,u_mobile,ip,token) values('$fname','$lname','$email','$pwd','$mobile','$ip','$token')");
			
			
			
			if(mysqli_affected_rows($con)>0)
			{
					$_SESSION['msg']="Account created successfully.";
				header("location:login.php");
				
			}
			else
			{
				echo mysqli_error($con);
				echo "<p>Sorry! Unable to Insert a record. Try again</p>";
			}
			
		}
		?>
		
		
		<form method="POST" action="" onsubmit="return validate()">
			<table class="table" style="border:none">
				<tr>
					<td>First Name</td>
					<td><input type="text" name="fname" id="fname" class="form-control"></td>
				</tr>
				<tr>
					<td>Last Name</td>
					<td><input type="text" name="lname" id="lname" class="form-control"></td>
				</tr>
				<tr>
					<td>Email</td>
					<td><input type="text" name="email" id="email" class="form-control"></td>
				</tr>
				<tr>
					<td>Password</td>
					<td><input type="password" name="pass" id="pass" class="form-control"></td>
				</tr>
				<tr>
					<td>Mobile</td>
					<td><input type="text" name="mobile" id="mobile" class="form-control"></td>
				</tr>
				
					
				<tr>
					<td></td>
					<td><input type="submit" name="register" value="Register" class="btn btn-primary" ></td>
				</tr>
			</table>
		</form>
		
		<script>
		function validate()
		{
			
			if(document.getElementById("fname").value=="")
			{
				alert("Enter First Name");
				return false;
			}
			if(document.getElementById("lname").value=="")
			{
				alert("Enter Last Name");
				return false;
			}
			//Email
			if(document.getElementById("email").value=="")
			{
				alert("Enter Email");
				return false;
			}
			else
			{
				var mail=document.getElementById("email").value;
				filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
				
				
				if(!filter.test(mail))
				{
					alert("Enter Valid Email");
					return false;
				}
			}
			//Password validation
			if(document.getElementById("pass").value=="")
			{
				alert("Enter Password");
				return false;
			}
			if(document.getElementById("cpass").value=="")
			{
				alert("Enter Confirm Password");
				return false;
			}
			
			if(document.getElementById("pass").value!=document.getElementById("cpass").value)
			{
				alert("Passwords does not matched");
				return false;
			}
			//Mobile Validation
			if(document.getElementById("mobile").value=="")
			{
				alert("Enter Mobile Number");
				return false;
			}
			else
			{
				var mob=document.getElementById("mobile").value;
				var pat=/^[0]?[789]\d{9}$/;
				if(!pat.test(mob))
				{
					alert("Enter valid 10 digit mobile number");
					return false;
				}
			}
			
		}
		</script>
				
			
			</div>
			<div class="col-md-4"></div>
		</div>
	</div>

<?php include("footer.php");?>
<style>
input[type="submit"]:hover{
		transform:scale(1.2);
		transition:transform 0.6s ease-in;
	}
</style>