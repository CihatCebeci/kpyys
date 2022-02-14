<?php
session_start();
$baglanti=mysqli_connect("localhost","root","","2017469016",);
if($baglanti){
	if($_POST){
		if(strip_tags(trim(isset($_POST["coin_id"])))){
			$coin_id=$_POST["coin_id"];
		}
		if(strip_tags(trim(isset($_POST["satim_miktar"])))){
			$satim_miktar=$_POST["satim_miktar"];
		}
		if(strip_tags(trim(isset($_POST["satim_fiyat"])))){
			$satim_fiyat=$_POST["satim_fiyat"];
		}
		if(strip_tags(trim(isset($_POST["hesap_no"])))){
			$hesap_no=$_POST["hesap_no"];
		}
		$sorgu=mysqli_query($baglanti, "INSERT INTO satim (satim_miktar,satim_fiyat,hesap_no,coin_id) VALUES ('".$satim_miktar."','".$satim_fiyat."','".$hesap_no."','".$coin_id."')");
		if($sorgu==TRUE){
			$alimToplam=($satim_miktar*$satim_fiyat);
			header("Location: satimBasarili.php");
		}else{
			echo 0;
		}
		mysqli_close($baglanti);
	}else{
		echo "Veriler Gelmedi";
	}
}else{
	die("Bağlantı Sağlanamadı");
};

?>