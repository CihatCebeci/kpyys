<?php
session_start();
$baglanti=mysqli_connect("localhost","root","","2017469016",);
if($baglanti){
	if($_POST){
		if(strip_tags(trim(isset($_POST["kullanici_adi"])))){
			$kullanici_adi=$_POST["kullanici_adi"];
		}
		if(strip_tags(trim(isset($_POST["isletme_sifre"])))){
			$isletme_sifre=$_POST["isletme_sifre"];
		}
		$sorgu=mysqli_query($baglanti, "SELECT * FROM isletme,hesap,coin WHERE kullanici_adi='".$kullanici_adi."' AND isletme_sifre='".$isletme_sifre."' AND isletme.isletme_id=hesap.isletme_id");
		if(mysqli_num_rows($sorgu)>0){
			$row=mysqli_fetch_assoc($sorgu);
			session_regenerate_id();
			$_SESSION['loggedin']=FALSE;
			$_SESSION['isletme_id']=$row["isletme_id"];
			$_SESSION['isletme_adi']=$row["isletme_adi"];
			$_SESSION['isletme_sehir']=$row["isletme_sehir"];
			$_SESSION['kullanici_adi']=$row["kullanici_adi"];
			$_SESSION['isletme_sifre']=$row["isletme_sifre"];
			$_SESSION['hesap_no']=$row["hesap_no"];
			$_SESSION['hesap_bakiye']=$row["hesap_bakiye"];		
			echo 1;
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
}