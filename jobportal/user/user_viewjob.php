<?php
session_start();
if($_SESSION["useremail"]=="") {
        header("Location:../login.php");
        }
		
?>
<?php
if($_SERVER["REQUEST_METHOD"]=="POST")
{
include_once('../db.php');
$email=$_SESSION["useremail"];
$addid=$_SESSION["userid"];

$jobid=$_POST["jobidd"];
$friends="SELECT applicants_id FROM new_jobs WHERE id='$jobid'";
$fresult=mysqli_query($conn,$friends);
$frow=$fresult->fetch_assoc();
$currentapplicants=$frow["applicants_id"];
$sql="UPDATE new_jobs SET applicants_id=CONCAT('$currentapplicants',' ', '$addid') WHERE id='$jobid'";

if($conn->query($sql)===TRUE)
{
	echo "Applied successfully";
	
        echo "<script> alert('Applied successfully'); 
window.location.href = 'jobseeker_dashboard.php'; </script>";
}
mysqli_close($conn);
}
?>
<?php include_once('../header.php');?>
<div id="main-content">
<div id="status" class="viewJob" style="
    background-color: #fff;
    border-radius: 5px;
    padding: 10px;
">
<?php
if($_SERVER["REQUEST_METHOD"]=="GET")
{
include_once('../db.php');
$jobid=$_GET["jobid"];
$sql="SELECT * FROM new_jobs where id='$jobid'";
	$result=mysqli_query($conn,$sql);
	if($result->num_rows>0)
	{
		while($row=$result->fetch_assoc())
		{ 
	$currentf=$row["applicants_id"];
$currentf=str_replace(" ","/",$currentf);
$frndarry= explode('/', $currentf);
	?>

	<p><label style=" display: inline; ">Compane Name: </label><?php echo $row["companyname"]; ?></p>
	<p><label style=" display: inline; ">Position: </label><?php echo $row["position"]; ?></p>
	<p><label style=" display: inline; ">Location: </label><?php echo $row["location"]; ?></p>
	<p><label style=" display: inline; ">Salary: </label><?php echo $row["salary"]; ?></p>
	<p><label style=" display: inline; ">Education: </label><?php echo $row["education"]; ?></p>
	<p><label style=" display: inline; ">Experience: </label><?php echo $row["experience"]; ?></p>
	<p><label style=" display: inline; ">Contact: </label><?php echo $row["contact"]; ?></p>
	<p><label style=" display: inline; ">Additional Details: </label><?php echo $row["additionaldetails"]; ?></p>
	<p><form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" name="submit">
	<input type="hidden" value="<?php echo $row["id"]; ?>" name="jobidd"/>
	<?php if (in_array($_SESSION["userid"],$frndarry) || $_SESSION["resume"] == ''){?>
	<div class="alert alert-danger" role="alert">
  <strong>Oh snap!</strong> Seems like you have already applied for the job OR You haven't submitted your resume yet! <a href="postresume.php" class="alert-link">Post Resume Now</a>
</div>
     <button type="submit" class="btn btn-success btn-sm" disabled>Apply Job</button>
	<?php } else{?>
     <button type="submit" class="btn btn-success btn-sm">Apply Job</button>
	<?php } ?>
	 </form></p>
	 
		<?php }
	}
	
	else
	{
		echo "o result";
	}
mysqli_close($conn);
}
?>
</div><!----end of status---->
</div>
</div>
<?php include_once('../footer.php')?>