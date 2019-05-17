<?php
session_start();
		if($_SESSION['usertype']!='employer'){
        header("Location:login.php");
		}
?>
<?php
if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST['updatejob']))
{

include_once("../db.php");
$companyname=$_POST["companyname"];
$position=$_POST["position"];
$location=$_POST["location"];
$salary=$_POST["salary"];
$education=$_POST["education"];
$experience=$_POST["experience"];
$contact=$_POST["contact"];
$additionaldetails=$_POST["additionaldetails"];
$emp_email=$_SESSION["useremail"];
$jobid=$_GET["jobid"];
$sql="update new_jobs set companyname='$companyname',position='$position',location='$location',salary='$salary',education='$education',experience='$experience',contact='$contact',additionaldetails='$additionaldetails' WHERE id='$jobid'";
if($conn->query($sql)===TRUE)
{
	 header("Location:employer_dashboard.php");
}
else
{
	echo "Error: " .$sql . "<br>" . $conn->error;
}
mysqli_close($conn);

 
}
?>
<?php include_once('../header.php'); ?>
<div id="main-content">
<div class="reg-box newjob">
<h1>Enter Job Details</h1>
<?php 
if($_SERVER["REQUEST_METHOD"]=="GET")
{
$jobid=$_GET["jobid"];
$sql="SELECT * FROM new_jobs WHERE id='$jobid'";
	$result=mysqli_query($conn,$sql);
	if($result->num_rows>0)
	{
		
		while($row=$result->fetch_assoc())
		{
			?>
<form method="POST" action="">
<div>
    <label><b>Company Name</b></label>
    <input type="text" name="companyname" value="<?php echo $row["companyname"]; ?>" placeholder="Enter Company Name" required/>
</div>
<div>
    <label><b>Position</b></label>
    <input type="text" name="position" value="<?php echo $row["position"]; ?>" placeholder="Enter Position" required/>
</div>
<br>
<div>
    <label><b>Location</b></label>
    <input type="text" name="location" value="<?php echo $row["location"]; ?>" placeholder="Enter Location" required/>
</div>
<div>
    <label><b>Salary</b></label>
    <input type="text" name="salary" value="<?php echo $row["salary"]; ?>" placeholder="Enter Salary" required/>
</div>
<br>
<div>
    <label><b>Education</b></label>
    <input type="text" name="education" value="<?php echo $row["education"]; ?>" placeholder="Enter Education" required/>
</div>
<div>
    <label><b>Experience</b></label>
    <input type="text" name="experience" value="<?php echo $row["experience"]; ?>" placeholder="Enter Years of Experience" required/>
</div>
<br>
<div>

    <label><b>Contact</b></label>
    <input type="text" name="contact" value="<?php echo $row["contact"]; ?>" placeholder="Enter Contact Number" required/>
</div>

<div>
    <label><b>Additional Details</b></label>
    <textarea name="additionaldetails"><?php echo $row["additionaldetails"]; ?></textarea>
</div>

<input type="submit" value="Submit" name="updatejob">
</form>
<?php } } } ?>
</div>
</div>
</div>
<?php include_once('../footer.php')?>
