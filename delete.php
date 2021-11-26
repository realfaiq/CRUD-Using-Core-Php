<?php
    require('db.php');
    require('sessions.php');

    if(isset($_GET["id"])){
        $idFromURL = $_GET["id"];
        global $connection;
        $query = "DELETE FROM CIUD WHERE id='$idFromURL'";
        $execute = mysqli_query($connection, $query);

        if($execute){
            $_SESSION["SuccessMessage"] = "Record Removed Successfully";
            redirectTo("display.php");
        }else{
            $_SESSION["errorMessage"] = "Something went Wrong!";
            redirectTo("display.php");
        }
    }
?>