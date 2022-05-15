<?php
	require_once("../DBprocess.php");
	require_once("HTMLprocess.php");
	if(!isset($_SESSION['username'])){
		header("Location: index.php");
	}
	$connect = connectDB();
	$query = "Select * from user_cart where ID_user = ".$_SESSION['id_user'];
	$result = mysqli_query($connect, $query);
	$detail_cart = array();
	while($row = mysqli_fetch_array($result, 1)){
		$detail_cart[] = $row;
	}	
	closeDB($connect);
	if(count($detail_cart) == 0){
		if(!isset($_SESSION['xoa_sp_cart'])){
			$_SESSION['cart_status'] = "Giỏ hàng rỗng, hãy chọn sản phẩm";
		}
		else{
			$_SESSION['cart_status'] = "Xoá sản phẩm thành công và giỏ hàng rỗng, hãy chọn sản phẩm";
		}
		header("Location: index.php");
	}

?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="./CSS/Cart.css" />
	<title>Shop linh kiện Demo</title>
</head>
<body>
	<script>		
		Tong_tien = 0;
		function openPopupBuyNow(){
			document.getElementById("hidden-popup-buynow").classList.remove("hidden");
			document.getElementById("hidden-buynow").classList.remove("hidden");
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
		function updateSL(index){
			var elementForm_ID = 'frm_GioHang_' + index;
			document.getElementById(elementForm_ID).action= "Capnhat_soluong_Cart.php";
			document.getElementById(elementForm_ID).submit();
		}
		function updateMinusSL(index){
			var elementSL_ID = 'soluong_sp_' + index;
			var elementForm_ID = 'frm_GioHang_' + index;
			if(document.getElementById(elementSL_ID).value > 1){
				document.getElementById(elementSL_ID).value--;
				updateSL(index);
			}
		}
		function updatePlusSL(index){
			var elementSL_ID = 'soluong_sp_' + index;
			document.getElementById(elementSL_ID).value++;
			updateSL(index);
		}
		function updateTotalCost(tien){
			// document.getElementById("tong_tien").innerHTML = tien;
			// document.getElementById("tong_tien_hang").innerHTML = tien;
			// document.getElementById("tong_hoa_don").innerHTML = tien + 30000;
			// document.getElementById("input_tong_tien").value = document.getElementById("tong_tien").innerHTML;
		}
		</script>
	<div class="page_Header">
		<div class="Account">
			<ul>
				<form method="POST" action="" id="frmAccount">
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
							<li>
								<input type="text" name="username" size="20" value="" placeholder="Nhập vào username" style="height:30px">
							</li>
							<li>
								<input type="password" name="password" size="20" placeholder="Nhập vào password" style="height:30px">
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
		<a href="BuildPc.php">Build PC</a>
		<a href="">Liên hệ</a>
	</div>
	<?php
	?>
    <div class="buynow-container" id="hidden-popup-buynow">
		<div class="buynow-popup" id="hidden-buynow">
			<div action="" method="POST" class="buynow-input-container">
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
										<th><label class="Xoa_Text"> <label></th>
									</tr>
								</thead>
								<tbody>
									<?php
										$connect = connectDB();
										$query = "Select * from user_cart where ID_user = ".$_SESSION['id_user'];
										$result = mysqli_query($connect, $query);
										$detail_cart = array();
										while($row = mysqli_fetch_array($result, 1)){
											$detail_cart[] = $row;
										}	
										for($i=0;$i<count($detail_cart);$i++){
											$id_lk = $detail_cart[$i]['ID_LK'];
											$sl_mua = $detail_cart[$i]['So_luong'];

											$query = "Select * from linhkien where ID_LK = ".$id_lk;
											$result = mysqli_query($connect, $query);
											$detail_lk = array();
											while($row = mysqli_fetch_array($result, 1)){
												$detail_lk[] = $row;
											}	
											$imgSRC = $detail_lk[0]['Hinh_anh'];
											$tenSP = $detail_lk[0]['Ten_LK'];
											$donGia = $detail_lk[0]['Gia_LK'] * (1 - $detail_lk[0]['Giam_gia']);
											$sl_tonkho = $detail_lk[0]['So_luong'];

											echo '
												<form method="POST" id="frm_GioHang_'.$i.'" action="">
													<input type="text" name="id_lk" class="hidden_input" value="'.$id_lk.'">
													<tr> 
														<td>
															<img src="'.$imgSRC.'" alt="exit-btn" style="width: 200px; height: 200px;">
														</td> 
														<td>'.$id_lk.'</td> 
														<td>'.$tenSP.'</td>
														<td><label id="donGia_SP_'.$i.'">'.$donGia.'</label></td> 
														<td>
															<input type="button" class="dau" value="-" onClick="updateMinusSL('.$i.');">
															<input type="number" name="sl_sp" class="so_luong" value="'.$sl_mua.'" min="1" onChange="updateSL('.$i.');" id="soluong_sp_'.$i.'">
															<input type="button" class="dau" value="+" onClick="updatePlusSL('.$i.');">
														</td>
														<td><label id="thanh_tien_'.$i.'"></label></td>
														<script>
															document.getElementById("thanh_tien_'.$i.'").innerHTML = ('.$donGia.' * document.getElementById("soluong_sp_'.$i.'").value);
														</script>
														<td>
															<div class="final_columm">
																<p class="xoa_button" onClick="frm_GioHang_'.$i.'.action=\'Xoa_sp_Cart.php\';document.getElementById(\'frm_GioHang_'.$i.'\').submit();"> Xóa </p>
															</div>
														</td>  
													</tr>
												</form>
											';
										}
										closeDB($connect);
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
						<form action="MuaNgay_Cart.php" method="post">
							<input type="text" name="address" class="hidden_input" id="input_address_user">
							<input type="text" name="tong_tien" class="hidden_input" id="input_tong_tien">
							<script>
								document.getElementById("input_address_user").value = document.getElementById("select_address").options[1].text;
							</script>
							<input type="submit" value="Xác Nhận" class="buynow-buynow-btn">
						</form>
						</div>
						<div class="TongTien">
							<div class="TongTien3">
								<span>Tổng Hoá Đơn:</span>
								<span id="tong_hoa_don"></span>
								<span>đ</span>
							</div>
							<?php
								$connect = connectDB();
								$query = "Select count(*) as SL from user_cart where ID_user = ".$_SESSION['id_user'];
								$result = mysqli_query($connect, $query);
								$data = array();
								while($row = mysqli_fetch_array($result, 1)){
									$data[] = $row;
								}	
								$sl_sp = $data[0]['SL'];
								for($i=0;$i<$sl_sp;$i++){
									echo '
										<script>
											var elementThanhTien_ID = "thanh_tien_'.$i.'";
											Tong_tien += parseInt(document.getElementById(elementThanhTien_ID).innerHTML);
										</script>
									';
								}
								echo '
									<script>
										document.getElementById("tong_hoa_don").innerHTML = Tong_tien;
										document.getElementById("input_tong_tien").value = Tong_tien;
									</script>
								';
								closeDB($connect);
							?>
						</div>	
					</div>	
					
				</div>	
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

<?php
	if(isset($_SESSION['edit_amount_status'])){
		$alert = "<script>alert('".$_SESSION['edit_amount_status']."');</script>";
		echo $alert;
		unset($_SESSION['edit_amount_status']);
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