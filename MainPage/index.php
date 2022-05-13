<?php
	require_once("../DBprocess.php");
	require_once('HTMLprocess.php');
	if(isset($_POST['username']) && isset($_POST['password'])){
		login();	
	}
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="./CSS/index.css" />
	<link rel="stylesheet" href="./CSS/login.css" />
	<title>Shop linh kiện Demo</title>
</head>
<body>
		<script>
			function openPopup(){
				document.getElementById("hidden-popup").classList.remove("hidden");
				document.getElementById("hidden-login").classList.remove("hidden");
			}
			function openLogin(){
				document.getElementById("hidden-login").classList.remove("hidden");
				document.getElementById("hidden-register").classList.add("hidden");
			}
			function closeLogin(){
				document.getElementById("hidden-popup").classList.add("hidden");
				document.getElementById("hidden-login").classList.add("hidden");
			}
		</script>
	<div class="login-container hidden" id="hidden-popup">
			<div class="login-popup hidden" id="hidden-login">
				<form action="" method="POST" class="login-input-container">
					<input type="username" class="login-input" name="username" pattern="[a-zA-Z0-9]+$" placeholder="Tên người dùng">
					<input type="password" class="login-input" name="password" placeholder="Mật khẩu">
					<input type="submit" value="ĐĂNG NHẬP" class="login-login-btn">
				</form>
				<p class="login-forgot-password">Quên mật khẩu?</p>
				<p class="login-no-account">Bạn là người dùng mới? <button onclick="">Tạo tài khoản</button></p>
				<button class="exit-btn" onClick="closeLogin()"><img src="./img/x_button.png" alt="exit-btn" style="width: 100px;"></button>
			</div>
		</div>

	<div class="page_Header">
		<div class="Account">
			<ul>
					<li style="border-left-width: 0px;width:500px;"><p">Shop linh kiện DEMO - bán tất cả loại linh kiện máy tính</p></li>
				<?php
					if(isset($_SESSION['username'])){
				?>
						<li id="Welcome"><?php echo "Welcome ".$_SESSION['username']; ?> </li>
					 	<li><a href="ManagePage.php">Vào trang cá nhân</a></li>
						<li><a href="Cart.php">Xem giỏ hàng</a></li>
						<li><a href ="Logout.php" id="Logout">Đăng xuất</a></li>
				<?php
					}
					else{
				?>
							<li id="Login_Item">
								<button id="Login_Button" onclick="openPopup()">Đăng nhập</button>
							</li>
							<li id="Register_Item">
								<a href ="Register_form.php" id="Register">Đăng ký </a>
							</li>
				<?php
					}
				?>

			</ul>
		</div>
	</div>
	<div class="nav_bar">
		<a href="index.php">Trang chủ</a>
		<a href="">Giới thiệu</a>
		<a href="">Tin tức</a>
		<a href="BuildPc.php">Build PC</a>
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
	if(isset($_SESSION['cart_status'])){
		$alert = "<script>alert('".$_SESSION['cart_status']."');</script>";
		echo $alert;
		unset($_SESSION['cart_status']);
	}
?>

