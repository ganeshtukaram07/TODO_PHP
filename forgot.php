<?php 
include("header.php");
?>
<div class="container">
	<div class="row">
		<div class="col-md-6"></div>
			<div class="col-md-6">
			<h1>Forgot Password</h1>
		
		<?php 
		if(isset($_POST['submit']))
		{
			$email=(isset($_POST['email']))?$_POST['email']:"";
			
			$email=addslashes(strip_tags(trim($email)));
			
			$res=mysqli_query($con,"select email,token,username from users where email='$email'");
			if(mysqli_num_rows($res)==1)
			{
				$row=mysqli_fetch_assoc($res);
				$token=$row['token'];
				$to=$email;
				$subject="Reset Password Link";
				$message="Hi ".$row['username'].",<br><br>Please click the below link to reeset your password<br><br><a href='http://localhost:100/9am/reset_pass.php?key=$token' target='_blank'>Reset Password</a><br><br>Team<br>Thanks";
				
				
				$mheaders="Content-Type:text/html";
				
				if(mail($to,$subject,$message,$mheaders))
				{
					echo "<p>Reset Password link sent to your email, please check</p>";
				}
				else
				{
					echo "Sorry! Unable to send reset password link, contact admin";
				}
			}
			else
			{
				echo "<p>Sorry! Email does not exists</p>";
			}
			
		}
		?>
		
		<form method="POST" action="" onsubmit="return validate()">
			Enter Your Email:<br>
			<input class="form-control" type="Text" name="email" id="email"><br>
			<input class='btn btn-primary' type="submit" name="submit" value="Submit">
		</form>
		<script>
			function validate()
			{
				if(document.getElementById("email").value=="")
				{
					alert("Please Enter Email");
					return false;
				}
			}
		</script>
		</div>
	</div>
</div>		
<?php include("footer.php");?>