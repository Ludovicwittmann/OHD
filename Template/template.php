<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?= $title ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../../resources/Styles/style.css">
        <link rel="stylesheet" href="../../resources/Styles/burgerMenu.css">
        <script src="https://kit.fontawesome.com/0977f19a3a.js" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="../../resources/JS/main.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <header>
            <nav>
                <div class="navbar">
                    <div class="container nav-container">
                        <input class="checkbox" type="checkbox" name="" id="" />
                        <div class="hamburger-lines">
                            <span class="line line1"></span>
                            <span class="line line2"></span>
                            <span class="line line3"></span>
                        </div>
                        <div class="logo">
                            <h1>OHD</h1>
                        </div>
                        <div class="menu-items">
                            <li><a href="../../index.php">Accueil</a></li>
                            <li><a href="#">L'Orchestre</a></li>
                            <li><a href="../connect.php">Espace Musicien</a></li>
                            <li><a href="#">Contact</a></li>
                        </div>
                    </div>
              </nav>
        </header>
        <main>
            <?= $content ?>
        </main>
        <footer>
        </footer>
    </body>
</html>