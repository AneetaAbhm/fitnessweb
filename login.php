<?php

$servername = "localhost";

$username="root";

$passsword ="";

$database_name = "login";

$conn = mysqli_connect($servername,$username,$passsword,$database_name);

if(!$conn)
{
    die("connection Failed: ".mysqli_connect_error());

}


// Registration process
if (isset($_POST['register'])) {
    // Sanitize user input
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $phoneno = $_POST['phoneno'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
   
    // Insert user data into the database
    $sql = "INSERT INTO users (fname,lname,phoneno,email,username,password) VALUES ('$fname','$lname','$phoneno','$email','$username', '$password')";
    
    if (mysqli_query($conn, $sql)) {
        echo "Registration successful. Please login.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Login process
if (isset($_POST['login'])) {
    // Sanitize user input
    $username = ($_POST['username']);
    $password = ($_POST['password']);
    
    // Check if the user exists in the database
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) == 1) {
        echo "Login successful.";
        // Set session variable after successful login
$_SESSION['user_id'] = $row['username']; // Assuming 'user_id' is the column name in the users table

        // Redirect to the dashboard or another page
    } else {
        echo "Invalid username or password.";
    }
}

// Close the database connection
mysqli_close($conn);
header("location:home.html");
?>


