<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" 
    integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    
    <title>edit page</title>
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

    <?php include("header.php"); ?>

            <h2 style="color:white" align="center"> Search Result </h2>

            <?php

            $id = $_POST['staff_id'];
            $id = mysqli_real_escape_string($connect,$id);

            $q = "SELECT staff_id, name, phone_num, email, position, password FROM staff WHERE staff_id = '$id' ORDER BY staff_id";

            $result = @mysqli_query ($connect,$q);

            if($result) {
               echo '<table class="center" style="color: white" border="20"  >
               <tr><td><b> ID </b></td>
               <td><b> Name </b></td>
               <td><b> Phone Num </b></td>
               <td><b> email </b></td>
               <td><b> position </b></td>
               <td><b> password </b></td>
               </tr>';

               //fetch and display record
               while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
                  echo '<tr align="center">
                  <td>' .$row['staff_id']. '</td>
                  <td>' .$row['name']. '</td>
                  <td>' .$row['phone_num']. '</td>
                  <td>' .$row['email']. '</td>
                  <td>' .$row['position']. '</td>
                  <td>' .$row['password']. '</td>
                  </tr>';
               }
               echo '</table>';
               mysqli_free_result($result);
            }  else {
               echo '<p class = "error"> If no record is shown, this is because you had an incorrect or missing entry in search form. <br> Click the back button on the browser and try again.</p>';
               echo '<p>' .mysqli_error($connect). '<br><br>Query : '.$q.'</p>';
            }
            mysqli_close($connect);
            ?>

