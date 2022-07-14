<?php 
$title = "New Event - OHD"; // Title of the page
session_start();
if(!isset($_SESSION['ID_User'])){
    header('Location: ../../');
}
else{
    if($_SESSION['Type_User'] == 0){
        header('Location: ./Dashboards/index.php');
    }
}

if(isset($_GET['EventName'])){
    $dbh = new PDO('mysql:host=localhost;dbname=ohd', 'root');
    $query = "INSERT INTO events (Date, Nom) VALUES ('".$_GET['EventDate']."', '".$_GET['EventName']."')";
    $sth = $dbh->query($query);

}

ob_start(); // Start the buffer
?>

<form action="./newEvent.php" method="get">
    <input type="text" name="EventName" placeholder="Nom de l'Evenement" required>
    <input type="date" name="EventDate" placeholder="Date de l'Evenement" required> 
    <input type="submit" value="Ajouter">
</form>

<?php $content = ob_get_clean(); // Get the content of the buffer and clean the buffer ?>

<?php require('../../Template/template.php'); // Include the template ?>