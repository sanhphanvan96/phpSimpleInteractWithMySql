<?php
    require_once "connect_db.php";
    require_once "layout/header.php";
    require_once "login_processing.php";

    if(isset($_SESSION["sid"]) && $_SESSION["sid"] === "login") {
        header("Location: default.php");
    }

?>

    <form action="" method="post" name="form" class="myform">
        <strong>User: </strong>
        <input type="text" name="username" value="" required>
        <br>
        <strong>Password: </strong>
        <input type="password" name="password" value="" required>
        <br>
        <input type="submit" value="submit" name="submit">
    </form>

<?php require_once "layout/footer.php"?>