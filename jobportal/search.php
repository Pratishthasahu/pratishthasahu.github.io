<?php
session_start();
if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST['logoutfrom'])) {
        session_destroy();
        header("Location:login_job.php");
        }
		if($_SESSION['usertype']!='user'){
        header("Location:login_job.php");
		}
?>

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="/jobportal/css/bootstrap.css" rel="stylesheet">
<link href="/jobportal/css/style.css" rel="stylesheet">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="/jobportal/js/bootstrap.js"></script>
<script src="/jobportal/js/bootstrap.bundle.js"></script>
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">

</head>

<body class="bg-image">
<?php
include_once('sidebar.php');
?>
<div class="main-container">
<div id="main-content">

<div id = "myTabContent" class = "tab-content">

   <div class = "tab-pane active" id = "all">
      <div id="status">
<?php
include_once('db.php');
$category=$_GET["category"];
$location=$_GET["location"];
if($category !='')
$sql="SELECT * FROM new_jobs where flag!=0 AND job_type='$category' AND location='$location'";
else
$sql="SELECT * FROM new_jobs where flag!=0 AND location='$location'";
	$result=mysqli_query($conn,$sql);
	if($result->num_rows>0)
	{
		while($row=$result->fetch_assoc())
		{ ?>
	<div class="card mb-3">
 
  <div class="card-body">
  <div class="row">
    <div class="col-1">
	<img src="image/<?php echo (rand(1,9)); ?>.png"/>
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
   
 </div>
</div>

</div>

</body>
</html>