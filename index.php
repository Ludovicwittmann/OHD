<?php 
$title = "OHD";	// Title of the page
ob_start(); // Start the buffer
?>




<?php $content = ob_get_clean(); // Get the content of the buffer and clean the buffer ?>

<?php require('./Template/templateHome.php'); // Include the template ?>
