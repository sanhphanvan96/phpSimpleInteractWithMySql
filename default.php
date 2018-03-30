<?php
	require_once "session.php";
	require_once "connect_db.php";


	// Tạo flash message nếu vừa đăng nhập thành công
	if($_SESSION["flash"] !== "") {
		echo "<p>".$_SESSION["flash"]."</p>";
		$_SESSION["flash"] = "";
	}
	// Tạo câu truy vấn tất cả
    $statement = "SELECT * FROM table1";
	$res = $connect->query($statement);

	require_once "layout/header.php";
?>

	<table border="1">
		<h3>Danh sách Nhân viên</h3>
		<button><a href="./records.php">Tạo mới nhân viên</a></button>
		<br>
		<thead>
			<tr>
				<th>Mã số</th>
				<th>Họ Tên</th>
				<th>Ngày Sinh</th>
				<th>Nghề Nghiệp</th>
				<th>Thao Tác</th>
			</tr>
		</thead>
		<tbody>
		<?php 
			if($res) {
				while ($row = $res->fetch_object()){
					echo "<tr>";
					echo "<td>".$row->maso."</td>";
					echo "<td>".$row->hoten."</td>";
					echo "<td>".$row->ngaysinh."</td>";
					echo "<td>".$row->nghenghiep."</td>";
					echo "<td><button><a href='records.php?id=" .$row->maso."'>Sửa</a></button>";
					echo "<button><a href='delete.php?id=".$row->maso."' onclick='return confirm(`Are you sure you want to delete this item?`);'>Xóa</a></button></td>";
					echo "</tr>";
				}
			} else {
				echo "<p>Dữ liệu trống</p>";
			}
		?>
		</tbody>
	</table>

<?php require_once "layout/footer.php" ?>