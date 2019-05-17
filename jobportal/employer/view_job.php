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
$jobid=$_GET["jobid"];
$sql="SELECT * FROM new_jobs where id='$jobid'";
	$result=mysqli_query($conn,$sql);
	if($result->num_rows>0)
	{
		while($row=$result->fetch_assoc())
		{ ?>

	<p><label style=" display: inline; ">Compane Name: </label><?php echo $row["companyname"]; ?></p>
	<p><label style=" display: inline; ">Position: </label><?php echo $row["position"]; ?></p>
	<p><label style=" display: inline; ">Location: </label><?php echo $row["location"]; ?></p>
	<p><label style=" display: inline; ">Salary: </label><?php echo $row["salary"]; ?></p>
	<p><label style=" display: inline; ">Education: </label><?php echo $row["education"]; ?></p>
	<p><label style=" display: inline; ">Experience: </label><?php echo $row["experience"]; ?></p>
	<p><label style=" display: inline; ">Contact: </label><?php echo $row["contact"]; ?></p>
	<p><label style=" display: inline; ">Additional Details: </label><?php echo $row["additionaldetails"]; ?></p>
	
	
	
	<?php
	$currentjob=$row["id"];

//$sql="SELECT * FROM register";
//$remove="SELECT friendslist FROM register WHERE useremail='$username'";


$sql2="SELECT applicants_id FROM new_jobs WHERE id='$currentjob'";

$rresult=mysqli_query($conn,$sql2);
//$result=mysqli_query($conn,$remove);
$rrow=$rresult->fetch_assoc();
$currentf=$rrow["applicants_id"];
$currentf=str_replace(" ","/",$currentf);
$frndarry= explode('/', $currentf);
$sql3="SELECT * FROM register_jobseeker WHERE id='$frndarry[1]'";
$result3=mysqli_query($conn,$sql3);
$row3=$result3->fetch_assoc();
if($frndarry[1]!='')
{
?>
<div class="card mb-3">
 
  <div class="card-body">
  <div class="row">
    <div class="col">
	<p class="card-text"><small class="text-muted"><b><?php echo $row3["Fname"].' '.$row3["Lname"]; ?></b> has applied for this Job. </small>
    </p>
    </div>
    <div class="col" style=" display: block; margin: auto; text-align: center; ">
      <small class="text-muted"><i class="fa fa-venus-mars" aria-hidden="true"></i> <?php echo $row3["gender"]; ?><br/><i class="fa fa-calendar" aria-hidden="true"></i>
 <?php echo $row3["dob"]; ?></small>
    </div>
    <div class="col" style=" display: block; margin: auto; text-align: center; ">
     <a href="mailto:<?php echo $row3["email"]; ?>" class="btn btn-success btn-sm">Contact User</a>
    </div>
    <div class="col" style=" display: block; margin: auto; text-align: center; ">
     <a href="../uploads/<?php echo $row3["resume_file"]; ?>" class="btn btn-success btn-sm">View Resume</a>

    </div>
  </div>
  </div>
</div>	

<?php } }
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