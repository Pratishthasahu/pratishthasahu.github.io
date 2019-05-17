<?php
session_start();
		if($_SESSION['usertype']!='admin'){
        header("Location:admin_login.php");
		}
?>
<?php
	include_once('../db.php');
if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST['acceptjob']))
{
	$jobid=$_POST["jobid"];
	$flag='1';
$sql="update new_jobs set flag='$flag' WHERE id='$jobid'";
	if($conn->query($sql)===TRUE)
{
	echo $smsg = "<script> alert('Job Accepted'); 
window.location.href = 'admin_dashboard.php'; </script>";
}
else
{
	echo "Error: " .$sql . "<br>" . $conn->error;
}

}


if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST['rejectjob']))
{
	$jobid=$_POST["jobid"];
	$flag='0';
$sql="update new_jobs set flag='$flag' WHERE id='$jobid'";
	if($conn->query($sql)===TRUE)
{
	echo $smsg = "<script> alert('Job Rejected'); 
window.location.href = 'admin_dashboard.php'; </script>";
}
else
{
	echo "Error: " .$sql . "<br>" . $conn->error;
}

}

if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST['removejob']))
{
	$jobid=$_POST["jobid"];
	$sql = "DELETE FROM new_jobs WHERE id = '$jobid'";
	if($conn->query($sql)===TRUE)
{
	echo $smsg = "<script> alert('Job Deleted'); 
window.location.href = 'admin_dashboard.php'; </script>";
}
else
{
	echo "Error: " .$sql . "<br>" . $conn->error;
}

}
	?>
<?php include_once('../header.php');?>
<div id="main-content">
<div id="status">
<?php
$session_email=$_SESSION["useremail"];
$sql="SELECT * FROM new_jobs";
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
<form method="GET" action="../employer/view_job.php" name="submit">
	<input type="hidden" value="<?php echo $row["id"]; ?>" name="jobid"/>
     <button type="submit" class="btn btn-success btn-sm">View Job</button>
	 </form>
    </div>
	<div class="col-4">
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" name="submit">
	<input type="hidden" value="<?php echo $row["id"]; ?>" name="jobid"/>
	<?php if($row["flag"] == 0){ ?>
     <button type="submit" class="btn btn-success btn-sm" name="acceptjob">Accept</button>
	<?php } else {?>
		<button type="submit" class="btn btn-success btn-sm" name="rejectjob">Reject</button>
	<?php } ?>
	
	
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
</div>
<?php include_once('../footer.php');?>