<?php
$servername = "********";
$username = "********";
$password = "********";
$dbname = "********";

//connects to the server provided the information above.
$conn = new mysqli($servername, $username, $password, $dbname);

$S_SESSION = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // this takes in the email and password from the form submitted with id email and password from the html file.
    $email = $_POST['email'];
    $password = $_POST['password'];

    // this matches every variable in the email column to $email. It does the same with password.
    //$result is a class or an object where all the information from the query is stored
    $result = mysqli_query($conn, "SELECT * FROM USERS WHERE email='$email' AND password='$password'");

    if (mysqli_num_rows($result) == 1) {  // checks if the email and password is from only one row (the same row)
        
        session_start();// starts the blog session
        $_SESSION['email'] = $email;
        header('Location: addBlog.php');

    } else {
        // if the login is unsuccessful then it returns the user to the login page
        header('Location: login.php');
    }
}


mysqli_close($conn);// closes the connection with the database

?>
