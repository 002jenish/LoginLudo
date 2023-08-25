<?php
    session_start(); 
    include "connection.php";

    if (isset($_POST['userid']) && isset($_POST['password'])
        && isset($_POST['fname']) && isset($_POST['email']) && isset($_POST['cpassword'])) {

        function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
        }

        $userid = validate($_POST['userid']);
        $pass = validate($_POST['password']);
        $cpassword = validate($_POST['cpassword']);
        $fname = validate($_POST['fname']);
        $email = validate($_POST['email']);

        $user_data = 'userid='. $userid. '&fname='. $fname. '&email='. $email;

        if (empty($userid)) {
            header("Location: signup.php?error=User ID is required&$user_data");
            exit();
        } else if (empty($pass)) {
            header("Location: signup.php?error=Password is required&$user_data");
            exit();
        } else if (empty($cpassword)) {
            header("Location: signup.php?error=Confirm Password is required&$user_data");
            exit();
        } else if (empty($fname)) {
            header("Location: signup.php?error=Full Name is required&$user_data");
            exit();
        } else if (empty($email)) {
            header("Location: signup.php?error=Email is required&$user_data");
            exit();
        } else if ($pass !== $cpassword) {
            header("Location: signup.php?error=The confirmation password does not match&$user_data");
            exit();
        } 
        else 
        {
            // Hashing the password (Note: Use a secure hashing method)
            $pass = md5($pass);

            $sql = "SELECT * FROM test_user WHERE user_id='$userid'";
            $sql2 = "SELECT * FROM test_user WHERE email='$email'";
            $result = mysqli_query($conn, $sql);
            $result2 = mysqli_query($conn, $sql2);
            
            if (mysqli_num_rows($result) > 0) {
                header("Location: signup.php?error=User ID is taken, try another&$user_data");
                exit();
            }
            else if (mysqli_num_rows($result2) > 0) {
                header("Location: signup.php?error=Email-Id is taken, try another&$user_data");
                exit();
            }
            else 
            {
                $sql3 = "INSERT INTO test_user(user_id, password, fname, email) VALUES('$userid', '$pass', '$fname', '$email')";
                $result3 = mysqli_query($conn, $sql3);

                if ($result3) 
                {
                    header("Location: signup.php?success=Your account has been created successfully");
                    exit();
                } 
                else 
                {
                    header("Location: signup.php?error=Unknown error occurred&$user_data");
                    exit();
                }
            }
        }
    } 
    else
    {
        header("Location: signup.php");
        exit();
    }
?>
