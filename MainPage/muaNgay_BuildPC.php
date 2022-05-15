<?php
    session_start();
    require_once("../DBconnect.php");
    function insertToChiTietDH($idDH, $idLK, $sl_mua, $sl_tonkho, $dongia){
        $connect = connectDB();
        $query = "INSERT INTO `chitietDH` (`ID_DH`, `ID_LK`, `So_luong`, `Don_gia`) 
			VALUES ('".$idDH."', '".$idLK."', '".$sl_mua."', '".$dongia."')";
		mysqli_query($connect,$query);
        $query = "update linhkien set so_luong='".($sl_tonkho - $sl_mua)."' WHERE id_lk='".$idLK."'";	
		mysqli_query($connect, $query);

        closeDB($connect);
    }

    $connect = connectDB();
    $id_user = $_POST['user_id'];
    $address = $_POST['address'];
	$tong_tien = $_POST['tong_tien'];
    $loaiLK = array("CPU", "Main", "RAM", "GPU", "SSD", "HDD", "Case");

    for($i=0;$i<count($loaiLK);$i++){
        $Name_PostID = 'id_'.$loaiLK[$i];
        $Name_PostSL = 'sl_'.$loaiLK[$i];
        if(isset($_POST[$Name_PostID])){
            $id_lk = $_POST[$Name_PostID];
            $sl_mua = $_POST[$Name_PostSL];
            $query = "Select so_luong from linhkien where ID_LK=".$id_lk."";	
            $result = mysqli_query($connect, $query);
            $data = array();
            while($row = mysqli_fetch_array($result, 1)){
                $data[] = $row;
            }
            $sl_tonkho = $data[0]['so_luong'];

            if($sl_mua > $sl_tonkho){
                $_SESSION['buy_status'] = "Số lượng mua vật phẩm Mã:$id_lk lớn hơn số hàng tồn kho:$sl_tonkho";
                closeDB($connect);
                header("Location: BuildPC.php");
            }
        }
    }

    $query = "Select max(ID_DH) as max from donhang";	
	$result = mysqli_query($connect, $query);
	$data = array();
	while($row = mysqli_fetch_array($result, 1)){
		$data[] = $row;
	}
	$id_dh = $data[0]['max'] + 1;

	$query = "Select *  from address_user where id_user='".$id_user."' and Diachi='".$address."'";	
	$result = mysqli_query($connect, $query);
	$data = array();
	while($row = mysqli_fetch_array($result, 1)){
		$data[] = $row;
	}
	if(count($data) == 0){
		$query = "INSERT INTO address_user values($id_user, '$address')";
		mysqli_query($connect, $query);
	}
    $query = "INSERT INTO `donhang` (ID_DH, `ID_User_KH`, Diachi_DH, `Status_DH`, `Ngay_Dat`, `Tong_tien`) 
	    VALUES ($id_dh,'".$id_user."', '".$address."','Chờ xử lý', sysdate(), '".$tong_tien."')";
	mysqli_query($connect, $query);

    for($i=0;$i<count($loaiLK);$i++){
        $Name_PostID = 'id_'.$loaiLK[$i];
        $Name_PostSL = 'sl_'.$loaiLK[$i];
        $Name_PostDG = 'dg_'.$loaiLK[$i];
        if(isset($_POST[$Name_PostID])){
            $idLK = $_POST[$Name_PostID];
            $sl_mua = $_POST[$Name_PostSL];
            $dongia = $_POST[$Name_PostDG];

            $query = "Select so_luong from linhkien where ID_LK=".$id_lk."";	
            $result = mysqli_query($connect, $query);
            $data = array();
            while($row = mysqli_fetch_array($result, 1)){
                $data[] = $row;
            }
            $sl_tonkho = $data[0]['so_luong'];

            insertToChiTietDH($id_dh, $idLK, $sl_mua, $sl_tonkho, $dongia);
        }
    }
    $_SESSION['buy_status'] = "Đặt hàng thành công";
    closeDB($connect);
    //header("Location: BuildPC.php");

?>