<?php
	require_once("DBprocess.php");
	require_once('HTMLprocess.php');
	if(isset($_POST['username']) && isset($_POST['password'])){
		login();	
	}
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="index.css" />
	<title>Shop linh kiện Demo</title>
</head>
<body>
	<div class="page_Header">
		<div class="Account">
			<ul>
				<form method="POST" action="" id="frmAccount">
					<li style="border-left-width: 0px;width:500px;"><p>Shop linh kiện DEMO - bán tất cả loại linh kiện máy tính</p></li>
				<?php
					if(isset($_SESSION['username'])){
				?>
						<li id="Welcome">
							<a href="ManagePage.php">
								<?php echo "Welcome ".$_SESSION['username']; ?> 
							</a>
						</li>
						<li id="Money"> Số dư TK: <?php showSoDuTK($_SESSION['username']) ?> VND</li>
						<li><a href ="Logout.php">Đăng xuất</a></li>
				<?php
					}
					else{
				?>
							<li>
								<input type="text" name="username" size="20" value="" placeholder="Nhập vào username" style="height:25px">
							</li>
							<li>
								<input type="password" name="password" size="20" placeholder="Nhập vào password" style="height:25px">
							</li>
							<li><label id="Login" onClick="document.getElementById('frmAccount').submit();">Đăng nhập </label></li>
							<li><a href ="Register_form.php" id="Register">Đăng ký </a></li>
				<?php
					}
				?>
				</form>
			</ul>
		</div>
	</div>
	<div class="nav_bar">
		<a href="index.php">Trang chủ</a>
		<a href="">Giới thiệu</a>
		<a href="">Tin tức</a>
		<a href="">Khuyến mãi</a>
		<a href="">Liên hệ</a>
	</div>
	<br>
	<div class="search_bar">
		<ul>
			<li>
				<form method="GET" action="" id="frmSearch">
					<input type="text" name="search_key" placeholder="Nhập tên sản phẩm" class="search_box">
					<input type="submit" class="search_submit" value="Search">
				</form>
			</li>
		</ul>
	</div>
	<br>
	<div class="page_body">
<?php
		if(empty($_GET)){
			showAllSP();
		}
		else{
			showSearchSP();
		}
?>
	</div>
</body>
</html>

<?php
	if(isset($_SESSION['logout_success'])){
		$alert = "<script>alert('".$_SESSION['logout_success']."');</script>";
		echo $alert;
		unset($_SESSION['logout_success']);
	}
	if(isset($_SESSION['login_status'])){
		$alert = "<script>alert('".$_SESSION['login_status']."');</script>";
		echo $alert;
		unset($_SESSION['login_status']);
	}
	if(isset($_SESSION['register_status'])){
		$alert = "<script>alert('".$_SESSION['register_status']."');</script>";
		echo $alert;
		unset($_SESSION['register_status']);
	}
	if(isset($_SESSION['changePass_status'])){
		$alert = "<script>alert('".$_SESSION['changePass_status']."');</script>";
		echo $alert;
		unset($_SESSION['changePass_status']);
	}
	if(isset($_SESSION['buy_status'])){
		$alert = "<script>alert('".$_SESSION['buy_status']."');</script>";
		echo $alert;
		unset($_SESSION['buy_status']);
	}
?>

