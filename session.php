<?php
    session_start();

    function isLogin() {
        if(isset($_SESSION["login"]) && $_SESSION["login"] === true) {
            return true;
        }
        return false;
    }

    function setIsLogin() {
        $_SESSION["login"] = true;
        return true;
    }

    function setLogout() {
        $_SESSION["login"] = false;
        return true;
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