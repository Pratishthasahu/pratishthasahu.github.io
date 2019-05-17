<html>
<?php
$emailErr="";
$numberErr="";
if($_SERVER["REQUEST_METHOD"]=="POST")
{
	
	 
 //E-mail
if(empty($_POST["email"]))
{
	$emailErr="E-mail is required";
}	
else
{
	$email=$_POST["email"];
//chek if email address is well-formed
if(!filter_var($email,FILTER_VALIDATE_EMAIL))
{
	$emailErr="Invalid email format<br>";
}
}

//Number
if(empty($_POST["phone"]))
 {
	 $numberErr="Number is required";
 }
 else
 {
 $number=$_POST["phone"];
 //check if name only contains letters and whitespace
 if(!preg_match("/^[1-9][0-9]*$/",$number))
 {
	 $numberErr="only 0-9 numbers are allowed<br>";
 }
 }

include_once("../db.php");
$Fname=$_POST["Fname"];
$Lname=$_POST["Lname"];
$phone=$_POST["phone"];
$email=$_POST["email"];
$password=$_POST["password"];
$compName=$_POST["compName"];
$Designation=$_POST["Designation"];
$address=$_POST["address"];
$sql="insert into register_employer(Fname,Lname,phone,email,password,compName,Designation,address) values('$Fname','$Lname','$phone','$email','$password','$compName','$Designation','$address')";
if($conn->query($sql)===TRUE)
{ ?>
	 <script> alert('Register Successfull'); 
window.location.href = '../login.php'; </script>
<?php }
else
{
	echo "Error: " .$sql . "<br>" . $conn->error;
}
mysqli_close($conn);

}
?>
<head>
<link href="/jobportal/css/style.css" rel="stylesheet">
<style>
.bg-image
{
	    background: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)),url(/jobportal/image/a.jpg) no-repeat center;
    background-size: cover;
    background-attachment: fixed;
}
</style>
</head>
<body class="bg-image">

<div class="reg-box">
<h1>Register Here</h1>
<form method="POST" action="">
<div>
    <label><b>First Name</b></label>
    <input type="text" name="Fname" placeholder="Enter First Name" required/ >
</div>
<div>
    <label><b>Last Name</b></label>
    <input type="text" name="Lname" placeholder="Enter Last Name" required/>
</div>
<br>
<div>
    <label><b>Phone Number</b></label>
    <input type="text" name="phone" placeholder="Enter Phone Number" required/>
</div>
<div>
    <label><b>E-mail</b></label>
    <input type="text" name="email" placeholder="Enter E-mail" required/>
</div>
<br>
<div>
    <label><b>Password</b></label>
    <input type="password" name="password" placeholder="Enter Password" required/>
</div>
<div>
    <label><b>Company Name</b></label>
    <input type="text" name="compName" placeholder="Enter Company Name" required/>
</div>
<br>
<div>

    <label><b>Designation</b></label>
    <input type="text" name="Designation" placeholder="Enter address" required/>
</div>

<div>
    <label><b>Address</b></label>
    <input type="text" name="address" placeholder="Enter Address" required/>
</div>

<input style="width:40%;" type="submit" name="submit" value="Register"/>

<input onclick="window.location.href='../index.php'" class="backb" type="submit" value="Go to Home Page">
</form>
<?php include_once('../footer.php')?>