<?php
session_start();
if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST['logoutfrom'])) {
        session_destroy();
		echo $smsg = "<script> window.location.href = '/jobportal/index.php'; </script>";
        }
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Online Job Portal</title>
<link href="/jobportal/css/bootstrap.css" rel="stylesheet">
<link href="/jobportal/css/style.css" rel="stylesheet">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="/jobportal/js/bootstrap.js"></script>
<script src="/jobportal/js/bootstrap.bundle.js"></script>
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<link rel="shortcut icon" href="image/d1.png" type="image/x-icon" />
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-134868116-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-134868116-1');
</script>

</head>

<?php 
include_once('sidebar.php');
?>
<body class="bg-image">


<div class="main-container" id="main-container">
<div class="header">
<h2>Job<small>Finder</small></h2>
<ul class="main-nav">
<?php
 if(isset($_SESSION['useremail'])){
include_once('db.php');
$usremail = $_SESSION['useremail'];
$sql="SELECT Fname FROM register_jobseeker where email='$usremail'";
	$result=mysqli_query($conn,$sql);
	$result->num_rows>0;
	$row=$result->fetch_assoc();
	 ?><li class="active"><i class="fa fa-user-circle-o" aria-hidden="true"></i>
 Welcome, <?php echo $row["Fname"]; ?></li>
<li class="active"><form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"><input type="submit" class="btn-change8" name="logoutfrom" value="Logout"/></form></li><?php } else { ?>
<div class="dropdown">
<li class="active"><a class="btn-change8" href="#">Sign Up</a></li>
	<div class="dropdown-content">
    <a href="employer/reg_employer.php">Employer</a>
    <a href="user/reg_jobseeker.php">Job Seeker</a>
  </div>
</div>
<li class="active"><a class="btn-change8" href="login.php">Login</a></li><?php } ?>
</ul>
</div>
<div class="container">