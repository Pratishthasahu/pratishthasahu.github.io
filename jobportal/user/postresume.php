<?php
session_start();
if($_SESSION["useremail"]=="") {
        header("Location:login_job.php");
        }
		
?>
<?php
if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST['postresume'])) {
$name = $_FILES['upload']['name'];
$size = $_FILES['upload']['size'];
$type = $_FILES['upload']['type'];
$tmp_name = $_FILES['upload']['tmp_name'];
if(isset($name) && !empty($name)){
		$location = "../uploads/";
		if(move_uploaded_file($tmp_name, $location.$name)){
			$_SESSION['resume']=$name;
			echo $smsg = "<script> alert('Uploaded Successfully');
window.location.href = 'jobseeker_dashboard.php'; </script>";
			
include_once("../db.php");
$user_email=$_SESSION["useremail"];
$sql="update register_jobseeker set resume_file='$name' WHERE email='$user_email'";
if($conn->query($sql)===TRUE)
{
}
else
{
	echo "Error: " .$sql . "<br>" . $conn->error;
}
mysqli_close($conn);
			
			
		}else{
			echo $fmsg = "<script> alert('Failed to Upload File');
			window.location.href = 'postresume.php'; </script>";
		}
}else{
	echo $fmsg = "<script> alert('Please Select a File'); 
	window.location.href = 'postresume.php'; </script>";
}
}
?>
<?php include_once('../header.php');?>
<div class="upload">
<form class="searchform-home" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
<div class="heading">
<h4 class="text-center">You Must Upload Your Resume To Apply For Jobs</h4>
<h5 class="text-center" style="color:red;">*Only upload .doc or pdf files</h5>
</div>
<input type="file" name="upload">
<input type="submit" name="postresume" value="Post Resume">
</div>

</form>
</div>
</div>
<?php include_once('../footer.php')?>