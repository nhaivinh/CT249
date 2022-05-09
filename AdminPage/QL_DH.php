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
					header("Location: ../MainPage/index.php");
				}
			}
			else {
				header("Location: ../MainPage/index.php");
			}
		else{
			header("Location: ../MainPage/index.php");
		}
	}
	else{
		header("Location: ../MainPage/index.php");
	}
	if(isset($_POST['ngay']) && isset($_POST['thang']) && isset($_POST['nam']) && isset($_POST['id_dh'])){
		$ngay = $_POST['ngay'];
		$thang = $_POST['thang'];
		$nam = $_POST['nam'];
		$id_dh = $_POST['id_dh'];
		$max_ngay = 0;
		switch($thang){
			case 1: case 3: case 5: case 7: case 8: case 10: case 12:
				$max_ngay = 31;
				break;
			case 4: case 6: case 9: case 11: 
				$max_ngay = 30;
				break;
			case 2:
				if ($nam % 400 == 0 || $nam % 4 == 0 && $nam % 100 != 0) $max_ngay = 29;
				else $max_ngay = 28;
				break;
		}
		if($ngay <= $max_ngay){
			$query = "update donhang set Ngay_giao= '".$nam."-".$thang."-".$ngay."', 
				ID_User_QL='".$_SESSION['id_user']."', Status_DH='Đã xử lý', Status_GiaoHang='Đang vận chuyển' where id_dh=".$id_dh;
			mysqli_query($connect, $query);
			
			$_SESSION['xuly_dh'] = 'Đơn hàng đã được cập nhật';
		}
		else{
			$_SESSION['xuly_dh'] = 'Ngày giao hàng không hợp lệ';
		}
		closeDB($connect);
	}
	if(isset($_POST['ngayUpdate']) && isset($_POST['thangUpdate']) && isset($_POST['namUpdate']) && isset($_POST['id_dh'])){
		$ngay = $_POST['ngayUpdate'];
		$thang = $_POST['thangUpdate'];
		$nam = $_POST['namUpdate'];
		$id_dh = $_POST['id_dh'];
		$max_ngay = 0;
		switch($thang){
			case 1: case 3: case 5: case 7: case 8: case 10: case 12:
				$max_ngay = 31;
				break;
			case 4: case 6: case 9: case 11: 
				$max_ngay = 30;
				break;
			case 2:
				if ($nam % 400 == 0 || $nam % 4 == 0 && $nam % 100 != 0) $max_ngay = 29;
				else $max_ngay = 28;
				break;
		}
		if($ngay <= $max_ngay){
			$query = "update donhang set Ngay_giao= '".$nam."-".$thang."-".$ngay."' where id_dh=".$id_dh;
			mysqli_query($connect, $query);
			
			$_SESSION['xuly_dh'] = 'Đơn hàng đã được cập nhật';
		}
		else{
			$_SESSION['xuly_dh'] = 'Ngày giao hàng cập nhật không hợp lệ';
		}
		closeDB($connect);
	}
	if(isset($_POST['status_GH'])){
		$id_dh = $_POST['id_dh'];
		$status = $_POST['status_GH'];
		$query = "update donhang set Status_GiaoHang='".$status."' where id_dh=".$id_dh;
		mysqli_query($connect, $query);
			
		$_SESSION['xuly_dh'] = 'Đơn hàng đã được cập nhật';
	}
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="./CSS/QL_DH.css" />
	<title>Shop linh kiện Demo</title>
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
		<?php show_QL_DH() ?>
	</div>
</body>
</html>

<?php
	if(isset($_SESSION['xuly_dh'])){
		$alert = "<script>alert('".$_SESSION['xuly_dh']."');</script>";
		echo $alert;
		unset($_SESSION['xuly_dh']);
	}
?>