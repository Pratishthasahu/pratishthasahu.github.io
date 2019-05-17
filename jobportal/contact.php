<?php include_once('header.php');?>
<form class="searchform-home" method="post" action="mailto:Frank@cohowinery.com" name="ContactForm" onsubmit="return ValidateContactForm();">
<div class="heading">
<h1 class="text-center">Contact Us</h1>
<p style="color:white">Name<input type="text" name="Name" placeholder="Enter Name"/></p>
<p style="color:white">E-mail<input type="text" name="Email" placeholder="Enter E-mail"/></p>
<p style="color:white">Phone<input type="text" name="Phone" placeholder="Enter Phone Number"/></p>
<p style="color:white">Message<textarea name="Comment" placeholder="Comment here"></textarea></p>

<span class="consend"><input type="submit" value="Send" name="submit"></span>
<span class="conres"><input type="reset" value="Reset" name="reset"></span>
	<div class="clear"></div>
</form>

<script>

function ValidateContactForm()
{
    var name = document.ContactForm.Name;
    var email = document.ContactForm.Email;
    var phone = document.ContactForm.Phone;
    var comment = document.ContactForm.Comment;

    if (name.value == "")
    {
        window.alert("Please enter your name.");
        name.focus();
        return false;
    }
    
    if (email.value == "")
    {
        window.alert("Please enter a valid e-mail address.");
        email.focus();
        return false;
    }
    if (email.value.indexOf("@", 0) < 0)
    {
        window.alert("Please enter a valid e-mail address.");
        email.focus();
        return false;
    }
        if (comment.value == "")
    {
        window.alert("Please provide a detailed description or comment.");
        comment.focus();
        return false;
    }
    return true;
}


</script>
</div>
</div>
<?php include_once('footer.php');?>
