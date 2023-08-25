<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
    <link rel="stylesheet" href="index.css">
    <title>Index</title>
</head>

<body>
    <header>
        <h2 class="logo">Logo</h2>
        <nav class="navigation">
            <a href="#">Home</a>
            <a href="#">Rules</a>
            <a href="#">Help</a>
            <button class="login_popup" onclick="window.location.href='./signup.php';">Sign-Up</button>
        </nav>
    </header>
    <div class="wrapper">
        <span class="iconClose">
            <ion-icon name="close-outline"></ion-icon>
        </span>

        <div class="loginForm">
            <h2>Login</h2>
            <?php
                if (isset($_GET['error'])) 
                { ?>
     		        <p class="error"><?php echo $_GET['error']; ?></p>
     	        <?php 
                } 
            ?>
            <form action="loginlogic.php" method="post">
                <div class="inputBox">
                    <span class="icon"><ion-icon name="person"></ion-icon></span>
                    <input type="text" name="userid" id="userid" placeholder="User ID" required autocomplete="off">
                    <!-- <label>Email</label> -->
                </div>
                <div class="inputBox">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input type="password" name="password" id="password" placeholder="Password" required>
                    <!-- <label>Password</label> -->
                </div>

                <div class="remember_forgot">
                    <label><input type="checkbox" name="rememberme" id="rememberme">Remember Me</label>
                    <a href="#">Forgot Password?</a>
                </div>
                <button type="submit" class="btn">Login</button>
                <div class="login_registration">
                    <p>don't have an account? <a href="./signup.php" class="register_link">Register</a> </p>
                </div>
            </form>
        </div>
    </div>
    <script src="index.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>