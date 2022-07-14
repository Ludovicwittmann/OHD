<?php 
session_start();
if(!isset($_SESSION['ID_User'])){
    header('Location: ./connect.php');
}


$title = "Dashboard - OHD"; // Title of the page
$dbh = new PDO('mysql:host=localhost;dbname=ohd', 'root');



if(isset($_GET['ID_Event'])){
    $ID=$_GET['ID_Event'];
    $sql = "SELECT * FROM presence WHERE ID_Events = $ID AND ID_User = ".$_SESSION['ID_User'];
    $sth = $dbh->query($sql);
    if($sth->rowCount() == 0){
        $queryInsert = "INSERT INTO presence (ID_Events, ID_User) VALUES ($ID, 
        (SELECT ID FROM users WHERE Email = '".$_SESSION['Username']."'))";
        $sthInsert = $dbh->query($queryInsert);
    }else{
        $queryDelete = "DELETE FROM presence WHERE ID_Events = $ID AND ID_User = '".$_SESSION['ID_User']."'";
        $sthDelete = $dbh->query($queryDelete);
    }
    
}


$sql = "SELECT events.ID as ID_Event, events.Nom as EventName, events.Date as EventDate, presenceUser.ID_User as User FROM `events` 
        LEFT JOIN (
            SELECT * FROM `presence` WHERE ID_User = 1) presenceUser
        ON events.ID = presenceUser.ID_Events
        ORDER BY events.Date";
$sth = $dbh->query($sql);



function checkForPresence($row, $isColorFunction){ // Function that checks if the user is present or not for the event
    if($isColorFunction == true){ // If the function is called to check the color of the event
        return ($row["User"] != NULL) ? "#99FF99" : "#FF9999"; // If the user is present, return green, else return red
    }
    else{  
        return ($row["User"] != NULL) ? "Présent" : "Absent"; // If the user is present, return "Présent", else return "Absent"
    }
}



ob_start(); // Start the buffer

if($_SESSION['Type_User'] == 1){  // If the user is an admin ?>
    <a href="./newEvent.php"><button>Nouvel Evenement</button></a>

<?php }
?>


<table>
    <tr class="tableHead">
        <th>Nom de l'Evenement</th>
        <th>Date de l'Evenement</th>
        <th>Heure de l'Evenement</th>
        <th>Presence</th>
    </tr>
    <?php foreach($sth as $row) { ?>
    <tr>
        <td><?= $row["EventName"]?></td>
        <td><?= substr($row["EventDate"],0,10)?></td>
        <td><?= substr($row["EventDate"],11,5)?></td>
        <td id="td">
            <form action="./index.php">
                <input type="hidden" name="ID_Event" value=<?= $row["ID_Event"]?>>
                <input type="submit" value=<?= checkForPresence($row, false)?> class="buttonPresence" style="background-color:<?= checkForPresence($row, true)?>;">
            </form>
        </td>
    </tr>
    <?php } ?>
</table>



<?php $content = ob_get_clean(); // Get the content of the buffer and clean the buffer ?>

<?php require('../../Template/template.php'); // Include the template ?>