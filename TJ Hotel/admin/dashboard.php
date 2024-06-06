<?php
    require('inc/essenials.php');
    adminLogin();
    //session_regenerate_id(true);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel-Dashboard</title>
    <?php require('inc/links.php')?>
</head>
<body class="bg-white">
  
    <?php require('inc/header.php');?>

     <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                 Vel optio doloremque laborum fuga aliquid praesentium, 
                 iure quasi voluptate, dolorem rem, odit expedita dolore 
                 similique incidunt deserunt culpa at amet aut itaque quas
                  maiores. Totam ullam quas illum dolores! Impedit fuga 
                  dolorum ex eaque distinctio saepe fugit ipsum a pariatur
                   enim?
            </div>
        </div>
     </div>

   <?php require('inc/scripts.php')?>
</body>
</html>