<?php
	require_once("../DBprocess.php");
	require_once('HTMLprocess.php');
	if(isset($_POST['username']) && isset($_POST['password'])){
		login();	
	}

	if(isset($_POST['idChosenCPU'])){
		$_SESSION['idChosenCPU'] = $_POST['idChosenCPU'];
		unset($_SESSION['slCPU']);
	}
	if(isset($_SESSION['idChosenCPU'])){
		if(isset($_SESSION['slCPU'])){
			if(isset($_POST['sl_sp_CPU'])){
				$_SESSION['slCPU'] = $_POST['sl_sp_CPU'];
			}
		}
		else{
			$_SESSION['slCPU'] = 1;
		}
	}

	if(isset($_POST['idChosenMain'])){
		$_SESSION['idChosenMain'] = $_POST['idChosenMain'];
	}
	if(isset($_SESSION['idChosenMain'])){
		if(isset($_SESSION['slMain'])){
			if(isset($_POST['sl_sp_Main'])){
				$_SESSION['slMain'] = $_POST['sl_sp_Main'];
			}
		}
		else{
			$_SESSION['slMain'] = 1;
		}
	}

	if(isset($_POST['idChosenRAM'])){
		$_SESSION['idChosenRAM'] = $_POST['idChosenRAM'];
	}
	if(isset($_SESSION['idChosenRAM'])){
		if(isset($_SESSION['slRAM'])){
			if(isset($_POST['sl_sp_RAM'])){
				$_SESSION['slRAM'] = $_POST['sl_sp_RAM'];
			}
		}
		else{
			$_SESSION['slRAM'] = 1;
		}
	}

	if(isset($_POST['idChosenGPU'])){
		$_SESSION['idChosenGPU'] = $_POST['idChosenGPU'];
	}
	if(isset($_SESSION['idChosenGPU'])){
		if(isset($_SESSION['slGPU'])){
			if(isset($_POST['sl_sp_GPU'])){
				$_SESSION['slGPU'] = $_POST['sl_sp_GPU'];
			}
		}
		else{
			$_SESSION['slGPU'] = 1;
		}
	}

	if(isset($_POST['idChosenSSD'])){
		$_SESSION['idChosenSSD'] = $_POST['idChosenSSD'];
	}
	if(isset($_SESSION['idChosenSSD'])){
		if(isset($_SESSION['slSSD'])){
			if(isset($_POST['sl_sp_SSD'])){
				$_SESSION['slSSD'] = $_POST['sl_sp_SSD'];
			}
		}
		else{
			$_SESSION['slSSD'] = 1;
		}
	}

	if(isset($_POST['idChosenHDD'])){
		$_SESSION['idChosenHDD'] = $_POST['idChosenHDD'];
	}
	if(isset($_SESSION['idChosenHDD'])){
		if(isset($_SESSION['slHDD'])){
			if(isset($_POST['sl_sp_HDD'])){
				$_SESSION['slHDD'] = $_POST['sl_sp_HDD'];
			}
		}
		else{
			$_SESSION['slHDD'] = 1;
		}
	}

	if(isset($_POST['idChosenCase'])){
		$_SESSION['idChosenCase'] = $_POST['idChosenCase'];
	}
	if(isset($_SESSION['idChosenCase'])){
		if(isset($_SESSION['slCase'])){
			if(isset($_POST['sl_sp_Case'])){
				$_SESSION['slCase'] = $_POST['sl_sp_Case'];
			}
		}
		else{
			$_SESSION['slCase'] = 1;
		}
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
			let tongHoaDon = 0;
			if(document.getElementById("soluong_sp_CPU") != null){
				document.getElementById("soluong_sp_popup_CPU").value = document.getElementById("soluong_sp_CPU").value;
				let donGia = document.getElementById("donGiaLK_CPU").innerHTML;
				let sl = document.getElementById("soluong_sp_CPU").value;
				document.getElementById("tong_tien_CPU").innerHTML = parseInt(donGia) * sl;
				tongHoaDon += parseInt(donGia) * sl;
				document.getElementById("input_sl_CPU").value = document.getElementById("soluong_sp_CPU").value;
				document.getElementById("input_dg_CPU").value = parseInt(document.getElementById("donGiaCPU").innerHTML);
			}
			if(document.getElementById("soluong_sp_Main") != null){
				document.getElementById("soluong_sp_popup_Main").value = document.getElementById("soluong_sp_Main").value;
				let donGia = document.getElementById("donGiaLK_Main").innerHTML;
				let sl = document.getElementById("soluong_sp_Main").value;
				document.getElementById("tong_tien_Main").innerHTML = parseInt(donGia) * sl;
				tongHoaDon += parseInt(donGia) * sl;
				document.getElementById("input_sl_Main").value = document.getElementById("soluong_sp_Main").value;
				document.getElementById("input_dg_Main").value = parseInt(document.getElementById("donGiaMain").innerHTML);
			}
			if(document.getElementById("soluong_sp_RAM") != null){
				document.getElementById("soluong_sp_popup_RAM").value = document.getElementById("soluong_sp_RAM").value;
				let donGia = document.getElementById("donGiaLK_RAM").innerHTML;
				let sl = document.getElementById("soluong_sp_RAM").value;
				document.getElementById("tong_tien_RAM").innerHTML = parseInt(donGia) * sl;
				tongHoaDon += parseInt(donGia) * sl;
				document.getElementById("input_sl_RAM").value = document.getElementById("soluong_sp_RAM").value;
				document.getElementById("input_dg_RAM").value = parseInt(document.getElementById("donGiaRAM").innerHTML);
			}
			if(document.getElementById("soluong_sp_GPU") != null){
				document.getElementById("soluong_sp_popup_GPU").value = document.getElementById("soluong_sp_GPU").value;
				let donGia = document.getElementById("donGiaLK_GPU").innerHTML;
				let sl = document.getElementById("soluong_sp_GPU").value;
				document.getElementById("tong_tien_GPU").innerHTML = parseInt(donGia) * sl;
				tongHoaDon += parseInt(donGia) * sl;
				document.getElementById("input_sl_GPU").value = document.getElementById("soluong_sp_GPU").value;
				document.getElementById("input_dg_GPU").value = parseInt(document.getElementById("donGiaGPU").innerHTML);
			}
			if(document.getElementById("soluong_sp_SSD") != null){
				document.getElementById("soluong_sp_popup_SSD").value = document.getElementById("soluong_sp_SSD").value;
				let donGia = document.getElementById("donGiaLK_SSD").innerHTML;
				let sl = document.getElementById("soluong_sp_SSD").value;
				document.getElementById("tong_tien_SSD").innerHTML = parseInt(donGia) * sl;
				tongHoaDon += parseInt(donGia) * sl;
				document.getElementById("input_sl_SSD").value = document.getElementById("soluong_sp_SSD").value;
				document.getElementById("input_dg_SSD").value = parseInt(document.getElementById("donGiaSSD").innerHTML);
			}
			if(document.getElementById("soluong_sp_HDD") != null){
				document.getElementById("soluong_sp_popup_HDD").value = document.getElementById("soluong_sp_HDD").value;
				let donGia = document.getElementById("donGiaLK_HDD").innerHTML;
				let sl = document.getElementById("soluong_sp_HDD").value;
				document.getElementById("tong_tien_HDD").innerHTML = parseInt(donGia) * sl;
				tongHoaDon += parseInt(donGia) * sl;
				document.getElementById("input_sl_HDD").value = document.getElementById("soluong_sp_HDD").value;
				document.getElementById("input_dg_HDD").value = parseInt(document.getElementById("donGiaHDD").innerHTML);
			}
			if(document.getElementById("soluong_sp_Case") != null){
				document.getElementById("soluong_sp_popup_Case").value = document.getElementById("soluong_sp_Case").value;
				let donGia = document.getElementById("donGiaLK_Case").innerHTML;
				let sl = document.getElementById("soluong_sp_Case").value;
				document.getElementById("tong_tien_Case").innerHTML = parseInt(donGia) * sl;
				tongHoaDon += parseInt(donGia) * sl;
				document.getElementById("input_sl_Case").value = document.getElementById("soluong_sp_Case").value;
				document.getElementById("input_dg_Case").value = parseInt(document.getElementById("donGiaCase").innerHTML);
			}
			document.getElementById("tong_hoa_don").innerHTML = tongHoaDon;
			document.getElementById("input_tong_tien").value = document.getElementById("tongTienBuildPC").innerHTML;
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
		function updateAmount(idFormSubmit){
			document.getElementById(idFormSubmit).submit();
		}
		function minusAmount(idInput){
			var event = new Event('change');
			document.getElementById(idInput).value--;
			document.getElementById(idInput).dispatchEvent(event);
		}
		function plusAmount(idInput){
			var event = new Event('change');
			document.getElementById(idInput).value++;
			document.getElementById(idInput).dispatchEvent(event);
		}
		function updateMinusSLPopup(loaiLK){
			let elementID = 'soluong_sp_popup_' + loaiLK;
			let sl_LoaiLK = 'input_sl_' + loaiLK
			if(document.getElementById(elementID).value > 1){
				document.getElementById(elementID).value--;
				var event = new Event('change');
				document.getElementById(elementID).dispatchEvent(event);
			}
		}
		function updatePlusSLPopup(loaiLK){
			let elementID = 'soluong_sp_popup_' + loaiLK;
			let sl_LoaiLK = 'input_sl_' + loaiLK
			document.getElementById(elementID).value++;
			var event = new Event('change');
			document.getElementById(elementID).dispatchEvent(event);
		}
		function updateCostPopup(loaiLK){
			let idDonGia = 'donGiaLK_' + loaiLK;
			let idSL = 'soluong_sp_popup_' + loaiLK;
			let idTongTien = 'tong_tien_' + loaiLK;
			let donGia = document.getElementById(idDonGia).innerHTML;
			let slSP = document.getElementById(idSL).value;
			let sl_LoaiLK = 'input_sl_' + loaiLK;
			let elementID = 'soluong_sp_popup_' + loaiLK;
			document.getElementById(sl_LoaiLK).value = document.getElementById(elementID).value;
			document.getElementById(idTongTien).innerHTML = (donGia)*(slSP);
			updateTongHoaDon();
			document.getElementById("input_tong_tien").value = document.getElementById("tong_hoa_don").innerHTML;
		}
		function updateTongHoaDon(){
			let tien = 0;
			if(document.getElementById("tong_tien_CPU") != null){
				tien += parseInt(document.getElementById("tong_tien_CPU").innerHTML);
			}
			if(document.getElementById("tong_tien_Main") != null){
				tien += parseInt(document.getElementById("tong_tien_Main").innerHTML);
			}
			if(document.getElementById("tong_tien_RAM") != null){
				tien += parseInt(document.getElementById("tong_tien_RAM").innerHTML);
			}
			if(document.getElementById("tong_tien_GPU") != null){
				tien += parseInt(document.getElementById("tong_tien_GPU").innerHTML);
			}
			if(document.getElementById("tong_tien_SSD") != null){
				tien += parseInt(document.getElementById("tong_tien_SSD").innerHTML);
			}
			if(document.getElementById("tong_tien_HDD") != null){
				tien += parseInt(document.getElementById("tong_tien_HDD").innerHTML);
			}
			if(document.getElementById("tong_tien_Case") != null){
				tien += parseInt(document.getElementById("tong_tien_Case").innerHTML);
			}
			document.getElementById("tong_hoa_don").innerHTML = tien;
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
						';
						if($_SESSION['slCPU'] == 1){
							echo '
								<form method="POST" action="Xoa_SP_BuildPC.php" id="frmDelCPU">
									<input type="text" name="del_CPU" class="hidden_input" value="1" >
								</form>
							';
							echo '<img class="thungrac" src="../img/thungrac.svg" onClick="document.getElementById(\'frmDelCPU\').submit();">';
						}
						else{
							echo '<input type="button" class="dau" value="-" onClick="minusAmount(\'soluong_sp_CPU\');">';
						}
						echo '		
									<form method="POST" action="" id="frmAmountCPU">
										<input type="number" name="sl_sp_CPU" class="so_luong" value="'.$_SESSION['slCPU'].'" min="1" id="soluong_sp_CPU" onChange="updateAmount(\'frmAmountCPU\');">
									</form>
									<input type="button" class="dau" value="+" onClick="plusAmount(\'soluong_sp_CPU\');">
								</div>
								<div class="price_item">
									<span class="price_item_1" id="donGiaCPU">'.$donGia.'</span>
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
						';
						if($_SESSION['slMain'] == 1){
							echo '
								<form method="POST" action="Xoa_SP_BuildPC.php" id="frmDelMain">
									<input type="text" name="del_Main" class="hidden_input" value="1" >
								</form>
							';
							echo '<img class="thungrac" src="../img/thungrac.svg" onClick="document.getElementById(\'frmDelMain\').submit();">';
						}
						else{
							echo '<input type="button" class="dau" value="-" onClick="minusAmount(\'soluong_sp_Main\');">';
						}
						echo '
									<form method="POST" action="" id="frmAmountMain">
										<input type="number" name="sl_sp_Main" class="so_luong" value="'.$_SESSION['slMain'].'" min="1" id="soluong_sp_Main" onChange="updateAmount(\'frmAmountMain\');">
									</form>
									<input type="button" class="dau" value="+" onClick="plusAmount(\'soluong_sp_Main\')">
								</div>
								<div class="price_item">
									<span class="price_item_1" id="donGiaMain">'.$donGia.'</span>
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
						';
						if($_SESSION['slRAM'] == 1){
							echo '
								<form method="POST" action="Xoa_SP_BuildPC.php" id="frmDelRAM">
									<input type="text" name="del_RAM" class="hidden_input" value="1" >
								</form>
							';
							echo '<img class="thungrac" src="../img/thungrac.svg" onClick="document.getElementById(\'frmDelRAM\').submit();">';
						}
						else{
							echo '<input type="button" class="dau" value="-" onClick="minusAmount(\'soluong_sp_RAM\');">';
						}
						echo '
									<form method="POST" action="" id="frmAmountRAM">
										<input type="number" name="sl_sp_RAM" class="so_luong" value="'.$_SESSION['slRAM'].'" min="1" id="soluong_sp_RAM" onChange="updateAmount(\'frmAmountRAM\');">
									</form>
									<input type="button" class="dau" value="+" onClick="plusAmount(\'soluong_sp_RAM\')">
								</div>
								<div class="price_item">
									<span class="price_item_1" id="donGiaRAM">'.$donGia.'</span>
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
						';
						if($_SESSION['slGPU'] == 1){
							echo '
								<form method="POST" action="Xoa_SP_BuildPC.php" id="frmDelGPU">
									<input type="text" name="del_GPU" class="hidden_input" value="1" >
								</form>
							';
							echo '<img class="thungrac" src="../img/thungrac.svg" onClick="document.getElementById(\'frmDelGPU\').submit();">';
						}
						else{
							echo '<input type="button" class="dau" value="-" onClick="minusAmount(\'soluong_sp_GPU\');">';
						}
						echo '
									<form method="POST" action="" id="frmAmountGPU">
										<input type="number" name="sl_sp_GPU" class="so_luong" value="'.$_SESSION['slGPU'].'" min="1" id="soluong_sp_GPU" onChange="updateAmount(\'frmAmountGPU\');">
									</form>
									<input type="button" class="dau" value="+" onClick="plusAmount(\'soluong_sp_GPU\')">
								</div>
								<div class="price_item">
									<span class="price_item_1" id="donGiaGPU">'.$donGia.'</span>
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
						';
						if($_SESSION['slSSD'] == 1){
							echo '
								<form method="POST" action="Xoa_SP_BuildPC.php" id="frmDelSSD">
									<input type="text" name="del_SSD" class="hidden_input" value="1" >
								</form>
							';
							echo '<img class="thungrac" src="../img/thungrac.svg" onClick="document.getElementById(\'frmDelSSD\').submit();">';
						}
						else{
							echo '<input type="button" class="dau" value="-" onClick="minusAmount(\'soluong_sp_SSD\');">';
						}
						echo '
									<form method="POST" action="" id="frmAmountSSD">
										<input type="number" name="sl_sp_SSD" class="so_luong" value="'.$_SESSION['slSSD'].'" min="1" id="soluong_sp_SSD" onChange="updateAmount(\'frmAmountSSD\');">
									</form>
									<input type="button" class="dau" value="+" onClick="plusAmount(\'soluong_sp_SSD\')">
								</div>
								<div class="price_item">
									<span class="price_item_1" id="donGiaSSD">'.$donGia.'</span>
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
						';
						if($_SESSION['slHDD'] == 1){
							echo '
								<form method="POST" action="Xoa_SP_BuildPC.php" id="frmDelHDD">
									<input type="text" name="del_HDD" class="hidden_input" value="1" >
								</form>
							';
							echo '<img class="thungrac" src="../img/thungrac.svg" onClick="document.getElementById(\'frmDelHDD\').submit();">';
						}
						else{
							echo '<input type="button" class="dau" value="-" onClick="minusAmount(\'soluong_sp_HDD\');">';
						}
						echo '
									<form method="POST" action="" id="frmAmountHDD">
										<input type="number" name="sl_sp_HDD" class="so_luong" value="'.$_SESSION['slHDD'].'" min="1" id="soluong_sp_HDD" onChange="updateAmount(\'frmAmountHDD\');">
									</form>
									<input type="button" class="dau" value="+" onClick="plusAmount(\'soluong_sp_HDD\')">
								</div>
								<div class="price_item">
									<span class="price_item_1" id="donGiaHDD">'.$donGia.'</span>
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
						';
						if($_SESSION['slCase'] == 1){
							echo '
								<form method="POST" action="Xoa_SP_BuildPC.php" id="frmDelCase">
									<input type="text" name="del_Case" class="hidden_input" value="1" >
								</form>
							';
							echo '<img class="thungrac" src="../img/thungrac.svg" onClick="document.getElementById(\'frmDelCase\').submit();">';
						}
						else{
							echo '<input type="button" class="dau" value="-" onClick="minusAmount(\'soluong_sp_Case\');">';
						}
						echo '
									<form method="POST" action="" id="frmAmountCase">
										<input type="number" name="sl_sp_Case" class="so_luong" value="'.$_SESSION['slCase'].'" min="1" id="soluong_sp_Case" onChange="updateAmount(\'frmAmountCase\');">
									</form>
									<input type="button" class="dau" value="+" onClick="plusAmount(\'soluong_sp_Case\')">
								</div>
								<div class="price_item">
									<span class="price_item_1" id="donGiaCase">'.$donGia.'</span>
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
        <div class="total_price" id="total_price_flexbox">
            <div class="total_price_item">
                <span class="total_price_text">Tổng Cộng:
					<label id="tongTienBuildPC">
						<script>
							let tongTien = 0;
							if(document.getElementById("donGiaCPU") != null){
								tongTien += parseInt(document.getElementById("donGiaCPU").innerHTML) * document.getElementById("soluong_sp_CPU").value;
							}
							if(document.getElementById("donGiaMain") != null){
								tongTien += parseInt(document.getElementById("donGiaMain").innerHTML) * document.getElementById("soluong_sp_Main").value;
							}
							if(document.getElementById("donGiaRAM") != null){
								tongTien += parseInt(document.getElementById("donGiaRAM").innerHTML) * document.getElementById("soluong_sp_RAM").value;
							}
							if(document.getElementById("donGiaGPU") != null){
								tongTien += parseInt(document.getElementById("donGiaGPU").innerHTML) * document.getElementById("soluong_sp_GPU").value;
							}
							if(document.getElementById("donGiaSSD") != null){
								tongTien += parseInt(document.getElementById("donGiaSSD").innerHTML) * document.getElementById("soluong_sp_SSD").value;
							}
							if(document.getElementById("donGiaHDD") != null){
								tongTien += parseInt(document.getElementById("donGiaHDD").innerHTML) * document.getElementById("soluong_sp_HDD").value;
							}
							if(document.getElementById("donGiaCase") != null){
								tongTien += parseInt(document.getElementById("donGiaCase").innerHTML) * document.getElementById("soluong_sp_Case").value;
							}
							document.getElementById("tongTienBuildPC").innerHTML = tongTien;
							if(tongTien == 0){
								document.getElementById("total_price_flexbox").classList.add("hidden");
							}
						</script>
					</label>
					đ
				</span>
				<?php
					if(isset($_SESSION['username'])){	
						echo '<input type="button" class="buy_now_button" value="Mua Ngay" onClick="openPopupBuyNow()">';
					}
					else{
						echo '<input type="button" class="buy_now_button" value="Mua Ngay" onClick="openPopup()">';
					}
				?>
				<form action="addCart_BuildPC.php" method="post" id="addCart_BuildPC"></form>
				<input type="button" class="add_cart_button" value="Thêm vào giỏ hàng" onClick="document.getElementById('addCart_BuildPC').submit();">
			</div>
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
														<img src="'.$imgSRC.'" alt="exit-btn" style="width: 100px; height: 100px;">
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
														<img src="'.$imgSRC.'" alt="exit-btn" style="width: 100px; height: 100px;">
													</td> 
													<td>'.$idLK.'</td> 
													<td>'.$tenLK.'</td>
													<td><label id="donGiaLK">'.$donGia.'</label></td> 
													<td>
													<div class=chooseitem-btn>	
														<form method="POST" action="" id="frmChooseMain_'.$i.'">
															<input type="text" name="idChosenMain" class="hidden_input" value="'.$idLK.'">
														</form>
														<button class="chooseitem-chooseitem-btn" onClick="document.getElementById(\'frmChooseMain_'.$i.'\').submit();">Chọn</button></div>
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
														<img src="'.$imgSRC.'" alt="exit-btn" style="width: 100px; height: 100px;">
													</td> 
													<td>'.$idLK.'</td> 
													<td>'.$tenLK.'</td>
													<td><label id="donGiaLK">'.$donGia.'</label></td> 
													<td>
													<div class=chooseitem-btn>	
														<form method="POST" action="" id="frmChooseRAM_'.$i.'">
															<input type="text" name="idChosenRAM" class="hidden_input" value="'.$idLK.'">
														</form>
														<button class="chooseitem-chooseitem-btn" onClick="document.getElementById(\'frmChooseRAM_'.$i.'\').submit();">Chọn</button></div>
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
														<img src="'.$imgSRC.'" alt="exit-btn" style="width: 100px; height: 100px;">
													</td> 
													<td>'.$idLK.'</td> 
													<td>'.$tenLK.'</td>
													<td><label id="donGiaLK">'.$donGia.'</label></td> 
													<td>
													<div class=chooseitem-btn>	
														<form method="POST" action="" id="frmChooseGPU_'.$i.'">
															<input type="text" name="idChosenGPU" class="hidden_input" value="'.$idLK.'">
														</form>
														<button class="chooseitem-chooseitem-btn" onClick="document.getElementById(\'frmChooseGPU_'.$i.'\').submit();">Chọn</button></div>
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
										$query = "Select * from linhkien join disk on linhkien.id_lk = disk.id_lk where Sale_Status='Đang bán' && Loai='SSD'";
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
														<img src="'.$imgSRC.'" alt="exit-btn" style="width: 100px; height: 100px;">
													</td> 
													<td>'.$idLK.'</td> 
													<td>'.$tenLK.'</td>
													<td><label id="donGiaLK">'.$donGia.'</label></td> 
													<td>
													<div class=chooseitem-btn>	
														<form method="POST" action="" id="frmChooseSSD_'.$i.'">
															<input type="text" name="idChosenSSD" class="hidden_input" value="'.$idLK.'">
														</form>
														<button class="chooseitem-chooseitem-btn" onClick="document.getElementById(\'frmChooseSSD_'.$i.'\').submit();">Chọn</button></div>
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
										$query = "Select * from linhkien join disk on linhkien.id_lk = disk.id_lk where Sale_Status='Đang bán' && Loai='HDD'";
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
														<img src="'.$imgSRC.'" alt="exit-btn" style="width: 100px; height: 100px;">
													</td> 
													<td>'.$idLK.'</td> 
													<td>'.$tenLK.'</td>
													<td><label id="donGiaLK">'.$donGia.'</label></td> 
													<td>
													<div class=chooseitem-btn>	
														<form method="POST" action="" id="frmChooseHDD_'.$i.'">
															<input type="text" name="idChosenHDD" class="hidden_input" value="'.$idLK.'">
														</form>
														<button class="chooseitem-chooseitem-btn" onClick="document.getElementById(\'frmChooseHDD_'.$i.'\').submit();">Chọn</button></div>
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
														<img src="'.$imgSRC.'" alt="exit-btn" style="width: 100px; height: 100px;">
													</td> 
													<td>'.$idLK.'</td> 
													<td>'.$tenLK.'</td>
													<td><label id="donGiaLK">'.$donGia.'</label></td> 
													<td>
													<div class=chooseitem-btn>	
														<form method="POST" action="" id="frmChooseCase_'.$i.'">
															<input type="text" name="idChosenCase" class="hidden_input" value="'.$idLK.'">
														</form>
														<button class="chooseitem-chooseitem-btn" onClick="document.getElementById(\'frmChooseCase_'.$i.'\').submit();">Chọn</button></div>
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
				<form action="muaNgay_BuildPC.php" method="POST" class="buynow-input-container">
					<div class="item_detail">
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
									<?php
										if(isset($_SESSION['idChosenCPU'])){
											$connect = connectDB();
											$query = "Select * from linhkien where ID_LK = ".$_SESSION['idChosenCPU'];
											$result = mysqli_query($connect, $query);
											$data = array();
											while($row = mysqli_fetch_array($result, 1)){
												$data[] = $row;
											}	
											$idSP = $data[0]['ID_LK'];
											$tenSP = $data[0]['Ten_LK'];
											$donGia = $data[0]['Gia_LK']*(1-$data[0]['Giam_gia']);
											$imgSRC = $data[0]['Hinh_anh'];
											closeDB($connect);							
											echo '
												<tr> 
													<td>
														<img src="'.$imgSRC.'" alt="exit-btn" style="width: 200px; height: 200px;">
													</td> 
													<td>'.$idSP.'</td> 
													<td>'.$tenSP.'</td>
													<td><label id="donGiaLK_CPU">'.$donGia.'</label></td> 
													<td>
														<input type="button" class="dau" value="-" onClick="updateMinusSLPopup(\'CPU\');">
														<input type="number" name="sl_sp" class="so_luong" value="1" min="1" id="soluong_sp_popup_CPU" onChange="updateCostPopup(\'CPU\')">
														<input type="button" class="dau" value="+" onClick="updatePlusSLPopup(\'CPU\');">
													</td>
													<td><label id="tong_tien_CPU"></label></td>
													<td></td>  
												</tr>';
										}

										if(isset($_SESSION['idChosenMain'])){
											$connect = connectDB();
											$query = "Select * from linhkien where ID_LK = ".$_SESSION['idChosenMain'];
											$result = mysqli_query($connect, $query);
											$data = array();
											while($row = mysqli_fetch_array($result, 1)){
												$data[] = $row;
											}	
											$idSP = $data[0]['ID_LK'];
											$tenSP = $data[0]['Ten_LK'];
											$donGia = $data[0]['Gia_LK']*(1-$data[0]['Giam_gia']);
											$imgSRC = $data[0]['Hinh_anh'];
											closeDB($connect);							
											echo '
												<tr> 
													<td>
														<img src="'.$imgSRC.'" alt="exit-btn" style="width: 200px; height: 200px;">
													</td> 
													<td>'.$idSP.'</td> 
													<td>'.$tenSP.'</td>
													<td><label id="donGiaLK_Main">'.$donGia.'</label></td> 
													<td>
														<input type="button" class="dau" value="-" onClick="updateMinusSLPopup(\'Main\');">
														<input type="number" name="sl_sp" class="so_luong" value="1" min="1" id="soluong_sp_popup_Main" onChange="updateCostPopup(\'Main\')">
														<input type="button" class="dau" value="+" onClick="updatePlusSLPopup(\'Main\');">
													</td>
													<td><label id="tong_tien_Main"></label></td>
													<td></td>  
												</tr>';
										}

										if(isset($_SESSION['idChosenRAM'])){
											$connect = connectDB();
											$query = "Select * from linhkien where ID_LK = ".$_SESSION['idChosenRAM'];
											$result = mysqli_query($connect, $query);
											$data = array();
											while($row = mysqli_fetch_array($result, 1)){
												$data[] = $row;
											}	
											$idSP = $data[0]['ID_LK'];
											$tenSP = $data[0]['Ten_LK'];
											$donGia = $data[0]['Gia_LK']*(1-$data[0]['Giam_gia']);
											$imgSRC = $data[0]['Hinh_anh'];
											closeDB($connect);							
											echo '
												<tr> 
													<td>
														<img src="'.$imgSRC.'" alt="exit-btn" style="width: 200px; height: 200px;">
													</td> 
													<td>'.$idSP.'</td> 
													<td>'.$tenSP.'</td>
													<td><label id="donGiaLK_RAM">'.$donGia.'</label></td> 
													<td>
														<input type="button" class="dau" value="-" onClick="updateMinusSLPopup(\'RAM\');">
														<input type="number" name="sl_sp" class="so_luong" value="1" min="1" id="soluong_sp_popup_RAM" onChange="updateCostPopup(\'RAM\')">
														<input type="button" class="dau" value="+" onClick="updatePlusSLPopup(\'RAM\');">
													</td>
													<td><label id="tong_tien_RAM"></label></td>
													<td></td>  
												</tr>';
										}

										if(isset($_SESSION['idChosenGPU'])){
											$connect = connectDB();
											$query = "Select * from linhkien where ID_LK = ".$_SESSION['idChosenGPU'];
											$result = mysqli_query($connect, $query);
											$data = array();
											while($row = mysqli_fetch_array($result, 1)){
												$data[] = $row;
											}	
											$idSP = $data[0]['ID_LK'];
											$tenSP = $data[0]['Ten_LK'];
											$donGia = $data[0]['Gia_LK']*(1-$data[0]['Giam_gia']);
											$imgSRC = $data[0]['Hinh_anh'];
											closeDB($connect);							
											echo '
												<tr> 
													<td>
														<img src="'.$imgSRC.'" alt="exit-btn" style="width: 200px; height: 200px;">
													</td> 
													<td>'.$idSP.'</td> 
													<td>'.$tenSP.'</td>
													<td><label id="donGiaLK_GPU">'.$donGia.'</label></td> 
													<td>
														<input type="button" class="dau" value="-" onClick="updateMinusSLPopup(\'GPU\');">
														<input type="number" name="sl_sp" class="so_luong" value="1" min="1" id="soluong_sp_popup_GPU" onChange="updateCostPopup(\'GPU\')">
														<input type="button" class="dau" value="+" onClick="updatePlusSLPopup(\'GPU\');">
													</td>
													<td><label id="tong_tien_GPU"></label></td>
													<td></td>  
												</tr>';
										}

										if(isset($_SESSION['idChosenSSD'])){
											$connect = connectDB();
											$query = "Select * from linhkien where ID_LK = ".$_SESSION['idChosenSSD'];
											$result = mysqli_query($connect, $query);
											$data = array();
											while($row = mysqli_fetch_array($result, 1)){
												$data[] = $row;
											}	
											$idSP = $data[0]['ID_LK'];
											$tenSP = $data[0]['Ten_LK'];
											$donGia = $data[0]['Gia_LK']*(1-$data[0]['Giam_gia']);
											$imgSRC = $data[0]['Hinh_anh'];
											closeDB($connect);							
											echo '
												<tr> 
													<td>
														<img src="'.$imgSRC.'" alt="exit-btn" style="width: 200px; height: 200px;">
													</td> 
													<td>'.$idSP.'</td> 
													<td>'.$tenSP.'</td>
													<td><label id="donGiaLK_SSD">'.$donGia.'</label></td> 
													<td>
														<input type="button" class="dau" value="-" onClick="updateMinusSLPopup(\'SSD\');">
														<input type="number" name="sl_sp" class="so_luong" value="1" min="1" id="soluong_sp_popup_SSD" onChange="updateCostPopup(\'SSD\')">
														<input type="button" class="dau" value="+" onClick="updatePlusSLPopup(\'SSD\');">
													</td>
													<td><label id="tong_tien_SSD"></label></td>
													<td></td>  
												</tr>';
										}

										if(isset($_SESSION['idChosenHDD'])){
											$connect = connectDB();
											$query = "Select * from linhkien where ID_LK = ".$_SESSION['idChosenHDD'];
											$result = mysqli_query($connect, $query);
											$data = array();
											while($row = mysqli_fetch_array($result, 1)){
												$data[] = $row;
											}	
											$idSP = $data[0]['ID_LK'];
											$tenSP = $data[0]['Ten_LK'];
											$donGia = $data[0]['Gia_LK']*(1-$data[0]['Giam_gia']);
											$imgSRC = $data[0]['Hinh_anh'];
											closeDB($connect);							
											echo '
												<tr> 
													<td>
														<img src="'.$imgSRC.'" alt="exit-btn" style="width: 200px; height: 200px;">
													</td> 
													<td>'.$idSP.'</td> 
													<td>'.$tenSP.'</td>
													<td><label id="donGiaLK_HDD">'.$donGia.'</label></td> 
													<td>
														<input type="button" class="dau" value="-" onClick="updateMinusSLPopup(\'HDD\');">
														<input type="number" name="sl_sp" class="so_luong" value="1" min="1" id="soluong_sp_popup_HDD" onChange="updateCostPopup(\'HDD\')">
														<input type="button" class="dau" value="+" onClick="updatePlusSLPopup(\'HDD\');">
													</td>
													<td><label id="tong_tien_HDD"></label></td>
													<td></td>  
												</tr>';
										}

										if(isset($_SESSION['idChosenCase'])){
											$connect = connectDB();
											$query = "Select * from linhkien where ID_LK = ".$_SESSION['idChosenCase'];
											$result = mysqli_query($connect, $query);
											$data = array();
											while($row = mysqli_fetch_array($result, 1)){
												$data[] = $row;
											}	
											$idSP = $data[0]['ID_LK'];
											$tenSP = $data[0]['Ten_LK'];
											$donGia = $data[0]['Gia_LK']*(1-$data[0]['Giam_gia']);
											$imgSRC = $data[0]['Hinh_anh'];
											closeDB($connect);							
											echo '
												<tr> 
													<td>
														<img src="'.$imgSRC.'" alt="exit-btn" style="width: 200px; height: 200px;">
													</td> 
													<td>'.$idSP.'</td> 
													<td>'.$tenSP.'</td>
													<td><label id="donGiaLK_Case">'.$donGia.'</label></td> 
													<td>
														<input type="button" class="dau" value="-" onClick="updateMinusSLPopup(\'Case\');">
														<input type="number" name="sl_sp" class="so_luong" value="1" min="1" id="soluong_sp_popup_Case" onChange="updateCostPopup(\'Case\')">
														<input type="button" class="dau" value="+" onClick="updatePlusSLPopup(\'Case\');">
													</td>
													<td><label id="tong_tien_Case">'.$donGia.'</label></td>
													<td></td>  
												</tr>';
										}
									?>
									</tbody>
								</table>
							</div>
						</div>	
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
								<input type="text" name="address" class="" id="input_address_user">
								<script>
									document.getElementById("input_address_user").value = document.getElementById("select_address").options[1].text;
								</script>
								<input type="text" name="tong_tien" class="hidden_input_popup" id="input_tong_tien">
								<?php
									if(isset($_SESSION['idChosenCPU'])){
										echo '
											<input type="text" name="id_CPU" class="hidden_input_popup" value="'.$_SESSION['idChosenCPU'].'">
											<input type="text" name="sl_CPU" class="hidden_input_popup" id="input_sl_CPU">
											<input type="text" name="dg_CPU" class="hidden_input_popup" id="input_dg_CPU">
										';
									}
									if(isset($_SESSION['idChosenMain'])){
										echo '
											<input type="text" name="id_Main" class="hidden_input_popup" value="'.$_SESSION['idChosenMain'].'">
											<input type="text" name="sl_Main" class="hidden_input_popup" id="input_sl_Main">
											<input type="text" name="dg_Main" class="hidden_input_popup" id="input_dg_Main">
										';
									}
									if(isset($_SESSION['idChosenRAM'])){
										echo '
											<input type="text" name="id_RAM" class="hidden_input_popup" value="'.$_SESSION['idChosenRAM'].'">
											<input type="text" name="sl_RAM" class="hidden_input_popup" id="input_sl_RAM">
											<input type="text" name="dg_RAM" class="hidden_input_popup" id="input_dg_RAM">
										';
									}
									if(isset($_SESSION['idChosenGPU'])){
										echo '
											<input type="text" name="id_GPU" class="hidden_input_popup" value="'.$_SESSION['idChosenGPU'].'">
											<input type="text" name="sl_GPU" class="hidden_input_popup" id="input_sl_GPU">
											<input type="text" name="dg_GPU" class="hidden_input_popup" id="input_dg_GPU">
										';
									}
									if(isset($_SESSION['idChosenSSD'])){
										echo '
											<input type="text" name="id_SSD" class="hidden_input_popup" value="'.$_SESSION['idChosenSSD'].'">
											<input type="text" name="sl_SSD" class="hidden_input_popup" id="input_sl_SSD">
											<input type="text" name="dg_SSD" class="hidden_input_popup" id="input_dg_SSD">
										';
									}
									if(isset($_SESSION['idChosenHDD'])){
										echo '
											<input type="text" name="id_HDD" class="hidden_input_popup" value="'.$_SESSION['idChosenHDD'].'">
											<input type="text" name="sl_HDD" class="hidden_input_popup" id="input_sl_HDD">
											<input type="text" name="dg_HDD" class="hidden_input_popup" id="input_dg_HDD">
										';
									}
									if(isset($_SESSION['idChosenCase'])){
										echo '
											<input type="text" name="id_Case" class="hidden_input_popup" value="'.$_SESSION['idChosenCase'].'">
											<input type="text" name="sl_Case" class="hidden_input_popup" id="input_sl_Case">
											<input type="text" name="dg_Case" class="hidden_input_popup" id="input_dg_Case">
										';
									}
								?>
								<input type="submit" value="Xác Nhận" class="buynow-buynow-btn">
							</div>
							<div class="TongTien">
								<div class="TongTien3">
									<span>Tổng Hoá Đơn:</span>
									<span id="tong_hoa_don"></span>
									<script>
										updateTongHoaDon();
									</script>
									<span>đ</span>
								</div>
							</div>	
						</div>			
					</div>	
					</form>
					<button class="exit-btn" onClick="closeBuyNow()"><img src="./img/x_button.png" alt="exit-btn" style="width: 50px;"></button>
			</div>
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
	if(isset($_SESSION['addToCart_BuildPC'])){
		$alert = "<script>alert('".$_SESSION['addToCart_BuildPC']."');</script>";
		echo $alert;
		unset($_SESSION['addToCart_BuildPC']);
	}
	if(isset($_SESSION['cart_buy_status'])){
		$alert = "<script>alert('".$_SESSION['cart_buy_status']."');</script>";
		echo $alert;
		unset($_SESSION['cart_buy_status']);
	}
	if(isset($_SESSION['xoa_sp_cart'])){
		$alert = "<script>alert('".$_SESSION['xoa_sp_cart']."');</script>";
		echo $alert;
		unset($_SESSION['xoa_sp_cart']);
	}
?>

