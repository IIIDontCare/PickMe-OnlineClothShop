<?php 
  session_start(); 
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
	unset($_SESSION['isowner']);
  }
?>
	
<!DOCTYPE html>
<html>
<head>
<title>Manage | 百裡挑衣</title>

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
		<a class="pointer" href="manage.php" style="font-family:SetoFont; background-color: #4d4d4d;">賣家廣場</a>
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
			<button type="submit" style="float:right; font-family:SetoFont; font-size:12pt; margin-top:10px;">搜尋</button>
			<input type="text" placeholder="想找甚麼衣服呢?" name="searchtxt" style="float:right; font-family:SetoFont; font-size:12pt; margin:12px 5px;" >
		</form>

		
	</div>
	
	<?php if (isset($_SESSION['success'])) :
			unset($_SESSION['success']);
        	endif ?>
			
	<!-- 左欄 -->
	<div id="mainmenu" class="leftcolumn" style="cursor:url('poro.cur'),auto;">
			
			<!-- 商標 -->
			<br>
			<img src="pickme.png" class="pointer" height="80" width="250" onClick="location.href = 'pickme.php';">
			<br><br>
			
			<!-- 商品 -->
			<div id="item">
			<a class="bar-item button pointer" onClick="location.href='newarrivals.php';">~NEW ARRIVALS~</a>
			<a class="bar-item button pointer" onClick="location.href='#';">TOP 20</a>
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
			<a class="bar-item button pointer" onClick="location.href='#';">Contact</a>
			<a class="bar-item button pointer" onClick="location.href='message.php';">Message</a>
			</div>
			
	</div>
	
	<div id="itemcondition" class="content">
	
		<div class="table" style="margin-top:50px;">
			<h1 style="font-family:SetoFont; font-size:40pt;">新增商品</h1>
			<!--建立<form>，要求使用者必須填寫ID、帳號、密碼、性別-->
			<form action="" method="post" enctype="multipart/form-data"><!--將資訊傳給自己-->
			<font style="font-family:SetoFont; font-size:20pt;" color="#025648"><b>衣服名稱:</b></font>  <input type="text" style="font-family:SetoFont; font-size:15pt; border:0; background-color:rgba(61, 139, 173, 0.2);" name="clothesname"required><br><br>
			<font style="font-family:SetoFont; font-size:20pt;" color="#025648"><b>尺寸大小:</b></font>  <input type="text" style="font-family:SetoFont; font-size:15pt; border:0; background-color:rgba(61, 139, 173, 0.2);" name="csize"required><br><br>	
			<font style="font-family:SetoFont; font-size:20pt;" color="#025648"><b>分類:</b></font>
			<select style="font-family:SetoFont; font-size:15pt; " name="category">
				<option selected value="top">上衣</option>
				<option value="bottom">褲子</option>
				<option value="dress">裙子</option>
				<option value="jacket">外套</option>
			</select>
			<br><br>
			<font style="font-family:SetoFont; font-size:20pt; " color="#025648"><b>定價:</b></font>  <input type="number" style="font-family:SetoFont; font-size:15pt; border:0; background-color:rgba(61, 139, 173, 0.2);" name="cprice"required><br><br>
			<font style="font-family:SetoFont; font-size:20pt;" color="#025648"><b>庫存數量: </b></font> <input type="number" style="font-family:SetoFont; font-size:15pt; border:0; background-color:rgba(61, 139, 173, 0.2);" name="inventory"required><br><br>
			<br>
			<div class="input">
				<input type="file" name="image" style="font-family:SetoFont; font-size:15pt; margin-left:20px; " />
				<br>
				<input type="submit" style="font-family:SetoFont; font-size:20pt; width:70px;height:40px;margin-left:20px; border:0; background-color:rgba(61, 139, 173, 0.5); ">
			</div>
			</form>
		</div>


		<?php
		if($_POST){
		$servername = "localhost";//連接伺服器
		$username = "root";
		$password = "0513403";
		$dbname = "groupsix_db";//選擇欲讀取的資料庫名稱
		$clothesname = $_POST['clothesname'];
		$inventory = $_POST['inventory'];
		$csize = $_POST['csize'];
		$cprice = $_POST['cprice'];
		//$category = $_POST['#category'];
		$category = isset($_POST['category']) ? $_POST['category'] : "top";
		
		$filename=$_FILES['image']['name'];
		$tmpname=$_FILES['image']['tmp_name'];
		$filetype=$_FILES['image']['type'];
		$filesize=$_FILES['image']['size'];    
		$file=NULL;
		
		if(isset($_FILES['image']['error'])){    
			if($_FILES['image']['error']==0){                                    
				$instr = fopen($tmpname,"rb" );
				$file = addslashes(fread($instr,filesize($tmpname)));        
			}
		}	
		$conn = new mysqli($servername, $username, $password, $dbname);//create connection
		mysqli_query($conn, "SET NAMES 'UTF8'");
		$imagedata = sprintf("(%s)","'".$file."'");
		
		$sql = "INSERT INTO `clothes`(`cname`, `cinventory`, `image`, `cprice`, `csize`, `category`) VALUES ('$clothesname',$inventory, $imagedata ,$cprice,'$csize','$category')";
		$conn->query($sql);
		}
		
		?>
		
	</div>

		
		
</body>

</html>