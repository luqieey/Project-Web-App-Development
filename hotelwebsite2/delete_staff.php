<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" 
    integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    
    <title>delete page</title>
</head>
<body>
    <header>
        <div class="main-nav">
        <a href="index.html" class="logo">HERMES VILLA</a>

        <ul>
            <li><a href="register_customer.php">Register customer</a></li>
            <li><a href="list_customer.php">Customer list</a></li>
            <li><a href="search_customer.php">Customer Search</a></li>
            <li><a href="list_staff.php">Staff list</a></li>
            <li><a href="search_staff.php">Staff Search</a></li>       
           

         </ul>
        </div>
        

</header>

    <div class="container">
    <div class="head-bottom flex">
    
	<?php include ("header.php");?>
    <h2 style="color: white" align="center"> Delete a record </h2>
    <div class="table">
	<?php
//look for a valid user id, either through GET or POST
if ((isset($_GET['id'])) && (is_numeric($_GET['id']))){
	$id = $_GET['id'];
}elseif ((isset($_POST['id'])) && (is_numeric($_POST['id']))){
	$id = $_POST['id'];
}else{
	echo '<p class = "error">This page has been accessed in error.</p>';
	exit();
}


if ($_SERVER ['REQUEST_METHOD'] == 'POST')
{
	if ($_POST['sure'] == 'Yes')
	{
		//delete the record
		//make the query

		$q= "DELETE FROM staff WHERE staff_id=$id LIMIT 1";

		$result= @mysqli_query ($connect, $q);

		if (mysqli_affected_rows ($connect) ==1)
			{
				//if there was no problem
				//display message

				echo '<h3> The user has been deleted.</h3>';
			}

		else
		{
			//display error message
			echo '<p class="error">The record could not be deleted.<br>Probably because it does not exist or due to system error.<p>';

			//debugging message
			echo '<p>'.mysqli_error($connect).'<br>Query:'.$q.'</p>';
		}
	}

	else
	{
		echo '<h3>The user has NOT been deleted.</h3>';
	}
}

else 
{
	//display the form
	//retrieve the member's data

	$q = "SELECT name FROM staff WHERE staff_id=$id";

	$result =@mysqli_query ($connect, $q);

	if (mysqli_num_rows($result) == 1)
	{
		//get the member's data
		$row = mysqli_fetch_array ($result, MYSQLI_NUM);
		echo "<h3>Are you sure want to permanently delete $row[0]? </h3>";

		echo '<form action="delete_staff.php" method="post">

		<p><input id = "submit-no" type = "submit" name="sure" value="Yes">

		<input id ="submit-no" type="submit" name="sure" value="No"><p>

		<input type="hidden" name="id" value="'.$id.'">

		</form>';
	}

	else 
	{
		echo'<p class="error"> This page has been accessed in error.</p>';

		echo '<p>$nbsp;</p>';
	}
}

mysqli_close($connect);

?>


</div>

    </div>
</body>
</html>