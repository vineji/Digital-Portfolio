<?php
session_start();
echo $_SESSION['email'];

if (!isset($_SESSION['email'])){

    header('Location: login.php');
    exit();
}
else{
    header('Location: addBlog.php');
    exit();

}
?>
