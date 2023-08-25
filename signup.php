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
            <button onclick="window.location.href='./login.php';" class="login_popup">Login</button>
        </nav>
    </header>
    <div class="Swrapper">
        <span class="iconClose">
            <ion-icon name="close-outline"></ion-icon>
        </span>

        <div class="loginForm">
            <h2>Sign-Up</h2>
            <?php 
                if (isset($_GET['error'])) 
                { ?>
     		        <p class="error"><?php echo $_GET['error']; ?></p>
     	        <?php 
                } 
            ?>

            <?php 
                if (isset($_GET['success'])) 
                { ?>
                    <p class="success"><?php echo $_GET['success']; ?></p>
                <?php
                 } 
            ?>
            <form action="signuplogic.php" method="post" autocomplete="off">
                <div class="inputBox">
                    <span class="icon"><ion-icon name="person"></ion-icon></span>
                    <?php 
                        if (isset($_POST['name'])) 
                        { ?>
                            <input type="text" name="fname" id="fname" placeholder="Name" required autocomplete="off"
                            value="<?php echo $_GET['name']; ?>"><br>>
                        <?php 
                        }
                        else
                        { ?> 
                            <input type="text" name="fname" placeholder="Name" autocomplete="off"><br>
                        <?php 
                        }
                    ?>
                    <!-- <label>Name</label> -->
                </div>
                <div class="inputBox">
                    <span class="icon"><ion-icon name="mail-open"></ion-icon></span>
                    <?php 
                        if (isset($_POST['email'])) 
                        { ?>
                            <input type="email" name="email" id="email" placeholder="Email address" required autocomplete="off"
                            value="<?php echo $_GET['email']; ?>">
                        <?php 
                        } 
                        else 
                        { ?>
                            <input type="email" name="email" placeholder="Email" autocomplete="off"><br>
                        <?php 
                        } 
                    ?>
                    <!-- <label>Email</label> -->
                </div>

                <div class="inputBox">
                    <span class="icon"><ion-icon name="person-circle"></ion-icon></span>
                    <?php 
                        if (isset($_GET['userid'])) 
                        { ?>
                            <input type="text" name="userid" id="user" placeholder="User-Id" required autocomplete="off">
                            <div class="input-overlay"></div>
                        <?php 
                        }
                        else
                        { ?>
                            <input type="text" name="userid" id="user" placeholder="User-Id" required autocomplete="off"><br>
                            <div class="input-overlay"></div>
                        <?php 
                        }
                    ?><!-- <input type="text" name="userid" id="user" placeholder="User-Id" required autocomplete="off"><br> -->
                    <!-- <label>User-ID</label> -->
                </div>

                <div class="inputBox">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input type="password" name="password" id="password" placeholder="Password" required autocomplete="off">
                    <div class="input-overlay"></div>
                    <!-- <label>Password</label> -->
                </div>

                <div class="inputBox">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input type="password" name="cpassword" id="cpassword" placeholder="Conform Password" required autocomplete="off">
                    <div class="input-overlay"></div>
                    <!-- <label>Conform Password</label> -->
                </div>
                <button type="submit" class="btn">Register</button>
            </form>
        </div>
    </div>
    <script src="index.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>