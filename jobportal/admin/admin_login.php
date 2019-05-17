<?php
session_start();
?>
<?php
$emailErr="";
$passwordErr="";
if($_SERVER["REQUEST_METHOD"]=="POST")
{
	//email
	if(empty($_POST["email"]))
	{
		$emailErr="email is required";
	}
	else
	{
		$email=$_POST["email"];
		if(!filter_var($email,FILTER_VALIDATE_EMAIL))
		{
			$emailErr="invalid email format";
		}
	}
	if(empty($_POST["password"]))
	{
		$passwordErr="password is required";
	}
include_once('../db.php');
$email=$_POST["email"];
$password=$_POST["password"];
$sql="SELECT * FROM admin_secure WHERE admin_email='$email' AND admin_password='$password'";
	$result=mysqli_query($conn,$sql);
		if($result->num_rows==1)
		{
			$frow2=$result->fetch_assoc();
			$addid=$frow2["id"];
			$_SESSION['useremail']=$email;
			$_SESSION['usertype']="admin";
			$_SESSION['adminid']=$addid;
			
			echo 'Logged in Successfully';?>
			<script>
window.location.href = 'admin_dashboard.php'; </script>
		<?php }
		else{
			echo "<script> alert('Wrong Username OR Password'); </script>";
		}
		
$conn->close();
}	
?>

<html>
<head>
<title> Login Form </title>
<link href="/jobportal/css/style.css" rel="stylesheet">
</head>
<body class="loginpage">
<div class="login-box">
<img src="/jobportal/image/avatar.png" class="avatar">
<h1>Login Here</h1>
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" name="submit">
<p>Username</p>
<input type="text" name="email" placeholder="Enter username" required/>
<p>Password</p>
<input type="password" name="password" placeholder="Enter Password" required/>
<input type="submit" name="submit" value="Login">
<p align="center">OR</p>
<div id="back">
<input onclick="window.location.href='index.php'" type="submit" value="Go to Home Page"/>
</div>
</form>
</div>
</body>
</html>