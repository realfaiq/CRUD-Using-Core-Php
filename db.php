<?php

    $db_name = 'CRUD';
    $db_user = 'root';
    $db_host = 'localhost';
    $db_password = '1947@Pakistan';

    $connection = mysqli_connect($db_host, $db_user, $db_password, $db_name);

    if(!$connection){
        echo "Connection Failed!";
    }

?>