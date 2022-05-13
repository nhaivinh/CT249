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
	<link rel="stylesheet" href="./CSS/BuildPc.css" />
	<link rel="stylesheet" href="./CSS/login.css" />
	<link rel="stylesheet" href="./CSS/chooseitem.css" />
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
			function openPopupChooseItem(){
			document.getElementById("hidden-popup-chooseitem").classList.remove("hidden");
			document.getElementById("hidden-chooseitem").classList.remove("hidden");
		}
		function openChooseItem(){
			document.getElementById("hidden-chooseitem").classList.remove("hidden");
		}
		function closeChooseItem(){
			document.getElementById("hidden-popup-chooseitem").classList.add("hidden");
			document.getElementById("hidden-chooseitem").classList.add("hidden");
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
                <div class="title">
					<span class="title_text">Vi xử lý</span>
					<div class="img_item">
						<img src="../img/cpu.svg" style="">
					</div>
					<span>Vui lòng chọn linh kiện</span>
                </div>
                <button class="add_button" onclick="openPopupChooseItem()">Chọn</button>
            </div>
            <div class="main">
				<div class="title">
					<span class="title_text">Bo mạch chủ</span>
					<div class="img_item">
						<img src="../img/Mainboard ASUS ROG STRIX B350-F GAMING.webp" style="">
					</div>
					<div class="info_item">
						<span class="info_item_name">Mainboard ASUS ROG STRIX B350-F GAMING</span>
						<br>
						<span>Mã LK: 6</span>
					</div>
					<div class="quantity_item">
						<input type="button" class="dau" value="-" onClick="document.getElementById(\'soluong_sp\').value--;">
						<input type="number" name="sl_sp" class="so_luong" value="1" min="1" id="soluong_sp">
						<input type="button" class="dau" value="+" onClick="document.getElementById(\'soluong_sp\').value++;">
					</div>
					<div class="price_item">
						<span class="price_item_1">2632000đ</span>
						<div class="price_item_discount">
							<span class="price_item_3">3290000đ</span>
							<span> </span>
							<span class="price_item_2">20%</span>
						</div>
						
					</div>					
                </div>
                <button class="add_button" onclick="">Chọn</button>
            </div>
            <div class="ram">
				<div class="title">
				<span class="title_text">Ram</span>
					<div class="img_item">
						<img src="../img/RAM desktop KINGMAX Zeus Dragon Heatsink (1 x 32GB) DDR4 3200MHz.webp" style="">
					</div>
					<div class="info_item">
						<span class="info_item_name">RAM desktop KINGMAX Zeus Dragon Heatsink (1 x 32GB) DDR4 3200MHz</span>
						<br>
						<span>Mã LK: 6</span>
					</div>
					<div class="quantity_item">
						<input type="button" class="dau" value="-" onClick="document.getElementById(\'soluong_sp\').value--;">
						<input type="number" name="sl_sp" class="so_luong" value="1" min="1" id="soluong_sp">
						<input type="button" class="dau" value="+" onClick="document.getElementById(\'soluong_sp\').value++;">
					</div>
					<div class="price_item">
						<span class="price_item_1">3832000đ</span>
						<div class="price_item_discount">
							<span class="price_item_3">4790000đ</span>
							<span> </span>
							<span class="price_item_2">20%</span>
						</div>
					</div>					
                </div>
                <button class="add_button" onclick="">Chọn</button>
            </div>
            <div class="gpu">
				<div class="title">
					<span class="title_text">Card đồ hoạ</span>
					<div class="img_item">
						<img src="../img/gpu.svg" style="">
					</div>
					<span>Vui lòng chọn linh kiện</span>
                </div>
                <button class="add_button" onclick="">Chọn</button>
            </div>
            <div class="ssd">
				<div class="title">
					<span class="title_text">SSD</span>
					<div class="img_item">
						<img src="../img/ssd.svg" style="">
					</div>
					<span>Vui lòng chọn linh kiện</span>
                </div>
                <button class="add_button" onclick="">Chọn</button> 
            </div>
            <div class="hdd">
				<div class="title">
					<span class="title_text">HDD</span>
					<div class="img_item">
						<img src="../img/hdd.svg" style="">
					</div>
					<span>Vui lòng chọn linh kiện</span>
                </div>
                <button class="add_button" onclick="">Chọn</button>  
            </div>
            <div class="case">
				<div class="title">
					<span class="title_text">Case</span>
					<div class="img_item">
						<img src="../img/case.svg" style="">
					</div>
					<span>Vui lòng chọn linh kiện</span>
                </div>
                <button class="add_button" onclick="">Chọn</button>
            </div>
        </div>
        <div class="total_price">
            <div class="total_price_item">
                <span class="total_price_text">Tổng Cộng: 25000000 đ</span>
				<input type="button" class="buy_now_button" value="Mua Ngay" onClick="">
				<input type="button" class="add_cart_button" value="Thêm vào giỏ hàng" onClick="">
        </div>
		<div class="chooseitem-container hidden" id="hidden-popup-chooseitem">
			<div class="chooseitem-popup hidden" id="hidden-chooseitem">
				<form action="" method="POST" class="chooseitem-input-container">
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
										<tr> 
											<td>
												<img src="../img/CPU Intel Core I3-7100 (3.9GHz).webp" alt="exit-btn" style="width: 100px;">
											</td> 
											<td>1</td> 
											<td>CPU Intel Core I3-7100 (3.9GHz)</td>
											<td><label id="donGiaLK">3350000</label></td> 
											<td>
											<div class=chooseitem-btn>	
												<button class="chooseitem-chooseitem-btn" onClick="">Chọn</button></div>
											</div>
											</td>  																	
										</tr>	
										<tr> 
											<td>
												<img src="../img/CPU Intel Core I3-7100 (3.9GHz).webp" alt="exit-btn" style="width: 100px;">
											</td> 
											<td>1</td> 
											<td>CPU Intel Core I3-7100 (3.9GHz)</td>
											<td><label id="donGiaLK">3350000</label></td> 
											<td>
											<div class=chooseitem-btn>	
												<button class="chooseitem-chooseitem-btn" onClick="">Chọn</button></div>
											</div>
											</td>  																	
										</tr>
										<tr> 
											<td>
												<img src="../img/CPU Intel Core I3-7100 (3.9GHz).webp" alt="exit-btn" style="width: 100px;">
											</td> 
											<td>1</td> 
											<td>CPU Intel Core I3-7100 (3.9GHz)</td>
											<td><label id="donGiaLK">3350000</label></td> 
											<td>
											<div class=chooseitem-btn>	
												<button class="chooseitem-chooseitem-btn" onClick="">Chọn</button></div>
											</div>
											</td>  																	
										</tr>
										<tr> 
											<td>
												<img src="../img/CPU Intel Core I3-7100 (3.9GHz).webp" alt="exit-btn" style="width: 100px;">
											</td> 
											<td>1</td> 
											<td>CPU Intel Core I3-7100 (3.9GHz)</td>
											<td><label id="donGiaLK">3350000</label></td> 
											<td>
											<div class=chooseitem-btn>	
												<button class="chooseitem-chooseitem-btn" onClick="">Chọn</button></div>
											</div>
											</td>  																	
										</tr>
										<tr> 
											<td>
												<img src="../img/CPU Intel Core I3-7100 (3.9GHz).webp" alt="exit-btn" style="width: 100px;">
											</td> 
											<td>1</td> 
											<td>CPU Intel Core I3-7100 (3.9GHz)</td>
											<td><label id="donGiaLK">3350000</label></td> 
											<td>
											<div class=chooseitem-btn>	
												<button class="chooseitem-chooseitem-btn" onClick="">Chọn</button></div>
											</div>
											</td>  																	
										</tr>					
									</tbody>
								</table>
							</div>
						</div>
					</div>
					</form>
				<button class="exit-btn" onClick="closeChooseItem()"><img src="./img/x_button.png" alt="exit-btn" style="width: 50px;"></button>
			</div>
		</div>
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

