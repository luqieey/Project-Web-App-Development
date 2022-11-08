<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" 
    integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="Rooms.css">
    
    <title>Rooms</title>
    
</head>
<body>
    <header>
        <div class="main-nav">
        <a href="index.html" class="logo">HERMES VILLA</a>

        <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="Rooms.php">Rooms</a></li>
            <li><a href="dining.html">Dining</a></li>
            <li><a href="#">Event Space</a></li>
            <li><a href="location.html">Location</a></li>
            <li><a href="contactus.html">Contact Us</a></li> 

         </ul>
        </div>
        </header>
</body>


<body>
    <div class="container">

        <h3 class="title"> </h3>
        &nbsp;
        &nbsp;
    
       <div class="products-container">
    
          <div class="product" data-name="p-1">
             <img src="rooms1.jpg" alt="">
             <h3>Standard Room</h3>
             <div class="price">RM500 per night</div>
          </div>
    
          <div class="product" data-name="p-2">
             <img src="rooms2.jpg" alt="">
             <h3>Deluxe Room</h3>
             <div class="price">RM650 per night</div>
          </div>
    
          <div class="product" data-name="p-3">
             <img src="rooms3.jpg" alt="">
             <h3>Superior</h3>
             <div class="price">Rm800 per night</div>
          </div>
    
          <div class="product" data-name="p-4">
             <img src="rooms4.jpg" alt="">
             <h3>Double Room</h3>
             <div class="price">RM650 per night</div>
          </div>
    
          <div class="product" data-name="p-5">
             <img src="rooms5.jpg" alt="">
             <h3>Seaview Rooms</h3>
             <div class="price">RM900 per night</div>
          </div>
    
          <div class="product" data-name="p-6">
             <img src="rooms6.jpg" alt="">
             <h3>Superior King Room</h3>
             <div class="price">RM1000 per night</div>
          </div>
    
       </div>
       




       <style>
body, html {height: 100%}
body,h1,h2,h3,h4,h5,h6 {
    font-family: "Amatic SC", sans-serif
}  
.hero{
	height: 100vh;
	background-image: linear-gradient(rgba(0,0,0,0.7),rgba(0,0,0,0.6)),url(pexels-min-an-1171585.jpg);
	background-position: center;
	background-size: cover;
	overflow-x: hidden;
	position: relative;
}
.form-container{
	min-height: 100vh;
	padding: 20px;
    padding-bottom:60px;
	display: flex;
    align-items: center;
    justify-content: center;
	background-position: center;
	background-size: cover;
	overflow-x: hidden;
	position: relative;
}
</style>

       <?php
// call file to connect to server
include ("header.php");?>

<?php
//This query inserts a record in the clinic table 
//has form been submitted?
if ($_SERVER ['REQUEST_METHOD']== 'POST')
{
	$error = array(); //initialize an error array

//check for a Firstname
if(empty($_POST ['name_c']))
{
	$error [] = 'You forgot to enter your Name.';
}

else
{
	$n = mysqli_real_escape_string ($connect, trim ($_POST ['name_c']));
}

//check for IC
if(empty($_POST ['checkin_c']))
{
	$error [] = 'You forgot to enter your IC.';
}

else
{
	$l = mysqli_real_escape_string ($connect, trim ($_POST ['checkin_c']));
}

//check for phone number
if(empty($_POST ['checkout_c']))
{
	$error [] = 'You forgot to enter your telephone number.';
}

else
{
	$i = mysqli_real_escape_string ($connect, trim ($_POST ['checkout_c']));
}

//check for address
if(empty($_POST ['roomtype_c']))
{
	$error [] = 'You forgot to enter your address.';
}

else
{
	$d = mysqli_real_escape_string ($connect, trim ($_POST ['roomtype_c']));
}

//check for a record
if(empty($_POST ['contact_c']))
{
	$error [] = 'You forgot to enter your record.';
}

else
{
	$r = mysqli_real_escape_string ($connect, trim ($_POST ['contact_c']));
}

	//register the user in the database
	//make the query
	$q = "Insert INTO customer (id_c, name_c, checkin_c, checkout_c, roomtype_c, contact_c)
	VALUES (' ', '$n', '$l', '$i', '$d', '$r')";
	$result = @mysqli_query ($connect, $q);  //run the query
	
	if ($result)
	{  //if it run
	echo '<h1>Thank you</h1>';
	exit();
	}

	else
	{  //if it did run
	//message
		echo '<h1>System error</h1>';

	//debugging message
		echo '<p>' .mysqli_error($connect). '<br><br>Query: '.$q. '</p>';
	} //end of if (result)
}
?>
    <div class="form-container">
<h2 style="color: white;"> Booking Room </h2>

<form action="Rooms.php" method="post">

<p><label class ="label" for ="name_c" style="color: white;"> Name : *</label>
	<input id = "name_c" type="text" name="name_c" size="30" maxlength="150"
	value="<?php if (isset($_POST['name_c'])) echo $_POST ['name_c']; ?> " /></p>

<p><label class ="label" for ="checkin_c" style="color: white;">  Checkin Date: *</label>
	<input id = "checkin_c" type="text" name="checkin_c" size="30" maxlength="60"
	value="<?php if (isset($_POST['checkin_c'])) echo $_POST ['checkin_c']; ?> " /></p>

<p><label class ="label" for ="checkout_c" style="color: white;"> CheckOut Date : *</label>
	<input id = "checkout_c" type="text" name="checkout_c" size="30" maxlength="12"
	value="<?php if (isset($_POST['checkout_c'])) echo $_POST ['checkout_c']; ?> " /></p>

<p><label class ="label" for ="roomtype_c" style="color: white;"> Roomtype : *</label>
	<textarea id = "roomtype_c" name="roomtype_c" rows="5" cols="50"
	value="<?php if (isset($_POST['roomtype_c'])) echo $_POST ['roomtype_c']; ?> " ></textarea></p>

<p><label class ="label" for ="contact_c" style="color: white;"> Contact : *</label>
	<textarea id = "contact_c" name="contact_c" rows="5" cols="50"
	value="<?php if (isset($_POST['contact_c'])) echo $_POST ['contact_c']; ?> " ></textarea></p>

<p><input id="submit" type="submit" name="submit" value="Book" /> &nbsp;&nbsp;
<input id="reset" type="reset" name="reset" value="Clear All" />
</p>

</form>
    </div>
 </form>
</div>
    </form>

  <!---->
 

</body>
<footer class="footer">
   <p>© 2022 Hermes Villa | All rights reserved</p>
 </footer>





</body>
</html>