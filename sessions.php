<?php

    session_start();

    function errorMessage(){
        if(isset($_SESSION["errorMessage"])){
            $output = "<div class=\"alert alert-danger\">";
            $output .= htmlentities($_SESSION["errorMessage"]);
            $output .= "</div>";
            $_SESSION["errorMessage"] = null;
            return $output;
        }
    }

    function successMessage(){
        if(isset($_SESSION["SuccessMessage"])){
            $output = "<div class=\"alert alert-success\">";
            $output .= htmlentities($_SESSION["SuccessMessage"]);
            $output .= "</div>";
            $_SESSION["SuccessMessage"] = null;
            return $output;
        }
    }

    function redirectTo($location){
        header("Location:".$location);
        exit;
    }

?>