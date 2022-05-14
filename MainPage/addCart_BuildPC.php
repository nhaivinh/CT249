<?php
	session_start();
	require_once("../DBconnect.php");
    function addToCart($idUser,$idLK,$slLK){
        $connect = connectDB();
        $query = "SELECT * FROM `linhkien` WHERE id_LK='".$idLK."';";	
        $result = mysqli_query($connect, $query);
        $data = array();
        while($row = mysqli_fetch_array($result, 1)){
            $data[] = $row;
        }
        $query = "Select * from `user_cart` where ID_User = '".$idUser."' and id_lk='".$idLK."'";
		$result = mysqli_query($connect, $query);
		$data= array();
		while ($row = mysqli_fetch_array($result,1)){
			$data[] = $row;
		}	
		if(count($data) == 0){
			$query = "INSERT INTO `user_cart` (`ID_User`, `ID_LK`, `So_luong`) 
				VALUES ('".$_SESSION['id_user']."', '".$idLK."', '".$slLK."')";
			mysqli_query($connect, $query);
		}
		else{
			$query = "Select So_luong from `user_cart` where ID_User = '".$idUser."' and id_lk='".$idLK."'";
			$result = mysqli_query($connect, $query);
			$data= array();
			while ($row = mysqli_fetch_array($result,1)){
				$data[] = $row;
			}
			$old_sl = $data[0]['So_luong'];
			$query = "update `user_cart` set So_luong ='".($slLK + $old_sl)."' where ID_User = '".$idUser."' and id_lk='".$idLK."'";
			mysqli_query($connect, $query);
		}
    }

	$connect = connectDB();
    if(isset($_SESSION['id_user'])){
        $idUser = $_SESSION['id_user'];
        if(isset($_SESSION['idChosenCPU']) && isset($_SESSION['slCPU'])){
            $idLK = $_SESSION['idChosenCPU'];
            $slSP = $_SESSION['slCPU'];
            addToCart($idUser,$idLK,$slSP);
            unset($_SESSION['idChosenCPU']);
            unset($_SESSION['slCPU']);
        }
        if(isset($_SESSION['idChosenMain']) && isset($_SESSION['slMain'])){
            $idLK = $_SESSION['idChosenMain'];
            $slSP = $_SESSION['slMain'];
            addToCart($idUser,$idLK,$slSP);
            unset($_SESSION['idChosenMain']);
            unset($_SESSION['slMain']);
        }
        if(isset($_SESSION['idChosenRAM']) && isset($_SESSION['slRAM'])){
            $idLK = $_SESSION['idChosenRAM'];
            $slSP = $_SESSION['slRAM'];
            addToCart($idUser,$idLK,$slSP);
            unset($_SESSION['idChosenRAM']);
            unset($_SESSION['slRAM']);
        }
        if(isset($_SESSION['idChosenGPU']) && isset($_SESSION['slGPU'])){
            $idLK = $_SESSION['idChosenGPU'];
            $slSP = $_SESSION['slGPU'];
            addToCart($idUser,$idLK,$slSP);
            unset($_SESSION['idChosenGPU']);
            unset($_SESSION['slGPU']);
        }
        if(isset($_SESSION['idChosenSSD']) && isset($_SESSION['slSSD'])){
            $idLK = $_SESSION['idChosenSSD'];
            $slSP = $_SESSION['slSSD'];
            addToCart($idUser,$idLK,$slSP);
            unset($_SESSION['idChosenSSD']);
            unset($_SESSION['slSSD']);
        }
        if(isset($_SESSION['idChosenHDD']) && isset($_SESSION['slHDD'])){
            $idLK = $_SESSION['idChosenHDD'];
            $slSP = $_SESSION['slHDD'];
            addToCart($idUser,$idLK,$slSP);
            unset($_SESSION['idChosenHDD']);
            unset($_SESSION['slHDD']);
        }
        if(isset($_SESSION['idChosenCase']) && isset($_SESSION['slCase'])){
            $idLK = $_SESSION['idChosenCase'];
            $slSP = $_SESSION['slCase'];
            addToCart($idUser,$idLK,$slSP);
            unset($_SESSION['idChosenCase']);
            unset($_SESSION['slCase']);
        }
        $_SESSION['addToCart_BuildPC'] = "Thêm vào giỏ hàng thành công";
        header("Location: BuildPC.php");
        closeDB($connect);
    }
    else{
        $_SESSION['addToCart_BuildPC'] = "Hãy đăng nhập trước khi thêm vào giỏ hàng";
        header("Location: BuildPC.php");
    }
    
?>