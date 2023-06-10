<?php
//For Including Config.php
include 'login.php';
//Posting Data
if (isset($_POST['submit'])) {
    //Getting Values From Form

    

   
function test_input($data)
{
    // Removing extra spaces
    $data = trim($data);
    //Removing Slashes
    $data = stripslashes($data);
    //Removing Special Charachters
    $data = htmlspecialchars($data);
    return $data;
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link rel="stylesheet" href="style.css">
    <title>Profile</title>

</head>

<body>
    <!--Form For Inputing Data -->
    <form action="regis.html" method="post" enctype="multipart/form-data">
        <label for="fname">First name: </label>
        <input type="text" name="fname" id="fname">
        <br>
        <label for="lname">Last Name: </label>
        <input type="text" name="lname" id="lname">
        <br>
        <label for="phoneno">Phone: </label>
        <input type="text" name="phoneno" id="phoneno">
        <br>
        <label for="email">Email: </label>
        <input type="text" list="email" name="email" id="email">

        <br>
        <label for="username">Username: </label>
        <input type="text" name="username" id="username">
        <br>
        <label for="password">Password : </label>
        <input type="text" name="password" id="password">
        <br>
       
        <input  role="button" type="submit" name="submit" value="Submit">
    </form>
    
    

   
</body>

</html>
