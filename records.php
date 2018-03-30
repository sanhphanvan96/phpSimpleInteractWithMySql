<?php 
require_once "connect_db.php";
require_once "layout/header.php";

function renderForm($mes = "", $field = "", $id = "") {
    $maso = $id;
    $hoten = "";
    $ngaysinh= "";
    $nghenghiep = "";
    // Nếu id rỗng thì là Tạo mới
    if($id == "" || !$field) {
        echo "<h2>Tạo mới Nhân viên</h2>";
    } else {
        // Chỉnh sửa Nhân viên đã tồn tại
        echo "<h2>Chỉnh sửa nhân viên</h2>";
        $maso = $field["maso"];
        $hoten = $field["hoten"];
        $ngaysinh= $field["ngaysinh"];
        $nghenghiep = $field["nghenghiep"];
    }
?>
    <form action="" method="post" class="myform">
        <strong>ID: *</strong>
        <input type="text" value="<?php echo $maso ?>" name="maso" required>
        <br>
        <strong>Họ tên: *</strong>
        <input type="text" value="<?php echo $hoten ?>" name="hoten" required>
        <br>
        <strong>Ngày sinh: *</strong>
        <input type="text" value="<?php echo $ngaysinh ?>" name="ngaysinh" required>
        <br>
        <strong>Nghề nghiệp: *</strong>
        <input type="text" value="<?php echo $nghenghiep ?>" name="nghenghiep" required>
        <br>
        <input type="submit" name="submit" value="Submit">
    </form>
    <p><?php echo $mes; ?></p>
<?php

} // Kết thúc hàm renderForm

// Nếu url có id thì chỉnh sửa
if(isset($_GET["id"])) {
    $id = $_GET["id"];
    // Nếu chưa submit thì hiển thị form chỉnh sửa
    if(!isset($_POST["submit"])) {
        // Tìm record có id = $id
        $field = mysqli_query($connect, "SELECT * FROM table1 WHERE maso='".$id."'");
        if($field = $field->fetch_assoc()){
            renderForm(null, $field, $id);
            $connect->close();
        } else {
            // Chuyển hướng trang nếu không tìm thấy dữ liệu
            header("Location: default.php");
        }
    } else {
        // Nếu submit thì cập nhật thông tin nhân viên
        $maso = htmlentities($_POST["maso"], ENT_QUOTES);
        $hoten = htmlentities($_POST["hoten"], ENT_QUOTES);
        $ngaysinh = htmlentities($_POST["ngaysinh"], ENT_QUOTES);
        $nghenghiep = htmlentities($_POST["nghenghiep"], ENT_QUOTES);
        // kiểm tra tất cả các trường có null ko
        if($maso == "" || $hoten == "" || $ngaysinh == "" || $nghenghiep == "") {
            // render form với thông báo lỗi
            renderForm("Lỗi: các trường không được để trống!");
        } else {
            // cập nhật giá trị cho nhân viên
            $sql = "UPDATE table1 SET maso='".$maso."', hoten='".$hoten."', ngaysinh='".$ngaysinh."', nghenghiep='".$nghenghiep."' WHERE maso='".$id."'";
            // $sql = "UPDATE table1 SET hoten='Sanh Phan Van', ngaysinh='2018-03-14', nghenghiep='Sinh Vien' WHERE maso='ms02'";
            if ($connect->query($sql) === TRUE) {
                renderForm("Đã cập nhật thông tin nhân viên thành công!");
            } else {
                echo "Error updating record: " . $connect->error;
            }
            $connect->close();
        }
    }
} else {
    // Nếu không có id
    // Nếu submit thì tạo mới nhân viên
    if (isset($_POST['submit'])) {
        $maso = htmlentities($_POST["maso"], ENT_QUOTES);
        $hoten = htmlentities($_POST["hoten"], ENT_QUOTES);
        $ngaysinh = htmlentities($_POST["ngaysinh"], ENT_QUOTES);
        $nghenghiep = htmlentities($_POST["nghenghiep"], ENT_QUOTES);
        // kiểm tra tất cả các trường có null ko
        if($maso == "" || $hoten == "" || $ngaysinh == "" || $nghenghiep == "") {
            // render form với thông báo lỗi
            renderForm("Lỗi: các trường không được để trống!");
        } else {
            // tạo mới nhân viên
            $sql = "INSERT INTO table1 (maso, hoten, ngaysinh, nghenghiep) VALUES 
                ('".$maso."', '".$hoten."', '".$ngaysinh."', '".$nghenghiep."')";
            if ($connect->query($sql) === TRUE) {
                renderForm("Đã tạo mới nhân viên thành công!");
            } else {
                echo "Error updating record: " . $connect->error;
            }
            $connect->close();
        }
    } else {
        // Nếu chưa submit thì render form
        renderForm();
    }
}
?>

<?php require_once "layout/footer.php" ?>