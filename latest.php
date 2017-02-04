<html>
<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<style type="text/css">
body {
color:white;
font-size:14px;
}
.contact {
text-align:center;
background: none repeat scroll 0% 0% #8FBF73;
padding: 20px 10px;
box-shadow: 1px 2px 1px #8FBF73;
border-radius: 10px;
width:520px;
}
#Name, #Email_address, #Contact_number, #Date_of_pregnancy, #Expected_due_date {
width: 250px;
margin-bottom: 15px;
background: none repeat scroll 0% 0% #AFCF9C;
border: 1px solid #91B57C;
height: 30px;
color: #808080;
border-radius: 8px;
box-shadow: 1px 2px 3px;
}
#submit
{
background:none repeat scroll 0% 0% #8FCB73;
display: inline-block;
padding: 5px 10px;
line-height: 1.05em;
box-shadow: 1px 2px 3px #8FCB73;
border-radius: 8px;
border: 1px solid #8FCB73;
text-decoration: none;
opacity: 0.9;
cursor: pointer;
color:white;
}
#er {
color: #F00;
text-align: center;
margin: 10px 0px;
font-size: 17px;
}
</style>
</head>
<body>
<?php
error_reporting('E_ALL ^ E_NOTICE');
if(isset($_POST['submit']))
{
$conn= mysql_connect('localhost','root','');

if (! $conn)
{die('could not connect'.mysql_error());}


mysql_select_db('mysql');


$Name=$_POST['Name'];
$Email_address=$_POST['Email_address'];
$Contact_number=$_POST['Contact_number'];
$Date_of_pregnancy=$_POST['Date_of_pregnancy'];
$Expected_due_date=$_POST['Expected_due_date'];

$q="select * from login where Name='".$Name."' or Email_address='".$Email_address."' or Contact_number='".$Contact_number."' or Date_of_pregnancy='".$Date_of_pregnancy."' or Expected_due_date='".$Expected_due_date."'" ; 
$n=mysql_fetch_row($q);
if($n>0)
{
$er='The username name '.$name.' or mail '.$mail.' is already present in our database';
}
else
{
$insert=mysql_query("insert into login values('".$Name."','".$Email_address."','".$Contact_number."','".$Date_of_pregnancy."','".$Expected_due_date."')") or die(mysql_error());
if($insert)
{
$er='Values are registered successfully';
}
else
{
$er='Values are not registered';
}
}
}
?>
<div class="contact">
<h1>Registration Form</h1>
<div id="er"><?php echo $er; ?></div>
<form action="#" method="post">
<table id="tbl" align="center">
<tr><td>Name:</td><td><input type="text" name="Name" id="name"></td></tr>

<tr><td>Email address:</td><td><input type="text" name="Email_address" id="mail"></td></tr>

<tr><td>Contact number:</td><td><input type="text" name="Contact_number" id="mail"></td></tr>

<tr><td>Date of pregnancy:</td><td><input type="text" name="Date_of_pregnancy" id="mail"></td></tr>

<tr><td>Expected due date:</td><td><input type="text" name="Expected_due_date" id="mail"></td></tr>

<tr><td></td><td><input type="submit" name="submit" id="submit" value="Submit"></td></tr>
</table>

</form>

</div>

<script type="text/javascript">
$(document).ready(function() {
$('#submit').click(function() {
var Name=document.getElementById('Name').value;
var Email_address=document.getElementById('Email_address').value;
var Contact_number=document.getElementById('Contact_number').value;
var Date_of_pregnancy=document.getElementById('Date_of_pregnancy').value;
var Expected_due_date=document.getElementById('Expected_due_date').value;

var chk = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;


if(Name=='')
{
$('#er').html('Enter your name');
return false;
}
if(Email_address=='')
{
$('#er').html('Enter your Email address');
return false;
}
if(Contact_number=='')
{
$('#er').html('Enter your contact number');
return false;
}
if(Date_of_pregnancy=='')
{
$('#er').html('Date of pregnancy');
return false;
}
if(Expected_due_date=='')
{
$('#er').html('Expected due date');
return false;
}

});
});
</script>
</body>

</html>