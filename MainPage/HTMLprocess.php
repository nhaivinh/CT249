<?php
	require_once('../DBconnect.php');
	function showSoDuTK($username){
		$connect = connectDB();
		$query = "Select So_du from account where username ='".$username."'";
		$result = mysqli_query($connect, $query);
		$data = array();
		while($row = mysqli_fetch_array($result, 1)){
			$data[] = $row;
		}
		echo $data[0]['So_du'];
	}
	function showThongTinSPAt($data, $index, $rowName){
		echo $data[$index][$rowName];
	}
	function getThongTinSPAt($data, $index, $rowName){
		return $data[$index][$rowName];
	}
	function showThongSoSPAt($loai_lk, $dataThongSo, $current_index){
		switch($loai_lk){
			case 'cpu':
				echo '<p class="thongso_sp">Đời: '.getThongTinSPAt($dataThongSo, $current_index, "Series").' </p>';
				echo '<p class="thongso_sp">Số core: '.getThongTinSPAt($dataThongSo, $current_index, "Core").' </p>';
				echo '<p class="thongso_sp">Xung: '.getThongTinSPAt($dataThongSo, $current_index, "Xung").' </p>';
				echo '<p class="thongso_sp">Socket: '.getThongTinSPAt($dataThongSo, $current_index, "Socket").' </p>';
				break;
			case 'gpu':
				echo '<p class="thongso_sp">Chip đồ họa: '.getThongTinSPAt($dataThongSo, $current_index, "Chip_do_hoa").' </p>';
				echo '<p class="thongso_sp">VMemory: '.getThongTinSPAt($dataThongSo, $current_index, "VMemory").' </p>';
				echo '<p class="thongso_sp">Thế hệ bộ nhớ: '.getThongTinSPAt($dataThongSo, $current_index, "The_he_bo_nho").' </p>';
				break;
			case 'mainboard':
				echo '<p class="thongso_sp">Socket: '.getThongTinSPAt($dataThongSo, $current_index, "Socket").' </p>';
				echo '<p class="thongso_sp">Chipset: '.getThongTinSPAt($dataThongSo, $current_index, "Chipset").' </p>';
				echo '<p class="thongso_sp">Chuẩn kích thước : '.getThongTinSPAt($dataThongSo, $current_index, "Chuan_kich_thuoc").' </p>';
				break;
			case 'ram':
				echo '<p class="thongso_sp">DDR: '.getThongTinSPAt($dataThongSo, $current_index, "DDR").' </p>';
				echo '<p class="thongso_sp">Dung lượng: '.getThongTinSPAt($dataThongSo, $current_index, "Dung_luong").' </p>';
				echo '<p class="thongso_sp">Bus: '.getThongTinSPAt($dataThongSo, $current_index, "Bus").' </p>';		
				break;
			case 'disk':
				echo '<p class="thongso_sp">Chuẩn kết nối: '.getThongTinSPAt($dataThongSo, $current_index, "Chuan_ket_noi").' </p>';
				echo '<p class="thongso_sp">Kích thước: '.getThongTinSPAt($dataThongSo, $current_index, "Kich_thuoc").' </p>';
				echo '<p class="thongso_sp">Dung lượng: '.getThongTinSPAt($dataThongSo, $current_index, "Dung_luong").' </p>';
				echo '<p class="thongso_sp">Loại disk: '.getThongTinSPAt($dataThongSo, $current_index, "Loai").' </p>';
				break;
			case 'case':
				echo '<p class="thongso_sp">Kiểu case: '.getThongTinSPAt($dataThongSo, $current_index, "Kieu_case").' </p>';
				echo '<p class="thongso_sp">Màu: '.getThongTinSPAt($dataThongSo, $current_index, "Mau").' </p>';
				echo '<p class="thongso_sp">Kiểu Mainboard tương thích: '.getThongTinSPAt($dataThongSo, $current_index, "Kieu_mainboard").' </p>';
				echo '<p class="thongso_sp">Chất liệu case: '.getThongTinSPAt($dataThongSo, $current_index, "Chat_lieu").' </p>';
				break;
		}
	}
	function showAllSP(){
		$connect = connectDB();
		//Lay so luong san pham
		$query = "Select count(*) as amount from linhkien where Sale_Status='Đang bán'";
		$result = mysqli_query($connect, $query);
		$data = array();
		while($row = mysqli_fetch_array($result, 1)){
			$data[] = $row;
		}
		$amount = $data[0]['amount'];  
		$so_hang = ceil($amount/4);
		
		//Lay thong tin san pham
		$query = "Select * from linhkien where Sale_Status='Đang bán'";
		$result = mysqli_query($connect, $query);
		$data = array();
		while($row = mysqli_fetch_array($result, 1)){
			$data[] = $row;
		}
		$current_index = 0;
		for($i = 0; $i < $so_hang; $i++){
			echo '<div class="hang_ngang">';
			if($current_index < $amount){
				for($j=0;$j<4;$j++){
					if($current_index < $amount){
						echo '
							<div class="san_pham">
								<a href="chitiet_SP.php?id_lk='.getThongTinSPAt($data, $current_index, "ID_LK").'&loai_lk='.getThongTinSPAt($data, $current_index, "Loai_LK").'" class="chitiet_sp">
									<img src="'.getThongTinSPAt($data, $current_index, "Hinh_anh").'" class="img_sp">
									<p class="ten_sp" title="'.getThongTinSPAt($data, $current_index, "Ten_LK").'">
										'.getThongTinSPAt($data, $current_index, "Ten_LK").'
									</p>
									<p class="gia_giam"> '.(getThongTinSPAt($data, $current_index, "Gia_LK")*(1 - getThongTinSPAt($data, $current_index, "Giam_gia"))).' đ</p>
									<p class="gia_sp">
										<del>'.getThongTinSPAt($data, $current_index, "Gia_LK").'</del>
										<label>&nbsp;-'.(100*getThongTinSPAt($data, $current_index, "Giam_gia")).'%<label>
									</p>
								</a>
							</div>
						';
						$current_index++;
					}
					else{
						break;
					}
				}
			}
			else{
				break;
			}
		}
		closeDB($connect);
	}
	function showSearchSP(){
		$connect = connectDB();
		$search_key = $_GET['search_key'];
		//Lay so luong san pham
		$query = "Select count(*) as amount from linhkien where `Ten_LK` like '%".$search_key."%' and Sale_Status='Đang bán'";
		$result = mysqli_query($connect, $query);
		$data = array();
		while($row = mysqli_fetch_array($result, 1)){
			$data[] = $row;
		}
		$amount = $data[0]['amount'];  
		$so_hang = ceil($amount/4);
		
		//Lay thong tin san pham
		$query = "Select * from linhkien where `Ten_LK` like '%".$search_key."%' and Sale_Status='Đang bán'";
		$result = mysqli_query($connect, $query);
		$data = array();
		while($row = mysqli_fetch_array($result, 1)){
			$data[] = $row;
		}
		$current_index = 0;
		for($i = 0; $i < $so_hang; $i++){
			echo '<div class="hang_ngang">';
			if($current_index < $amount){
				for($j=0;$j<4;$j++){
					if($current_index < $amount){
						echo '
							<div class="san_pham">
								<a href="chitiet_SP.php?id_lk='.getThongTinSPAt($data, $current_index, "ID_LK").'&loai_lk='.getThongTinSPAt($data, $current_index, "Loai_LK").'" class="chitiet_sp">
									<img src="'.getThongTinSPAt($data, $current_index, "Hinh_anh").'" class="img_sp">
									<p class="ten_sp" title="'.getThongTinSPAt($data, $current_index, "Ten_LK").'">
										'.getThongTinSPAt($data, $current_index, "Ten_LK").'
									</p>
									<p class="gia_giam"> '.(getThongTinSPAt($data, $current_index, "Gia_LK")*(1 - getThongTinSPAt($data, $current_index, "Giam_gia"))).'</p>
									<p class="gia_sp">
										<del>'.getThongTinSPAt($data, $current_index, "Gia_LK").' </del>
										<label>&nbsp;-'.(100*getThongTinSPAt($data, $current_index, "Giam_gia")).'%<label>
									</p>
								</a>
							</div>
						';
						$current_index++;
					}
					else{
						break;
					}
				}
			}
			else{
				break;
			}
		}
		closeDB($connect);
	}
	function showChiTietSP(){
		if(isset($_GET['id_lk'])){
			$connect = connectDB();
			$query = "Select * from linhkien where Sale_Status='Đang bán' and ID_LK = ".$_GET['id_lk'];
			$result = mysqli_query($connect, $query);
			$data = array();
			while($row = mysqli_fetch_array($result, 1)){
				$data[] = $row;
			}	
			if(count($data)>0){
				$query = "Select * from linhkien where ID_LK = ".$_GET['id_lk'];
				$result = mysqli_query($connect, $query);
				$linhkien = array();
				while($row = mysqli_fetch_array($result, 1)){
					$linhkien[] = $row;
				}
				
				$query = "Select * from `".$_GET['loai_lk']."` where ID_LK = ".$_GET['id_lk'];
				$result = mysqli_query($connect, $query);
				$thongso = array();
				while($row = mysqli_fetch_array($result, 1)){
					$thongso[] = $row;
				}
				$current_index=0;
				echo '
					<div class="hang_ngang">
						<div class="Info">
							<img src="'.getThongTinSPAt($linhkien, $current_index, "Hinh_anh").'" class="img_sp">
							<div class="hang_ngang2">
								<p class="gia_giam">'.getThongTinSPAt($linhkien, $current_index, "Gia_LK")*(1 - getThongTinSPAt($linhkien, $current_index, "Giam_gia")).' đ</p>
								<div class="hang_doc2">
									<p>-'.(100*getThongTinSPAt($linhkien, $current_index, "Giam_gia")).'%</p>
									<del class="gia_goc">'.getThongTinSPAt($linhkien, $current_index, "Gia_LK").' đ</del>
								</div>
							</div>
						</div>
						<div class="Chi_tiet_SP">
							<p class="ten_sp">'.getThongTinSPAt($linhkien, $current_index, "Ten_LK").'</p>
							<p class="thongso_sp">Hãng sản xuất: '.getThongTinSPAt($thongso, $current_index, "HangSX").'  </p>
							<p class="thongso_sp" name="sl_ton">Số lượng hàng tồn: '.getThongTinSPAt($linhkien, $current_index, "So_luong").'  </p>
				';
							showThongSoSPAt(strtolower($_GET['loai_lk']), $thongso, $current_index);
				echo '
							<form method="POST" id="frmMua">
								<input type="text" name="id_lk" class="hidden_input" value="'.$_GET['id_lk'].'">
								<input type="text" name="loai_lk" class="hidden_input" value="'.$_GET['loai_lk'].' ">
								<input type="text" name="sl_ton" class="hidden_input" value="'.getThongTinSPAt($linhkien, $current_index, "So_luong").'">
								<div class="Quantity">
									<div class="Quantity_Input">
										<input type="button" class="dau" value="-" onClick="document.getElementById(\'soluong_sp\').value--;">
										<input type="number" name="sl_sp" class="so_luong" value="1" min="1" id="soluong_sp">
										<input type="button" class="dau" value="+" onClick="document.getElementById(\'soluong_sp\').value++;">
									</div>
								</div>
								<div class="AddCart_Button">
									<input type="submit" value="Thêm vào giỏ hàng" class="gio_hang" id="add_Cart" onClick="frmMua.action=\'addCart.php\'">
								</div>
								</form>
								<div class="Buynow_Button">
				';	
				if(isset($_SESSION['username'])){	
					echo '<button id="BuyNow_Button" onclick="openPopupBuyNow()">Mua Ngay</button>';
				}
				else{
					echo '<button id="BuyNow_Button" onclick="openPopup()">Mua Ngay</button>';
				}
				echo '			
							</div>
						</div>
					</div>
				';		
				closeDB($connect);
			}
			else{
				header("Location: index.php");
			}
		}
		else header("Location: index.php");
	}
	
	function showUserInfo(){
		$connect = connectDB();
		$query = "Select * from info_user where id_user = '".$_SESSION['id_user']."'";
		$result = mysqli_query($connect, $query);
		$data = array();
		while($row = mysqli_fetch_array($result, 1)){
			$data[] = $row;
		}
		$current_index = 0;

		$query = "Select * from address_user where id_user = '".$_SESSION['id_user']."'";
		$result = mysqli_query($connect, $query);
		$address = array();
		while($row = mysqli_fetch_array($result, 1)){
			$address[] = $row;
		}
		echo '
			<div class="thong_tin_form">
			<div class="thong_tin">
				<div class="div_edit_status">
		';

		if(!isset($_GET['edit_info_status']) || $_GET['edit_info_status'] == 'false'){
			echo '<a href="ManagePage.php?edit_info_status=true">Chỉnh sửa thông tin cá nhân </a>';
		}
		else{	
			echo '<a href="ManagePage.php?edit_info_status=false">Hủy trạng thái chỉnh sửa </a>';
		}

		echo '</div>';
		echo '<form method="POST" action="Edit_Info_Process.php" class="frmUserInfo">';
	
		if(!isset($_GET['edit_info_status']) || $_GET['edit_info_status'] == 'false'){ 
			echo '
				<table class="tblRegister">
					<tr>
						<td class="title">Họ và tên: </td>
						<td class="info">'.getThongTinSPAt($data, $current_index, "Hoten_User").'</td>
					</tr>
					<tr>
						<td class="title">Số điện thoại: </td>
						<td class="info">'.getThongTinSPAt($data, $current_index, "SoDT_User").'</td>
					</tr>
					<tr>
						<td class="title">Email: </td>
						<td class="info">'.getThongTinSPAt($data, $current_index, "Email_User").'</td>
					</tr>
				</table>
			';
		}
		else{
			echo '
				<table class="tblRegister">
					<tr>
						<td class="title">Họ và tên: </td>
						<td class="info">
							<input type="text" name="Hoten" value="'.getThongTinSPAt($data, $current_index, "Hoten_User").'" >
						</td>
					</tr>
					<tr>
						<td class="title">Số điện thoại: </td>
						<td class="info">
							<input type="tel" name="Tel" value="'.getThongTinSPAt($data, $current_index, "SoDT_User").'" pattern="[0-9]{10}">
						</td>
					</tr>
					<tr>
						<td class="title">Email: </td>
						<td class="info">
							<input type="email" name="Email" value="'.getThongTinSPAt($data, $current_index, "Email_User").'">
						</td>
					</tr>
				</table>
			';
		}

		if(isset($_GET['edit_info_status']) && $_GET['edit_info_status'] == 'true'){
			echo '<input type="submit" value="Xác nhận chỉnh sửa" class="xac_nhan">';
		}
		echo '
				</form>
			</div>
		';

		echo '
			<div class="thong_tin">
				<div class="div_edit_status">
		';

		if(!isset($_GET['edit_address_status']) || $_GET['edit_address_status'] == 'false'){
			echo '<a href="">Chỉnh sửa thông tin địa chỉ </a>';
		}
		else{	
			echo '<a href="ManagePage.php?edit_address_status=false">Hủy trạng thái chỉnh sửa </a>';
		}

		echo '</div>';
		echo '<form method="POST" action="Edit_Info_Process.php" class="frmUserInfo">';
	
		if(!isset($_GET['edit_address_status']) || $_GET['edit_address_status'] == 'false'){ 
			echo '
				<table class="tblRegister">
			';
			for($i=1;$i<=count($address);$i++){
				echo '
					<tr>
						<td class="title">Địa chỉ '.$i.': </td>
						<td class="info">'.getThongTinSPAt($address, ($i-1), "Diachi").'</td>
					</tr>
				';
			}
			echo '
				</table>
			';
			echo '</div>'; 
		}
		else{
			echo '
				<table class="tblRegister">
					<tr>
						<td class="title">Họ và tên: </td>
						<td class="info">
							<input type="text" name="Hoten" value="'.getThongTinSPAt($data, $current_index, "Hoten_User").'" >
						</td>
					</tr>
					<tr>
						<td class="title">Địa chỉ: </td>
						<td class="info">
							<input type="text" name="Address" value="'.getThongTinSPAt($address, $current_index, "Diachi").'">
						</td>
					</tr>
					<tr>
						<td class="title">Số điện thoại: </td>
						<td class="info">
							<input type="tel" name="Tel" value="'.getThongTinSPAt($data, $current_index, "SoDT_User").'" pattern="[0-9]{10}">
						</td>
					</tr>
					<tr>
						<td class="title">Email: </td>
						<td class="info">
							<input type="email" name="Email" value="'.getThongTinSPAt($data, $current_index, "Email_User").'">
						</td>
					</tr>
				</table>
			';
		}

		if(isset($_GET['edit_address_status']) && $_GET['edit_address_status'] == 'true'){
			echo '<input type="submit" value="Xác nhận chỉnh sửa" class="xac_nhan">';
		}
		echo '
				</form>
			</div>
		';
		closeDB($connect);
	}
	function showChangePass(){
		echo '
			<div class="thong_tin">
				<form method="POST" action="changePass.php" class="frmChangePass">
					<table class="tblChangePass">
						<tr>
							<td class="title">Nhập password hiện tại:</td>
							<td class="info"><input type="password" name="oldPass"></td>
						</tr>
						<tr>
							<td class="title">Nhập password mới:</td>
							<td class="info"><input type="password" name="newPass"></td>
						</tr>
						<tr>
							<td class="title">Nhập lại password mới:</td>
							<td class="info"><input type="password" name="re-newPass"> </td>
						</tr>
					</table>
					<br>
					<input type="submit" value="Xác nhận đổi mật khẩu" class="xac_nhan_pass">
				</form>
			</div>
		';
	}
	function showHoaDon(){
		$connect = connectDB();
		$query = "Select * from donhang where id_user_KH='".$_SESSION['id_user']."'";
		$result = mysqli_query($connect, $query);
		$data = array();
		while($row = mysqli_fetch_array($result, 1)){
			$data[] = $row;
		}

		echo '
			<div class="div_HoaDon">
				<div class="HD_ngang">
					<label class="ID_DH"> ID ĐH</label>
					<label class="Date"> Ngày đặt hàng</label>
					<label class="Date"> Ngày giao hàng</label>
					<label class="Status"> Tình trạng</label>
					<label class="Total"> Tổng tiền</label>
				</div>
		';

		if(count($data)!=0){
			for($i=0;$i<count($data);$i++){
				$id_dh = $data[$i]['ID_DH'];
				$ngay_dat = $data[$i]['Ngay_Dat'];
				$ngay_giao = $data[$i]['Ngay_Giao'];
				$tinh_trang = $data[$i]['Status_DH'];
				$tong_tien = $data[$i]['Tong_tien'];
					
				$query = "Select linhkien.id_lk as ID_LK, linhkien.ten_lk as Ten_LK, chitietdh.So_luong as So_luong, Don_gia from chitietdh join linhkien on chitietdh.id_lk = linhkien.id_lk where ID_DH='".$id_dh."'";
				$result = mysqli_query($connect, $query);
				$data2 = array();
				while($row = mysqli_fetch_array($result, 1)){
					$data2[] = $row;
				}

				echo '
					<details class="Details_HD_ngang">
						<summary>
							<p class="ID_DH">'.$id_dh.'</p>
							<p class="Date">'.$ngay_dat.'</p>
							<p class="Date">'.$ngay_giao.'</p>
							<p class="Status">'.$tinh_trang.'</p>
							<p class="Total">'.$tong_tien.'</p>
						</summary>	
						<div class="Xoa_Button_Area">
							<form method="POST" action="huyDH.php" id="frmHuyDH_'.$i.'">
								<input type="text" name="id_dh" value="'.$id_dh.'" class="hidden_input">
								<input type="text" name="status_dh" value="'.$tinh_trang.'" class="hidden_input">
							</form>
							<p class="xoa_button" onClick="frmHuyDH_'.$i.'.submit();"> Huỷ Đơn Hàng </p>
						</div>
						<div class="Chitiet_HD_header">
							<label class="ID_LK"> ID LK</label>
							<label class="Ten_LK"> Tên LK</label>
							<label class="SL_LK"> Số lượng</label>
							<label class="Don_gia"> Đơn giá</label>
							
						</div>
						
				';
					for($j=0;$j<count($data2);$j++){
						$id_lk = $data2[$j]['ID_LK'];
						$ten_lk = $data2[$j]['Ten_LK'];
						$sl_lk = $data2[$j]['So_luong'];
						$don_gia = $data2[$j]['Don_gia'];
						if($j != count($data2) - 1){
							echo '
								<div class="Chitiet_HD">
									<label class="ID_LK">'.$id_lk.' </label>
									<label class="Ten_LK">'.$ten_lk.'</label>
									<label class="SL_LK">'.$sl_lk.'</label>
									<label class="Don_gia">'.$don_gia.'</label>
								</div>
							';
						}
						else{
							echo '
								<div class="Chitiet_HD end">
									<label class="ID_LK">'.$id_lk.' </label>
									<label class="Ten_LK">'.$ten_lk.'</label>
									<label class="SL_LK">'.$sl_lk.'</label>
									<label class="Don_gia">'.$don_gia.'</label>
								</div>
							';
						}
					}

				echo '
					</details>
				';
			}
		}
		echo '</div>';
		closeDB($connect);
	}
	
?>