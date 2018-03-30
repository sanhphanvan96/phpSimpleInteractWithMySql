<?php
header("Content-Type: text/html;charset=UTF-8");
// khai bao ket noi
$link = mysqli_connect("localhost", "root") or die("Cannot connect to database".mysqli_error());
echo "sucessfully !";

// cho db de lam viec
$data_selected = mysqli_select_db($link, "DULIEU");
mysqli_query($link, "set names 'utf8'");
$rs = mysqli_query($link, "SELECT * FROM Table1");
echo "<pre>";
print_r($rs);
echo "</pre>";

echo "<pre>";
foreach ($rs as $key => $value) {
	print_r($value);
};
echo "</pre>";
echo "OK";

?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title></title>
</head>
<body>
	<table border="1">
		<caption>Table</caption>
		<thead>
			<tr>
				<th>Mã số</th>
				<th>Họ Tên</th>
				<th>Ngày Sinh</th>
				<th>Nghề Nghiệp</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($rs as $key => $value) {
				echo "<tr>";
				echo "<td>".$value['maso']."</td>";
				echo "<td>".$value['hoten']."</td>";
				echo "<td>".$value['ngaysinh']."</td>";
				echo "<td>".$value['nghenghiep']."</td>";
				echo "</tr>";
			} ?>
		</tbody>
	</table>
</body>
</html>