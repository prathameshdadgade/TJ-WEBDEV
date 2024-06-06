<?php

    require('inc/essenials.php');
    session_start();
    session_destroy();
    redirect('index.php');

?>