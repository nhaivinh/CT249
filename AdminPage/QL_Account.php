<?php
	require_once("../DBprocess.php");
	require_once('../MainPage/HTMLprocess.php');
	require_once("HTMLprocess.php");
	if(isset($_SESSION['username'])){
		$connect = connectDB();
		$query = "Select Quyen_han from Account where username = '".$_SESSION['username']."'";
		$result = mysqli_query($connect, $query);
		$data = array();
		while($row = mysqli_fetch_array($result, 1)){
			$data[] = $row;
		}
		$privilege = $data[0]['Quyen_han'];
		if(isset($_SESSION['privilege']))
			if(strcmp($_SESSION['privilege'],"Owner") == 0 || strcmp($_SESSION['privilege'],"Senior Staff") == 0 || strcmp($_SESSION['privilege'],"Staff") == 0){
				if($privilege != $_SESSION['privilege']){
					header("Location: ./index.php");
				}
			}
			else {
				header("Location: ./index.php");
			}
		else{
			header("Location: ./index.php");
		}
	}
	else{
		header("Location: ./index.php");
	}
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="./CSS/QL_Account.css" />
	<title>Shop linh kiện Demo</title>
</head>
<body>
	<div class="page_Header">
		<div class="Account">
			<ul>
				<li style="border-left-width: 0px;width:500px;"><a href="../MainPage/index.php">Shop linh kiện DEMO - Admin</a></li>
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
<?php
			if(empty($_GET)){
				showAllAccount();
			}
			else{
				showAccount();
			}
			
?>
	</div>
</body>
</html>
	
<?php
	if(isset($_SESSION['Capnhat_quyenhan'])){
		$alert = "<script>alert('".$_SESSION['Capnhat_quyenhan']."');</script>";
		echo $alert;
		unset($_SESSION['Capnhat_quyenhan']);
	}
?>