<?php

try {
    $dbh = new PDO('mysql:host=localhost;dbname=ohd', 'root');
} catch (PDOException $e) {
    die();
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Connect - OHD</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="./styleConnect.css">
        <!--<link rel="stylesheet" href="../resources/Styles/style.css">-->
        <!--<link rel="stylesheet" href="../resources/Styles/burgerMenu.css">-->
        
        <script src="https://kit.fontawesome.com/0977f19a3a.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="../resources/JS/main.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <header>
            
        </header>
        <main>
            <div id="back">
                <div class="backRight"></div>
                <div class="backLeft"></div>
            </div>

            <div id="slideBox">
                <div class="topLayer">
                    <!--Sign Up-->
                    <div class="left">
                        <div class="content">
                            <h2>Sign Up</h2>
                            <form method="post" onsubmit="return false;">
                                <div class="form-group">
                                    <input type="text" placeholder="Username" />
                                    <input type="text" placeholder="Password" />
                                </div>
                                <div class="form-group"></div>
                                <div class="form-group"></div>
                                <div class="form-group"></div>
                            </form>
                            <button id="goLeft" class="off">Login</button>
                            <button>Sign up</button>
                        </div>
                    </div>
                    <!--Login-->
                    <div class="right">
                        <div class="content">
                            <h2>Login</h2>
                            <?php
                            if(isset($_GET['connect']) && $_GET['connect'] == "false") {
                                echo "<p>Wrong username or password !</p>";
                            }
                            ?>
                            <form action="./TryToconnect.php" method="post">
                                <div class="form-group">
                                    <input type="text" placeholder="Username" id="Username" name="Username"/>
                                    <input type="text" placeholder="Password" id="Password" name="Password"/>
                                </div>
                                <button id="goRight" type="button" class="off">Sign Up</button>
                                <button id="login" type="submit">Login</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <footer>
        </footer>
    </body>
</html>