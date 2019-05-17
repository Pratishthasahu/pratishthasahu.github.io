<?php
session_start();
if($_SESSION["useremail"]=="") {
        header("Location:admin_login.php");
        }
		
?>
<?php
session_start();
if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST['logoutfrom'])) {
        session_destroy();
        header("Location:../index.php");
        }
		
?>
<?php
	include_once('../db.php');
if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST['removeemployer']))
{
	$userid=$_POST["userid"];
	$sql = "DELETE FROM register_employer WHERE id = '$userid'";
	if($conn->query($sql)===TRUE)
{
	echo $smsg = "<script> alert('Employer Deleted'); 
window.location.href = 'manage_employer.php'; </script>";
}
else
{
	echo "Error: " .$sql . "<br>" . $conn->error;
}

}
if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST['disableemployer']))
{
	$userid=$_POST["userid"];
	$sql = "UPDATE register_employer SET flag=1 WHERE id = '$userid'";
	if($conn->query($sql)===TRUE)
{
	echo $smsg = "<script> alert('Employer Disabled'); 
window.location.href = 'manage_employer.php'; </script>";
}
else
{
	echo "Error: " .$sql . "<br>" . $conn->error;
}

}
if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST['enableemployer']))
{
	$userid=$_POST["userid"];
	$sql = "UPDATE register_employer SET flag=0 WHERE id = '$userid'";
	if($conn->query($sql)===TRUE)
{
	echo $smsg = "<script> alert('Employer Enabled'); 
window.location.href = 'manage_employer.php'; </script>";
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
$sql="SELECT * FROM register_employer";
	$result=mysqli_query($conn,$sql);
	if($result->num_rows>0)
	{
		while($row=$result->fetch_assoc())
		{ ?>
	<div class="card mb-3">
 
  <div class="card-body">
  <div class="row">
    <div class="col">
	<p class="card-text"><small class="text-muted"><b><?php echo $row["Fname"].' '.$row["Lname"]; ?></b> has registered on<br> <?php echo $row["reg_date"]; ?>. </small>
    </p>
    </div>
    <div class="col" style=" display: block; margin: auto; text-align: center; ">
      <small class="text-muted"><i class="fa fa-venus-mars" aria-hidden="true"></i> <?php echo $row["compName"]; ?><br/><i class="fa fa-calendar" aria-hidden="true"></i>
 <?php echo $row["designation"]; ?></small>
    </div>
    <div class="col" style=" display: block; margin: auto; text-align: center; ">
  <div class="row">
	
	
	<div class="col-4">
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" name="submit">
	<input type="hidden" value="<?php echo $row["id"]; ?>" name="userid"/>
	<?php if($row["flag"] == 1){ ?>
     <button type="submit" class="btn btn-success btn-sm" name="enableemployer">Enable</button>
	<?php } else {?>
		<button type="submit" class="btn btn-danger btn-sm" name="disableemployer">Disable</button>
	<?php } ?>
	
	
	 </form>
    </div>
	<div class="col-4">
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" name="submit">
	<input type="hidden" value="<?php echo $row["id"]; ?>" name="userid"/>
     <button type="submit" class="btn btn-danger btn-sm" name="removeemployer">Remove Employer</button>
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
<?php include_once('../footer.php');?>
