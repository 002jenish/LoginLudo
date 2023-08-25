<?php 
session_start(); 
include "connection.php";

if (isset($_POST['userid']) && isset($_POST['password'])) {

    function validate($data){
       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
       return $data;
    }

    $userid = validate($_POST['userid']);
    $pass = validate($_POST['password']);

    if (empty($userid)) {
        header("Location: login.php?error=User ID is required");
        exit();
    } else if (empty($pass)) {
        header("Location: login.php?error=Password is required");
        exit();
    } else {
        // Hashing the password (Note: Use a secure hashing method)
        $pass = md5($pass);

        $sql = "SELECT * FROM test_user WHERE user_id='$userid' AND password='$pass'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['user_id'] === $userid && $row['password'] === $pass) {
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['fname'] = $row['fname'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['id'] = $row['id'];
                header("Location: home.php");
                exit();
            } else {
                header("Location: login.php?error=Incorrect User ID or password");
                exit();
            }
        } else {
            header("Location: login.php?error=Incorrect User ID or password");
            exit();
        }
    }
    
} else {
    header("Location: login.php");
    exit();
}
