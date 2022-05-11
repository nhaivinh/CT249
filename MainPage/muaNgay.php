<?php
	session_start();
	require_once("../DBconnect.php");
	$connect = connectDB();
	$id_user = $_POST['user_id'];
	$id_lk = $_POST['id_LK'];
	$loai_lk = $_POST['loai_lk'];
	$sl_mua = $_POST['so_luong_mua'];
	$don_gia = $_POST['don_gia'];
	$address = $_POST['address'];
	$tong_tien = $_POST['tong_tien'];
	
	if(isset($_SESSION['username'])){
		$query = "Select so_luong from linhkien where ID_LK=".$id_lk."";	
		$result = mysqli_query($connect, $query);
		$data = array();
		while($row = mysqli_fetch_array($result, 1)){
			$data[] = $row;
		}
		$sl_tonkho = $data[0]['so_luong'];

		if($sl_mua <= $sl_tonkho){
			$query = "Select max(ID_DH) as max from donhang";	
			$result = mysqli_query($connect, $query);
			$data = array();
			while($row = mysqli_fetch_array($result, 1)){
				$data[] = $row;
			}
			$id_dh = $data[0]['max'] + 1;

			$query = "INSERT INTO `donhang` (ID_DH, `ID_User_KH`, Diachi_DH, `Status_DH`, `Ngay_Dat`, `Tong_tien`) 
				VALUES ($id_dh,'".$_SESSION['id_user']."', '".$address."','Chờ xử lý', sysdate(), '".$tong_tien."')";
			mysqli_query($connect, $query);
				
			$query = "INSERT INTO `chitietDH` (`ID_DH`, `ID_LK`, `So_luong`, `Don_gia`) 
				VALUES ('".$id_dh."', '".$id_lk."', '".$sl_mua."', '".$don_gia."')";
			mysqli_query($connect,$query);
						
			$query = "update linhkien set so_luong='".($sl_tonkho - $sl_mua)."' WHERE id_lk='".$id_lk."'";	
			mysqli_query($connect, $query);
				
			$_SESSION['buy_status'] = "Đã mua thành công.";
			header("Location: index.php");
		}
		else{
			$_SESSION['buy_status'] = "Số lượng vượt quá số hàng tồn kho";
			header("Location: chitiet_SP.php?id_lk=".$id_lk."&loai_lk=".$loai_lk);
		}
	}
	else{
		$_SESSION['buy_status'] = "Hãy đăng nhập trước khi thực hiện mua hàng";
		header("Location: chitiet_SP.php?id_lk=".$id_lk."&loai_lk=".$loai_lk);
	}
?>