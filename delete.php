<?php
    // connect to the database
    require_once "connect_db.php";

    // confirm that the "id" variable has been set
    if (isset($_GET["id"])) {
        // get the "id" variable from the URL
        $maso = $_GET["id"];
        
        // delete record from database
        $sql = "DELETE FROM table1 WHERE maso = '".$maso."' LIMIT 1";
        if ($connect->query($sql) === TRUE) {
            
        } else {
            echo "Error updating record: " . $connect->error;
        }
        $connect->close();

        // redirect user after delete is successful
        header("Location: default.php");
    } else {
    // if the 'id' variable isn't set, redirect the user
        header("Location: default.php");
    }
?>