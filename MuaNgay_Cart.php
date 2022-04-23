<?php
	require_once("DBprocess.php");
	if(isset($_SESSION['username'])){
		$connect = connectDB();
			
		$query = "Select ID_LK, So_luong, Tong from user_cart where id_user='".$_SESSION['id_user']."'";
		$result = mysqli_query($connect, $query);
		$data = array();
		while($row = mysqli_fetch_array($result, 1)){
			$data[] = $row;
		}
		$tong_tien=0;
		for($i=0;$i<count($data);$i++){
			$tong_tien += $data[$i]['Tong'];
		}
		$query = "Select max(ID_DH) as max from donhang";	
		$result = mysqli_query($connect, $query);
		$data = array();
		while($row = mysqli_fetch_array($result, 1)){
			$data[] = $row;
		}
		$id_dh = $data[0]['max'] + 1;

		$query = "INSERT INTO `donhang` (ID_DH,`ID_User_KH`, `Status_DH`, `Ngay_Dat`, Tong_tien) 
				VALUES ('".$id_dh."','".$_SESSION['id_user']."', 'Chờ xử lý', sysdate(), '".$tong_tien."')";
		mysqli_query($connect, $query);
	
		$query = "SELECT user_cart.ID_LK as ID_LK, user_cart.So_luong as So_luong, linhkien.So_luong as So_luong_max, Don_gia, Tong, Ten_LK 
			FROM `user_cart` join linhkien on user_cart.ID_LK=linhkien.ID_LK where id_user='".$_SESSION['id_user']."'";
		$result = mysqli_query($connect, $query);
		$data = array();
		while($row = mysqli_fetch_array($result, 1)){
			$data[] = $row;
		}
		for($i=0;$i<count($data);$i++){
			$id_lk = $data[$i]['ID_LK'];
			$sl_sp = $data[$i]['So_luong'];
			$sl_ton = $data[$i]['So_luong_max'];
			$don_gia = $data[$i]['Don_gia'];
			$query = "INSERT INTO `chitietDH` (`ID_DH`, `ID_LK`, `So_luong`, `Don_gia`) 
				VALUES ('".$id_dh."', '".$id_lk."', '".$sl_sp."', '".$don_gia."')";
			mysqli_query($connect,$query);
				
			$query = "update linhkien set so_luong='".($sl_ton - $sl_sp)."' WHERE id_lk='".$id_lk."'";	
			mysqli_query($connect, $query);

			$query = "delete from user_cart where id_user='".$_SESSION['id_user']."' and id_lk='".$id_lk."'";
			mysqli_query($connect, $query);
		}
			
		$_SESSION['cart_buy_status'] = "Đặt hàng thành công.";
		header("Location: ManagePage.php?info=GioHang");
	}
	else{
		header("Location: ManagePage.php?info=GioHang");
	}
?>