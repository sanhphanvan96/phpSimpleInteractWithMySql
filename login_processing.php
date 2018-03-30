<?php
   require_once "session.php";

    if(isset($_POST["submit"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];

        if($username == "" ||  $password == "") {
            header("Location: login.php");
        } else {
            $sql = "SELECT * FROM admin WHERE username='".$username."' AND password='".$password."' LIMIT 1";
            // $res = $connect->query($sql);
            $res = mysqli_query($connect, $sql);
            if (mysqli_num_rows($res) > 0) {
                header("Location: default.php");
                $_SESSION["sid"] = "login";
                setLoginFlash("Đăng nhập thành công!");
            } else {
                header("Location: login.php");
            }
            $connect->close();
        }
    }
?>