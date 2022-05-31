<?php
    // M. Ilham, Rio Fernando
    function access($rank, $redirect = true){
        if(isset($_SESSION["ACCESS"]) && !$_SESSION["ACCESS"]["PEMIMPIN"]){
            if($redirect){
                header("Location: denied.php");
                die;
            }
            return false;
        }
        return true;
    }

    $_SESSION["ACCESS"]["PEMIMPIN"] = isset($_SESSION['rank']) && $_SESSION['rank'] == "pemimpin";
    $_SESSION["ACCESS"]["KARYAWAN"] = isset($_SESSION['rank']) && $_SESSION['rank'] == "karyawan";

?>