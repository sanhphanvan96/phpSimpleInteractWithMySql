<?php
    session_start();
    // if($_SESSION["sid"] !== "login") {
    //     header("Location: login.php");
    // }

    function isLogin() {
        if(isset($_SESSION["sid"]) && $_SESSION["sid"] === "login") {
            return true;
        }
        return false;
    }

    function setLoginFlash($flash = "") {
        $_SESSION["login_flash"] = $flash;
    }
    function getLoginFlash() {
        $flash = "";
        if(isset($_SESSION["login_flash"]))
            $flash = $_SESSION["login_flash"];
        // Login flash chỉ hiển thị một lần => xóa flash đi.
        $_SESSION["login_flash"] = null;
        return $flash;
    }
?>