<?php
    session_start();
    if($_SESSION["sid"] !== "login") {
        header("Location: login.php");
    }

    function isLogin() {
        if(isset($_SESSION["sid"]) && $_SESSION["sid"] === "login") {
            return true;
        }
        return false;
    }
?>