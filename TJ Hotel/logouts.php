
<?php
require('./admin/inc/db_config.php');
require('./admin/inc/essenials.php');

session_start();

// Destroy the session
session_destroy();

// Redirect to the home page or any other desired location
redirect('index.php');

// Check if the user is logged in before showing the logout link/button
if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
    echo '<a href="logout.php">Logout</a>';
    
}

?>


