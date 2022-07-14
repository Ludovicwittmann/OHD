<?php
session_start();
try {
        
        $dbh = new PDO('mysql:host=localhost;dbname=ohd', 'root');
        $users = $dbh->query("SELECT Email, Password, ID, Type FROM users");
        $CanConnect = false;
        foreach($users as $user) {
                if($user['Email'] == $_POST['Username']) {
                        if($user['Password'] == $_POST['Password']) {
                                $CanConnect = true;
                                $_SESSION['ID_User'] = $user['ID'];
                                $_SESSION['Username'] = $user['Email'];
                                $_SESSION['Type_User'] = $user['Type'];
                                break;
                        }
                }
        }
        if($CanConnect == false) {
                header('Location: ./connect.php?connect=false');
        }
        else{
                header('Location: ./Dashboards/index.php');
        }
} 
catch (PDOException $e) {
    die();
}

?>