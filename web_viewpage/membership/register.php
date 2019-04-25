<!DOCTYPE html>
<html>
<head>

<title>REGISTER | 百裡挑衣</title>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="pickmestyle.css" type="text/css">  
<link rel="Shortcut Icon" type="image/x-icon" href="pickmeicon.ico" />
<link rel="stylesheet" href="loginstyle.css" type="text/css">  


</head>

<body>

	<div class="body-content" style="width:400px; text-align:center; margin-top:100px; margin-left:450px; background-color:rgba(255, 255, 255, 0.5);padding-bottom:50px;"">
	<!-- 設計邊框 文字效果-->

		<br><br>
		<font color="#e595b3"><b style="font-family:Hastoler; font-size:40pt;">Join Now</b></font>
		
		<!--建立<form>，要求使用者必須填寫ID、帳號、密碼、性別-->
		<form action="" method="post"><!--將資訊傳給自己-->
		<h1 style="font-family:Hastoler; color:black; font-size:20pt;">USERID:  <input type="text" name="name"required style="color:black; height:20pt; background-color:rgba(61, 139, 173, 0.2); border:0;"></h1>
		<h2 style="font-family:Hastoler; color:black; font-size:20pt;">PASSWORD:  <input type="text" name="pw"required style="color:black; height:20pt; background-color:rgba(61, 139, 173, 0.2); border:0;"></h2>
		<h3 style="font-family:Hastoler; color:black; font-size:20pt;">EMAIL:  <input type="text" name="email"required style="color:black; height:20pt; background-color:rgba(61, 139, 173, 0.2); border:0;"></h3>
		
		<div class="selectowner">
			<input type="radio" name="isowner" value="1" id="1">
			<label for="1" style="font-family:SetoFont;  color:black; font-size:20pt;">賣家</label>
			<input type="radio" name="isowner" value="0" id="0">
			<label for="0" style="font-family:SetoFont;  color:black; font-size:20pt;">買家</label>
		</div>
		<br>
		
		<input type="submit" value="JOIN" onClick="window.open('login.html')"><br><br>
		<input type="button" value="ALREADY JOINED" width="300" onClick="location.href = 'login.html';">
		</form>
		
		<?php
		if($_POST){


		$servername = "localhost";//連接伺服器
		$username = "root";
		$password = "0513403";
		$dbname = "groupsix_db";//選擇欲讀取的資料庫名稱


		 $name = $_POST['name'];
		 $pw = $_POST['pw'];
		 $email = $_POST['email'];
		 $isowner = $_POST['isowner'];

		 $conn = new mysqli($servername, $username, $password, $dbname);//create connection
		  $sql=" INSERT into member(name,pw,email,isowner)VALUES('$name','$pw','$email','$isowner')";
		 //利用SQL將會員資料INSERT至資料庫
		$conn->query($sql);

		}
		?>
	</div>
</body>
</html>