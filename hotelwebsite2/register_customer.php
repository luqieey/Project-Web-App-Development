<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" 
    integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    
    <title>home page</title>
</head>
<body>
    <header>
        <div class="main-nav">
        <a href="index.html" class="logo">HERMES VILLA</a>

        <ul>
            <li><a href="register_customer.php"></a></li>
            <li><a href="list_customer.php">Customer list</a></li>
            <li><a href="search_customer.php">Customer Search</a></li>
            <li><a href="list_staff.php">Staff list</a></li>
            <li><a href="search_staff.php">Staff Search</a></li>       
           

         </ul>
        </div>
        

</header>
</body>
<body>
    <div class="container">
    <div class="head-bottom flex">
       

    <!---->
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
if(empty($_POST ['ic_c']))
{
	$error [] = 'You forgot to enter your IC.';
}

else
{
	$l = mysqli_real_escape_string ($connect, trim ($_POST ['ic_c']));
}

//check for phone number
if(empty($_POST ['phone_c']))
{
	$error [] = 'You forgot to enter your telephone number.';
}

else
{
	$i = mysqli_real_escape_string ($connect, trim ($_POST ['phone_c']));
}

//check for address
if(empty($_POST ['address_c']))
{
	$error [] = 'You forgot to enter your address.';
}

else
{
	$d = mysqli_real_escape_string ($connect, trim ($_POST ['address_c']));
}

//check for a record
if(empty($_POST ['record_c']))
{
	$error [] = 'You forgot to enter your record.';
}

else
{
	$r = mysqli_real_escape_string ($connect, trim ($_POST ['record_c']));
}

	//register the user in the database
	//make the query
	$q = "Insert INTO customer (id_c, name_c, ic_c, phone_c, address_c, record_c)
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

<h2> Register </h2>
<h4> * required field </h4>
<form action="register_customer.php" method="post">

<p><label class ="label" for ="name_c"> Name : *</label>
	<input id = "name_c" type="text" name="name_c" size="30" maxlength="150"
	value="<?php if (isset($_POST['name_c'])) echo $_POST ['name_c']; ?> " /></p>

<p><label class ="label" for ="ic_c">  No ic: *</label>
	<input id = "ic_c" type="text" name="ic_c" size="30" maxlength="60"
	value="<?php if (isset($_POST['ic_c'])) echo $_POST ['ic_c']; ?> " /></p>

<p><label class ="label" for ="phone_c"> Telephone Number : *</label>
	<input id = "phone_c" type="text" name="phone_c" size="30" maxlength="12"
	value="<?php if (isset($_POST['phone_c'])) echo $_POST ['phone_c']; ?> " /></p>

<p><label class ="label" for ="address_c"> Address : *</label>
	<textarea id = "address_c" name="address_c" rows="5" cols="50"
	value="<?php if (isset($_POST['address_c'])) echo $_POST ['address_c']; ?> " ></textarea></p>

<p><label class ="label" for ="record_c"> Record : *</label>
	<textarea id = "record_c" name="record_c" rows="5" cols="50"
	value="<?php if (isset($_POST['record_c'])) echo $_POST ['record_c']; ?> " ></textarea></p>

<p><input id="submit" type="submit" name="submit" value="Register" /> &nbsp;&nbsp;
<input id="reset" type="reset" name="reset" value="Clear All" />
</p>

</form>



     
    </div>
    </div>
    <footer class="footer">
        <p>© 2022 Hermes Villa | All rights reserved</p>
      </footer>
    





</body>

</html>