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
									<input type="button" class="dau" id="CPUMinusButton" value="-" onClick="document.getElementById(\'soluong_sp_CPU\').value--;">
									<input type="number" name="sl_sp" class="so_luong" value="1" min="1" id="soluong_sp_CPU">
									<script>
										var sl_sp = document.getElementById("soluong_sp_CPU").value;
										if(sl_sp == "1"){
											//document.getElementById("CPUMinusButton").value = "Rác";
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
                			<button class="add_button" onclick="">Chọn</button>
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
							<button class="add_button" onclick="openPopupGPUChooseItem()">Chỉnh sửa</button>
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
                			<button class="add_button" onclick="">Chọn</button>
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
							<button class="add_button" onclick="openPopupRAMChooseItem()">Chỉnh sửa</button>
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
                			<button class="add_button" onclick="">Chọn</button>
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
                			<button class="add_button" onclick="">Chọn</button>
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
                			<button class="add_button" onclick="">Chọn</button>
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
                			<button class="add_button" onclick="">Chọn</button>
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
				<input type="button" class="buy_now_button" value="Mua Ngay" onClick="">
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
													<td>1</td> 
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
				<button class="exit-btn" onClick="closePopupCPUChooseItem()"><img src="./img/x_button.png" alt="exit-btn" style="width: 50px;"></button>
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

