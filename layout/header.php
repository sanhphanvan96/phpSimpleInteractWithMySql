<?php require_once "session.php"; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Simple connect database</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
<h3><a href="./">Trang chủ</a></h3>
<?php
	if(isLogin()) {
		echo '<h4><a href="./logout.php">Đăng xuất</a></h4>';
	}
?>
<div class="container">