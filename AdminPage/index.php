<?php
	require_once("../DBprocess.php");
	require_once('../MainPage/HTMLprocess.php');
	require_once("HTMLprocess.php");
	if(isset($_POST['username_admin']) && isset($_POST['password'])){
		login();	
	}
	if(isset($_SESSION['username'])){
		$connect = connectDB();
		$query = "Select Quyen_han from Account where username = '".$_SESSION['username']."'";
		$result = mysqli_query($connect, $query);
		$data = array();
		while($row = mysqli_fetch_array($result, 1)){
			$data[] = $row;
		}
		$privilege = $data[0]['Quyen_han'];
		if(isset($_SESSION['privilege'])){
			if(strcmp($_SESSION['privilege'],"Owner") == 0 || strcmp($_SESSION['privilege'],"Senior Staff") == 0 || strcmp($_SESSION['privilege'],"Staff") == 0){
				if($privilege == $_SESSION['privilege']){
					header("Location: ./mainpage.php");
				}
			}
		}
	}
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="./CSS/index.css" />
	<title>Login Admin</title>
</head>
<body>
	<div class="page_Header">
		<div class="Account">
			<ul>
				<li style="border-left-width: 0px;width:500px;"><a href="../MainPage/index.php">Shop linh kiện DEMO - bán tất cả loại linh kiện máy tính</a></li>
<?php
				if(isset($_SESSION['username'])){
?>
					<li id="Welcome">
						<p>
							<?php echo "Welcome ".$_SESSION['privilege']." ".$_SESSION['username']; ?> 
						</p>
					</li>
					<li><a href ="../MainPage/Logout.php">Đăng xuất</a></li>
<?php
				}
?>
			</ul>
		</div>
	</div>
	<div class="nav_bar">
		<a href="mainpage.php">Về trang chủ</a>
		<a href="QL_Account.php">Xem thông tin Account</a>
		<a href="QL_SP.php">Quản lí hàng hóa</a>
		<a href="QL_DH.php">Quản lí đơn hàng</a>
	</div>
	<br>
	<br>
	<div class="admin_content">
		<div class="content">
            <div class="login-container" id="hidden-popup">
                <div class="login-popup" id="hidden-login">
                    <form action="" method="POST" class="login-input-container">
                        <input type="username" class="login-input" name="username_admin" pattern="[a-zA-Z0-9]+$" placeholder="Tên người dùng">
                        <input type="password" class="login-input" name="password" placeholder="Mật khẩu">
                        <input type="submit" value="ĐĂNG NHẬP" class="login-login-btn">
                    </form>
                </div>
            </div>
		</div>
	</div>
</body>
</html>
