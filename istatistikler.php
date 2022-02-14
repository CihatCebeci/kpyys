<?php
setcookie('cookie_name', 'cookie_value', ['samesite' => 'None']);
session_start();
?>
<!DOCTYPE html>
<meta charset="UTF-8">
<html lang="tr">
<head>
	<link rel="KPYYS icon" href="icon.ico" />
	<title>Şirketler İçin KPYYS - KDS 2021</title>
	<link href="css/app.css" rel="stylesheet">
</head>
<body>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="main.php">
          <span class="align-middle"><img src="logomain.png"/></span>
        </a>

				<ul class="sidebar-nav">
					<li class="sidebar-header">
						Ana Menü
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="main.php">
              <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Ana Sayfa</span>
            </a>
					</li>

					<li class="sidebar-item active">
						<a class="sidebar-link" href="istatistikler.php">
              <i class="align-middle" data-feather="pie-chart"></i> <span class="align-middle">İstatistikler</span>
            </a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="yatirimSihirbazi.php">
              <i class="align-middle" data-feather="settings"></i> <span class="align-middle">Yatırım Sihirbazı</span>
            </a>
					</li>

					<li class="sidebar-header">
						Alım ve Satım Girişi
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link" href="alimGirisi.php">
              <i class="align-middle" data-feather="trending-up"></i> <span class="align-middle">Alış Girişi</span>
            </a>

					<li class="sidebar-item">
						<a class="sidebar-link" href="satimGirisi.php">
              <i class="align-middle" data-feather="trending-down"></i> <span class="align-middle">Satış Girişi</span>
            </a>
					</li>
				<li class="sidebar-item">
						<a class="sidebar-link" href="sonislemler.php">
              <i class="align-middle" data-feather="layers"></i> <span class="align-middle">Son İşlemler</span>
            </a>
					</li>
				</ul>

			</div>
		</nav>

		<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle d-flex">
          <i class="hamburger align-self-center"></i>
        </a>
				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">
						<li class="nav-item dropdown">
						<label>Hoşgeldiniz,</label><b>&nbsp;<?php echo $_SESSION['isletme_adi'] ?></b>
							<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-toggle="dropdown">
                <i class="align-middle" data-feather="settings"></i>
              </a>
							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-toggle="dropdown">
              </a>
							<div class="dropdown-menu dropdown-menu-right">
								<a class="dropdown-item" href="yardim.php"><i class="align-middle mr-1" data-feather="help-circle"></i>Proje Detayları</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="/index.php">Çıkış Yap</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>

			<main class="content">
			<div class="row mb-2 mb-xl-3">
						<div class="col-auto d-none d-sm-block">
							<h3><strong><b><?php $isim=strtoupper($_SESSION['isletme_adi']); echo $isim ?></b></strong>&nbsp;Şirketler için Kripto Para Yatırım Yönetim Sistemi</h3>
						</div>
					</div>
					<div class="container-fluid p-0">
					<div class="row">
						<div class="col-12 col-lg-6">
							<div class="card flex-fill w-100">
								<div class="card-header">
									<h5 class="card-title">Kripto Para Alım Satımları</h5>
									<h6 class="card-subtitle text-muted">Toplam kripto para alım ve satımlarınızı ₺ bazında inceleyebilirsiniz.</h6>
								</div>
								<div class="card-body">
									<div class="chart">
										<canvas id="chartjs-line"></canvas>
									</div>
								</div>
							</div>
						</div>

						<div class="col-12 col-lg-6">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title">Alım/Satım Grafiği</h5>
									<h6 class="card-subtitle text-muted">Hangi kripto paralarda kaç kez işlem gerçekleştirdiğinizi bu grafik ile inceleyebilirsiniz.</h6>
								</div>
								<div class="card-body">
									<div class="chart">
										<canvas id="chartjs-radar"></canvas>
									</div>
								</div>
							</div>
						</div>

						<div class="col-12 col-lg-6">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title">Son Satışlar</h5>
									<h6 class="card-subtitle text-muted">Yapılan son satışlardan elde edilen Türk Lirasını inceleyebilirsiniz.</h6>
								</div>
								<div class="card-body">
									<div class="chart chart-sm">
										<canvas id="chartjs-polar-area"></canvas>
									</div>
								</div>
							</div>
						</div>

						<div class="col-12 col-lg-6">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title">Miktar Dağılımı</h5>
									<h6 class="card-subtitle text-muted">Sahip olduğunuz kripto paralar miktar bakımından incelenebilir. Türk Lirası bazında incelemeyiniz.</h6>
								</div>
								<div class="card-body">
									<div class="chart chart-sm">
										<canvas id="chartjs-pie"></canvas>
									</div>
								</div>
							</div>
						</div>


				</div>
			</main>
			<footer class="footer">
				<div class="container-fluid">
					<div class="row text-muted">
						<div class="col-6 text-left">
							<p class="mb-0">
								<a href="main.php" class="text-muted"><strong>Şirketler İçin KPYYS - DEU YBS Karar Destek Sistemleri 2021</strong></a> &copy;
							</p>
						</div>
						<div class="col-6 text-right">
							<ul class="list-inline">
								<li class="list-inline-item">
									<a class="text-muted" href="yardim.php">Proje Detayları</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="index.php">Çıkış Yap</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</footer>
		</div>
	</div>
