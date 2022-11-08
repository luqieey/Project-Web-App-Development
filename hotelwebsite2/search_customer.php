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

    <?php include("header.php"); ?>


         <form action="record_customer.php" method="post">

            <h1 style="color:white" align="center">Search Record Customer </h1>
            <p style="color:white" align="center" ><label class="label" for="id_c">ID Number : </label>
               <input id="id_c" type="text" name="id_c" size="30" maxlength="30"
               value="<?php if (isset($_POST['id_c'])) echo $_POST['id_c']; ?>"/></p><br>

	<p align="center" ><input id="submit" type="submit" name="submit" value=" SEARCH " /></p>
</form>

</body>
</html>
    </div>