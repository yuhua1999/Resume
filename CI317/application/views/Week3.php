<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
	<style type="text/css">
	</style>
</head>
<body>
	<form class="" action="week3/select" method="post">
		查詢會員帳號： <input type="text" name="select_account" placeholder="留白，則查看全部資料" > <button type="submit" name="account">送出</button><br>
		<br>
	</form>
	<hr>
	<form class="" action="week3/add" method="post">
		新增會員帳號：<br>
		<input type="text" name="account" placeholder="輸入新帳號" ><br>
		<input type="text" name="name" placeholder="輸入姓名" ><br>
		<input type="password" name="password" placeholder="輸入密碼" ><br>
		<input type="password" name="confirm_password" placeholder="再次確認密碼" ><br>
		<button type="submit" >送出</button><br>
	</form>
	<hr>
	<form class="" action="week3/update" method="post">
		修改會員姓名：<br>
		<input type="text" name="account" placeholder="輸入帳號" ><br>
		<input type="text" name="name" placeholder="輸入新姓名" ><br>
		<button type="submit" >送出</button><br>
	</form>
	<hr>
	<form class="" action="week3/db_delete" method="post">
		刪除會員帳號：<br>
		<input type="text" name="account" placeholder="輸入帳號" ><br>
		<button type="submit" >送出</button><br>
	</form>
</body>
</html>