<script src="js/app.js"></script>
</body>
</html>
<script>
		document.addEventListener("DOMContentLoaded", function() {
			// Line chart
			new Chart(document.getElementById("chartjs-line"), {
				type: "line",
				data: {
					labels: ["Bitcoin", "Ethereum", "XRP", "Stellar", "Bitcoin Cash","Litecoin","USD Tether","Chainlink","Cardano","Binance Coin"],
					datasets: [{
						label: "Satış Miktarı (₺)",
						fill: true,
						backgroundColor: "transparent",
						borderColor: window.theme.primary,
						data: [<?php
$baglanti=mysqli_connect("localhost","root","","2017469016",); 
$sql="SELECT round(SUM(satim.satim_miktar*satim.satim_fiyat),2) as satilan_bitcoin
FROM isletme,hesap,satim,coin
WHERE isletme.isletme_id=hesap.isletme_id AND hesap.hesap_no=satim.hesap_no AND satim.coin_id=coin.coin_id AND coin.coin_ad='Bitcoin' AND hesap.hesap_no='".$_SESSION['hesap_no']."'";
$sorgu=mysqli_query($baglanti,$sql);
while( $sonuc=mysqli_fetch_array($sorgu,MYSQLI_ASSOC) ){
    echo $sonuc["satilan_bitcoin"];
}
?>,
							<?php
$baglanti=mysqli_connect("localhost","root","","2017469016",); 
$sql="SELECT round(SUM(satim.satim_miktar*satim.satim_fiyat),2) as satilan_ethereum
FROM isletme,hesap,satim,coin
WHERE isletme.isletme_id=hesap.isletme_id AND hesap.hesap_no=satim.hesap_no AND satim.coin_id=coin.coin_id AND coin.coin_ad='Ethereum' AND hesap.hesap_no='".$_SESSION['hesap_no']."'";
$sorgu=mysqli_query($baglanti,$sql);
while( $sonuc=mysqli_fetch_array($sorgu,MYSQLI_ASSOC) ){
    echo $sonuc["satilan_ethereum"];
}
?>,
							<?php
$baglanti=mysqli_connect("localhost","root","","2017469016",); 
$sql="SELECT round(SUM(satim.satim_miktar*satim.satim_fiyat),2) as satilan_xrp
FROM isletme,hesap,satim,coin
WHERE isletme.isletme_id=hesap.isletme_id AND hesap.hesap_no=satim.hesap_no AND satim.coin_id=coin.coin_id AND coin.coin_ad='XRP' AND hesap.hesap_no='".$_SESSION['hesap_no']."'";
$sorgu=mysqli_query($baglanti,$sql);
while( $sonuc=mysqli_fetch_array($sorgu,MYSQLI_ASSOC) ){
    echo $sonuc["satilan_xrp"];
}
?>,
							<?php
$baglanti=mysqli_connect("localhost","root","","2017469016",); 
$sql="SELECT round(SUM(satim.satim_miktar*satim.satim_fiyat),2) as satilan_stellar
FROM isletme,hesap,satim,coin
WHERE isletme.isletme_id=hesap.isletme_id AND hesap.hesap_no=satim.hesap_no AND satim.coin_id=coin.coin_id AND coin.coin_ad='Stellar' AND hesap.hesap_no='".$_SESSION['hesap_no']."'";
$sorgu=mysqli_query($baglanti,$sql);
while( $sonuc=mysqli_fetch_array($sorgu,MYSQLI_ASSOC) ){
    echo $sonuc["satilan_stellar"];
}
?>,
							<?php
$baglanti=mysqli_connect("localhost","root","","2017469016",); 
$sql="SELECT round(SUM(satim.satim_miktar*satim.satim_fiyat),2) as satilan_bitcoincash
FROM isletme,hesap,satim,coin
WHERE isletme.isletme_id=hesap.isletme_id AND hesap.hesap_no=satim.hesap_no AND satim.coin_id=coin.coin_id AND coin.coin_ad='Bitcoin Cash' AND hesap.hesap_no='".$_SESSION['hesap_no']."'";
$sorgu=mysqli_query($baglanti,$sql);
while( $sonuc=mysqli_fetch_array($sorgu,MYSQLI_ASSOC) ){
    echo $sonuc["satilan_bitcoincash"];
}
?>,
							<?php
$baglanti=mysqli_connect("localhost","root","","2017469016",); 
$sql="SELECT round(SUM(satim.satim_miktar*satim.satim_fiyat),2) as satilan_litecoin
FROM isletme,hesap,satim,coin
WHERE isletme.isletme_id=hesap.isletme_id AND hesap.hesap_no=satim.hesap_no AND satim.coin_id=coin.coin_id AND coin.coin_ad='Litecoin' AND hesap.hesap_no='".$_SESSION['hesap_no']."'";
$sorgu=mysqli_query($baglanti,$sql);
while( $sonuc=mysqli_fetch_array($sorgu,MYSQLI_ASSOC) ){
    echo $sonuc["satilan_litecoin"];
}
?>,
							<?php
$baglanti=mysqli_connect("localhost","root","","2017469016",); 
$sql="SELECT round(SUM(satim.satim_miktar*satim.satim_fiyat),2) as satilan_tether
FROM isletme,hesap,satim,coin
WHERE isletme.isletme_id=hesap.isletme_id AND hesap.hesap_no=satim.hesap_no AND satim.coin_id=coin.coin_id AND coin.coin_ad='Tether' AND hesap.hesap_no='".$_SESSION['hesap_no']."'";
$sorgu=mysqli_query($baglanti,$sql);
while( $sonuc=mysqli_fetch_array($sorgu,MYSQLI_ASSOC) ){
    echo $sonuc["satilan_tether"];
}
?>,
							<?php
$baglanti=mysqli_connect("localhost","root","","2017469016",); 
$sql="SELECT round(SUM(satim.satim_miktar*satim.satim_fiyat),2) as satilan_chainlink
FROM isletme,hesap,satim,coin
WHERE isletme.isletme_id=hesap.isletme_id AND hesap.hesap_no=satim.hesap_no AND satim.coin_id=coin.coin_id AND coin.coin_ad='Chainlink' AND hesap.hesap_no='".$_SESSION['hesap_no']."'";
$sorgu=mysqli_query($baglanti,$sql);
while( $sonuc=mysqli_fetch_array($sorgu,MYSQLI_ASSOC) ){
    echo $sonuc["satilan_chainlink"];
}
?>,
							<?php
$baglanti=mysqli_connect("localhost","root","","2017469016",); 
$sql="SELECT round(SUM(satim.satim_miktar*satim.satim_fiyat),2) as satilan_cardano
FROM isletme,hesap,satim,coin
WHERE isletme.isletme_id=hesap.isletme_id AND hesap.hesap_no=satim.hesap_no AND satim.coin_id=coin.coin_id AND coin.coin_ad='Cardano' AND hesap.hesap_no='".$_SESSION['hesap_no']."'";
$sorgu=mysqli_query($baglanti,$sql);
while( $sonuc=mysqli_fetch_array($sorgu,MYSQLI_ASSOC) ){
    echo $sonuc["satilan_cardano"];
}
?>,
							<?php
$baglanti=mysqli_connect("localhost","root","","2017469016",); 
$sql="SELECT round(SUM(satim.satim_miktar*satim.satim_fiyat),2) as satilan_binance
FROM isletme,hesap,satim,coin
WHERE isletme.isletme_id=hesap.isletme_id AND hesap.hesap_no=satim.hesap_no AND satim.coin_id=coin.coin_id AND coin.coin_ad='Binance Coin' AND hesap.hesap_no='".$_SESSION['hesap_no']."'";
$sorgu=mysqli_query($baglanti,$sql);
while( $sonuc=mysqli_fetch_array($sorgu,MYSQLI_ASSOC) ){
    echo $sonuc["satilan_binance"];
}
?>]
					}, {
						label: "Alım Miktarı (₺)",
						fill: true,
						backgroundColor: "transparent",
						borderColor: "#adb5bd",
						borderDash: [4, 4],
						data: [<?php
$baglanti=mysqli_connect("localhost","root","","2017469016",); 
$sql="SELECT round(SUM(alim.alim_miktar*alim.alim_fiyat),2) as toplam_bitcoin
FROM isletme,hesap,alim,coin
WHERE isletme.isletme_id=hesap.isletme_id AND hesap.hesap_no=alim.hesap_no AND alim.coin_id=coin.coin_id AND coin.coin_ad='Bitcoin' AND hesap.hesap_no='".$_SESSION['hesap_no']."'";
$sorgu=mysqli_query($baglanti,$sql);
while( $sonuc=mysqli_fetch_array($sorgu,MYSQLI_ASSOC) ){
    echo $sonuc["toplam_bitcoin"];
}
?>, <?php
$baglanti=mysqli_connect("localhost","root","","2017469016",); 
$sql="SELECT round(SUM(alim.alim_miktar*alim.alim_fiyat),2) as toplam_ethereum
FROM isletme,hesap,alim,coin
WHERE isletme.isletme_id=hesap.isletme_id AND hesap.hesap_no=alim.hesap_no AND alim.coin_id=coin.coin_id AND coin.coin_ad='Ethereum' AND hesap.hesap_no='".$_SESSION['hesap_no']."'";
$sorgu=mysqli_query($baglanti,$sql);
while( $sonuc=mysqli_fetch_array($sorgu,MYSQLI_ASSOC) ){
    echo $sonuc["toplam_ethereum"]; 
}
?>, <?php
$baglanti=mysqli_connect("localhost","root","","2017469016",); 
$sql="SELECT round(SUM(alim.alim_miktar*alim.alim_fiyat),2) as toplam_xrp
FROM isletme,hesap,alim,coin
WHERE isletme.isletme_id=hesap.isletme_id AND hesap.hesap_no=alim.hesap_no AND alim.coin_id=coin.coin_id AND coin.coin_ad='XRP' AND hesap.hesap_no='".$_SESSION['hesap_no']."'";
$sorgu=mysqli_query($baglanti,$sql);
while( $sonuc=mysqli_fetch_array($sorgu,MYSQLI_ASSOC) ){
    echo $sonuc["toplam_xrp"]; 
}
?>, <?php
$baglanti=mysqli_connect("localhost","root","","2017469016",); 
$sql="SELECT round(SUM(alim.alim_miktar*alim.alim_fiyat),2) as toplam_stellar
FROM isletme,hesap,alim,coin
WHERE isletme.isletme_id=hesap.isletme_id AND hesap.hesap_no=alim.hesap_no AND alim.coin_id=coin.coin_id AND coin.coin_ad='Stellar' AND hesap.hesap_no='".$_SESSION['hesap_no']."'";
$sorgu=mysqli_query($baglanti,$sql);
while( $sonuc=mysqli_fetch_array($sorgu,MYSQLI_ASSOC) ){
    echo $sonuc["toplam_stellar"]; 
}
?>, <?php
$baglanti=mysqli_connect("localhost","root","","2017469016",); 
$sql="SELECT round(SUM(alim.alim_miktar*alim.alim_fiyat),2) as toplam_bitcoincash
FROM isletme,hesap,alim,coin
WHERE isletme.isletme_id=hesap.isletme_id AND hesap.hesap_no=alim.hesap_no AND alim.coin_id=coin.coin_id AND coin.coin_ad='Bitcoin Cash' AND hesap.hesap_no='".$_SESSION['hesap_no']."'";
$sorgu=mysqli_query($baglanti,$sql);
while( $sonuc=mysqli_fetch_array($sorgu,MYSQLI_ASSOC) ){
    echo $sonuc["toplam_bitcoincash"]; 
}
?>, <?php
$baglanti=mysqli_connect("localhost","root","","2017469016",); 
$sql="SELECT round(SUM(alim.alim_miktar*alim.alim_fiyat),2) as toplam_litecoin
FROM isletme,hesap,alim,coin
WHERE isletme.isletme_id=hesap.isletme_id AND hesap.hesap_no=alim.hesap_no AND alim.coin_id=coin.coin_id AND coin.coin_ad='Litecoin' AND hesap.hesap_no='".$_SESSION['hesap_no']."'";
$sorgu=mysqli_query($baglanti,$sql);
while( $sonuc=mysqli_fetch_array($sorgu,MYSQLI_ASSOC) ){
    echo $sonuc["toplam_litecoin"]; 
}
?>, <?php
$baglanti=mysqli_connect("localhost","root","","2017469016",); 
$sql="SELECT round(SUM(alim.alim_miktar*alim.alim_fiyat),2) as toplam_tether
FROM isletme,hesap,alim,coin
WHERE isletme.isletme_id=hesap.isletme_id AND hesap.hesap_no=alim.hesap_no AND alim.coin_id=coin.coin_id AND coin.coin_ad='Tether' AND hesap.hesap_no='".$_SESSION['hesap_no']."'";
$sorgu=mysqli_query($baglanti,$sql);
while( $sonuc=mysqli_fetch_array($sorgu,MYSQLI_ASSOC) ){
    echo $sonuc["toplam_tether"]; 
}
?>, <?php
$baglanti=mysqli_connect("localhost","root","","2017469016",); 
$sql="SELECT round(SUM(alim.alim_miktar*alim.alim_fiyat),2) as toplam_chainlink
FROM isletme,hesap,alim,coin
WHERE isletme.isletme_id=hesap.isletme_id AND hesap.hesap_no=alim.hesap_no AND alim.coin_id=coin.coin_id AND coin.coin_ad='Chainlink' AND hesap.hesap_no='".$_SESSION['hesap_no']."'";
$sorgu=mysqli_query($baglanti,$sql);
while( $sonuc=mysqli_fetch_array($sorgu,MYSQLI_ASSOC) ){
    echo $sonuc["toplam_chainlink"]; 
}
?> , <?php
$baglanti=mysqli_connect("localhost","root","","2017469016",); 
$sql="SELECT round(SUM(alim.alim_miktar*alim.alim_fiyat),2) as toplam_cardano
FROM isletme,hesap,alim,coin
WHERE isletme.isletme_id=hesap.isletme_id AND hesap.hesap_no=alim.hesap_no AND alim.coin_id=coin.coin_id AND coin.coin_ad='Cardano' AND hesap.hesap_no='".$_SESSION['hesap_no']."'";
$sorgu=mysqli_query($baglanti,$sql);
while( $sonuc=mysqli_fetch_array($sorgu,MYSQLI_ASSOC) ){
    echo $sonuc["toplam_cardano"]; 
}
?>, <?php
$baglanti=mysqli_connect("localhost","root","","2017469016",); 
$sql="SELECT round(SUM(alim.alim_miktar*alim.alim_fiyat),2) as toplam_binance
FROM isletme,hesap,alim,coin
WHERE isletme.isletme_id=hesap.isletme_id AND hesap.hesap_no=alim.hesap_no AND alim.coin_id=coin.coin_id AND coin.coin_ad='Binance Coin' AND hesap.hesap_no='".$_SESSION['hesap_no']."'";
$sorgu=mysqli_query($baglanti,$sql);
while( $sonuc=mysqli_fetch_array($sorgu,MYSQLI_ASSOC) ){
    echo $sonuc["toplam_binance"]; 
}
?>]
					}]
				},
				options: {
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					tooltips: {
						intersect: false
					},
					hover: {
						intersect: true
					},
					plugins: {
						filler: {
							propagate: false
						}
					},
					scales: {
						xAxes: [{
							reverse: true,
							gridLines: {
								color: "rgba(0,0,0,0.05)"
							}
						}],
						yAxes: [{
							ticks: {
								stepSize: 500
							},
							display: true,
							borderDash: [5, 5],
							gridLines: {
								color: "rgba(0,0,0,0)",
								fontColor: "#fff"
							}
						}]
					}
				}
			});
		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			// Pie chart
			new Chart(document.getElementById("chartjs-pie"), {
				type: "pie",
				data: {
					labels: ["Bitcoin", "Ethereum", "XRP", "Stellar", "Bitcoin Cash","Litecoin","USD Tether","Chainlink","Cardano","Binance Coin"],
					datasets: [{
						data: [<?php
$baglanti=mysqli_connect("localhost","root","","2017469016",); 
$sql="SELECT Round(SUM(alim.alim_miktar),4) as miktar_bitcoin
FROM isletme,hesap,alim,coin
WHERE isletme.isletme_id=hesap.isletme_id AND hesap.hesap_no=alim.hesap_no AND coin.coin_id=alim.coin_id AND coin.coin_ad='Bitcoin' AND hesap.hesap_no='".$_SESSION['hesap_no']."'";
$sorgu=mysqli_query($baglanti,$sql);
while( $sonuc=mysqli_fetch_array($sorgu,MYSQLI_ASSOC) ){
    echo $sonuc["miktar_bitcoin"];
}
?>, <?php
$baglanti=mysqli_connect("localhost","root","","2017469016",); 
$sql="SELECT Round(SUM(alim.alim_miktar),4) as miktar_ethereum
FROM isletme,hesap,alim,coin
WHERE isletme.isletme_id=hesap.isletme_id AND hesap.hesap_no=alim.hesap_no AND coin.coin_id=alim.coin_id AND coin.coin_ad='Ethereum' AND hesap.hesap_no='".$_SESSION['hesap_no']."'";
$sorgu=mysqli_query($baglanti,$sql);
while( $sonuc=mysqli_fetch_array($sorgu,MYSQLI_ASSOC) ){
    echo $sonuc["miktar_ethereum"];
}
?>, <?php
$baglanti=mysqli_connect("localhost","root","","2017469016",); 
$sql="SELECT Round(SUM(alim.alim_miktar),4) as miktar_xrp
FROM isletme,hesap,alim,coin
WHERE isletme.isletme_id=hesap.isletme_id AND hesap.hesap_no=alim.hesap_no AND coin.coin_id=alim.coin_id AND coin.coin_ad='XRP' AND hesap.hesap_no='".$_SESSION['hesap_no']."'";
$sorgu=mysqli_query($baglanti,$sql);
while( $sonuc=mysqli_fetch_array($sorgu,MYSQLI_ASSOC) ){
    echo $sonuc["miktar_xrp"];
}
?>, <?php
$baglanti=mysqli_connect("localhost","root","","2017469016",); 
$sql="SELECT Round(SUM(alim.alim_miktar),4) as miktar_stellar
FROM isletme,hesap,alim,coin
WHERE isletme.isletme_id=hesap.isletme_id AND hesap.hesap_no=alim.hesap_no AND coin.coin_id=alim.coin_id AND coin.coin_ad='Stellar' AND hesap.hesap_no='".$_SESSION['hesap_no']."'";
$sorgu=mysqli_query($baglanti,$sql);
while( $sonuc=mysqli_fetch_array($sorgu,MYSQLI_ASSOC) ){
    echo $sonuc["miktar_stellar"];
}
?>,<?php
$baglanti=mysqli_connect("localhost","root","","2017469016",); 
$sql="SELECT Round(SUM(alim.alim_miktar),4) as miktar_bitcoincash
FROM isletme,hesap,alim,coin
WHERE isletme.isletme_id=hesap.isletme_id AND hesap.hesap_no=alim.hesap_no AND coin.coin_id=alim.coin_id AND coin.coin_ad='Bitcoin Cash' AND hesap.hesap_no='".$_SESSION['hesap_no']."'";
$sorgu=mysqli_query($baglanti,$sql);
while( $sonuc=mysqli_fetch_array($sorgu,MYSQLI_ASSOC) ){
    echo $sonuc["miktar_bitcoincash"];
}
?>,<?php
$baglanti=mysqli_connect("localhost","root","","2017469016",); 
$sql="SELECT Round(SUM(alim.alim_miktar),4) as miktar_litecoin
FROM isletme,hesap,alim,coin
WHERE isletme.isletme_id=hesap.isletme_id AND hesap.hesap_no=alim.hesap_no AND coin.coin_id=alim.coin_id AND coin.coin_ad='Litecoin' AND hesap.hesap_no='".$_SESSION['hesap_no']."'";
$sorgu=mysqli_query($baglanti,$sql);
while( $sonuc=mysqli_fetch_array($sorgu,MYSQLI_ASSOC) ){
    echo $sonuc["miktar_litecoin"];
}
?>,<?php
$baglanti=mysqli_connect("localhost","root","","2017469016",); 
$sql="SELECT Round(SUM(alim.alim_miktar),4) as miktar_tether
FROM isletme,hesap,alim,coin
WHERE isletme.isletme_id=hesap.isletme_id AND hesap.hesap_no=alim.hesap_no AND coin.coin_id=alim.coin_id AND coin.coin_ad='Tether' AND hesap.hesap_no='".$_SESSION['hesap_no']."'";
$sorgu=mysqli_query($baglanti,$sql);
while( $sonuc=mysqli_fetch_array($sorgu,MYSQLI_ASSOC) ){
    echo $sonuc["miktar_tether"];
}
?>,<?php
$baglanti=mysqli_connect("localhost","root","","2017469016",); 
$sql="SELECT Round(SUM(alim.alim_miktar),4) as miktar_chainlink
FROM isletme,hesap,alim,coin
WHERE isletme.isletme_id=hesap.isletme_id AND hesap.hesap_no=alim.hesap_no AND coin.coin_id=alim.coin_id AND coin.coin_ad='Chainlink' AND hesap.hesap_no='".$_SESSION['hesap_no']."'";
$sorgu=mysqli_query($baglanti,$sql);
while( $sonuc=mysqli_fetch_array($sorgu,MYSQLI_ASSOC) ){
    echo $sonuc["miktar_chainlink"];
}
?>,<?php
$baglanti=mysqli_connect("localhost","root","","2017469016",); 
$sql="SELECT Round(SUM(alim.alim_miktar),4) as miktar_cardano
FROM isletme,hesap,alim,coin
WHERE isletme.isletme_id=hesap.isletme_id AND hesap.hesap_no=alim.hesap_no AND coin.coin_id=alim.coin_id AND coin.coin_ad='Cardano' AND hesap.hesap_no='".$_SESSION['hesap_no']."'";
$sorgu=mysqli_query($baglanti,$sql);
while( $sonuc=mysqli_fetch_array($sorgu,MYSQLI_ASSOC) ){
    echo $sonuc["miktar_cardano"];
}
?>,<?php
$baglanti=mysqli_connect("localhost","root","","2017469016",); 
$sql="SELECT Round(SUM(alim.alim_miktar),4) as miktar_binance
FROM isletme,hesap,alim,coin
WHERE isletme.isletme_id=hesap.isletme_id AND hesap.hesap_no=alim.hesap_no AND coin.coin_id=alim.coin_id AND coin.coin_ad='Binance Coin' AND hesap.hesap_no='".$_SESSION['hesap_no']."'";
$sorgu=mysqli_query($baglanti,$sql);
while( $sonuc=mysqli_fetch_array($sorgu,MYSQLI_ASSOC) ){
    echo $sonuc["miktar_binance"];
}
?>],
						backgroundColor: [
							"#d4b624",
							"#2f16ab",
							"#2e2f30",
							"#dee2e6",
							"#d49c24",
							"#62b6bf",
							"#399415",
							"#170c6b",
							"#1d51b3",
							"#b3771d"
						],
						borderColor: "transparent"
					}]
				},
				options: {
					maintainAspectRatio: false,
					legend: {
						display: false
					}
				}
			});
		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			// Radar chart
			new Chart(document.getElementById("chartjs-radar"), {
				type: "radar",
				data: {
					labels: ["Bitcoin", "Ethereum", "XRP", "Stellar", "Bitcoin Cash","Litecoin","USD Tether","Chainlink","Cardano","Binance Coin"],
					datasets: [{
						label: "Alış Sayısı",
						backgroundColor: "rgba(0, 123, 255, 0.2)",
						borderColor: window.theme.primary,
						pointBackgroundColor: window.theme.primary,
						pointBorderColor: "#fff",
						pointHoverBackgroundColor: "#fff",
						pointHoverBorderColor: window.theme.primary,
						data: [<?php
$baglanti=mysqli_connect("localhost","root","","2017469016",); 
$sql="SELECT count(alim.alim_id) as toplam_alis_bitcoin
FROM isletme,hesap,alim,coin
WHERE isletme.isletme_id=hesap.isletme_id AND hesap.hesap_no=alim.hesap_no AND alim.coin_id=coin.coin_id AND hesap.hesap_no='".$_SESSION['hesap_no']."' AND coin.coin_ad='Bitcoin'";
$sorgu=mysqli_query($baglanti,$sql);
while( $sonuc=mysqli_fetch_array($sorgu,MYSQLI_ASSOC) ){
    echo $sonuc["toplam_alis_bitcoin"];
}
?>, <?php
$baglanti=mysqli_connect("localhost","root","","2017469016",); 
$sql="SELECT count(alim.alim_id) as toplam_alis_ethereum
FROM isletme,hesap,alim,coin
WHERE isletme.isletme_id=hesap.isletme_id AND hesap.hesap_no=alim.hesap_no AND alim.coin_id=coin.coin_id AND hesap.hesap_no='".$_SESSION['hesap_no']."' AND coin.coin_ad='Ethereum'";
$sorgu=mysqli_query($baglanti,$sql);
while( $sonuc=mysqli_fetch_array($sorgu,MYSQLI_ASSOC) ){
    echo $sonuc["toplam_alis_ethereum"];
}
?>, <?php
$baglanti=mysqli_connect("localhost","root","","2017469016",); 
$sql="SELECT count(alim.alim_id) as toplam_alis_xrp
FROM isletme,hesap,alim,coin
WHERE isletme.isletme_id=hesap.isletme_id AND hesap.hesap_no=alim.hesap_no AND alim.coin_id=coin.coin_id AND hesap.hesap_no='".$_SESSION['hesap_no']."' AND coin.coin_ad='XRP'";
$sorgu=mysqli_query($baglanti,$sql);
while( $sonuc=mysqli_fetch_array($sorgu,MYSQLI_ASSOC) ){
    echo $sonuc["toplam_alis_xrp"];
}
?>, <?php
$baglanti=mysqli_connect("localhost","root","","2017469016",); 
$sql="SELECT count(alim.alim_id) as toplam_alis_stellar
FROM isletme,hesap,alim,coin
WHERE isletme.isletme_id=hesap.isletme_id AND hesap.hesap_no=alim.hesap_no AND alim.coin_id=coin.coin_id AND hesap.hesap_no='".$_SESSION['hesap_no']."' AND coin.coin_ad='Stellar'";
$sorgu=mysqli_query($baglanti,$sql);
while( $sonuc=mysqli_fetch_array($sorgu,MYSQLI_ASSOC) ){
    echo $sonuc["toplam_alis_stellar"];
}
?>, <?php
$baglanti=mysqli_connect("localhost","root","","2017469016",); 
$sql="SELECT count(alim.alim_id) as toplam_alis_bitcoincash
FROM isletme,hesap,alim,coin
WHERE isletme.isletme_id=hesap.isletme_id AND hesap.hesap_no=alim.hesap_no AND alim.coin_id=coin.coin_id AND hesap.hesap_no='".$_SESSION['hesap_no']."' AND coin.coin_ad='Bitcoin Cash'";
$sorgu=mysqli_query($baglanti,$sql);
while( $sonuc=mysqli_fetch_array($sorgu,MYSQLI_ASSOC) ){
    echo $sonuc["toplam_alis_bitcoincash"];
}
?>,<?php
$baglanti=mysqli_connect("localhost","root","","2017469016",); 
$sql="SELECT count(alim.alim_id) as toplam_alis_litecoin
FROM isletme,hesap,alim,coin
WHERE isletme.isletme_id=hesap.isletme_id AND hesap.hesap_no=alim.hesap_no AND alim.coin_id=coin.coin_id AND hesap.hesap_no='".$_SESSION['hesap_no']."' AND coin.coin_ad='Litecoin'";
$sorgu=mysqli_query($baglanti,$sql);
while( $sonuc=mysqli_fetch_array($sorgu,MYSQLI_ASSOC) ){
    echo $sonuc["toplam_alis_litecoin"];
}
?>,<?php
$baglanti=mysqli_connect("localhost","root","","2017469016",); 
$sql="SELECT count(alim.alim_id) as toplam_alis_tether
FROM isletme,hesap,alim,coin
WHERE isletme.isletme_id=hesap.isletme_id AND hesap.hesap_no=alim.hesap_no AND alim.coin_id=coin.coin_id AND hesap.hesap_no='".$_SESSION['hesap_no']."' AND coin.coin_ad='Tether'";
$sorgu=mysqli_query($baglanti,$sql);
while( $sonuc=mysqli_fetch_array($sorgu,MYSQLI_ASSOC) ){
    echo $sonuc["toplam_alis_tether"];
}
?>,<?php
$baglanti=mysqli_connect("localhost","root","","2017469016",); 
$sql="SELECT count(alim.alim_id) as toplam_alis_chainlink
FROM isletme,hesap,alim,coin
WHERE isletme.isletme_id=hesap.isletme_id AND hesap.hesap_no=alim.hesap_no AND alim.coin_id=coin.coin_id AND hesap.hesap_no='".$_SESSION['hesap_no']."' AND coin.coin_ad='Chainlink'";
$sorgu=mysqli_query($baglanti,$sql);
while( $sonuc=mysqli_fetch_array($sorgu,MYSQLI_ASSOC) ){
    echo $sonuc["toplam_alis_chainlink"];
}
?>,<?php
$baglanti=mysqli_connect("localhost","root","","2017469016",); 
$sql="SELECT count(alim.alim_id) as toplam_alis_cardano
FROM isletme,hesap,alim,coin
WHERE isletme.isletme_id=hesap.isletme_id AND hesap.hesap_no=alim.hesap_no AND alim.coin_id=coin.coin_id AND hesap.hesap_no='".$_SESSION['hesap_no']."' AND coin.coin_ad='Cardano'";
$sorgu=mysqli_query($baglanti,$sql);
while( $sonuc=mysqli_fetch_array($sorgu,MYSQLI_ASSOC) ){
    echo $sonuc["toplam_alis_cardano"];
}
?>,<?php
$baglanti=mysqli_connect("localhost","root","","2017469016",); 
$sql="SELECT count(alim.alim_id) as toplam_alis_binance
FROM isletme,hesap,alim,coin
WHERE isletme.isletme_id=hesap.isletme_id AND hesap.hesap_no=alim.hesap_no AND alim.coin_id=coin.coin_id AND hesap.hesap_no='".$_SESSION['hesap_no']."' AND coin.coin_ad='Binance Coin'";
$sorgu=mysqli_query($baglanti,$sql);
while( $sonuc=mysqli_fetch_array($sorgu,MYSQLI_ASSOC) ){
    echo $sonuc["toplam_alis_binance"];
}
?>,<?php
$baglanti=mysqli_connect("localhost","root","","2017469016",); 
$sql="SELECT count(satim.satim_id) as toplam_satim_tether
FROM isletme,hesap,satim,coin
WHERE isletme.isletme_id=hesap.isletme_id AND hesap.hesap_no=satim.hesap_no AND satim.coin_id=coin.coin_id AND hesap.hesap_no='".$_SESSION['hesap_no']."' AND coin.coin_ad='Tether'";
$sorgu=mysqli_query($baglanti,$sql);
while( $sonuc=mysqli_fetch_array($sorgu,MYSQLI_ASSOC) ){
    echo $sonuc["toplam_satim_tether"];
}
?>,<?php
$baglanti=mysqli_connect("localhost","root","","2017469016",); 
$sql="SELECT count(satim.satim_id) as toplam_satim_chainlink
FROM isletme,hesap,satim,coin
WHERE isletme.isletme_id=hesap.isletme_id AND hesap.hesap_no=satim.hesap_no AND satim.coin_id=coin.coin_id AND hesap.hesap_no='".$_SESSION['hesap_no']."' AND coin.coin_ad='Chainlink'";
$sorgu=mysqli_query($baglanti,$sql);
while( $sonuc=mysqli_fetch_array($sorgu,MYSQLI_ASSOC) ){
    echo $sonuc["toplam_satim_chainlink"];
}
?>,<?php
$baglanti=mysqli_connect("localhost","root","","2017469016",); 
$sql="SELECT count(satim.satim_id) as toplam_satim_cardano
FROM isletme,hesap,satim,coin
WHERE isletme.isletme_id=hesap.isletme_id AND hesap.hesap_no=satim.hesap_no AND satim.coin_id=coin.coin_id AND hesap.hesap_no='".$_SESSION['hesap_no']."' AND coin.coin_ad='Cardano'";
$sorgu=mysqli_query($baglanti,$sql);
while( $sonuc=mysqli_fetch_array($sorgu,MYSQLI_ASSOC) ){
    echo $sonuc["toplam_satim_cardano"];
}
?>,<?php
$baglanti=mysqli_connect("localhost","root","","2017469016",); 
$sql="SELECT count(satim.satim_id) as toplam_satim_binance
FROM isletme,hesap,satim,coin
WHERE isletme.isletme_id=hesap.isletme_id AND hesap.hesap_no=satim.hesap_no AND satim.coin_id=coin.coin_id AND hesap.hesap_no='".$_SESSION['hesap_no']."' AND coin.coin_ad='Binance Coin'";
$sorgu=mysqli_query($baglanti,$sql);
while( $sonuc=mysqli_fetch_array($sorgu,MYSQLI_ASSOC) ){
    echo $sonuc["toplam_satim_binance"];
}
?>]
					}, {
						label: "Satış Sayısı",
						backgroundColor: "rgba(220, 53, 69, 0.2)",
						borderColor: window.theme.danger,
						pointBackgroundColor: window.theme.danger,
						pointBorderColor: "#fff",
						pointHoverBackgroundColor: "#fff",
						pointHoverBorderColor: window.theme.danger,
						data: [<?php
$baglanti=mysqli_connect("localhost","root","","2017469016",); 
$sql="SELECT count(satim.satim_id) as toplam_satim_bitcoin
FROM isletme,hesap,satim,coin
WHERE isletme.isletme_id=hesap.isletme_id AND hesap.hesap_no=satim.hesap_no AND satim.coin_id=coin.coin_id AND hesap.hesap_no='".$_SESSION['hesap_no']."' AND coin.coin_ad='Bitcoin'";
$sorgu=mysqli_query($baglanti,$sql);
while( $sonuc=mysqli_fetch_array($sorgu,MYSQLI_ASSOC) ){
    echo $sonuc["toplam_satim_bitcoin"];
}
?>, <?php
$baglanti=mysqli_connect("localhost","root","","2017469016",); 
$sql="SELECT count(satim.satim_id) as toplam_satim_ethereum
FROM isletme,hesap,satim,coin
WHERE isletme.isletme_id=hesap.isletme_id AND hesap.hesap_no=satim.hesap_no AND satim.coin_id=coin.coin_id AND hesap.hesap_no='".$_SESSION['hesap_no']."' AND coin.coin_ad='Ethereum'";
$sorgu=mysqli_query($baglanti,$sql);
while( $sonuc=mysqli_fetch_array($sorgu,MYSQLI_ASSOC) ){
    echo $sonuc["toplam_satim_ethereum"];
}
?>, <?php
$baglanti=mysqli_connect("localhost","root","","2017469016",); 
$sql="SELECT count(satim.satim_id) as toplam_satim_xrp
FROM isletme,hesap,satim,coin
WHERE isletme.isletme_id=hesap.isletme_id AND hesap.hesap_no=satim.hesap_no AND satim.coin_id=coin.coin_id AND hesap.hesap_no='".$_SESSION['hesap_no']."' AND coin.coin_ad='XRP'";
$sorgu=mysqli_query($baglanti,$sql);
while( $sonuc=mysqli_fetch_array($sorgu,MYSQLI_ASSOC) ){
    echo $sonuc["toplam_satim_xrp"];
}
?>, <?php
$baglanti=mysqli_connect("localhost","root","","2017469016",); 
$sql="SELECT count(satim.satim_id) as toplam_satim_stellar
FROM isletme,hesap,satim,coin
WHERE isletme.isletme_id=hesap.isletme_id AND hesap.hesap_no=satim.hesap_no AND satim.coin_id=coin.coin_id AND hesap.hesap_no='".$_SESSION['hesap_no']."' AND coin.coin_ad='Stellar'";
$sorgu=mysqli_query($baglanti,$sql);
while( $sonuc=mysqli_fetch_array($sorgu,MYSQLI_ASSOC) ){
    echo $sonuc["toplam_satim_stellar"];
}
?>, <?php
$baglanti=mysqli_connect("localhost","root","","2017469016",); 
$sql="SELECT count(satim.satim_id) as toplam_satim_bitcoincash
FROM isletme,hesap,satim,coin
WHERE isletme.isletme_id=hesap.isletme_id AND hesap.hesap_no=satim.hesap_no AND satim.coin_id=coin.coin_id AND hesap.hesap_no='".$_SESSION['hesap_no']."' AND coin.coin_ad='Bitcoin Cash'";
$sorgu=mysqli_query($baglanti,$sql);
while( $sonuc=mysqli_fetch_array($sorgu,MYSQLI_ASSOC) ){
    echo $sonuc["toplam_satim_bitcoincash"];
}
?>,<?php
$baglanti=mysqli_connect("localhost","root","","2017469016",); 
$sql="SELECT count(satim.satim_id) as toplam_satim_litecoin
FROM isletme,hesap,satim,coin
WHERE isletme.isletme_id=hesap.isletme_id AND hesap.hesap_no=satim.hesap_no AND satim.coin_id=coin.coin_id AND hesap.hesap_no='".$_SESSION['hesap_no']."' AND coin.coin_ad='Litecoin'";
$sorgu=mysqli_query($baglanti,$sql);
while( $sonuc=mysqli_fetch_array($sorgu,MYSQLI_ASSOC) ){
    echo $sonuc["toplam_satim_litecoin"];
}
?>]
					}]
				},
				options: {
					maintainAspectRatio: false
				}
			});
		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			// Polar Area chart
			new Chart(document.getElementById("chartjs-polar-area"), {
				type: "polarArea",
				data: {
					labels: ["Bitcoin", "Ethereum", "XRP", "Stellar", "Bitcoin Cash","Litecoin","USD Tether","Chainlink","Cardano","Binance Coin"],
					datasets: [{
						label: "Model S",
						data: [<?php
$baglanti=mysqli_connect("localhost","root","","2017469016",); 
$sql="SELECT (satim.satim_miktar*satim.satim_fiyat) as son_bitcoin
FROM isletme,hesap,satim,coin
WHERE isletme.isletme_id=hesap.isletme_id AND hesap.hesap_no=satim.hesap_no AND satim.coin_id=coin.coin_id AND coin.coin_ad='Bitcoin' AND hesap.hesap_no='".$_SESSION['hesap_no']."'
ORDER BY satim.satim_id DESC
LIMIT 0,1";
$sorgu=mysqli_query($baglanti,$sql);
while( $sonuc=mysqli_fetch_array($sorgu,MYSQLI_ASSOC) ){
    echo $sonuc["son_bitcoin"];
}
?>, <?php
$baglanti=mysqli_connect("localhost","root","","2017469016",); 
$sql="SELECT (satim.satim_miktar*satim.satim_fiyat) as son_ethereum
FROM isletme,hesap,satim,coin
WHERE isletme.isletme_id=hesap.isletme_id AND hesap.hesap_no=satim.hesap_no AND satim.coin_id=coin.coin_id AND coin.coin_ad='Ethereum' AND hesap.hesap_no='".$_SESSION['hesap_no']."'
ORDER BY satim.satim_id DESC
LIMIT 0,1";
$sorgu=mysqli_query($baglanti,$sql);
while( $sonuc=mysqli_fetch_array($sorgu,MYSQLI_ASSOC) ){
    echo $sonuc["son_ethereum"];
}
?>, <?php
$baglanti=mysqli_connect("localhost","root","","2017469016",); 
$sql="SELECT (satim.satim_miktar*satim.satim_fiyat) as son_xrp
FROM isletme,hesap,satim,coin
WHERE isletme.isletme_id=hesap.isletme_id AND hesap.hesap_no=satim.hesap_no AND satim.coin_id=coin.coin_id AND coin.coin_ad='XRP' AND hesap.hesap_no='".$_SESSION['hesap_no']."'
ORDER BY satim.satim_id DESC
LIMIT 0,1";
$sorgu=mysqli_query($baglanti,$sql);
while( $sonuc=mysqli_fetch_array($sorgu,MYSQLI_ASSOC) ){
    echo $sonuc["son_xrp"];
}
?>, <?php
$baglanti=mysqli_connect("localhost","root","","2017469016",); 
$sql="SELECT (satim.satim_miktar*satim.satim_fiyat) as son_stellar
FROM isletme,hesap,satim,coin
WHERE isletme.isletme_id=hesap.isletme_id AND hesap.hesap_no=satim.hesap_no AND satim.coin_id=coin.coin_id AND coin.coin_ad='Stellar' AND hesap.hesap_no='".$_SESSION['hesap_no']."'
ORDER BY satim.satim_id DESC
LIMIT 0,1";
$sorgu=mysqli_query($baglanti,$sql);
while( $sonuc=mysqli_fetch_array($sorgu,MYSQLI_ASSOC) ){
    echo $sonuc["son_stellar"];
}
?>, <?php
$baglanti=mysqli_connect("localhost","root","","2017469016",); 
$sql="SELECT (satim.satim_miktar*satim.satim_fiyat) as son_bitcoincash
FROM isletme,hesap,satim,coin
WHERE isletme.isletme_id=hesap.isletme_id AND hesap.hesap_no=satim.hesap_no AND satim.coin_id=coin.coin_id AND coin.coin_ad='Bitcoin Cash' AND hesap.hesap_no='".$_SESSION['hesap_no']."'
ORDER BY satim.satim_id DESC
LIMIT 0,1";
$sorgu=mysqli_query($baglanti,$sql);
while( $sonuc=mysqli_fetch_array($sorgu,MYSQLI_ASSOC) ){
    echo $sonuc["son_bitcoincash"];
}
?>, <?php
$baglanti=mysqli_connect("localhost","root","","2017469016",); 
$sql="SELECT (satim.satim_miktar*satim.satim_fiyat) as son_litecoin
FROM isletme,hesap,satim,coin
WHERE isletme.isletme_id=hesap.isletme_id AND hesap.hesap_no=satim.hesap_no AND satim.coin_id=coin.coin_id AND coin.coin_ad='Litecoin' AND hesap.hesap_no='".$_SESSION['hesap_no']."'
ORDER BY satim.satim_id DESC
LIMIT 0,1";
$sorgu=mysqli_query($baglanti,$sql);
while( $sonuc=mysqli_fetch_array($sorgu,MYSQLI_ASSOC) ){
    echo $sonuc["son_litecoin"];
}
?>, <?php
$baglanti=mysqli_connect("localhost","root","","2017469016",); 
$sql="SELECT (satim.satim_miktar*satim.satim_fiyat) as son_tether
FROM isletme,hesap,satim,coin
WHERE isletme.isletme_id=hesap.isletme_id AND hesap.hesap_no=satim.hesap_no AND satim.coin_id=coin.coin_id AND coin.coin_ad='Tether' AND hesap.hesap_no='".$_SESSION['hesap_no']."'
ORDER BY satim.satim_id DESC
LIMIT 0,1";
$sorgu=mysqli_query($baglanti,$sql);
while( $sonuc=mysqli_fetch_array($sorgu,MYSQLI_ASSOC) ){
    echo $sonuc["son_tether"];
}
?>, <?php
$baglanti=mysqli_connect("localhost","root","","2017469016",); 
$sql="SELECT (satim.satim_miktar*satim.satim_fiyat) as son_chainlink
FROM isletme,hesap,satim,coin
WHERE isletme.isletme_id=hesap.isletme_id AND hesap.hesap_no=satim.hesap_no AND satim.coin_id=coin.coin_id AND coin.coin_ad='Chainlink' AND hesap.hesap_no='".$_SESSION['hesap_no']."'
ORDER BY satim.satim_id DESC
LIMIT 0,1";
$sorgu=mysqli_query($baglanti,$sql);
while( $sonuc=mysqli_fetch_array($sorgu,MYSQLI_ASSOC) ){
    echo $sonuc["son_chainlink"];
}
?>, <?php
$baglanti=mysqli_connect("localhost","root","","2017469016",); 
$sql="SELECT (satim.satim_miktar*satim.satim_fiyat) as son_cardano
FROM isletme,hesap,satim,coin
WHERE isletme.isletme_id=hesap.isletme_id AND hesap.hesap_no=satim.hesap_no AND satim.coin_id=coin.coin_id AND coin.coin_ad='Cardano' AND hesap.hesap_no='".$_SESSION['hesap_no']."'
ORDER BY satim.satim_id DESC
LIMIT 0,1";
$sorgu=mysqli_query($baglanti,$sql);
while( $sonuc=mysqli_fetch_array($sorgu,MYSQLI_ASSOC) ){
    echo $sonuc["son_cardano"];
}
?>, <?php
$baglanti=mysqli_connect("localhost","root","","2017469016",); 
$sql="SELECT (satim.satim_miktar*satim.satim_fiyat) as son_binance
FROM isletme,hesap,satim,coin
WHERE isletme.isletme_id=hesap.isletme_id AND hesap.hesap_no=satim.hesap_no AND satim.coin_id=coin.coin_id AND coin.coin_ad='Binance Coin' AND hesap.hesap_no='".$_SESSION['hesap_no']."'
ORDER BY satim.satim_id DESC
LIMIT 0,1";
$sorgu=mysqli_query($baglanti,$sql);
while( $sonuc=mysqli_fetch_array($sorgu,MYSQLI_ASSOC) ){
    echo $sonuc["son_binance"];
}
?>],
						backgroundColor: [
							"#d4b624",
							"#2f16ab",
							"#2e2f30",
							"#dee2e6",
							"#d49c24",
							"#62b6bf",
							"#399415",
							"#170c6b",
							"#1d51b3",
							"#b3771d"
						]
					}]
				},
				options: {
					maintainAspectRatio: false
				}
			});
		});
	</script>
</body>
</html>