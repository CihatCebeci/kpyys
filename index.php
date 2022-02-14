<!DOCTYPE html>
<html>
<link rel="KPYYS icon" href="icon.ico" />
<head>
<title>KPYYS Giriş</title>
<meta charset="utf-8">
<link href="/css/style.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
	$("#giris").click(function(){
		$.post("kontrol.php",
		{
			kullanici_adi:$("#kullanici_adi").val(),
			isletme_sifre:$("#isletme_sifre").val()
		},
		function(data,status){
		if(data=="1}"){
				$(location).attr("href","/main.php");
			}else{
				alert("E-Posta veya Şifre Yanlış!");
			}
		}
		);
		
	});
	
});
</script>
</head>
<body>
<div class="adminLabel"><img src="logo1.png"/></div>
<div class="girisEkrani">
<label><center><b>Kullanıcı Adı ve Şifre ile giriş yapınız.</b></center></label>
<input type="text" id="kullanici_adi" placeholder="Kullanıcı Adınız">
<input type="password" id="isletme_sifre" placeholder="Şifreniz">
<button id="giris">Giriş</button>
<br>
<a href=""><label id="yenileme">Şifremi Unuttum</label></a>
<br>
<b><label id="tanim">Cihat Cavit Cebeci YBS 2021 ©</label></b>
</div>
</body>
</html>