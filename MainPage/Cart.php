<?php
	require_once("../DBprocess.php");
	require_once("HTMLprocess.php");
	if(!isset($_SESSION['username'])){
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
			function showAddressText(){
				value = document.getElementById("select_address").value;
				if(value == 1){
					document.getElementById("input_address").classList.remove("hidden");
					document.getElementById("input_address").value = "";
				}
				else{
					document.getElementById("input_address").classList.add("hidden");
					document.getElementById("input_address").value = value;
				}
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
		<a href="">Khuyến mãi</a>
		<a href="">Liên hệ</a>
	</div>
    <div class="buynow-container" id="hidden-popup-buynow">
		<div class="buynow-popup" id="hidden-buynow">
			<form action="" method="POST" class="buynow-input-container">
				<div class="item_detail">
					<?php						
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
												<th><label class="Xoa_Text"> <label></th>
											</tr>
										</thead>
										<tbody>
											<tr> 
												<td>
													<img src="../img/CPU Intel Core I5-7500 (3.4GHz - 3.8GHz).webp" alt="exit-btn" style="width: 200px;">
												</td> 
												<td>2</td> 
												<td>CPU Intel Core I5-7500 (3.4GHz - 3.8GHz)</td>
												<td>5970000</td> 
												<td>
													<input type="button" class="dau" value="-" onClick="document.getElementById(\'soluong_sp\').value--;">
													<input type="number" name="sl_sp" class="so_luong" value="1" min="1" id="soluong_sp">
													<input type="button" class="dau" value="+" onClick="document.getElementById(\'soluong_sp\').value++;">
												</td>
												<td>5970000</td>
												<td>
												<p class="xoa_button" onclick=""> Xóa </p>
												</td>  
											</tr>
											<tr> 
												<td>
													<img src="../img/CPU Intel Core I5-7500 (3.4GHz - 3.8GHz).webp" alt="exit-btn" style="width: 200px;">
												</td> 
												<td>2</td> 
												<td>CPU Intel Core I5-7500 (3.4GHz - 3.8GHz)</td>
												<td>5970000</td> 
												<td>
													<input type="button" class="dau" value="-" onClick="document.getElementById(\'soluong_sp\').value--;">
													<input type="number" name="sl_sp" class="so_luong" value="1" min="1" id="soluong_sp">
													<input type="button" class="dau" value="+" onClick="document.getElementById(\'soluong_sp\').value++;">
												</td>
												<td>5970000</td>
												<td>
												<p class="xoa_button" onclick=""> Xóa </p>
												</td>  
											</tr>
											<tr> 
												<td>
													<img src="../img/CPU Intel Core I5-7500 (3.4GHz - 3.8GHz).webp" alt="exit-btn" style="width: 200px;">
												</td> 
												<td>2</td> 
												<td>CPU Intel Core I5-7500 (3.4GHz - 3.8GHz)</td>
												<td>5970000</td> 
												<td>
													<input type="button" class="dau" value="-" onClick="document.getElementById(\'soluong_sp\').value--;">
													<input type="number" name="sl_sp" class="so_luong" value="1" min="1" id="soluong_sp">
													<input type="button" class="dau" value="+" onClick="document.getElementById(\'soluong_sp\').value++;">
												</td>
												<td>5970000</td>
												<td>
												<p class="xoa_button" onclick=""> Xóa </p>
												</td>  
											</tr>
										</tbody>
									</table>
								</div>
							</div>
							';
						
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
						<!--<input type="text" class="input_text hidden" name="address" id="input_address">-->
						<textarea rows="6" class="address_area"></textarea>
						<div class="BuyNow_Button">
						<input type="submit" value="Xác Nhận" class="buynow-buynow-btn">
						</div>
						<div class="TongTien">
							<div class="TongTien1">
								<span>Tổng Tiền Hàng:<span>
								<span>32000000đ<span>
							</div>
							<div class="TongTien2">
								<span>Phí Vẫn Chuyển:<span>
								<span>30000đ<span>
							</div>
							<div class="TongTien3">
								<span>Tổng Hoá Đơn:<span>
								<span>32030000đ<span>
							</div>
						</div>	
					</div>	
					
				</div>	
			</form>
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