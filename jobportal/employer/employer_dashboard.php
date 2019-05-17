<?php
session_start();
		if($_SESSION['usertype']!='employer'){
        header("Location:login.php");
		}
?>
<?php include_once('../header.php');?>
<div id="status">
<?php
$session_email=$_SESSION["useremail"];
$sql="SELECT * FROM new_jobs where emp_email='$session_email' and flag!=0";
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
    <div class="col" style=" display: block; margin: auto; text-align: center; ">
      <?php echo $row["location"]; ?>
    </div>
    <div class="col" style=" display: block; margin: auto; text-align: center; ">
<form method="GET" action="view_job.php" name="submit">
	<input type="hidden" value="<?php echo $row["id"]; ?>" name="jobid"/>
     <button type="submit" class="btn btn-success btn-sm">View Job</button>
	 </form>

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