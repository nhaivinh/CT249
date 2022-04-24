<?php
	session_start();
	require_once("../DBconnect.php");
	$connect = connectDB();
	$id_lk = $_POST['id_lk'];
	$loai_lk = $_POST['loai_lk'];
	$sl_sp = $_POST['sl_sp'];
	$sl_ton = $_POST['sl_ton'];
	
	if(isset($_SESSION['username'])){
		if($sl_sp <= $sl_ton){
			
			$query = "SELECT round(`Gia_LK`*(1-`Giam_gia`),0) as Gia_giam FROM `linhkien` WHERE id_LK='".$id_lk."';";	
			$result = mysqli_query($connect, $query);
			$data = array();
			while($row = mysqli_fetch_array($result, 1)){
				$data[] = $row;
			}
			$gia_giam = $data[0]['Gia_giam'];
			
			$query = "Select max(ID_DH) as max from donhang";	
			$result = mysqli_query($connect, $query);
			$data = array();
			while($row = mysqli_fetch_array($result, 1)){
				$data[] = $row;
			}
			$id_dh = $data[0]['max'] + 1;

			$query = "INSERT INTO `donhang` (ID_DH, `ID_User_KH`, Diachi_DH, `Status_DH`, `Ngay_Dat`, `Tong_tien`) 
				VALUES ($id_dh,'".$_SESSION['id_user']."', 'Diachi','Chờ xử lý', sysdate(), '".$gia_giam."')";
			mysqli_query($connect, $query);
				
			$query = "INSERT INTO `chitietDH` (`ID_DH`, `ID_LK`, `So_luong`, `Don_gia`) 
				VALUES ('".$id_dh."', '".$id_lk."', '".$sl_sp."', '".$gia_giam."')";
			mysqli_query($connect,$query);
						
			$query = "update linhkien set so_luong='".($sl_ton - $sl_sp)."' WHERE id_lk='".$id_lk."'";	
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