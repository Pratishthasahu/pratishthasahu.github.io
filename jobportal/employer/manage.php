<?php
session_start();
if($_SESSION["useremail"]=="") {
        header("Location:login.php");
        }
		
?>
<?php
session_start();
if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST['logoutfrom'])) {
        session_destroy();
        header("Location:index.php");
        }
		
?>
<?php
	include_once('../db.php');
if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST['removejob']))
{
	$jobid=$_POST["jobid"];
	$sql = "DELETE FROM new_jobs WHERE id = '$jobid'";
	if($conn->query($sql)===TRUE)
{
	echo $smsg = "<script> alert('Job Deleted'); 
window.location.href = 'manage.php'; </script>";
}
else
{
	echo "Error: " .$sql . "<br>" . $conn->error;
}

}
	?>
<?php include_once('../header.php');?>
<div id="status">
<?php
$session_email=$_SESSION["useremail"];
$sql="SELECT * FROM new_jobs where emp_email='$session_email'";
	$result=mysqli_query($conn,$sql);
	if($result->num_rows>0)
	{
		while($row=$result->fetch_assoc())
		{ ?>
	<div class="card mb-3">
 
  <div class="card-body">
  <div class="row">
    <div class="col">
	<p class="card-text"><small class="text-muted"><?php echo $row["companyname"]; ?> is lookig for </small>
    <br/><?php echo $row["position"]; ?></p>
    </div>
    <div class="col-2" style=" display: block; margin: auto; text-align: center; ">
      <?php echo $row["location"]; ?>
    </div>
    <div class="col" style=" display: block; margin: auto; text-align: center; ">
  <div class="row">
	<div class="col-4">
<form method="GET" action="view_job.php" name="submit">
	<input type="hidden" value="<?php echo $row["id"]; ?>" name="jobid"/>
     <button type="submit" class="btn btn-success btn-sm">View Job</button>
	 </form>
    </div>
	<div class="col-4">
<form method="GET" action="editjob.php" name="submit">
	<input type="hidden" value="<?php echo $row["id"]; ?>" name="jobid"/>
     <button type="submit" class="btn btn-success btn-sm">Edit Job</button>
	 </form>
    </div>
	<div class="col-4">
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" name="submit">
	<input type="hidden" value="<?php echo $row["id"]; ?>" name="jobid"/>
     <button type="submit" class="btn btn-success btn-sm" name="removejob">Remove Job</button>
	 </form>
    </div>
    </div>

    </div>
  </div>
  </div>
</div>
		<?php }
	}
	
	else
	{
		echo "o result";
	}
mysqli_close($conn);
?>
</div><!----end of status---->
</div>
<?php include_once('../footer.php')?>
