<?php 
  session_start(); 
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
	unset($_SESSION['isowner']);
  }
?>
<html>
<head>
<title>SHOPPING BAG | 百裡挑衣</title>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="pickmestyle.css" type="text/css">  
<link rel="Shortcut Icon" type="image/x-icon" href="pickmeicon.ico" />
<link rel="stylesheet" href="stylew3.css">
<link rel="stylesheet" href="stylebs.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!-- 音樂 -->
<script type="text/javascript">
	function playPause() {
		var music = document.getElementById('music2');
		var music_btn = document.getElementById('music_btn2');
		if (music.paused){
			music.play();
			music_btn2.src = 'r1.png';
		}
		else{
			music.pause();
			music_btn2.src = 'r2.png'; 
		}
	}
</script>

</head>


<body>

	<!-- 上欄 -->
	<div class="top">
		
		<?php  if (isset($_SESSION['username'])) : //登入狀態?>
    	<!-- <p>Welcome <strong><?php echo $_SESSION['username']; ?></strong>, -->
    	<a class="pointer" href="pickme.php?logout='1'" >logout</a>
		<?php endif ?>
		<?php  if (isset($_SESSION['isowner'])&&($_SESSION['isowner']==1)) ://賣家登入狀態?>
		<a class="pointer" href="manage.php" style="font-family:SetoFont">賣家廣場</a>
		<?php endif ?>
		
		<?php  if (!isset($_SESSION['username'])) : //尚未登入狀態?>
    	<a class="pointer" onClick="location.href='login.html';">Login</a>
		<?php endif ?>
		
		<a class="pointer" href="shopbag.php" style="background-color: #4d4d4d;">Shopping Bag</a>
		
		<!-- 音樂 -->
		<div class="mucon">
			<audio id="music2" src="pickme.mp3" loop="loop"></audio>
			<a href="javascript:playPause();"><img src="r1.png" width="20" height="20" style="background-color:white" id="music_btn2" border="0"></a>
		</div>
		
		<!-- 搜尋 -->
		<form action="search.php" method="post">
			<button type="submit" style="float:right; font-family:SetoFont; font-size:12pt; margin-top:10px;">搜尋</button>
			<input type="text" placeholder="想找甚麼衣服呢?" name="searchtxt" style="float:right; font-family:SetoFont; font-size:12pt; margin:12px 5px;" >
		</form>
		
	</div>
	
	<div id="mainmenu" class="leftcolumn">
			
			<!-- 商標 -->
			<br>
			<img src="pickme.png" class="pointer" height="80" width="250" onClick="location.href = 'pickme.php';">
			<br><br>
			
			<!-- 商品 -->
			<div id="item">
			<a class="bar-item button pointer" onClick="location.href='newarrivals.php';">~NEW ARRIVALS~</a>
			<a class="bar-item button pointer" onClick="location.href='top20.php';">TOP 20</a>
			<b>Shop by Categories</b>
<a class="bar-item button pointer" onClick="location.href='tops.php';">Tops</a>
			<a class="bar-item button pointer" onClick="location.href='bottoms.php';">Bottoms</a>
			<a class="bar-item button pointer" onClick="location.href='dresses.php';">Dresses</a>
			<a class="bar-item button pointer" onClick="location.href='jackets.php';">Jackets</a>
			</div>
			
			<!-- 資訊 -->
			<div id="info">
			<b>About PickMe</b>
			<a class="bar-item button pointer" onClick="location.href='whoarewe.php';">Who are we</a>
			<a class="bar-item button pointer" onClick="location.href='message.php';">Comments</a>
			</div>
			
	</div>
	
	<!-- 內容 -->
	<div id="itemcondition" class="content">
		<br></br>
		<br></br>
		<!--標題-->
		<div style="text-align:center; font-family:SetoFont;"><font size="7">購物車</div>

		<table border="0" style="width:95%; margin:auto auto; color:black; font-size:20pt;background-color:rgba(255, 255, 255, 0.5);">
	<?php
		$servername = "localhost";//連接伺服器
		$username = "root";
		$password = "0513403";
		$dbname = "groupsix_db";//選擇欲讀取的資料庫名稱	
		$conn = new mysqli($servername, $username, $password, $dbname);//create connection
		mysqli_query($conn, "SET NAMES 'UTF8'");
		
		//取得購物者的id
		$name = $_SESSION['username'];
		$sqlq = "SELECT id FROM member WHERE name='$name'";
		$resultq = $conn->query($sqlq);
		$row1 = mysqli_fetch_array($resultq); //$row1[0]

	
		$select="select * from member_order WHERE member_id='$row1[0]'";
		$result=$conn->query($select);

		$total=0;
	?>

		<?php
			while($row = mysqli_fetch_array($result)) {
				//$row[1] -> 商品序號 $row[2] -> 商品數量
		?>
		<div>
		
		<tr>
		<td style="font-family:SetoFont">
			<img type="image" width="200" height="200" src="image.php?cnum=<?php echo $row[1]; ?>">				
		</td>
		<!--商品名稱 -->
		<?php
			$shop="select * from clothes WHERE cnum='$row[1]'";
			$shopp=$conn->query($shop);
			$find = mysqli_fetch_array($shopp);
		?>
		<td style="font-family:SetoFont;">&nbsp;&nbsp;<?php echo $find[0]?></td>
		<td style="font-family:SetoFont;text-align:center;">&nbsp;&nbsp;&nbsp;<?php echo $row[2]?></td>
		<?php
			//運算價錢
			$money = $find[4]*$row[2];
			$total = $total + $money;
		?>
		<td style="font-family:SetoFont;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$<?php echo $money?></td>
		
		<form id="form2" action="" method="post">
		
		<td>&nbsp;&nbsp;&nbsp;<input type="button" onClick="GoodBYE('<?php echo $row[1]?>')" style="font-family:SetoFont; font-size:25pt; background-color:rgba(0,0,0,0.3);border:0;" value="Delete">
		<input type="hidden" name="byebye" id="byebye">
		
		</form>
		</tr>
		</div>
		<?php
			}
		?>
		<HR>
		<tr>
		<td><p><HR></p></td>
		<td style="font-family:SetoFont;">&nbsp;&nbsp;小計&nbsp;&nbsp;&nbsp;&nbsp;<td align="right" style="font-family:SetoFont;">NT$<?php echo $total?></td></td>
		</tr>
		<tr>
		<td><td><td><td><td align="right"><button type="button" onclick="location.href='delete.php';" style="font-family:SetoFont; font-size:25pt; background-color:rgba(255, 153, 153,0.5); border:0; margin-right:30px;margin-bottom:30px;">結帳!</button></td></td></td></td></td>
		</tr>
		</table>
	</div>
	
<?php
	if(isset($_POST["byebye"])){
		
		$byebye = $_POST["byebye"];
		// $row1[0] 購物者id
		$sql="DELETE FROM member_order WHERE member_id='$row1[0]' and product_ssn='$byebye'";
		$goo = $conn->query($sql);
		echo '<meta http-equiv=REFRESH CONTENT=0;url=shopbag.php>';
	}

	?>
<script>

	function GoodBYE(bye)
	{		
		document.getElementById('byebye').value = bye;
		document.getElementById("form2").submit();
	}
</script>	

	
	
	
</body>
</html>