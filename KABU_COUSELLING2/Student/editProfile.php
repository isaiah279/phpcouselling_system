<?php $db=mysqli_connect('localhost','root','','kabarak_db')?>

<html>
<head>
<title> |Edit details </title>
	<link rel="stylesheet" href="main.css">
</head>
<body style="background-image:url(images/back.jpg)">
<a href="cover.php" class="logo"><img src="images/logo.png" width="10%" height="10%"  > <a>
<div class="header">
				<ul>
					<div class="float" style="font-size:20px">
					<li><a href="../Home_Folder/login.php">Login</a></li>
					<li><a href="../Home_Folder/index.php">Home</a></li>
					</div>
				</ul>
</div>
<?php  
$id=$_GET['id'];

if(isset($_POST['submit'])){
 		$sname=$_POST['fname'];
		$gender=$_POST['gender'];
		$contact=$_POST['contact'];
		$regnumber=$_POST['regnumber'];
		$dates=$_POST['date'];
		$times=$_POST['time'];
		$texts=$_POST['texts'];
$sql="UPDATE `booking` SET `fname`=$sname,`gender`=$gender,`contact`=$contact,`regnumber`=$regnumber,`dates`=$dates,`tim`=$times,`texts`=$texts WHERE id=$id";

	if (mysqli_query($db, $sql)) 
	{
    header( "Refresh:3; url=studentDashbord.php?msg=Data updated successfully");
    

		//header( "Refresh:3; url=cover.php");

	} else{
    echo mysqli_error($db);
  }
}
?>
<?php 
$id=$_GET['id'];
?>
<?php
$sql="SELECT * FROM `booking` WHERE id =$id LIMIT 1";
$result=mysqli_query($db,$sql);
$row=mysqli_fetch_assoc($result);
?>

<form action="" method="post">
	<div class="sucontainer">
<?php
// echo $row['fname'];
?> 

	<div class="split left">
  <div class="centered">
  <label><b>Name:</b></label><br>
		<input type="text" name="fname"value="<?php echo $row['fname']?>" required><br>
		<label><b>Gender</b></label><br>
		<input type="radio" name="gender" value="female"<?php echo ($row['gender']=="female")?"checked":"";?>>Female
		<input type="radio" name="gender" value="male"<?php echo ($row['gender']=="male")?"checked":"";?>>Male
		<input type="radio" name="gender" value="other"<?php echo ($row['gender']=="other")?"checked":"";?>>Other<br><br>
		
		<label><b>Contact No:</b></label><br>
		<input type="number" placeholder="Contact Number" name="contact"value="<?php echo $row['contact']?>" required><br>
  </div>
</div>
<div class="split right">
  <div class="centered">
  	<br>
  <label><b>Registration Number:</b></label><br>
		<input type="text"name="regnumber" value="<?php echo $row['regnumber']?>" required><br>
		<label><b>Date:</b></label><br>
		<input type="date" placeholder="Enter Date" name="date" id="p1"value="<?php echo $row['dates']?>" required><br>

		<label><b>Time:</b></label><br>
		<input type="time" placeholder="Set time"value="<?php echo $row['tim']?>" name="time" id="p2" required><br>
    <label><b>Message:</b></label><br>
		<textarea name="texts" id="" cols="30" rows="10"><?php echo $row['texts']?></textarea><br>
		<p style="color:white">If you have booked  go to  <a href="../Home_Folder/index.php" style="color:blue">home page</a>.</p><br>
		<div class="container" style="background-color:grey">
			<button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
			<button type="submit" name="submit" style="float:right">Update</button>
  </div>
</div>

	
	
		</div>
  </div>
<?php

?>

</form>
</body>
<style>
  body, html {
	background-color: #333;
    height: 100%;
    margin: 0;
	background-position: 0 7px;
	background-repeat: no-repeat;
	background-size: cover;
	position: relative;
	font-family:verdana;
}
h1{
	text-align:center;
	color:black;
	font-size:40px;
	top:30%;
}

a{
	font-size: 18px;
	color: white;
	text-decoration: none;
}
strong{
	color: white;
	font-size: 30px;
	font-family: verdana;
}
label{
	color:white;
}
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}

li {
    float: right;
	border-right:3px solid #bbb;
}
li a {
    display: block;
    color: white;
    text-align: center;
    padding: 7px 35px;
    text-decoration: none;
}
li a:hover:not(.active) {
    background-color: #111;
	opacity: 0.6;
}

.active {
    background-color: #e0e0d1;
}
/* Full-width input fields */
input[type=text], input[type=password], input[type=email] ,input[type=date], input[type=number]  {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}
input[type=submit]
{
	border-radius:12px;
    background-color: black;
    border: none;
    color: white;
    padding: 16px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    transition-duration: 0.4s;
    cursor: pointer;
}

option{
	width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}
button {
	border-radius:12px;
    background-color: black;
    border: none;
    color: white;
    padding: 16px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    cursor: pointer;
}

button:hover {
    opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
    border-radius:12px;
    background-color: red;
    border: none;
    color: white;
    padding: 16px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    cursor: pointer;
}
.signupbtn{
	border-radius:12px;
    background-color: green;
    border: none;
    color: white;
    padding: 16px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    cursor: pointer;
}

.loginbtn{
	position:absolute;
	top:50%;
	left:50%;
}
/* Center the image and position the close button */
.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
    position: relative;
}

img.avatar {
    width: 90%;
    border-radius:12px;
}

.container {
    padding: 16px;
}
.sucontainer{
	padding: 12px;
	position:absolute;
	left:30%;
	right:30%;
	top:12%;
	border:2px solid white;
	border-collapse:collapse;
	background:grey;
}
.dispcontainer{
	padding: 12px;
	position:bottom;
	left:30%;
	right:30%;
	bottom:5%;
	top:12%;
	border:2px solid white;
	border-collapse:collapse;
	background-repeat:no-repeat;
	background-attachment:fixed;
	background-size:cover
}
span.psw {
    float: right;
    padding-top: 16px;
}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 35%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: red;
    cursor: pointer;
}

 #map {
        height: 100%;
      }
/* Add Zoom Animation */
.animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
    from {-webkit-transform: scale(0)} 
    to {-webkit-transform: scale(1)}
}
    
@keyframes animatezoom {
    from {transform: scale(0)} 
    to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 350px) {
	span.dont{
		display: block;
       float: right;
	}
    .cancelbtn {
       width: 100%;
    }
}
.mySlides {display:none}

/* Slideshow container */
.slideshow-container {
	max-width: 45%;
	max-height:100%;
	position: relative;
	margin: auto;
}
/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  height: 13px;
  width: 13px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}
@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .text {font-size: 11px}
}
</style>
</html>
