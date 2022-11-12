<html>
<head>
	<title>Register Patient</title>
</head>
<body>

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
if(empty($_POST ['ic']))
{
	$error [] = 'You forgot to enter your IC.';
}

else
{
	$l = mysqli_real_escape_string ($connect, trim ($_POST ['ic']));
}

//check for phone number
if(empty($_POST ['phone_num']))
{
	$error [] = 'You forgot to enter your telephone number.';
}

else
{
	$i = mysqli_real_escape_string ($connect, trim ($_POST ['phone_num']));
}

//check for address
if(empty($_POST ['address']))
{
	$error [] = 'You forgot to enter your address.';
}

else
{
	$d = mysqli_real_escape_string ($connect, trim ($_POST ['address']));
}

//check for a record
if(empty($_POST ['record']))
{
	$error [] = 'You forgot to enter your record.';
}

else
{
	$r = mysqli_real_escape_string ($connect, trim ($_POST ['record']));
}

	//register the user in the database
	//make the query
	$q = "Insert INTO patient (patient_id, name, ic, phone_num, address, record)
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
<form action="register.php" method="post">

<p><label class ="label" for ="name"> Name : *</label>
	<input id = "name" type="text" name="name" size="30" maxlength="150"
	value="<?php if (isset($_POST['name'])) echo $_POST ['name']; ?> " /></p>

<p><label class ="label" for ="ic"> No IC : *</label>
	<input id = "ic" type="text" name="ic" size="30" maxlength="60"
	value="<?php if (isset($_POST['ic'])) echo $_POST ['ic']; ?> " /></p>

<p><label class ="label" for ="phone_num"> Telephone Number : *</label>
	<input id = "phone_num" type="text" name="phone_num" size="30" maxlength="12"
	value="<?php if (isset($_POST['phone_num'])) echo $_POST ['phone_num']; ?> " /></p>

<p><label class ="label" for ="address"> Address : *</label>
	<textarea id = "address" name="address" rows="5" cols="50"
	value="<?php if (isset($_POST['name'])) echo $_POST ['name']; ?> " ></textarea></p>

<p><label class ="label" for ="record"> Record : *</label>
	<textarea id = "record" name="record" rows="5" cols="50"
	value="<?php if (isset($_POST['record'])) echo $_POST ['record']; ?> " ></textarea></p>

<p><input id="submit" type="submit" name="submit" value="Register" /> &nbsp;&nbsp;
<input id="reset" type="reset" name="reset" value="Clear All" />
</p>

</form>
</body>
</html>