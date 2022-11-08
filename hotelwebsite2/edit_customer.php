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


    <?php include ("header.php");?>

<?php
         //look for a valid user id, either through GET or POST
         if ((isset($_GET['id'])) && (is_numeric($_GET['id']))) {
            $id = $_GET['id'];
         } elseif ((isset($_POST['id'])) && (is_numeric($_POST['id']))) {
            $id = $_POST['id'];
         } else {
            echo '<p style="color: white" align="center" class = "error"> This page has been accesses in error.</p>';
            exit();
         }

         if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $error = array();

            //look for firstname
            if(empty($_POST['name_c'])) {
               $error[] = 'You forgot to enter the First Name.';
            } else {
               $n = mysqli_real_escape_string($connect, trim($_POST['name_c']));
            }

            //look for lastname
            if(empty($_POST['checkin_c'])) {
               $error[] = 'You forgot to enter the Ic';
            }  else {
               $l = mysqli_real_escape_string($connect, trim($_POST['checkin_c'])) ;
            }

            //look for Insurance Number
            if (empty($_POST['checkout_c'])) {
               $error [] = 'You forgot to enter the Phone Number.';
            }  else {
               $i = mysqli_real_escape_string($connect,trim($_POST['checkout_c'])) ;
            }


            //look for Diagnose
            if (empty($_POST['roomtype_c'])) {
               $error [] = 'You forgot to enter the Address.';
            }  else {
               $d = mysqli_real_escape_string($connect,trim($_POST['roomtype_c'])) ;
            }

            if (empty($_POST['contact_c'])) {
                $error [] = 'You forgot to enter the record.';
             }  else {
                $r = mysqli_real_escape_string($connect,trim($_POST['contact_c'])) ;
             }


            //if no problem occured
            if(empty($error)) {

               $q = "SELECT id_c FROM customer WHERE checkout_c = '$i' AND id_c != $id";

               $result = @mysqli_query($connect,$q);

               if(mysqli_num_rows($result) == 0) {
                  $q = "UPDATE customer SET name_c = '$n', checkin_c = '$l', checkout_c = '$i', roomtype_c = '$d', contact_c='$r' WHERE id_c = '$id' LIMIT 1";

                  $result = @mysqli_query($connect,$q);

                  if(mysqli_affected_rows($connect) == 1) {

                     echo '<h3 style="color: white" align="center" style="color:white" align="center"> The user has been edited</h3>';
                  } else {
                     echo '<p style="color: white" align="center" class ="error"> The user has no be edited due to the system error.We apologize for any inconvenience.</p>';
                     echo '<p>' .mysqli_error($connect). '<br> query : ' .$q. '</p>';     
                  }

               }  else {
                  echo '<p style="color: white" align="center" class = "error"> The ic no has already been registered</p>';
               }
            }  else {
               echo '<p style="color: white" align="center" class = "error"> The following error (s) occured : <br>';
               foreach ($error as $msg) 
               {
                  echo " -$msg<br> \n";   
               }
               echo '</p><p style="color: white" align="center"> Please try again.</p>';
            }
         }

         $q = "SELECT name_c, checkin_c, checkout_c, roomtype_c,contact_c FROM customer WHERE id_c = $id";
         $result = @mysqli_query($connect,$q);

         if(mysqli_num_rows($result) == 1) {
            //get patient information
            $row = mysqli_fetch_array($result, MYSQLI_NUM);
            //create the form
            echo '<form action = "edit_customer.php" method = "post">
            <p style="color: white" align="center"><label class = "label" for = "name_c"> Name : </label><br>
            <input id = "name_c" type = "text" name = "name_c" size = "30" maxlength = "30" value = "'.$row[0].'"></p><br>

            <p style="color: white" align="center"><label class = "label" for = "checkin_c"> CheckIn Date : </label><br>
            <input id = "checkin_c" type = "text" name = "checkin_c" size = "30" maxlength = "30" value = "'.$row[1].'"></p><br>

            <p style="color: white" align="center"><label class = "label" for = "checkout_c"> CheckOut Date :</label><br>
            <input id = "checkout_c" type = "text" name = "checkout_c" size = "30" maxlength = "30" value = "'.$row[2].'"></p><br>

            <p style="color: white" align="center"><label class = "label" for = "roomtype_c"> Roomtype : </label><br>
            <input id = "roomtype_c" type = "text" name = "roomtype_c" size = "30" maxlength = "30" value = "'.$row[3].'"></p><br>

            <p style="color: white" align="center"><label class = "label" for = "contact_c"> Contact : </label><br>
            <input id = "contact_c" type = "text" name = "contact_c" size = "30" maxlength = "30" value = "'.$row[4].'"></p><br>


            <br><p align="center"><input id = "submit" type = "submit" name = "submit" value = "   Edit   "></p>

            <br><input type = "hidden" name = "id" value = "'.$id.'"/>
            
            </form>';


         } else {
            echo '<p class = "error"> This page has been accessed in error.</p>';
         }

         mysqli_close($connect);

         ?>


        
    </div>
    </div>
</body>
</html>