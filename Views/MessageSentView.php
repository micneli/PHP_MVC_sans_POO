<?php
include('header.php');
session_start();
// var_dump($_SESSION, $_SESSION['email']);
?>

<h1>Message sent</h1>
<p>A zipped file has been sent to the following email address: <?php echo $_SESSION['email']; ?></p>
