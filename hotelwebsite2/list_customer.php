<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" 
    integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    
    <title>list page</title>
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

    <div class="container">
    <div class="head-bottom flex">
       



<?php include ("header.php");?>

<?php
	
//make the query
$q= "SELECT id_c, name_c, checkin_c, checkout_c, roomtype_c, contact_c FROM customer ORDER BY id_c";

//run the query
$result= @mysqli_query ($connect, $q);

//if it ran withut a problem, display the records
if($result)
{
    
	//table heading
	echo 
    '<table class="center" style="color: white" border="1"  ></style>
	<tr align="center"><td><b> Edit </b></td>
	<td><b> Delete </b></td>
	<td><b>Customer ID</b></td>
	<td><b>Name</b></td>
	<td><b>CheckIn Date</b></td>
	<td><b>CheckOut Date</b></td>
	<td><b>Roomtype</b></td></tr>
    <td><b>Contact</b></td>';

	//fetch and print all the records
	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
	{
		echo '<tr align="center">
		<td><a href="edit_customer.php?id=' .$row["id_c"].'">Edit</a></td>
		<td><a href="delete_customer.php?id=' .$row["id_c"].'">Delete</a></td>
		<td>' .$row ['id_c']. '</td>
		<td>' .$row ['name_c']. '</td>
		<td>' .$row ['checkin_c']. '</td>
		<td>' .$row ['checkout_c']. '</td>
		<td>' .$row ['roomtype_c']. '</td>
        <td>' .$row ['contact_c']. '</td>
		</tr>';
	}
	//close the table
	echo '</table>';

	//free up the resources
	mysqli_free_result ($result);
}

//if failed to run
else 
{
	//error message
	echo '<p class ="error">The current customer could not be retrieved. We apologized for any inconvenience.</p>';

	//debugging message
	echo '<p>' .mysqli_error($connect). '<br><br>Query: '.$q. '</p>';
}//end of it ($result)

//close the database connection
mysqli_close($connect);

?>

    </div></div>

</body>

</html>