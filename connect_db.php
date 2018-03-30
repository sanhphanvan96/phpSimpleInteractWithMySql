<?php
    //Tạo liên kết tới mysql server
    $connect = mysqli_connect('localhost', 'root') or die("Cannot connect to database".mysqli_error());
    // echo 'Kết nối thành công... ';

    // Chọn db để làm việc
    $data_selected = mysqli_select_db($connect, "DULIEU");

    // Set utf8
    mysqli_query($connect, "set names 'utf8'");

?>