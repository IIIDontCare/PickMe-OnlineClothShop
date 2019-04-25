<!DOCTYPE html>
<html>
<head>
<title>LOGIN | 百裡挑衣</title>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="pickmestyle.css" type="text/css">  
<link rel="Shortcut Icon" type="image/x-icon" href="pickmeicon.ico" />
<link rel="stylesheet" href="stylew3.css">
<link rel="stylesheet" href="stylebs.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>

<body>
	<div class="body-content" >
	<!-- 設計邊框 文字效果-->
	
	<br><br><br><br>
		<?php
		session_start();
		
				include ("connMySQL.php");
				$name = $_POST['name'];
				$pw = $_POST['pw'];
				if(isset($name)&&isset($pw)){
							$sql ="SELECT name,pw FROM member WHERE name='$name'";                     
							$result = $conn->query($sql);
								  if($result->num_rows > 0){
								 while($row = $result->fetch_assoc()){
									if($row["name"]==$name&&$row["pw"]==$pw){
										$sql2=sprintf("SELECT isowner FROM member WHERE name='$name'");
										$result2=mysqli_query($conn,$sql2);
										if ($result2->num_rows > 0) {
											$row=mysqli_fetch_array($result2,MYSQLI_ASSOC);
											$_SESSION['isowner'] = ($row["isowner"]);
										} 
										$_SESSION['username'] = $name;
										echo '<meta http-equiv=REFRESH CONTENT=1;url=pickme.php>';
									}else{
										echo "LOGIN FAILED！";
									}
							}}else{
								echo "DATABASE CONNECT FAILED";
							}
				}else{
					echo "PLEASE ENTER USERID AND PASSWORD";
				}
		?>
	</div>
</body>
</html>