<?php
   require_once "session.php";

    if(isset($_POST["submit"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        // Nếu chưa nhập đủ thông tin thì về lại trang đăng nhập
        if($username == "" ||  $password == "") {
            header("Location: login.php");
        } else {
            // Truy vấn tìm có phải là admin không
            $sql = "SELECT * FROM admin WHERE username='".$username."' AND password='".$password."' LIMIT 1";
            $res = mysqli_query($connect, $sql);
            if (mysqli_num_rows($res) > 0) {
                // Set đăng nhập thành công và chuyển hướng đến trang chủ
                setIsLogin();
                setLoginFlash("Đăng nhập thành công!");
                header("Location: default.php");
            } else {
                header("Location: login.php");
            }
            $connect->close();
        }
    }
?>