<?php
session_start();
		if($_SESSION['usertype']!='employer')
		{
        header("Location:../login.php");
		}
?>

<?php
if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST['submit_job']))
{
include_once("../db.php");
$companyname=$_POST["companyname"];
$position=$_POST["position"];
$jobtype=$_POST["jobtype"];
$location=$_POST["location"];
$salary=$_POST["salary"];
$education=$_POST["education"];
$experience=$_POST["experience"];
$contact=$_POST["contact"];
$additionaldetails=$_POST["additionaldetails"];
$emp_email=$_SESSION["useremail"];
$sql="insert into new_jobs(companyname,position,job_type,location,salary,education,experience,contact,additionaldetails,emp_email) values('$companyname','$position','$jobtype','$location','$salary','$education','$experience','$contact','$additionaldetails','$emp_email')";
if($conn->query($sql)===TRUE)
{
        echo "<script> alert('Your posted job has been submiited to Administrator'); 
window.location.href = 'post_jobs.php'; </script>";
}
else
{
	echo "Error: " .$sql . "<br>" . $conn->error;
}
mysqli_close($conn);

 
}
?>
<?php include_once('../header.php');?>
<div id="main-content">
<div class="reg-box newjob">
<h1>Enter Job Details</h1>
<form method="POST" action="">
<div>
    <label><b>Company Name</b></label>
    <input type="text" name="companyname" placeholder="Enter Company Name" required/>
</div>
<div>
    <label><b>Position</b></label>
    <select name="position">
  <option value="Manager">Manager</option>
  <option value="Teacher">Teacher</option>
  <option value="Finance Manager">Finance Manager</option>
  <option value="Web Developer">Web Developer</option>
  <option value="HR">HR Manager</option>
  <option value="Software Engineer">Software Engineer</option>
  <option value="Accounts specialist">Accounts specialist</option>
<option value="Assessor">Assessor</option>
<option value="Auditor">Auditor</option>
<option value="Bookkeeper">Bookkeeper</option>
<option value="Budget analyst">Budget analyst</option>
<option value="Cash manager">Cash manager</option>
<option value="Chief financial officer">Chief financial officer</option>
<option value="Controller">Controller</option>
<option value="Credit manager">Credit manager</option>
<option value="Tax specialist">Tax specialist</option>
<option value="Treasurer">Treasurer</option>
<option value="Human Resources">Human Resources</option>
<option value="Benefits officer">Benefits officer</option>
<option value="Compensation analyst">Compensation analyst</option>
<option value="Employee relations specialist">Employee relations specialist</option>
<option value="HR coordinator">HR coordinator</option>
<option value="HR specialist">HR specialist</option>
<option value="Retirement plan counselor">Retirement plan counselor</option>
<option value="Staffing consultant">Staffing consultant</option>
<option value="Union organizer">Union organizer</option>
<option value="Certified financial planner">Certified financial planner</option>
<option value="Chartered wealth manager">Chartered wealth manager</option>
<option value="Credit analyst">Credit analyst</option>
<option value="Credit manager">Credit manager</option>
<option value="Financial analyst">Financial analyst</option>
<option value="Hedge fund manager">Hedge fund manager</option>
<option value="Hedge fund principal">Hedge fund principal</option>
<option value="Hedge fund trader">Hedge fund trader</option>
<option value="Investment advisor">Investment advisor</option>
<option value="Investment banker">Investment banker</option>
<option value="Investor relations officer">Investor relations officer</option>
<option value="Leveraged buyout investor">Leveraged buyout investor</option>
<option value="Loan officer">Loan officer</option>
<option value="Mortgage banker">Mortgage banker</option>
<option value="Mutual fund analyst">Mutual fund analyst</option>
<option value="Portfolio management marketing">Portfolio management marketing</option>
<option value="Portfolio manager">Portfolio manager</option>
<option value="Ratings analyst">Ratings analyst</option>
<option value="Stockbroker">Stockbroker</option>
<option value="Trust officer">Trust officer</option>
<option value="Business systems analyst">Business systems analyst</option>
<option value="Content manager">Content manager</option>
<option value="Content strategist">Content strategist</option>
<option value="Database administrator">Database administrator</option>
<option value="Digital marketing manager">Digital marketing manager</option>
<option value="Full stack developer">Full stack developer</option>
<option value="Information architect">Information architect</option>
<option value="Marketing technologist">Marketing technologist</option>
<option value="Mobile developer">Mobile developer</option>
<option value="Project manager">Project manager</option>
<option value="Social media manager">Social media manager</option>
<option value="Software engineer">Software engineer</option>
<option value="Systems engineer">Systems engineer</option>
<option value="Software developer">Software developer</option>
<option value="Systems administrator">Systems administrator</option>
<option value="User interface specialist">User interface specialist</option>
<option value="Web analytics developer">Web analytics developer</option>
<option value="Web developer">Web developer</option>
<option value="Webmaster">Webmaster</option>
<option value="Claims adjuster">Claims adjuster</option>
<option value="Damage appraiser">Damage appraiser</option>
<option value="Insurance adjuster">Insurance adjuster</option>
<option value="Insurance agent">Insurance agent</option>
<option value="Insurance appraiser">Insurance appraiser</option>
<option value="Insurance broker">Insurance broker</option>
<option value="Insurance claims examiner">Insurance claims examiner</option>
<option value="Insurance investigator">Insurance investigator</option>
<option value="Loss control specialist">Loss control specialist</option>
<option value="Underwriter">Underwriter</option>
<option value="Business broker">Business broker</option>
<option value="Business transfer agent">Business transfer agent</option>
<option value="Commercial appraiser">Commercial appraiser</option>
<option value="Commercial real estate agent">Commercial real estate agent</option>
<option value="Commercial real estate broker">Commercial real estate broker</option>
<option value="Real estate appraiser">Real estate appraiser</option>
<option value="Real estate officer">Real estate officer</option>
<option value="Residential appraiser">Residential appraiser</option>
<option value="Residential real estate agent">Residential real estate agent</option>
<option value="Residential real estate broker">Residential real estate broker</option>
  <option value="Assistant Manager">Assistant Manager</option>
  <option value="Software Developer">Software Developer</option>
</select>
</div>

<div class="gender">
    <label><b>Job Type</b></label>
	Part Time <input type="radio" value="parttime" name="jobtype">
		Full Time <input type="radio" value="fulltime" name="jobtype">
</div>

<div>
    <label><b>Location</b></label>
    <input type="text" name="location" placeholder="Enter Location" required/>
</div>
<div>
    <label><b>Salary</b></label>
    <input type="text" name="salary" placeholder="Enter Salary" required/>
</div>

<div>
    <label><b>Education</b></label>
    <input type="text" name="education" placeholder="Enter Education" required/>
</div>
<div>
    <label><b>Experience</b></label>
    <input type="text" name="experience" placeholder="Enter Years of Experience" required/>
</div>

<div>

    <label><b>Contact</b></label>
    <input type="text" name="contact" placeholder="Enter Contact Number" required/>
</div>

<div class="full-width">
    <label><b>Additional Details</b></label>
    <textarea name="additionaldetails"></textarea>
</div>

<input type="submit" name="submit_job" value="Submit">
</form>
</div>
</div>
</div>
<?php include_once('../footer.php')?>
