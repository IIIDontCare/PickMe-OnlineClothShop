<?php 
  session_start(); 
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  }
?>
	
<!DOCTYPE html>
<html>

<!-- 標題 -->
<head>
<title>WHO ARE WE | 百裡挑衣</title>

<link rel="stylesheet" href="whoarewestyle.css" type="text/css"> 
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
		<a class="pointer" href="manage.php" style="font-family:SetoFont">賣家廣場</a>
		<?php endif ?>
		
		<?php  if (!isset($_SESSION['username'])) : //尚未登入狀態?>
    	<a class="pointer" onClick="location.href='login.html';">Login</a>
		<?php endif ?>
		
		<a class="pointer" href="shopbag.php">Shopping Bag</a>
		
			
		<!-- 音樂 -->
		<div class="mucon">
			<audio id="music2" src="pickme.mp3" loop="loop"></audio>
			<a href="javascript:playPause();"><img src="r1.png" width="20" height="20" style="background-color:white" id="music_btn2" border="0"></a>
		</div>
		
		<!-- 搜尋 -->
		<form action="search.php" method="post">
			<button type="submit">搜尋</button>
			<input type="text" placeholder="想找甚麼衣服呢?" name="searchtxt">
		</form>
		
	</div>
	
		<?php if (isset($_SESSION['success'])) :
			unset($_SESSION['success']);
        	endif ?>
	
	
	
	<!-- 左欄 -->
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
			<a class="bar-item" style="font-size:15pt; background-color:rgba(61, 139, 173, 0.8);">Who are we</a>
			<a class="bar-item button pointer" onClick="location.href='message.php';">Comments</a>
			</div>
			
	</div>
	
	
	<!-- 內容 -->
	<div id="itemcondition" class="content">
		<br>
		<div id="0513403" class="person pointer" onClick="location.href='0513403/0513403.html';" style="position:fixed; left:350px; top:50px;">
				<img src="0513403/03p1.jpg" width="250" height="250"
				onmouseover="this.src='0513403/03p2.jpg';" 
				onmouseout="this.src='0513403/03p1.jpg';">
		</div>
		
		<div id="0513408" class="person pointer" onClick="location.href='0513408/0513408.html';" style="position:fixed; left:350px; top:320px;">
				<img src="0513408/08p1.jpg" width="250" height="250"
				onmouseover="this.src='0513408/08p2.jpg';" 
				onmouseout="this.src='0513408/08p1.jpg';">
		</div>
		
		<div id="000" class="person" style="position:fixed; left:620px; top:50px;">
				<img src="whoarewe.jpg" width="250" height="250">
		</div>
		
		<div id="0513418" class="person pointer" onClick="location.href='0513418/0513418.html';" style="position:fixed; left:620px; top:320px;">
				<img src="0513418/p1.jpg" width="250" height="250"
				onmouseover="this.src='0513418/p2.jpg';" 
				onmouseout="this.src='0513418/p1.jpg';">
		</div>
		
		<div id="0513466" class="person pointer" onClick="location.href='0513466/0513466.html';" style="position:fixed; left:890px; top:320px;">
				<img src="0513466/66p1.jpg" width="250" height="250"
				onmouseover="this.src='0513466/66p2.jpg';" 
				onmouseout="this.src='0513466/66p1.jpg';">
		</div>
		
		<div id="0513471" class="person pointer" onClick="location.href='0513471/0513471.html';" style="position:fixed; left:890px; top:50px;">
				<img src="0513471/71p1.jpg" width="250" height="250"
				onmouseover="this.src='0513471/71p2.jpg';" 
				onmouseout="this.src='0513471/71p1.jpg';">
		</div>
		
		<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
		<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
		
	</div>
	
	
</body>

</html>