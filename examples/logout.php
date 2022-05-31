<?php
    // Didi Santoso
    session_start();

    if(isset($_SESSION['name'])){
        unset($_SESSION['name']);
    }
    if(isset($_SESSION['userId'])){
        unset($_SESSION['userId']);
    }
    

    header("location: ../index.php")

?>