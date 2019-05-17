<?php
session_start();

		if($_SESSION['usertype']!='user'){
        header("Location:login_job.php");
		}
?>

<?php include_once('../header.php');?>
<ul class="nav nav-tabs">
   <li class="nav-item">
      <a class = "nav-link active" href = "#all" data-toggle = "tab">
         All Jobs
      </a>
   </li>
   
   <li class="nav-item"><a class = "nav-link" href = "#part" data-toggle = "tab">Part Time</a></li>
   <li class="nav-item"><a class = "nav-link" href = "#full" data-toggle = "tab">Full Time</a></li>
	
</ul>

<div id = "myTabContent" class = "tab-content">

   <div class = "tab-pane active" id = "all">
      <div id="status">
<?php

$sql="SELECT * FROM new_jobs where flag!=0";
	$result=mysqli_query($conn,$sql);
	if($result->num_rows>0)
	{
		while($row=$result->fetch_assoc())
		{ ?>
	<div class="card mb-3">
 
  <div class="card-body">
  <div class="row">
    <div class="col-1">
	<img src="../image/<?php echo (rand(1,9)); ?>.png"/>
	</div>
    <div class="col">
	<p class="card-text"><small class="text-muted"><?php echo $row["companyname"]; ?> is lookig for </small>
    <br/><?php echo $row["position"]; ?></p>
    </div>
    <div class="col" style=" display: block; margin: auto; text-align: center; ">
     <i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $row["location"]; ?>
    </div>
    <div class="col" style=" display: block; margin: auto; text-align: center; ">
<form method="GET" action="user_viewjob.php" name="submit">
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
?>
</div><!----end of status---->
   </div>
   
   <div class = "tab-pane fade" id = "part">
      <div id="status">
<?php
$session_email=$_SESSION["useremail"];
$sql="SELECT * FROM new_jobs where flag!='0' and job_type='parttime'";
	$result=mysqli_query($conn,$sql);
	if($result->num_rows>0)
	{
		while($row=$result->fetch_assoc())
		{ ?>
	<div class="card mb-3">
 
  <div class="card-body">
  <div class="row">
    <div class="col-1">
	<img src="../image/<?php echo (rand(1,9)); ?>.png"/>
	</div>
    <div class="col">
	<p class="card-text"><small class="text-muted"><?php echo $row["companyname"]; ?> is lookig for </small>
    <br/><?php echo $row["position"]; ?></p>
    </div>
    <div class="col" style=" display: block; margin: auto; text-align: center; ">
     <i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $row["location"]; ?>
    </div>
    <div class="col" style=" display: block; margin: auto; text-align: center; ">
<form method="GET" action="user_viewjob.php" name="submit">
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

?>
</div><!----end of status---->
   </div>
   

   <div class = "tab-pane fade" id = "full">
      <div id="status">
<?php

$session_email=$_SESSION["useremail"];
$sql="SELECT * FROM new_jobs where flag!=0 and job_type='fulltime'";
	$result=mysqli_query($conn,$sql);
	if($result->num_rows>0)
	{
		while($row=$result->fetch_assoc())
		{ ?>
	<div class="card mb-3">
 
  <div class="card-body">
  <div class="row">
    <div class="col-1">
	<img src="../image/<?php echo (rand(1,9)); ?>.png"/>
	</div>
    <div class="col">
	<p class="card-text"><small class="text-muted"><?php echo $row["companyname"]; ?> is lookig for </small>
    <br/><?php echo $row["position"]; ?></p>
    </div>
    <div class="col" style=" display: block; margin: auto; text-align: center; ">
     <i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $row["location"]; ?>
    </div>
    <div class="col" style=" display: block; margin: auto; text-align: center; ">
<form method="GET" action="user_viewjob.php" name="submit">
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
   
</div>
</div>
<?php include_once('../footer.php')?>