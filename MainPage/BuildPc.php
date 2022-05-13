<?php
	require_once("../DBprocess.php");
	require_once('HTMLprocess.php');
	if(isset($_POST['username']) && isset($_POST['password'])){
		login();	
	}
	if(isset($_POST['idChosenCPU'])){
		$_SESSION['idChosenCPU'] = $_POST['idChosenCPU'];
	}
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="./CSS/BuildPc.css" />
	<link rel="stylesheet" href="./CSS/login.css" />
	<link rel="stylesheet" href="./CSS/chooseitem.css" />
	<link rel="stylesheet" href="./CSS/buynow.css" />
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
			function openPopupCPUChooseItem(){
				document.getElementById("hidden-popup-chooseitem-CPU").classList.remove("hidden");
				document.getElementById("hidden-chooseitem-CPU").classList.remove("hidden");
			}
			function closePopupCPUChooseItem(){
				document.getElementById("hidden-popup-chooseitem-CPU").classList.add("hidden");
				document.getElementById("hidden-chooseitem-CPU").classList.add("hidden");
			}
			function openPopupMainChooseItem(){
				document.getElementById("hidden-popup-chooseitem-Main").classList.remove("hidden");
				document.getElementById("hidden-chooseitem-Main").classList.remove("hidden");
			}
			function closePopupMainChooseItem(){
				document.getElementById("hidden-popup-chooseitem-Main").classList.add("hidden");
				document.getElementById("hidden-chooseitem-Main").classList.add("hidden");
			}
			function openPopupRamChooseItem(){
				document.getElementById("hidden-popup-chooseitem-Ram").classList.remove("hidden");
				document.getElementById("hidden-chooseitem-Ram").classList.remove("hidden");
			}
			function closePopupRamChooseItem(){
				document.getElementById("hidden-popup-chooseitem-Ram").classList.add("hidden");
				document.getElementById("hidden-chooseitem-Ram").classList.add("hidden");
			}
			function openPopupGPUChooseItem(){
				document.getElementById("hidden-popup-chooseitem-GPU").classList.remove("hidden");
				document.getElementById("hidden-chooseitem-GPU").classList.remove("hidden");
			}
			function closePopupGPUChooseItem(){
				document.getElementById("hidden-popup-chooseitem-GPU").classList.add("hidden");
				document.getElementById("hidden-chooseitem-GPU").classList.add("hidden");
			}
			function openPopupSSDChooseItem(){
				document.getElementById("hidden-popup-chooseitem-SSD").classList.remove("hidden");
				document.getElementById("hidden-chooseitem-SSD").classList.remove("hidden");
			}
			function closePopupSSDChooseItem(){
				document.getElementById("hidden-popup-chooseitem-SSD").classList.add("hidden");
				document.getElementById("hidden-chooseitem-SSD").classList.add("hidden");
			}
			function openPopupHDDChooseItem(){
				document.getElementById("hidden-popup-chooseitem-HDD").classList.remove("hidden");
				document.getElementById("hidden-chooseitem-HDD").classList.remove("hidden");
			}
			function closePopupHDDChooseItem(){
				document.getElementById("hidden-popup-chooseitem-HDD").classList.add("hidden");
				document.getElementById("hidden-chooseitem-HDD").classList.add("hidden");
			}
			function openPopupCaseChooseItem(){
				document.getElementById("hidden-popup-chooseitem-Case").classList.remove("hidden");
				document.getElementById("hidden-chooseitem-Case").classList.remove("hidden");
			}
			function closePopupCaseChooseItem(){
				document.getElementById("hidden-popup-chooseitem-Case").classList.add("hidden");
				document.getElementById("hidden-chooseitem-Case").classList.add("hidden");
			}
			function openPopupBuyNow(){
			document.getElementById("hidden-popup-buynow").classList.remove("hidden");
			document.getElementById("hidden-buynow").classList.remove("hidden");
			document.getElementById("soluong_sp_popup").value = document.getElementById("soluong_sp").value;
			}
			function openBuyNow(){
				document.getElementById("hidden-buynow").classList.remove("hidden");
			}
			function closeBuyNow(){
				document.getElementById("hidden-popup-buynow").classList.add("hidden");
				document.getElementById("hidden-buynow").classList.add("hidden");
			}
			function updateAddress(){
				document.getElementById("input_address_user").value = document.getElementById("input_address").value;
			}
			function showAddressText(){
				value = document.getElementById("select_address").value;
				if(value == 1){
					document.getElementById("input_address").classList.remove("hidden");
					document.getElementById("input_address").value = "";
				}
				else{
					document.getElementById("input_address").classList.add("hidden");
					document.getElementById("input_address").value = value;
					updateAddress();
				}
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
	<div class="page_body">
        <div class="choose_item">
            <div class="cpu">
				<?php
					if(!isset($_SESSION['idChosenCPU'])){
						echo '
							<div class="title">
								<span class="title_text">Vi xử lý</span>
								<div class="img_item">
									<img src="../img/cpu.svg" style="">
								</div>
								<span>Vui lòng chọn linh kiện</span>
							</div>
                			<button class="add_button" onclick="openPopupCPUChooseItem()">Chọn</button>
						';
					}
					else {
						$connect = connectDB();
						$query = "Select * from linhkien where ID_LK=".$_SESSION['idChosenCPU'];
						$result = mysqli_query($connect, $query);
						$data = array();
						while($row = mysqli_fetch_array($result, 1)){
							$data[] = $row;
						}
						$imgSRC = $data[0]['Hinh_anh'];
						$idLK = $data[0]['ID_LK'];
						$tenLK = $data[0]['Ten_LK'];
						$giaGoc = $data[0]['Gia_LK'];
						$giamGia = $data[0]['Giam_gia'];
						$donGia = $giaGoc * (1 - $giamGia);
						echo '
							<div class="title">
								<span class="title_text">Vi xử lý</span>
								<div class="img_item">
									<img src="'.$imgSRC.'" style="">
								</div>
								<div class="info_item">
									<span class="info_item_name">'.$tenLK.'</span>
									<br>
									<span>Mã LK: '.$idLK.'</span>
								</div>
								<div class="quantity_item">
								<span hidden id="thungrac"></span>
									<input type="button" class="dau" id="CPUMinusButton" value="-" onClick="document.getElementById(\'soluong_sp_CPU\').value--;">
									<input type="number" name="sl_sp" class="so_luong" value="1" min="1" id="soluong_sp_CPU">
									<script>
										var sl_sp = document.getElementById("soluong_sp_CPU").value;
										if(sl_sp == "1"){
											document.getElementById("CPUMinusButton").classList.add("hidden");
										}
									</script>
									<input type="button" class="dau" value="+" onClick="document.getElementById(\'soluong_sp_CPU\').value++;">
								</div>
								<div class="price_item">
									<span class="price_item_1">'.$donGia.'</span>
									<div class="price_item_discount">
										<span class="price_item_3">'.$giaGoc.'</span>
										<span> </span>
										<span class="price_item_2">'.($giamGia*100).'%</span>
									</div>
								</div>					
							</div>
							<button class="add_button" onclick="openPopupCPUChooseItem()">Chỉnh sửa</button>
						';
						closeDB($connect);
					}
				?>
            </div>
            <div class="main">
				<?php
					if(!isset($_SESSION['idChosenMain'])){
						echo '
							<div class="title">
								<span class="title_text">Bo mạch chủ</span>
								<div class="img_item">
									<img src="../img/main.svg" style="">
								</div>
								<span>Vui lòng chọn linh kiện</span>
							</div>
                			<button class="add_button" onclick="openPopupMainChooseItem()">Chọn</button>
						';
					}
					else {
						$connect = connectDB();
						$query = "Select * from linhkien where ID_LK=".$_SESSION['idChosenMain'];
						$result = mysqli_query($connect, $query);
						$data = array();
						while($row = mysqli_fetch_array($result, 1)){
							$data[] = $row;
						}
						$imgSRC = $data[0]['Hinh_anh'];
						$idLK = $data[0]['ID_LK'];
						$tenLK = $data[0]['Ten_LK'];
						$giaGoc = $data[0]['Gia_LK'];
						$giamGia = $data[0]['Giam_gia'];
						$donGia = $giaGoc * (1 - $giamGia);
						echo '
							<div class="title">
								<span class="title_text">Bo mạch chủ</span>
								<div class="img_item">
									<img src="'.$imgSRC.'" style="">
								</div>
								<div class="info_item">
									<span class="info_item_name">'.$tenLK.'</span>
									<br>
									<span>Mã LK: '.$idLK.'</span>
								</div>
								<div class="quantity_item">
									<input type="button" class="dau" id="MainMinusButton" value="-" onClick="document.getElementById(\'soluong_sp_Main\').value--;">
									<input type="number" name="sl_sp" class="so_luong" value="1" min="1" id="soluong_sp_Main">
									<script>
										var sl_sp = document.getElementById("soluong_sp_Main").value;
										if(sl_sp == 1){
											document.getElementById("MainMinusButton").value = "Thùng rác";
										}
									</script>
									<input type="button" class="dau" value="+" onClick="document.getElementById(\'soluong_sp_Main\').value++;">
								</div>
								<div class="price_item">
									<span class="price_item_1">'.$donGia.'</span>
									<div class="price_item_discount">
										<span class="price_item_3">'.$giaGoc.'</span>
										<span> </span>
										<span class="price_item_2">'.($giamGia*100).'%</span>
									</div>
								</div>					
							</div>
							<button class="add_button" onclick="openPopupMainChooseItem()">Chỉnh sửa</button>
						';
						closeDB($connect);
					}
				?>
            </div>
            <div class="ram">
				<?php
					if(!isset($_SESSION['idChosenRAM'])){
						echo '
							<div class="title">
								<span class="title_text">RAM</span>
								<div class="img_item">
									<img src="../img/ram.svg" style="">
								</div>
								<span>Vui lòng chọn linh kiện</span>
							</div>
                			<button class="add_button" onclick="openPopupRamChooseItem()">Chọn</button>
						';
					}
					else {
						$connect = connectDB();
						$query = "Select * from linhkien where ID_LK=".$_SESSION['idChosenRAM'];
						$result = mysqli_query($connect, $query);
						$data = array();
						while($row = mysqli_fetch_array($result, 1)){
							$data[] = $row;
						}
						$imgSRC = $data[0]['Hinh_anh'];
						$idLK = $data[0]['ID_LK'];
						$tenLK = $data[0]['Ten_LK'];
						$giaGoc = $data[0]['Gia_LK'];
						$giamGia = $data[0]['Giam_gia'];
						$donGia = $giaGoc * (1 - $giamGia);
						echo '
							<div class="title">
								<span class="title_text">RAM</span>
								<div class="img_item">
									<img src="'.$imgSRC.'" style="">
								</div>
								<div class="info_item">
									<span class="info_item_name">'.$tenLK.'</span>
									<br>
									<span>Mã LK: '.$idLK.'</span>
								</div>
								<div class="quantity_item">
									<input type="button" class="dau" id="RAMMinusButton" value="-" onClick="document.getElementById(\'soluong_sp_RAM\').value--;">
									<input type="number" name="sl_sp" class="so_luong" value="1" min="1" id="soluong_sp_RAM">
									<script>
										var sl_sp = document.getElementById("soluong_sp_RAM").value;
										if(sl_sp == 1){
											document.getElementById("RAMMinusButton").value = "Thùng rác";
										}
									</script>
									<input type="button" class="dau" value="+" onClick="document.getElementById(\'soluong_sp_RAM\').value++;">
								</div>
								<div class="price_item">
									<span class="price_item_1">'.$donGia.'</span>
									<div class="price_item_discount">
										<span class="price_item_3">'.$giaGoc.'</span>
										<span> </span>
										<span class="price_item_2">'.($giamGia*100).'%</span>
									</div>
								</div>					
							</div>
							<button class="add_button" onclick="openPopupRamChooseItem()">Chỉnh sửa</button>
						';
						closeDB($connect);
					}
				?>
            </div>
            <div class="gpu">
				<?php
					if(!isset($_SESSION['idChosenGPU'])){
						echo '
							<div class="title">
								<span class="title_text">Card đồ hoạ</span>
								<div class="img_item">
									<img src="../img/gpu.svg" style="">
								</div>
								<span>Vui lòng chọn linh kiện</span>
							</div>
                			<button class="add_button" onclick="openPopupGPUChooseItem()">Chọn</button>
						';
					}
					else {
						$connect = connectDB();
						$query = "Select * from linhkien where ID_LK=".$_SESSION['idChosenGPU'];
						$result = mysqli_query($connect, $query);
						$data = array();
						while($row = mysqli_fetch_array($result, 1)){
							$data[] = $row;
						}
						$imgSRC = $data[0]['Hinh_anh'];
						$idLK = $data[0]['ID_LK'];
						$tenLK = $data[0]['Ten_LK'];
						$giaGoc = $data[0]['Gia_LK'];
						$giamGia = $data[0]['Giam_gia'];
						$donGia = $giaGoc * (1 - $giamGia);
						echo '
							<div class="title">
								<span class="title_text">Card đồ hoạ</span>
								<div class="img_item">
									<img src="'.$imgSRC.'" style="">
								</div>
								<div class="info_item">
									<span class="info_item_name">'.$tenLK.'</span>
									<br>
									<span>Mã LK: '.$idLK.'</span>
								</div>
								<div class="quantity_item">
									<input type="button" class="dau" id="GPUMinusButton" value="-" onClick="document.getElementById(\'soluong_sp_GPU\').value--;">
									<input type="number" name="sl_sp" class="so_luong" value="1" min="1" id="soluong_sp_GPU">
									<script>
										var sl_sp = document.getElementById("soluong_sp_GPU").value;
										if(sl_sp == 1){
											document.getElementById("GPUMinusButton").value = "Thùng rác";
										}
									</script>
									<input type="button" class="dau" value="+" onClick="document.getElementById(\'soluong_sp_GPU\').value++;">
								</div>
								<div class="price_item">
									<span class="price_item_1">'.$donGia.'</span>
									<div class="price_item_discount">
										<span class="price_item_3">'.$giaGoc.'</span>
										<span> </span>
										<span class="price_item_2">'.($giamGia*100).'%</span>
									</div>
								</div>					
							</div>
							<button class="add_button" onclick="openPopupGPUChooseItem()">Chỉnh sửa</button>
						';
						closeDB($connect);
					}
				?>
            </div>
            <div class="ssd">
				<?php
					if(!isset($_SESSION['idChosenSSD'])){
						echo '
							<div class="title">
								<span class="title_text">SSD</span>
								<div class="img_item">
									<img src="../img/ssd.svg" style="">
								</div>
								<span>Vui lòng chọn linh kiện</span>
							</div>
                			<button class="add_button" onclick="openPopupSSDChooseItem()">Chọn</button>
						';
					}
					else {
						$connect = connectDB();
						$query = "Select * from linhkien where ID_LK=".$_SESSION['idChosenSSD'];
						$result = mysqli_query($connect, $query);
						$data = array();
						while($row = mysqli_fetch_array($result, 1)){
							$data[] = $row;
						}
						$imgSRC = $data[0]['Hinh_anh'];
						$idLK = $data[0]['ID_LK'];
						$tenLK = $data[0]['Ten_LK'];
						$giaGoc = $data[0]['Gia_LK'];
						$giamGia = $data[0]['Giam_gia'];
						$donGia = $giaGoc * (1 - $giamGia);
						echo '
							<div class="title">
								<span class="title_text">SSD</span>
								<div class="img_item">
									<img src="'.$imgSRC.'" style="">
								</div>
								<div class="info_item">
									<span class="info_item_name">'.$tenLK.'</span>
									<br>
									<span>Mã LK: '.$idLK.'</span>
								</div>
								<div class="quantity_item">
									<input type="button" class="dau" id="SSDMinusButton" value="-" onClick="document.getElementById(\'soluong_sp_SSD\').value--;">
									<input type="number" name="sl_sp" class="so_luong" value="1" min="1" id="soluong_sp_SSD">
									<script>
										var sl_sp = document.getElementById("soluong_sp_SSD").value;
										if(sl_sp == 1){
											document.getElementById("SSDMinusButton").value = "Thùng rác";
										}
									</script>
									<input type="button" class="dau" value="+" onClick="document.getElementById(\'soluong_sp_SSD\').value++;">
								</div>
								<div class="price_item">
									<span class="price_item_1">'.$donGia.'</span>
									<div class="price_item_discount">
										<span class="price_item_3">'.$giaGoc.'</span>
										<span> </span>
										<span class="price_item_2">'.($giamGia*100).'%</span>
									</div>
								</div>					
							</div>
							<button class="add_button" onclick="openPopupSSDChooseItem()">Chỉnh sửa</button>
						';
						closeDB($connect);
					}
				?>
            </div>
            <div class="hdd">
				<?php
					if(!isset($_SESSION['idChosenHDD'])){
						echo '
							<div class="title">
								<span class="title_text">HDD</span>
								<div class="img_item">
									<img src="../img/hdd.svg" style="">
								</div>
								<span>Vui lòng chọn linh kiện</span>
							</div>
                			<button class="add_button" onclick="openPopupHDDChooseItem()">Chọn</button>
						';
					}
					else {
						$connect = connectDB();
						$query = "Select * from linhkien where ID_LK=".$_SESSION['idChosenHDD'];
						$result = mysqli_query($connect, $query);
						$data = array();
						while($row = mysqli_fetch_array($result, 1)){
							$data[] = $row;
						}
						$imgSRC = $data[0]['Hinh_anh'];
						$idLK = $data[0]['ID_LK'];
						$tenLK = $data[0]['Ten_LK'];
						$giaGoc = $data[0]['Gia_LK'];
						$giamGia = $data[0]['Giam_gia'];
						$donGia = $giaGoc * (1 - $giamGia);
						echo '
							<div class="title">
								<span class="title_text">HDD</span>
								<div class="img_item">
									<img src="'.$imgSRC.'" style="">
								</div>
								<div class="info_item">
									<span class="info_item_name">'.$tenLK.'</span>
									<br>
									<span>Mã LK: '.$idLK.'</span>
								</div>
								<div class="quantity_item">
									<input type="button" class="dau" id="HDDMinusButton" value="-" onClick="document.getElementById(\'soluong_sp_HDD\').value--;">
									<input type="number" name="sl_sp" class="so_luong" value="1" min="1" id="soluong_sp_HDD">
									<script>
										var sl_sp = document.getElementById("soluong_sp_HDD").value;
										if(sl_sp == 1){
											document.getElementById("HDDMinusButton").value = "Thùng rác";
										}
									</script>
									<input type="button" class="dau" value="+" onClick="document.getElementById(\'soluong_sp_HDD\').value++;">
								</div>
								<div class="price_item">
									<span class="price_item_1">'.$donGia.'</span>
									<div class="price_item_discount">
										<span class="price_item_3">'.$giaGoc.'</span>
										<span> </span>
										<span class="price_item_2">'.($giamGia*100).'%</span>
									</div>
								</div>					
							</div>
							<button class="add_button" onclick="openPopupHDDChooseItem()">Chỉnh sửa</button>
						';
						closeDB($connect);
					}
				?>
            </div>
            <div class="case">
				<?php
					if(!isset($_SESSION['idChosenCase'])){
						echo '
							<div class="title">
								<span class="title_text">Case</span>
								<div class="img_item">
									<img src="../img/case.svg" style="">
								</div>
								<span>Vui lòng chọn linh kiện</span>
							</div>
                			<button class="add_button" onclick="openPopupCaseChooseItem()">Chọn</button>
						';
					}
					else {
						$connect = connectDB();
						$query = "Select * from linhkien where ID_LK=".$_SESSION['idChosenCase'];
						$result = mysqli_query($connect, $query);
						$data = array();
						while($row = mysqli_fetch_array($result, 1)){
							$data[] = $row;
						}
						$imgSRC = $data[0]['Hinh_anh'];
						$idLK = $data[0]['ID_LK'];
						$tenLK = $data[0]['Ten_LK'];
						$giaGoc = $data[0]['Gia_LK'];
						$giamGia = $data[0]['Giam_gia'];
						$donGia = $giaGoc * (1 - $giamGia);
						echo '
							<div class="title">
								<span class="title_text">Case</span>
								<div class="img_item">
									<img src="'.$imgSRC.'" style="">
								</div>
								<div class="info_item">
									<span class="info_item_name">'.$tenLK.'</span>
									<br>
									<span>Mã LK: '.$idLK.'</span>
								</div>
								<div class="quantity_item">
									<input type="button" class="dau" id="CaseMinusButton" value="-" onClick="document.getElementById(\'soluong_sp_Case\').value--;">
									<input type="number" name="sl_sp" class="so_luong" value="1" min="1" id="soluong_sp_Case">
									<script>
										var sl_sp = document.getElementById("soluong_sp_Case").value;
										if(sl_sp == 1){
											document.getElementById("CaseMinusButton").value = "Thùng rác";
										}
									</script>
									<input type="button" class="dau" value="+" onClick="document.getElementById(\'soluong_sp_Case\').value++;">
								</div>
								<div class="price_item">
									<span class="price_item_1">'.$donGia.'</span>
									<div class="price_item_discount">
										<span class="price_item_3">'.$giaGoc.'</span>
										<span> </span>
										<span class="price_item_2">'.($giamGia*100).'%</span>
									</div>
								</div>					
							</div>
							<button class="add_button" onclick="openPopupCaseChooseItem()">Chỉnh sửa</button>
						';
						closeDB($connect);
					}
				?>
            </div>
        </div>
        <div class="total_price">
            <div class="total_price_item">
                <span class="total_price_text">Tổng Cộng: 25000000 đ</span>
				<input type="button" class="buy_now_button" value="Mua Ngay" onClick="openPopupBuyNow()">
				<input type="button" class="add_cart_button" value="Thêm vào giỏ hàng" onClick="">
        </div>
		<div class="chooseitem-container hidden" id="hidden-popup-chooseitem-CPU">
			<div class="chooseitem-popup hidden" id="hidden-chooseitem-CPU">
				<div class="item_detail">
					<span class="choose_item_title">Chọn CPU</span>
					<div id="table-wrapper">
						<div id="table-scroll">
							<table>
								<thead>
									<tr>
										<th><label class="Hinh_Text">Hình Ảnh<label></th>
										<th><label class="Ma_Text">Mã<label></th>
										<th><label class="Ten_Text">Tên Sản Phẩm<label></th>
										<th><label class="DonGia_Text">Đơn Giá<label></th>
										<th><label class="DonGia_Text"><label></th>
									</tr>
								</thead>
								<tbody>
									<?php
										$connect = connectDB();
										$query = "Select * from linhkien where Sale_Status='Đang bán' && Loai_LK='CPU'";
										$result = mysqli_query($connect, $query);
										$dataCPU = array();
										while($row = mysqli_fetch_array($result, 1)){
											$dataCPU[] = $row;
										}
										for($i=0;$i<count($dataCPU);$i++){
											$imgSRC = $dataCPU[$i]['Hinh_anh'];
											$idLK = $dataCPU[$i]['ID_LK'];
											$tenLK = $dataCPU[$i]['Ten_LK'];
											$donGia = $dataCPU[$i]['Gia_LK'] * (1 - $dataCPU[$i]['Giam_gia']);
											echo '
												<tr> 
													<td>
														<img src="'.$imgSRC.'" alt="exit-btn" style="width: 100px;">
													</td> 
													<td>'.$idLK.'</td> 
													<td>'.$tenLK.'</td>
													<td><label id="donGiaLK">'.$donGia.'</label></td> 
													<td>
													<div class=chooseitem-btn>	
														<form method="POST" action="" id="frmChooseCPU_'.$i.'">
															<input type="text" name="idChosenCPU" class="hidden_input" value="'.$idLK.'">
														</form>
														<button class="chooseitem-chooseitem-btn" onClick="document.getElementById(\'frmChooseCPU_'.$i.'\').submit();">Chọn</button></div>
													</div>
													</td>  																	
												</tr>	
											';
										}

										closeDB($connect);
									?>
												
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<button class="exit-btn-info" onClick="closePopupCPUChooseItem()"><img src="./img/x_button.png" alt="exit-btn" style="width: 50px;"></button>
			</div>
		</div>
		<div class="chooseitem-container hidden" id="hidden-popup-chooseitem-Main">
			<div class="chooseitem-popup hidden" id="hidden-chooseitem-Main">
				<div class="item_detail">
					<span class="choose_item_title">Chọn Bo Mạnh Chủ</span>
					<div id="table-wrapper">
						<div id="table-scroll">
							<table>
								<thead>
									<tr>
										<th><label class="Hinh_Text">Hình Ảnh<label></th>
										<th><label class="Ma_Text">Mã<label></th>
										<th><label class="Ten_Text">Tên Sản Phẩm<label></th>
										<th><label class="DonGia_Text">Đơn Giá<label></th>
										<th><label class="DonGia_Text"><label></th>
									</tr>
								</thead>
								<tbody>
									<?php
										$connect = connectDB();
										$query = "Select * from linhkien where Sale_Status='Đang bán' && Loai_LK='Mainboard'";
										$result = mysqli_query($connect, $query);
										$dataCPU = array();
										while($row = mysqli_fetch_array($result, 1)){
											$dataCPU[] = $row;
										}
										for($i=0;$i<count($dataCPU);$i++){
											$imgSRC = $dataCPU[$i]['Hinh_anh'];
											$idLK = $dataCPU[$i]['ID_LK'];
											$tenLK = $dataCPU[$i]['Ten_LK'];
											$donGia = $dataCPU[$i]['Gia_LK'] * (1 - $dataCPU[$i]['Giam_gia']);
											echo '
												<tr> 
													<td>
														<img src="'.$imgSRC.'" alt="exit-btn" style="width: 100px;">
													</td> 
													<td>'.$idLK.'</td> 
													<td>'.$tenLK.'</td>
													<td><label id="donGiaLK">'.$donGia.'</label></td> 
													<td>
													<div class=chooseitem-btn>	
														<form method="POST" action="" id="frmChooseCPU_'.$i.'">
															<input type="text" name="idChosenCPU" class="hidden_input" value="'.$idLK.'">
														</form>
														<button class="chooseitem-chooseitem-btn" onClick="document.getElementById(\'frmChooseCPU_'.$i.'\').submit();">Chọn</button></div>
													</div>
													</td>  																	
												</tr>	
											';
										}

										closeDB($connect);
									?>
												
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<button class="exit-btn-info" onClick="closePopupMainChooseItem()"><img src="./img/x_button.png" alt="exit-btn" style="width: 50px;"></button>
			</div>
		</div>
		<div class="chooseitem-container hidden" id="hidden-popup-chooseitem-Ram">
			<div class="chooseitem-popup hidden" id="hidden-chooseitem-Ram">
				<div class="item_detail">
					<span class="choose_item_title">Chọn Ram</span>
					<div id="table-wrapper">
						<div id="table-scroll">
							<table>
								<thead>
									<tr>
										<th><label class="Hinh_Text">Hình Ảnh<label></th>
										<th><label class="Ma_Text">Mã<label></th>
										<th><label class="Ten_Text">Tên Sản Phẩm<label></th>
										<th><label class="DonGia_Text">Đơn Giá<label></th>
										<th><label class="DonGia_Text"><label></th>
									</tr>
								</thead>
								<tbody>
									<?php
										$connect = connectDB();
										$query = "Select * from linhkien where Sale_Status='Đang bán' && Loai_LK='RAM'";
										$result = mysqli_query($connect, $query);
										$dataCPU = array();
										while($row = mysqli_fetch_array($result, 1)){
											$dataCPU[] = $row;
										}
										for($i=0;$i<count($dataCPU);$i++){
											$imgSRC = $dataCPU[$i]['Hinh_anh'];
											$idLK = $dataCPU[$i]['ID_LK'];
											$tenLK = $dataCPU[$i]['Ten_LK'];
											$donGia = $dataCPU[$i]['Gia_LK'] * (1 - $dataCPU[$i]['Giam_gia']);
											echo '
												<tr> 
													<td>
														<img src="'.$imgSRC.'" alt="exit-btn" style="width: 100px;">
													</td> 
													<td>'.$idLK.'</td> 
													<td>'.$tenLK.'</td>
													<td><label id="donGiaLK">'.$donGia.'</label></td> 
													<td>
													<div class=chooseitem-btn>	
														<form method="POST" action="" id="frmChooseCPU_'.$i.'">
															<input type="text" name="idChosenCPU" class="hidden_input" value="'.$idLK.'">
														</form>
														<button class="chooseitem-chooseitem-btn" onClick="document.getElementById(\'frmChooseCPU_'.$i.'\').submit();">Chọn</button></div>
													</div>
													</td>  																	
												</tr>	
											';
										}

										closeDB($connect);
									?>
												
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<button class="exit-btn-info" onClick="closePopupRamChooseItem()"><img src="./img/x_button.png" alt="exit-btn" style="width: 50px;"></button>
			</div>
		</div>
		<div class="chooseitem-container hidden" id="hidden-popup-chooseitem-GPU">
			<div class="chooseitem-popup hidden" id="hidden-chooseitem-GPU">
				<div class="item_detail">
					<span class="choose_item_title">Chọn Card đồ hoạ</span>
					<div id="table-wrapper">
						<div id="table-scroll">
							<table>
								<thead>
									<tr>
										<th><label class="Hinh_Text">Hình Ảnh<label></th>
										<th><label class="Ma_Text">Mã<label></th>
										<th><label class="Ten_Text">Tên Sản Phẩm<label></th>
										<th><label class="DonGia_Text">Đơn Giá<label></th>
										<th><label class="DonGia_Text"><label></th>
									</tr>
								</thead>
								<tbody>
									<?php
										$connect = connectDB();
										$query = "Select * from linhkien where Sale_Status='Đang bán' && Loai_LK='GPU'";
										$result = mysqli_query($connect, $query);
										$dataCPU = array();
										while($row = mysqli_fetch_array($result, 1)){
											$dataCPU[] = $row;
										}
										for($i=0;$i<count($dataCPU);$i++){
											$imgSRC = $dataCPU[$i]['Hinh_anh'];
											$idLK = $dataCPU[$i]['ID_LK'];
											$tenLK = $dataCPU[$i]['Ten_LK'];
											$donGia = $dataCPU[$i]['Gia_LK'] * (1 - $dataCPU[$i]['Giam_gia']);
											echo '
												<tr> 
													<td>
														<img src="'.$imgSRC.'" alt="exit-btn" style="width: 100px;">
													</td> 
													<td>'.$idLK.'</td> 
													<td>'.$tenLK.'</td>
													<td><label id="donGiaLK">'.$donGia.'</label></td> 
													<td>
													<div class=chooseitem-btn>	
														<form method="POST" action="" id="frmChooseCPU_'.$i.'">
															<input type="text" name="idChosenCPU" class="hidden_input" value="'.$idLK.'">
														</form>
														<button class="chooseitem-chooseitem-btn" onClick="document.getElementById(\'frmChooseCPU_'.$i.'\').submit();">Chọn</button></div>
													</div>
													</td>  																	
												</tr>	
											';
										}

										closeDB($connect);
									?>
												
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<button class="exit-btn-info" onClick="closePopupGPUChooseItem()"><img src="./img/x_button.png" alt="exit-btn" style="width: 50px;"></button>
			</div>
		</div>
		<div class="chooseitem-container hidden" id="hidden-popup-chooseitem-Ram">
			<div class="chooseitem-popup hidden" id="hidden-chooseitem-Ram">
				<div class="item_detail">
					<span class="choose_item_title">Chọn Ram</span>
					<div id="table-wrapper">
						<div id="table-scroll">
							<table>
								<thead>
									<tr>
										<th><label class="Hinh_Text">Hình Ảnh<label></th>
										<th><label class="Ma_Text">Mã<label></th>
										<th><label class="Ten_Text">Tên Sản Phẩm<label></th>
										<th><label class="DonGia_Text">Đơn Giá<label></th>
										<th><label class="DonGia_Text"><label></th>
									</tr>
								</thead>
								<tbody>
									<?php
										$connect = connectDB();
										$query = "Select * from linhkien where Sale_Status='Đang bán' && Loai_LK='RAM'";
										$result = mysqli_query($connect, $query);
										$dataCPU = array();
										while($row = mysqli_fetch_array($result, 1)){
											$dataCPU[] = $row;
										}
										for($i=0;$i<count($dataCPU);$i++){
											$imgSRC = $dataCPU[$i]['Hinh_anh'];
											$idLK = $dataCPU[$i]['ID_LK'];
											$tenLK = $dataCPU[$i]['Ten_LK'];
											$donGia = $dataCPU[$i]['Gia_LK'] * (1 - $dataCPU[$i]['Giam_gia']);
											echo '
												<tr> 
													<td>
														<img src="'.$imgSRC.'" alt="exit-btn" style="width: 100px;">
													</td> 
													<td>'.$idLK.'</td> 
													<td>'.$tenLK.'</td>
													<td><label id="donGiaLK">'.$donGia.'</label></td> 
													<td>
													<div class=chooseitem-btn>	
														<form method="POST" action="" id="frmChooseCPU_'.$i.'">
															<input type="text" name="idChosenCPU" class="hidden_input" value="'.$idLK.'">
														</form>
														<button class="chooseitem-chooseitem-btn" onClick="document.getElementById(\'frmChooseCPU_'.$i.'\').submit();">Chọn</button></div>
													</div>
													</td>  																	
												</tr>	
											';
										}

										closeDB($connect);
									?>
												
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<button class="exit-btn-info" onClick="closePopupRamChooseItem()"><img src="./img/x_button.png" alt="exit-btn" style="width: 50px;"></button>
			</div>
		</div>
		<div class="chooseitem-container hidden" id="hidden-popup-chooseitem-SSD">
			<div class="chooseitem-popup hidden" id="hidden-chooseitem-SSD">
				<div class="item_detail">
					<span class="choose_item_title">Chọn SSD</span>
					<div id="table-wrapper">
						<div id="table-scroll">
							<table>
								<thead>
									<tr>
										<th><label class="Hinh_Text">Hình Ảnh<label></th>
										<th><label class="Ma_Text">Mã<label></th>
										<th><label class="Ten_Text">Tên Sản Phẩm<label></th>
										<th><label class="DonGia_Text">Đơn Giá<label></th>
										<th><label class="DonGia_Text"><label></th>
									</tr>
								</thead>
								<tbody>
									<?php
										$connect = connectDB();
										$query = "Select * from linhkien where Sale_Status='Đang bán' && Loai_LK='disk'";
										$result = mysqli_query($connect, $query);
										$dataCPU = array();
										while($row = mysqli_fetch_array($result, 1)){
											$dataCPU[] = $row;
										}
										for($i=0;$i<count($dataCPU);$i++){
											$imgSRC = $dataCPU[$i]['Hinh_anh'];
											$idLK = $dataCPU[$i]['ID_LK'];
											$tenLK = $dataCPU[$i]['Ten_LK'];
											$donGia = $dataCPU[$i]['Gia_LK'] * (1 - $dataCPU[$i]['Giam_gia']);
											echo '
												<tr> 
													<td>
														<img src="'.$imgSRC.'" alt="exit-btn" style="width: 100px;">
													</td> 
													<td>'.$idLK.'</td> 
													<td>'.$tenLK.'</td>
													<td><label id="donGiaLK">'.$donGia.'</label></td> 
													<td>
													<div class=chooseitem-btn>	
														<form method="POST" action="" id="frmChooseCPU_'.$i.'">
															<input type="text" name="idChosenCPU" class="hidden_input" value="'.$idLK.'">
														</form>
														<button class="chooseitem-chooseitem-btn" onClick="document.getElementById(\'frmChooseCPU_'.$i.'\').submit();">Chọn</button></div>
													</div>
													</td>  																	
												</tr>	
											';
										}

										closeDB($connect);
									?>
												
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<button class="exit-btn-info" onClick="closePopupSSDChooseItem()"><img src="./img/x_button.png" alt="exit-btn" style="width: 50px;"></button>
			</div>
		</div>
		<div class="chooseitem-container hidden" id="hidden-popup-chooseitem-HDD">
			<div class="chooseitem-popup hidden" id="hidden-chooseitem-HDD">
				<div class="item_detail">
					<span class="choose_item_title">Chọn HDD</span>
					<div id="table-wrapper">
						<div id="table-scroll">
							<table>
								<thead>
									<tr>
										<th><label class="Hinh_Text">Hình Ảnh<label></th>
										<th><label class="Ma_Text">Mã<label></th>
										<th><label class="Ten_Text">Tên Sản Phẩm<label></th>
										<th><label class="DonGia_Text">Đơn Giá<label></th>
										<th><label class="DonGia_Text"><label></th>
									</tr>
								</thead>
								<tbody>
									<?php
										$connect = connectDB();
										$query = "Select * from linhkien where Sale_Status='Đang bán' && Loai_LK='disk'";
										$result = mysqli_query($connect, $query);
										$dataCPU = array();
										while($row = mysqli_fetch_array($result, 1)){
											$dataCPU[] = $row;
										}
										for($i=0;$i<count($dataCPU);$i++){
											$imgSRC = $dataCPU[$i]['Hinh_anh'];
											$idLK = $dataCPU[$i]['ID_LK'];
											$tenLK = $dataCPU[$i]['Ten_LK'];
											$donGia = $dataCPU[$i]['Gia_LK'] * (1 - $dataCPU[$i]['Giam_gia']);
											echo '
												<tr> 
													<td>
														<img src="'.$imgSRC.'" alt="exit-btn" style="width: 100px;">
													</td> 
													<td>'.$idLK.'</td> 
													<td>'.$tenLK.'</td>
													<td><label id="donGiaLK">'.$donGia.'</label></td> 
													<td>
													<div class=chooseitem-btn>	
														<form method="POST" action="" id="frmChooseCPU_'.$i.'">
															<input type="text" name="idChosenCPU" class="hidden_input" value="'.$idLK.'">
														</form>
														<button class="chooseitem-chooseitem-btn" onClick="document.getElementById(\'frmChooseCPU_'.$i.'\').submit();">Chọn</button></div>
													</div>
													</td>  																	
												</tr>	
											';
										}

										closeDB($connect);
									?>
												
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<button class="exit-btn-info" onClick="closePopupHDDChooseItem()"><img src="./img/x_button.png" alt="exit-btn" style="width: 50px;"></button>
			</div>
		</div>
		<div class="chooseitem-container hidden" id="hidden-popup-chooseitem-Case">
			<div class="chooseitem-popup hidden" id="hidden-chooseitem-Case">
				<div class="item_detail">
					<span class="choose_item_title">Chọn Case</span>
					<div id="table-wrapper">
						<div id="table-scroll">
							<table>
								<thead>
									<tr>
										<th><label class="Hinh_Text">Hình Ảnh<label></th>
										<th><label class="Ma_Text">Mã<label></th>
										<th><label class="Ten_Text">Tên Sản Phẩm<label></th>
										<th><label class="DonGia_Text">Đơn Giá<label></th>
										<th><label class="DonGia_Text"><label></th>
									</tr>
								</thead>
								<tbody>
									<?php
										$connect = connectDB();
										$query = "Select * from linhkien where Sale_Status='Đang bán' && Loai_LK='Case'";
										$result = mysqli_query($connect, $query);
										$dataCPU = array();
										while($row = mysqli_fetch_array($result, 1)){
											$dataCPU[] = $row;
										}
										for($i=0;$i<count($dataCPU);$i++){
											$imgSRC = $dataCPU[$i]['Hinh_anh'];
											$idLK = $dataCPU[$i]['ID_LK'];
											$tenLK = $dataCPU[$i]['Ten_LK'];
											$donGia = $dataCPU[$i]['Gia_LK'] * (1 - $dataCPU[$i]['Giam_gia']);
											echo '
												<tr> 
													<td>
														<img src="'.$imgSRC.'" alt="exit-btn" style="width: 100px;">
													</td> 
													<td>'.$idLK.'</td> 
													<td>'.$tenLK.'</td>
													<td><label id="donGiaLK">'.$donGia.'</label></td> 
													<td>
													<div class=chooseitem-btn>	
														<form method="POST" action="" id="frmChooseCPU_'.$i.'">
															<input type="text" name="idChosenCPU" class="hidden_input" value="'.$idLK.'">
														</form>
														<button class="chooseitem-chooseitem-btn" onClick="document.getElementById(\'frmChooseCPU_'.$i.'\').submit();">Chọn</button></div>
													</div>
													</td>  																	
												</tr>	
											';
										}

										closeDB($connect);
									?>
												
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<button class="exit-btn-info" onClick="closePopupCaseChooseItem()"><img src="./img/x_button.png" alt="exit-btn" style="width: 50px;"></button>
			</div>
		</div>
		<div class="buynow-container hidden" id="hidden-popup-buynow">
		<div class="buynow-popup hidden" id="hidden-buynow">
			<form action="muaNgay.php" method="POST" class="buynow-input-container">
				<div class="item_detail">
					<?php
						if(isset($_GET['id_lk']) && isset($_GET['loai_lk'])){
							$connect = connectDB();
							$query = "Select * from linhkien where Sale_Status='Đang bán' and ID_LK = ".$_GET['id_lk'];
							$result = mysqli_query($connect, $query);
							$data = array();
							while($row = mysqli_fetch_array($result, 1)){
								$data[] = $row;
							}	
							$idSP = $_GET['id_lk'];
							$tenSP = $data[0]['Ten_LK'];
							$donGia = $data[0]['Gia_LK']*(1-$data[0]['Giam_gia']);
							$imgSRC = $data[0]['Hinh_anh'];
							closeDB($connect);							
							
							echo '
							<div id="table-wrapper">
								<div id="table-scroll">
									<table>
										<thead>
											<tr>
												<th><label class="Hinh_Text">Hình Ảnh<label></th>
												<th><label class="Ma_Text">Mã<label></th>
												<th><label class="Ten_Text">Tên Sản Phẩm<label></th>
												<th><label class="DonGia_Text">Đơn Giá<label></th>
												<th><label class="SoLuong_Text">Số Lượng<label></th>
												<th><label class="ThanhTien_Text">Thành Tiền<label></th>
											</tr>
										</thead>
										<tbody>
											<tr> 
												<td>
													<img src="'.$imgSRC.'" alt="exit-btn" style="width: 200px;">
												</td> 
												<td>'.$idSP.'</td> 
												<td>'.$tenSP.'</td>
												<td><label id="donGiaLK">'.$donGia.'</label></td> 
												<td>
													<input type="button" class="dau" value="-" onClick="updateMinusSLPopup();updateTotalCostPopup(document.getElementById(\'soluong_sp_popup\').value*'.$donGia.');">
													<input type="number" name="sl_sp" class="so_luong" value="1" min="1" id="soluong_sp_popup">
													<input type="button" class="dau" value="+" onClick="updatePlusSLPopup();updateTotalCostPopup(document.getElementById(\'soluong_sp_popup\').value*'.$donGia.');">
												</td>
												<td><label id="tong_tien">'.$donGia.'</label></td>
												<td></td>  
											</tr>										
										</tbody>
									</table>
								</div>
							</div>
							';
						}
					?>
				</div>					
				<div class="Address_Info">
					<div class="custom-select">
						<select onChange="showAddressText()" id="select_address">
							<option value="0">Chọn địa chỉ: </option>
							<?php
								$connect = connectDB();
								$query = "Select * from address_user where id_user = '".$_SESSION['id_user']."'";
								$result = mysqli_query($connect, $query);
								$address = array();
								while($row = mysqli_fetch_array($result, 1)){
									$address[] = $row;
								}
								for($i=0;$i<count($address);$i++){
									echo '<option value="'.$address[$i]['Diachi'].'">'.$address[$i]['Diachi'].'</option> ';
								}
								closeDB($connect);
							?>
							<option value="1">Thêm địa chỉ mới</option>
						</select>			
					</div>
					<div class="Address_Text">
						<textarea rows="6" class="address_area hidden" id="input_address" onchange="updateAddress()"></textarea>
						<div class="BuyNow_Button">
							<input type="text" name="user_id" class="hidden_input_popup" value="<?php echo $_SESSION['id_user']; ?>">
							<input type="text" name="id_LK" class="hidden_input_popup" value="<?php echo $_GET['id_lk']; ?>">
							<input type="text" name="loai_lk" class="hidden_input_popup" value="<?php echo $_GET['loai_lk']; ?>">
							<input type="text" name="so_luong_mua" class="hidden_input_popup" id="so_luong_mua">
							<input type="text" name="don_gia" class="hidden_input_popup" id="don_gia">
							<input type="text" name="address" class="hidden_input_popup" id="input_address_user">
							<input type="text" name="tong_tien" class="hidden_input_popup" id="input_tong_tien">
							<script>
								document.getElementById("so_luong_mua").value = document.getElementById("soluong_sp_popup").value;
								document.getElementById("don_gia").value = document.getElementById("donGiaLK").innerHTML;
								document.getElementById("input_address_user").value = document.getElementById("select_address").options[1].text;
								document.getElementById("input_tong_tien").value = document.getElementById("tong_tien").innerHTML;
							</script>
							<input type="submit" value="Xác Nhận" class="buynow-buynow-btn">
						</div>
						<div class="TongTien">
							<div class="TongTien3">
								<span>Tổng Hoá Đơn:</span>
								<span id="tong_hoa_don"></span>
								<span>đ</span>
							</div>
							<script>
								document.getElementById("tong_hoa_don").innerHTML = parseInt(document.getElementById("tong_tien").innerHTML);
							</script>
						</div>	
					</div>	
						
					</div>	
				</form>
				<button class="exit-btn" onClick="closeBuyNow()"><img src="./img/x_button.png" alt="exit-btn" style="width: 50px;"></button>
			</div>
		</div>								
	<script>
		var x, i, j, l, ll, selElmnt, a, b, c;
		/*look for any elements with the class "custom-select":*/
		x = document.getElementsByClassName("custom-select");
		l = x.length;
		for (i = 0; i < l; i++) {
		selElmnt = x[i].getElementsByTagName("select")[0];
		ll = selElmnt.length;
		/*for each element, create a new DIV that will act as the selected item:*/
		a = document.createElement("DIV");
		a.setAttribute("class", "select-selected");
		a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
		x[i].appendChild(a);
		/*for each element, create a new DIV that will contain the option list:*/
		b = document.createElement("DIV");
		b.setAttribute("class", "select-items select-hide");
		for (j = 1; j < ll; j++) {
			/*for each option in the original select element,
			create a new DIV that will act as an option item:*/
			c = document.createElement("DIV");
			c.innerHTML = selElmnt.options[j].innerHTML;
			c.addEventListener("click", function(e) {
				/*when an item is clicked, update the original select box,
				and the selected item:*/
				var y, i, k, s, h, sl, yl;
				s = this.parentNode.parentNode.getElementsByTagName("select")[0];
				sl = s.length;
				h = this.parentNode.previousSibling;
				for (i = 0; i < sl; i++) {
				if (s.options[i].innerHTML == this.innerHTML) {
					s.selectedIndex = i;
					var event = new Event('change');
					s.dispatchEvent(event);;
					h.innerHTML = this.innerHTML;
					y = this.parentNode.getElementsByClassName("same-as-selected");
					yl = y.length;
					for (k = 0; k < yl; k++) {
					y[k].removeAttribute("class");
					}
					this.setAttribute("class", "same-as-selected");
					break;
				}
				}
				h.click();
			});
			b.appendChild(c);
		}
		x[i].appendChild(b);
		a.addEventListener("click", function(e) {
			/*when the select box is clicked, close any other select boxes,
			and open/close the current select box:*/
			e.stopPropagation();
			closeAllSelect(this);
			this.nextSibling.classList.toggle("select-hide");
			this.classList.toggle("select-arrow-active");
			});
		}
		function closeAllSelect(elmnt) {
		/*a function that will close all select boxes in the document,
		except the current select box:*/
		var x, y, i, xl, yl, arrNo = [];
		x = document.getElementsByClassName("select-items");
		y = document.getElementsByClassName("select-selected");
		xl = x.length;
		yl = y.length;
		for (i = 0; i < yl; i++) {
			if (elmnt == y[i]) {
			arrNo.push(i)
			} else {
			y[i].classList.remove("select-arrow-active");
			}
		}
		for (i = 0; i < xl; i++) {
			if (arrNo.indexOf(i)) {
			x[i].classList.add("select-hide");
			}
		}
		}
		/*if the user clicks anywhere outside the select box,
		then close all select boxes:*/
		document.addEventListener("click", closeAllSelect);
	</script>
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

