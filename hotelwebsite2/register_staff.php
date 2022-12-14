<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" 
    integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="login_staff.css">
	<link rel="stylesheet" href="style.css">
    
    <title>home page</title>
</head>
<style>
.form-container{
	min-height: 100vh;
	padding: 20px;
    padding-bottom:60px;
	display: flex;
    align-items: center;
    justify-content: center;
	background-image: linear-gradient(rgba(0,0,0,0.5,rgba)(0,0,0,0.5)),url(pexels-min-an-1171585.jpg);
	background-position: center;
	background-size: cover;
	overflow-x: hidden;
	position: relative;
}
</style>

<body>
    <div class="container">
    <div class="head-bottom flex">
       

    <!---->
 
	<?php
//call file to connect server Pak Mat Western
include ("header.php");?>


<?php 
//This section  processes submissions from the login form
//check if the form has been submitted
if ($_SERVER['REQUEST_METHOD']== 'POST') {

//validate the username
if (!empty($_POST['id_c'])) {
	$un = mysqli_real_escape_string($connect, $_POST['id_c']);
} else {
	$un =FALSE;
	echo '<p class = "error"> You forgot to enter your ID.</p>';
}

//validate the password
if (!empty($_POST['password'])){
	$p = mysqli_real_escape_string($connect, $_POST['password']);
}
else {
	$p = FALSE;
	echo '<p class = "error"> You forgot to enter your password.</p>';
}

//if no problems
if ($un && $p) {

//retrieve the id, firstname, lastname, for the username and password combination
$q = "SELECT id_c, name_c, phone_c, email, address, position, password FROM staff WHERE (id_c = '$un' AND password = '$p')";

//run the query and assign it to the variable $result
   $result = mysqli_query ($connect, $q);

   //count the number of rows that match the username/password combination
   //if one database row (record) matches the input:
   if (@mysqli_num_rows ($result) == 1) {
   	//start the session, fetch the record and insert the three values in an array
   	session_start();
   	$_SESSION = mysqli_fetch_array ($result, MYSQLI_ASSOC);
	header("location:HomeAdmin.php");

   	echo '<p>Succesful Log In</p>';
	


   	//cancel the rest of the script
   	exit();

   	mysqli_free_result ($result);
   	mysqli_close ($connect);
   	//no match was made
   }
   else{
   	echo '<p class = "error">The username and password entered do not match our records <br> Perhaps you need to register, just click the Register button</p>';
   }
//if there was a problem
}
else {
	echo '<p class ="error"> Please try again. </p>';
}
  mysqli_close ($connect);
} //end of submit conditional

?>

<div class="form-container">


<form action="login_staff.php" method="post">
<h3 align="center" >Login<br>
<img class="logo1" src="pakmatlogo-removebg-preview.png"></h3>

<label class="label" for="id_c"> ID: </label>
<input id = "id_c" type="text" name="id_c" size="4" maxlength="6" value="<?php if (isset($_POST['id_c'])) echo $_POST['id_c'];?>">

<label class="label" for="password"> Password: </label>
	<input id="password" type="password" name="password" size="15" maxlength="60" value="<?php if (isset($_POST['password'])) echo $_POST['password'];?>">
	<p>&nbsp;</p>

<p><input id="submit" type="submit" name="submit" value="Login" />
   <input id="reset" type="reset" name="reset" value="Clear All" />
   </p>
    <p>Don't have an account? <a href="register_staff.php">REGISTER NOW</a></p>
</form>



</div>  
    </div>
    </div>
    <footer class="footer">
        <p>?? 2022 Hermes Villa | All rights reserved</p>
      </footer>
    





</body>

</html>