<?php
	require_once("../DBprocess.php");
	$address = $_POST['address'];
	$tong_tien = $_POST['tong_tien'];

	if(isset($_SESSION['id_user'])){
		$connect = connectDB();
		$id_user = $_SESSION['id_user'];
		$ableToAdd = true;

		$query = "Select max(ID_DH) as max from donhang";	
		$result = mysqli_query($connect, $query);
		$data = array();
		while($row = mysqli_fetch_array($result, 1)){
			$data[] = $row;
		}
		$id_dh = $data[0]['max'] + 1;
	
		$query = "SELECT user_cart.ID_LK as ID_LK, user_cart.So_luong as So_luong_mua, linhkien.So_luong as So_luong_max, (Gia_LK*(1-Giam_gia)) 
			as Don_gia, Ten_LK FROM `user_cart` join linhkien on user_cart.ID_LK=linhkien.ID_LK where id_user='".$id_user."'";
		$result = mysqli_query($connect, $query);
		$data = array();
		while($row = mysqli_fetch_array($result, 1)){
			$data[] = $row;
		}
		for($i=0;$i<count($data);$i++){
			$id_lk = $data[$i]['ID_LK'];
			$sl_mua = $data[$i]['So_luong_mua'];
			$sl_tonkho = $data[$i]['So_luong_max'];
			$tenLK = $data[$i]['Ten_LK'];
			if($sl_mua > $sl_tonkho){
				$ableToAdd = false;
				$_SESSION['cart_buy_status'] = "Mã sản phẩm:".$id_lk.". Tên:".$tenLK." số lượng mua lớn hơn số lượng tồn kho: ".$sl_tonkho;
				closeDB($connect);
				header("Location: Cart.php");
			}
		}
		if($ableToAdd == true){
			$query = "Select *  from address_user where id_user='".$id_user."' and Diachi='".$address."'";	
			$result = mysqli_query($connect, $query);
			$address_array = array();
			while($row = mysqli_fetch_array($result, 1)){
				$address_array[] = $row;
			}
			if(count($address_array) == 0){
				$query = "INSERT INTO address_user values($id_user, '$address')";
				mysqli_query($connect, $query);
			}

			$query = "INSERT INTO `donhang` (ID_DH,`ID_User_KH`, `Diachi_DH`, `Status_DH`, `Ngay_Dat`, Tong_tien) 
					VALUES ('".$id_dh."','".$id_user."', '$address', 'Chờ xử lý', sysdate(), '".$tong_tien."')";
			mysqli_query($connect, $query);

			for($i=0;$i<count($data);$i++){
				$id_lk = $data[$i]['ID_LK'];
				$sl_mua = $data[$i]['So_luong_mua'];
				$sl_tonkho = $data[$i]['So_luong_max'];
				$don_gia = $data[$i]['Don_gia'];
				
				$query = "INSERT INTO `chitietDH` (`ID_DH`, `ID_LK`, `So_luong`, `Don_gia`) 
					VALUES ('".$id_dh."', '".$id_lk."', '".$sl_mua."', '".$don_gia."')";
				mysqli_query($connect,$query);

				$query = "update linhkien set so_luong='".($sl_tonkho - $sl_mua)."' WHERE id_lk='".$id_lk."'";	
				mysqli_query($connect, $query);

				$query = "delete from user_cart where id_user='".$id_user."' and id_lk='".$id_lk."'";
				mysqli_query($connect, $query);
			}
			
			$_SESSION['cart_buy_status'] = "Đặt hàng thành công.";
			closeDB($connect);
			header("Location: index.php");
		}
	}
	else{
		header("Location: index.php");
	}
?>