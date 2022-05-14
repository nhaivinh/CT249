<?php
	require_once("../DBprocess.php");
	require_once("HTMLprocess.php");
	if(isset($_POST['username']) && isset($_POST['password'])){
		login();	
	}
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="./CSS/chitiet_SP.css" />
	<link rel="stylesheet" href="./CSS/login.css" />
	<link rel="stylesheet" href="./CSS/buynow.css" />
	<title>Thông tin sản phẩm</title>
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
		function openPopupBuyNow(){
			document.getElementById("hidden-popup-buynow").classList.remove("hidden");
			document.getElementById("hidden-buynow").classList.remove("hidden");
			document.getElementById("soluong_sp_popup").value = document.getElementById("soluong_sp").value;
			let donGia = document.getElementById("donGiaLK").innerHTML;
			let sl = document.getElementById("soluong_sp").value;
			document.getElementById("tong_tien").innerHTML = parseInt(donGia) * sl;
			document.getElementById("tong_hoa_don").innerHTML = parseInt(document.getElementById("tong_tien").innerHTML);
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
		function updateMinusSLPopup(){
			if(document.getElementById("soluong_sp_popup").value > 1){
				document.getElementById("soluong_sp_popup").value--;
				document.getElementById("so_luong_mua").value = document.getElementById("soluong_sp_popup").value;
			}
		}
		function updatePlusSLPopup(){
			document.getElementById("soluong_sp_popup").value++;
			document.getElementById("so_luong_mua").value = document.getElementById("soluong_sp_popup").value;
		}
		function updateTotalCostPopup(tien){
			document.getElementById("tong_tien").innerHTML = tien;
			document.getElementById("tong_hoa_don").innerHTML = tien;
			document.getElementById("input_tong_tien").value = document.getElementById("tong_tien").innerHTML;
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
					<li style="border-left-width: 0px;width:500px;"><p>Shop linh kiện DEMO - bán tất cả loại linh kiện máy tính</p></li>
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
							<li id="Login_Item"><button id="Login_Button" onclick="openPopup()">Đăng nhập</button></li>
							<li id="Register_Item"><a href ="Register_form.php" id="Register">Đăng ký </a></li>
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
	
	<br>
	<div class="page_body">
		<div class="hang_doc">
			<?php showChiTietSP(); ?>
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
												<td><label id="tong_tien"></label></td>
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
	if(isset($_SESSION['buy_status'])){
		$alert = "<script>alert('".$_SESSION['buy_status']."');</script>";
		echo $alert;
		unset($_SESSION['buy_status']);
	}
	if(isset($_SESSION['addCart_status'])){
		$alert = "<script>alert('".$_SESSION['addCart_status']."');</script>";
		echo $alert;
		unset($_SESSION['addCart_status']);
	}
?>