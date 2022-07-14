<?php 
session_start();
if(!isset($_SESSION['ID_User'])){
    header('Location: ./connect.php');
}
$title = "Dashboard - OHD"; // Title of the page
$dbh = new PDO('mysql:host=localhost;dbname=ohd', 'root');

$sql = "SELECT * FROM users";
$sth = $dbh->query($sql);
$userAtEvents = array();
foreach($sth as $row){
    $sql = "SELECT events.ID as ID_Event, events.Nom as EventName, events.Date as EventDate, presenceUser.ID_User as User FROM `events` 
        LEFT JOIN (
            SELECT * FROM `presence` WHERE ID_User = 1) presenceUser
        ON events.ID = presenceUser.ID_Events
        ORDER BY events.Date";
    array_push($userAtEvents,$dbh->query($sql));
}




function checkForPresence($row, $isColorFunction){ // Function that checks if the user is present or not for the event
    if($isColorFunction == true){ // If the function is called to check the color of the event
        return ($row["User"] != NULL) ? "#99FF99" : "#FF9999"; // If the user is present, return green, else return red
    }
    else{  
        return ($row["User"] != NULL) ? "Présent" : "Absent"; // If the user is present, return "Présent", else return "Absent"
    }
}



ob_start(); // Start the buffer
?>


<table>
    <tr class="tableHead">
        <th>Nom de l'Evenement</th>
        <th>Date de l'Evenement</th>
        <th>Heure de l'Evenement</th>
        <th>Presence</th>
    </tr>
    <?php 
    foreach($userAtEvents as $userAtEvent){
        foreach($userAtEvent as $row) { ?>
            <tr>
                <td><?= $row["EventName"]?></td>
                <td><?= substr($row["EventDate"],0,10)?></td>
                <td><?= substr($row["EventDate"],11,5)?></td>
            </tr>
    <?php }
    } ?>
</table>



<?php $content = ob_get_clean(); // Get the content of the buffer and clean the buffer ?>

<?php require('../../Template/template.php'); // Include the template ?>