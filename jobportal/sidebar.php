
<div class="toggle-btn" id="toggle-btn" onclick="toggleSidebar()">
<span></span>
<span></span>
<span></span>
</div>
<div id="sidebar">
<ul>
<li><i class="fa fa-home" aria-hidden="true"></i> <a href="/jobportal">Home</a></li>
	<li><i class="fa fa-user-circle-o" aria-hidden="true"></i> <a href="/jobportal/aboutus.php">About</a></li>
	<?php if($_SESSION["usertype"]=='user'){ ?>
	<li><i class="fa fa-sign-in" aria-hidden="true"></i> <a href="/jobportal/user/jobseeker_dashboard.php">User DashBoard</a></li>
	<li><i class="fa fa-sign-in" aria-hidden="true"></i> <a href="/jobportal/user/postresume.php">Post Resume</a></li>
	<?php } else if($_SESSION["usertype"]=='employer'){ ?>
	<li><i class="fa fa-sign-in" aria-hidden="true"></i> <a href="/jobportal/employer/employer_dashboard.php">Employer Dashboard</a></li>
	<li><i class="fa fa-sign-in" aria-hidden="true"></i> <a href="/jobportal/employer/post_jobs.php">Post Jobs</a></li>
	<li><i class="fa fa-sign-in" aria-hidden="true"></i> <a href="/jobportal/employer/manage.php">Manage Jobs</a></li>
	<?php } else if($_SESSION["usertype"]=='admin'){ ?>
	<li><i class="fa fa-sign-in" aria-hidden="true"></i> <a href="/jobportal/admin/admin_dashboard.php">Admin Dashboard</a></li>
	<li><i class="fa fa-sign-in" aria-hidden="true"></i> <a href="/jobportal/admin/manage_user.php">Manage Users</a></li>
	<li><i class="fa fa-sign-in" aria-hidden="true"></i> <a href="/jobportal/admin/manage_employer.php">Manage Employers</a></li>
	<?php } else { ?>
	<li><i class="fa fa-sign-in" aria-hidden="true"></i> <a href="/jobportal/login.php">Sign In</a></li>
	<li><i class="fa fa-user-plus" aria-hidden="true"></i> <div class="dropdown">
	<a href="#">Registration</a>
	<div class="dropdown-content">
    <a href="/jobportal/employer/reg_employer.php">Employer</a>
    <a href="/jobportal/user/reg_jobseeker.php">Job Seeker</a>
  </div>
</div></li>
	<?php } ?>
	<li><i class="fa fa-envelope" aria-hidden="true"></i> <a href="/jobportal/contact.php">Contact Us</a></li>
</ul>
</div>

<script>
function toggleSidebar()
{
	document.getElementById("sidebar").classList.toggle('active');
	document.getElementById("toggle-btn").classList.toggle('active');
	document.getElementById("main-container").classList.toggle('active');
}
</script>