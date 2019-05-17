<?php include_once('header.php');?>
<?php if($_SESSION['useremail']==''){ ?>
<form class="searchform-home" method="POST" action="login.php">
<?php }else{ ?>
<form class="searchform-home" method="GET" action="search.php">
<?php } ?>
<div class="heading">
<h3 class="text-center">The <span>Easiest</span> Way to Get <span>Your</span> New Job</h3>
<h5 class="text-center">Serach Your Dream Job Here</h5>
</div>

<input type="text" name="Profession" placeholder="Profession You are looking for?" required/>
<input type="text" name="location" placeholder="Any Particular Location?" required/>
 <select name="category">
		<option value="">Category</option>
		<option value="">All Jobs</option>
		<option value="parttime">Part Time</option>
		<option value="fulltime">Full Time</option>
</select>
  <input type="submit" class="btn-change8" value="Search Job">
    </form>
	</div>
<section id="about">
				<div class="container">
					<div class="row">
						<div class="col-md-4 wow animated fadeInLeft animated" style="visibility: visible; animation-name: fadeInLeft;">
							<div class="recent-works">
								<h3>Partners</h3>
								<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="image/slider/samsung.jpg" alt="First slide">
	   <div class="carousel-caption d-none d-md-block">
        <p>Samsung helps you discover a wide range of home electronics with cutting-edge technology including smartphones, tablets, TVs, home appliances and more.</p>
  </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="image/slider/Microsoft.jpg" alt="Second slide">
	   <div class="carousel-caption d-none d-md-block">
       <p>At Microsoft our mission and values are to help people and businesses throughout the world realize their full potential.</p>
  </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="image/slider/infosys.png" alt="Third slide">
	   <div class="carousel-caption d-none d-md-block">
    <p>Infosys, a global leader in technology services & consulting, helps clients in more than 50 countries to create & execute digital transformation strategies.</p>
  </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
							</div>
						</div>
						<div class="col-md-7 col-md-offset-1 wow animated fadeInRight animated" style="visibility: visible; animation-name: fadeInRight;">
							<div class="welcome-block">
								<h3>Welcome To Our Site</h3>								
						     	 <div class="message-body">
									<div class="avatar"><img src="image/avatar.png" class="pull-left" alt="member"></div>
						       		<p>Job portal is developed for creating an interactive job vacancy Portal for candidates.
										This web application is to be conceived in its current form as a dynamic site-requiring constant updates both from the seekers as well as the companies.
										The objective of the project is to enable jobseekers to place their resumes and find appropriate jobs while companies to publish their vacancies and find good candidates.
										It enables jobseekers to post their resume, search for jobs, view personal job listings.
										It will provide various companies to place their vacancy profile on the site and also have an option to search candidate resumes.
										Apart from job-seekers and Companies(Job Provider) there will be an admin module to manage complete Portal as well as jobseeker and companies. </p>
						     	 </div>
						     
						    </div>
						</div>
					</div>
				</div>
			</section>
			
<section id="recent">
				<div class="container">
				
<div class="heading">
<h3 class="text-center" style="color:#212529;"><b>Recent Jobs</b><h3>
</div>
      <div id="status">
<?php
include_once('db.php');
$sql="SELECT * FROM new_jobs where flag!=0 ORDER BY id DESC LIMIT 5";
	$result=mysqli_query($conn,$sql);
	if($result->num_rows>0)
	{
		while($row=$result->fetch_assoc())
		{ ?>
	<div class="card mb-3">
 
  <div class="card-body">
  <div class="row">
    <div class="col-1">
	<img src="image/<?php echo(rand(1,9)); ?>.png"/>
	</div>
    <div class="col">
	<p class="card-text"><small class="text-muted"><B style="color:lightseagreen"><?php echo $row["companyname"]; ?></B> is lookig for </small>
    <br/><?php echo $row["position"]; ?></p>
    </div>
    <div class="col" style=" display: block; margin: auto; text-align: center; ">
      <i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $row["location"]; ?>
    </div>
    <div class="col" style=" display: block; margin: auto; text-align: center; ">
<form method="GET" action="user/user_viewjob.php" name="submit">
	<input type="hidden" value="<?php echo $row["id"]; ?>" name="jobid"/>
     <button type="submit" class="btn-change8">View Job</button>
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
</section>

<section id="social">
				<div class="container">
				
<div class="heading" style="margin-bottom:50px">
<h3 class="text-center" ><b>Follow Us On</b></h3>
<h5 class="text-center">Beautifull simple follow buttons to help you get followers on</h5>
</div>
<ul class="social-button">
								<li class="wow animated zoomIn animated" style="visibility: visible; animation-name: zoomIn;"><a href="https://www.facebook.com/"><i class="fa fa-facebook fa-2x"></i></a></li>
								<li class="wow animated zoomIn animated" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: zoomIn;"><a href="https://twitter.com/login?lang=en"><i class="fa fa-twitter fa-2x"></i></a></li>
								<li class="wow animated zoomIn animated" data-wow-delay="0.6s" style="visibility: visible; animation-delay: 0.6s; animation-name: zoomIn;"><a href="https://www.instagram.com/accounts/login/?hl=en"><i class="fa fa-instagram fa-2x"></i></a></li>							
							</ul>
</div>
</section>

<?php include_once('footer.php');?>