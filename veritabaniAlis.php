<?php
session_start();
$baglanti=mysqli_connect("localhost","root","","2017469016",);
if($baglanti){
	if($_POST){
		if(strip_tags(trim(isset($_POST["coin_id"])))){
			$coin_id=$_POST["coin_id"];
		}
		if(strip_tags(trim(isset($_POST["alim_miktar"])))){
			$alim_miktar=$_POST["alim_miktar"];
		}
		if(strip_tags(trim(isset($_POST["alim_fiyat"])))){
			$alim_fiyat=$_POST["alim_fiyat"];
		}
		if(strip_tags(trim(isset($_POST["hesap_no"])))){
			$hesap_no=$_POST["hesap_no"];
		}
		$sorgu=mysqli_query($baglanti, "INSERT INTO alim (alim_miktar,alim_fiyat,hesap_no,coin_id) VALUES ('".$alim_miktar."','".$alim_fiyat."','".$hesap_no."','".$coin_id."')");
		if($sorgu==TRUE){
			$alimToplam=($alim_miktar*$alim_fiyat);
			header("Location: alimBasarili.php");
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