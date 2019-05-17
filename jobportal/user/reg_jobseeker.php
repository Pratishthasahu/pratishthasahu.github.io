<html>
<?php
$nameErr="";
$nameErr1="";
$fnameErr="";
$genErr="";
$emailErr="";
$numberErr="";
if($_SERVER["REQUEST_METHOD"]=="POST")
{
	
	//first name
 if(empty($_POST["fname"]))
 {
	 $nameErr="Name is required";
 }
 else                  
 {
 $name=$_POST["fname"];
 //check if name only contains letters and whitespace
 if(!preg_match("/^[a-zA-Z ]*$/",$name))
 {
	 $nameErr="only letters and white space allowed<br>";
 }
 }
 //Last name
 if(empty($_POST["lname"]))
 {
	 $nameErr1="last name is required";
 }
 else
 {
	 $name1=$_POST["lname"];
	 if(!preg_match("/^[a-zA-Z ]*$/",$name1))
	 {
		 $nameErr1="only letters and white space allowed<br>";
	 }
 }
 
 
 //father's name
  if(empty($_POST["fathername"]))
 {
	 $fnameErr="father's name is required";
 }
 else
 {
	 $name2=$_POST["fathername"];
	 if(!preg_match("/^[a-zA-Z ]*$/",$name2))
	 {
		 $fnameErr="only letters and white space allowed<br>";
	 }
 }
 
 //gender
 if(empty($_POST["gender"]))
 {
	 $genErr="gender is required";
 }
 else
 {
	 $gen=$_POST["gender"];
 }
 
 
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

include_once('../db.php');
$fname=$_POST["fname"];
$lname=$_POST["lname"];
$fathername=$_POST["fathername"];
$education=$_POST["education"];
$gender=$_POST["gender"];
$date=$_POST["date"];
$month=$_POST["month"];
$year=$_POST["year"];
$dob=$_POST["dob"];
$phone=$_POST["phone"];
$email=$_POST["email"];
$password=$_POST["password"];
$address=$_POST["address"];
$sql="insert into register_jobseeker(Fname,Lname,FatherName,gender,dob,phone,email,password,address) values('$fname','$lname','$fathername','$gender','$dob','$phone','$email','$password','$address')";
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
    <label>First Name</label>
    <input type="text" name="fname" placeholder="Enter First Name" required/>
</div>
<div>
    <label>Last Name</label>
    <input type="text" name="lname" placeholder="Enter Last Name" required/>
</div>
<br>
<div>
    <label>Father's Name</label>
    <input type="text" name="fathername" placeholder="Enter Father's Name" required/>
</div>
<div>
    <label>Education</label>
    <input type="text" name="education" placeholder="Enter Education detail" required/>
</div>
<br>
<div class="gender">
<label>Gender</label><input type="radio" name="gender" value="male">
Male
<input type="radio" name="gender" value="female" required>
Female
</div>
<div class="dob">
<label>Date of Birth</label>
<input type="date" name="dob"/>
</div>
<br>
<div>
    <label>Phone Number</label>
    <input type="text" name="phone" placeholder="Enter Phone Number" required/>
</div>
<div>
    <label>E-mail</label>
    <input type="text" name="email" placeholder="Enter E-mail" required/>
</div>
<br>
<div>
    <label>Password</label>
    <input type="password" name="password" placeholder="Enter Password" required/>
</div>

<div>
    <label>Address</label>
    <input type="text" name="address" placeholder="Address" required/>
</div>

<input style="width:40%;" type="submit" name="submit" value="Register"/>
<input onclick="window.location.href='../index.php'" class="backb" type="submit" value="Go to Home Page">
</form>
<div class="clear"></div>
<?php include_once('../footer.php')?>