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
	<form action="veritabani.php" method="SESSION">
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

					<li class="sidebar-item active">
						<a class="sidebar-link" href="main.php">
              <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Ana Sayfa</span>
            </a>
					</li>

					<li class="sidebar-item">
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
				<div class="container-fluid p-0">

					<div class="row mb-2 mb-xl-3">
						<div class="col-auto d-none d-sm-block">
							<h3><strong><b><?php $isim=strtoupper($_SESSION['isletme_adi']); echo $isim ?></b></strong>&nbsp;Şirketler için Kripto Para Yatırım Yönetim Sistemi</h3>
						</div>
					</div>
					<div class="row">
						<div class="col-xl-6 col-xxl-5 d-flex">
							<div class="w-100">
								<div class="row">
									<div class="col-sm-6">
										<div class="card">
											<div class="card-body">
												<h5 class="card-title mb-4">Hesap Bakiyeniz</h5>
												<h1 class="mt-1 mb-3"><?php echo $_SESSION['hesap_bakiye'] ?><label>₺</label></h1>
												<div class="mb-1">
													<span class="text-muted">Hesap Numarası:</span>
													<span class="text-muted"><b><?php echo $_SESSION['hesap_no'] ?></b></i></span>
												</div>
											</div>
										</div>
										<div class="card">
											<div class="card-body">
												<h5 class="card-title mb-4">Bitcoin Güncel Değer ($)</h5>
												<h1 class="mt-1 mb-3">
												<h1 class="mt-1 mb-3"><script>var currentPrice = new XMLHttpRequest();

												currentPrice.open('GET', 'https://api.gdax.com/products/BTC-USD/book', true);
												currentPrice.onreadystatechange = function(){
												if(currentPrice.readyState == 4){
												var ticker = JSON.parse(currentPrice.responseText);
												var price = ticker.bids[0][0];
												document.getElementById('btc').innerHTML = "$" + price;
												};
												};
												currentPrice.send();
												</script></iframe>
												<div id="wrapper">
												<div id="btc"></div>
												</div></h1>
												</h1>
												<div class="mb-1">
													<span class="text-muted"><img src="canli.gif" width="15" height="15" alt="canli">&nbsp;CANLI</span>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="card">
											<div class="card-body">
												<h5 class="card-title mb-4">Toplam Yapılan Yatırım Tutarı</h5>
												<h1 class="mt-1 mb-3"><?php
$baglanti=mysqli_connect("localhost","root","","2017469016",);
$sql="SELECT round(SUM(alim.alim_miktar*alim.alim_fiyat),2) as odenen_toplam
FROM isletme,hesap,alim,coin
WHERE isletme.isletme_id=hesap.isletme_id AND hesap.hesap_no=alim.hesap_no AND coin.coin_id=alim.coin_id AND hesap.hesap_no='".$_SESSION['hesap_no']."'";
$sorgu=mysqli_query($baglanti,$sql);
while( $sonuc=mysqli_fetch_array($sorgu,MYSQLI_ASSOC) ){
    echo $sonuc["odenen_toplam"]; 
}
?><label>₺</label></h1>
												<div class="mb-1">
												<span class="text-muted">Bugüne kadar yatırım için</span>
													<span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i>harcanan para</span>
												</div>
											</div>
										</div>
										<div class="card">
											<div class="card-body">
												<h5 class="card-title mb-4">Toplam Bozdurulan Yatırım Tutarı</h5>
												<h1 class="mt-1 mb-3"><?php
$baglanti=mysqli_connect("localhost","root","","2017469016",);
$sql="SELECT round(SUM(satim.satim_miktar*satim.satim_fiyat),2) as alinan_toplam
FROM isletme,hesap,satim,coin
WHERE isletme.isletme_id=hesap.isletme_id AND hesap.hesap_no=satim.hesap_no AND coin.coin_id=satim.coin_id AND hesap.hesap_no='".$_SESSION['hesap_no']."'";
$sorgu=mysqli_query($baglanti,$sql);
while( $sonuc=mysqli_fetch_array($sorgu,MYSQLI_ASSOC) ){
    echo $sonuc["alinan_toplam"]; 
}
?><label>₺</label></h1>
												<div class="mb-1">
													<span class="text-muted">Bugüne kadar satışlarından</span>
													<span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i>alınan para</span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-xl-6 col-xxl-7">
							<div class="card flex-fill w-100">
								<div class="card-header">

									<h5 class="card-title mb-0">Toplam Alım ve Satımlar</h5>
								</div>
								<div class="card-body py-3">
									<div class="chart chart-sm">
										<canvas id="chartjs-bar"></canvas>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
					<div class="col-12 col-lg-6 col-xxl-3 d-flex">
							<div class="card flex-fill w-100">
								<div class="card-header">
									<h5 class="card-title">Varlık Dağılımı (TL Bazında)</h5>
									<h6 class="card-subtitle text-muted">Sahip olunan varlıklar ₺ karşılığına çevrilmiştir.</h6>
								</div>
								<div class="card-body">
									<div class="chart chart-sm">
										<canvas id="chartjs-doughnut"></canvas>
									</div>
									<br>
									<br>
									<center>Renklerin üzerine gelerek bakiyelerinizi görüntüleyebilirsiniz</center>
								</div>
							</div>
						</div>
						<div class="col-12 col-md-12 col-xxl-6 d-flex order-3 order-xxl-2">
							<div class="card flex-fill w-100">
							<div class="card-header">
									<h5 class="card-title">Son Haberler</h5>
								</div>
								<div class="card-body px-4">
								<script src="https://www.cryptohopper.com/widgets/js/script"></script>
								<div class="cryptohopper-web-widget" data-id="5" data-news_count="3" data-news_length="15"></div></font>
								</div>
							</div>
						</div>
						<div class="col-12 col-md-6 col-xxl-3 d-flex order-1 order-xxl-1">
							<div class="card flex-fill">
								<div class="card-header">
<div style="height:433px; background-color: #FFFFFF; overflow:hidden; border-radius: 4px; text-align: right; line-height:14px; font-size: 12px; font-feature-settings: normal; text-size-adjust: 100%; box-shadow: inset 0 -20px 0 0 #FFFFFF; padding: 0px; margin: 0px; width: 100%;"><div style="height:413px; padding:0px; margin:0px; width: 100%;"><iframe src="https://widget.coinlib.io/widget?type=full_v2&theme=light&cnt=6&pref_coin_id=3403&graph=yes" width="100%" height="409px" scrolling="auto" marginwidth="0" marginheight="0" frameborder="0" border="0" style="border:0;margin:0;padding:0;"></iframe></div><div style="color: #FFFFFF; line-height: 14px; font-weight: 400; font-size: 11px; box-sizing: border-box; padding: 2px 6px; width: 100%; font-family: Verdana, Tahoma, Arial, sans-serif;"> <target="_blank" style="font-weight: 500; color: #000000; text-decoration:none; font-size:11px">Veriler anlık olarak güncellenmektedir.</div></div>
								</div>
								
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-12 col-lg-8 col-xxl-9 d-flex">
							<div class="card flex-fill">
								<div class="card-header">

									<h5 class="card-title mb-0">Son İşlemler</h5>
								</div>
								<table class="table table-hover my-0">
									<thead>
										<tr>
											<th>Alınan Kripto Para</th>
											<th class="d-none d-xl-table-cell">Miktar</th>
											<th class="d-none d-xl-table-cell">Fiyat (₺)</th>
											<th>İşlem</th>
											<th class="d-none d-md-table-cell">İşlem Numarası</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td><?php
$baglanti=mysqli_connect("localhost","root","","2017469016",); 
$sql="SELECT coin.coin_ad as coin_adi
FROM isletme,hesap,alim,coin
WHERE isletme.isletme_id=hesap.isletme_id AND hesap.hesap_no=alim.hesap_no AND alim.coin_id=coin.coin_id AND hesap.hesap_no='".$_SESSION['hesap_no']."'
ORDER BY alim.alim_id DESC
LIMIT 0,1";
$sorgu=mysqli_query($baglanti,$sql);
while( $sonuc=mysqli_fetch_array($sorgu,MYSQLI_ASSOC) ){
    echo $sonuc["coin_adi"];
}
?></td>
											<td class="d-none d-xl-table-cell"><?php
$baglanti=mysqli_connect("localhost","root","","2017469016",); 
$sql="SELECT alim.alim_miktar as alim_miktar
FROM isletme,hesap,alim,coin
WHERE isletme.isletme_id=hesap.isletme_id AND hesap.hesap_no=alim.hesap_no AND alim.coin_id=coin.coin_id AND hesap.hesap_no='".$_SESSION['hesap_no']."'
ORDER BY alim.alim_id DESC
LIMIT 0,1";
$sorgu=mysqli_query($baglanti,$sql);
while( $sonuc=mysqli_fetch_array($sorgu,MYSQLI_ASSOC) ){
    echo $sonuc["alim_miktar"];
}
?></td>
											<td class="d-none d-xl-table-cell"><?php
$baglanti=mysqli_connect("localhost","root","","2017469016",); 
$sql="SELECT alim.alim_fiyat as alim_fiyati
FROM isletme,hesap,alim,coin
WHERE isletme.isletme_id=hesap.isletme_id AND hesap.hesap_no=alim.hesap_no AND alim.coin_id=coin.coin_id AND hesap.hesap_no='".$_SESSION['hesap_no']."'
ORDER BY alim.alim_id DESC
LIMIT 0,1";
$sorgu=mysqli_query($baglanti,$sql);
while( $sonuc=mysqli_fetch_array($sorgu,MYSQLI_ASSOC) ){
    echo $sonuc["alim_fiyati"];
}
?></td>
											<td><span class="badge bg-success">Alış</span></td>
											<td class="d-none d-md-table-cell"><?php
$baglanti=mysqli_connect("localhost","root","","2017469016",); 
$sql="SELECT alim.alim_id as alim_numarasi
FROM isletme,hesap,alim,coin
WHERE isletme.isletme_id=hesap.isletme_id AND hesap.hesap_no=alim.hesap_no AND alim.coin_id=coin.coin_id AND hesap.hesap_no='".$_SESSION['hesap_no']."'
ORDER BY alim.alim_id DESC
LIMIT 0,1";
$sorgu=mysqli_query($baglanti,$sql);
while( $sonuc=mysqli_fetch_array($sorgu,MYSQLI_ASSOC) ){
    echo $sonuc["alim_numarasi"];
}
?></td>
										</tr>
										<tr>
											<td><?php
$baglanti=mysqli_connect("localhost","root","","2017469016",); 
$sql="SELECT coin.coin_ad as coin_adi
FROM isletme,hesap,alim,coin
WHERE isletme.isletme_id=hesap.isletme_id AND hesap.hesap_no=alim.hesap_no AND alim.coin_id=coin.coin_id AND hesap.hesap_no='".$_SESSION['hesap_no']."'
ORDER BY alim.alim_id DESC
LIMIT 1,1";
$sorgu=mysqli_query($baglanti,$sql);
while( $sonuc=mysqli_fetch_array($sorgu,MYSQLI_ASSOC) ){
    echo $sonuc["coin_adi"];
}
?></td>
											<td class="d-none d-xl-table-cell"><?php
$baglanti=mysqli_connect("localhost","root","","2017469016",); 
$sql="SELECT alim.alim_miktar as alim_miktar
FROM isletme,hesap,alim,coin
WHERE isletme.isletme_id=hesap.isletme_id AND hesap.hesap_no=alim.hesap_no AND alim.coin_id=coin.coin_id AND hesap.hesap_no='".$_SESSION['hesap_no']."'
ORDER BY alim.alim_id DESC
LIMIT 1,1";
$sorgu=mysqli_query($baglanti,$sql);
while( $sonuc=mysqli_fetch_array($sorgu,MYSQLI_ASSOC) ){
    echo $sonuc["alim_miktar"];
}
?></td>
											<td class="d-none d-xl-table-cell"><?php
$baglanti=mysqli_connect("localhost","root","","2017469016",); 
$sql="SELECT alim.alim_fiyat as alim_fiyati
FROM isletme,hesap,alim,coin
WHERE isletme.isletme_id=hesap.isletme_id AND hesap.hesap_no=alim.hesap_no AND alim.coin_id=coin.coin_id AND hesap.hesap_no='".$_SESSION['hesap_no']."'
ORDER BY alim.alim_id DESC
LIMIT 1,1";
$sorgu=mysqli_query($baglanti,$sql);
while( $sonuc=mysqli_fetch_array($sorgu,MYSQLI_ASSOC) ){
    echo $sonuc["alim_fiyati"];
}
?></td>
											<td><span class="badge bg-success">Alış</span></td>
											<td class="d-none d-md-table-cell"><?php
$baglanti=mysqli_connect("localhost","root","","2017469016",); 
$sql="SELECT alim.alim_id as alim_numarasi
FROM isletme,hesap,alim,coin
WHERE isletme.isletme_id=hesap.isletme_id AND hesap.hesap_no=alim.hesap_no AND alim.coin_id=coin.coin_id AND hesap.hesap_no='".$_SESSION['hesap_no']."'
ORDER BY alim.alim_id DESC
LIMIT 1,1";
$sorgu=mysqli_query($baglanti,$sql);
while( $sonuc=mysqli_fetch_array($sorgu,MYSQLI_ASSOC) ){
    echo $sonuc["alim_numarasi"];
}
?></td>
										</tr>
										<tr>
											<td><?php
$baglanti=mysqli_connect("localhost","root","","2017469016",); 
$sql="SELECT coin.coin_ad as coin_adi
FROM isletme,hesap,alim,coin
WHERE isletme.isletme_id=hesap.isletme_id AND hesap.hesap_no=alim.hesap_no AND alim.coin_id=coin.coin_id AND hesap.hesap_no='".$_SESSION['hesap_no']."'
ORDER BY alim.alim_id DESC
LIMIT 2,1";
$sorgu=mysqli_query($baglanti,$sql);
while( $sonuc=mysqli_fetch_array($sorgu,MYSQLI_ASSOC) ){
    echo $sonuc["coin_adi"];
}
?></td>
											<td class="d-none d-xl-table-cell"><?php
$baglanti=mysqli_connect("localhost","root","","2017469016",); 
$sql="SELECT alim.alim_miktar as alim_miktar
FROM isletme,hesap,alim,coin
WHERE isletme.isletme_id=hesap.isletme_id AND hesap.hesap_no=alim.hesap_no AND alim.coin_id=coin.coin_id AND hesap.hesap_no='".$_SESSION['hesap_no']."'
ORDER BY alim.alim_id DESC
LIMIT 2,1";
$sorgu=mysqli_query($baglanti,$sql);
while( $sonuc=mysqli_fetch_array($sorgu,MYSQLI_ASSOC) ){
    echo $sonuc["alim_miktar"];
}
?></td>
											<td class="d-none d-xl-table-cell"><?php
$baglanti=mysqli_connect("localhost","root","","2017469016",); 
$sql="SELECT alim.alim_fiyat as alim_fiyati
FROM isletme,hesap,alim,coin
WHERE isletme.isletme_id=hesap.isletme_id AND hesap.hesap_no=alim.hesap_no AND alim.coin_id=coin.coin_id AND hesap.hesap_no='".$_SESSION['hesap_no']."'
ORDER BY alim.alim_id DESC
LIMIT 2,1";
$sorgu=mysqli_query($baglanti,$sql);
while( $sonuc=mysqli_fetch_array($sorgu,MYSQLI_ASSOC) ){
    echo $sonuc["alim_fiyati"];
}
?></td>
											<td><span class="badge bg-success">Alış</span></td>
											<td class="d-none d-md-table-cell"><?php
$baglanti=mysqli_connect("localhost","root","","2017469016",); 
$sql="SELECT alim.alim_id as alim_numarasi
FROM isletme,hesap,alim,coin
WHERE isletme.isletme_id=hesap.isletme_id AND hesap.hesap_no=alim.hesap_no AND alim.coin_id=coin.coin_id AND hesap.hesap_no='".$_SESSION['hesap_no']."'
ORDER BY alim.alim_id DESC
LIMIT 2,1";
$sorgu=mysqli_query($baglanti,$sql);
while( $sonuc=mysqli_fetch_array($sorgu,MYSQLI_ASSOC) ){
    echo $sonuc["alim_numarasi"];
}
?></td>
										</tr>
										<tr>
											<td><?php
$baglanti=mysqli_connect("localhost","root","","2017469016",); 
$sql="SELECT coin.coin_ad as coin_adi
FROM isletme,hesap,alim,coin
WHERE isletme.isletme_id=hesap.isletme_id AND hesap.hesap_no=alim.hesap_no AND alim.coin_id=coin.coin_id AND hesap.hesap_no='".$_SESSION['hesap_no']."'
ORDER BY alim.alim_id DESC
LIMIT 3,1";
$sorgu=mysqli_query($baglanti,$sql);
while( $sonuc=mysqli_fetch_array($sorgu,MYSQLI_ASSOC) ){
    echo $sonuc["coin_adi"];
}
?></td>
											<td class="d-none d-xl-table-cell"><?php
$baglanti=mysqli_connect("localhost","root","","2017469016",); 
$sql="SELECT alim.alim_miktar as alim_miktar
FROM isletme,hesap,alim,coin
WHERE isletme.isletme_id=hesap.isletme_id AND hesap.hesap_no=alim.hesap_no AND alim.coin_id=coin.coin_id AND hesap.hesap_no='".$_SESSION['hesap_no']."'
ORDER BY alim.alim_id DESC
LIMIT 3,1";
$sorgu=mysqli_query($baglanti,$sql);
while( $sonuc=mysqli_fetch_array($sorgu,MYSQLI_ASSOC) ){
    echo $sonuc["alim_miktar"];
}
?></td>
											<td class="d-none d-xl-table-cell"><?php
$baglanti=mysqli_connect("localhost","root","","2017469016",); 
$sql="SELECT alim.alim_fiyat as alim_fiyati
FROM isletme,hesap,alim,coin
WHERE isletme.isletme_id=hesap.isletme_id AND hesap.hesap_no=alim.hesap_no AND alim.coin_id=coin.coin_id AND hesap.hesap_no='".$_SESSION['hesap_no']."'
ORDER BY alim.alim_id DESC
LIMIT 3,1";
$sorgu=mysqli_query($baglanti,$sql);
while( $sonuc=mysqli_fetch_array($sorgu,MYSQLI_ASSOC) ){
    echo $sonuc["alim_fiyati"];
}
?></td>
											<td><span class="badge bg-success">Alış</span></td>
											<td class="d-none d-md-table-cell"><?php
$baglanti=mysqli_connect("localhost","root","","2017469016",); 
$sql="SELECT alim.alim_id as alim_numarasi
FROM isletme,hesap,alim,coin
WHERE isletme.isletme_id=hesap.isletme_id AND hesap.hesap_no=alim.hesap_no AND alim.coin_id=coin.coin_id AND hesap.hesap_no='".$_SESSION['hesap_no']."'
ORDER BY alim.alim_id DESC
LIMIT 3,1";
$sorgu=mysqli_query($baglanti,$sql);
while( $sonuc=mysqli_fetch_array($sorgu,MYSQLI_ASSOC) ){
    echo $sonuc["alim_numarasi"];
}
?></td>
										</tr>
										<tr>
											<td><?php
$baglanti=mysqli_connect("localhost","root","","2017469016",); 
$sql="SELECT coin.coin_ad as coin_adi
FROM isletme,hesap,satim,coin
WHERE isletme.isletme_id=hesap.isletme_id AND hesap.hesap_no=satim.hesap_no AND satim.coin_id=coin.coin_id AND hesap.hesap_no='".$_SESSION['hesap_no']."'
ORDER BY satim.satim_id DESC
LIMIT 0,1";
$sorgu=mysqli_query($baglanti,$sql);
while( $sonuc=mysqli_fetch_array($sorgu,MYSQLI_ASSOC) ){
    echo $sonuc["coin_adi"];
}
?></td>
											<td class="d-none d-xl-table-cell"><?php
$baglanti=mysqli_connect("localhost","root","","2017469016",); 
$sql="SELECT satim.satim_miktar as satim_miktar
FROM isletme,hesap,satim,coin
WHERE isletme.isletme_id=hesap.isletme_id AND hesap.hesap_no=satim.hesap_no AND satim.coin_id=coin.coin_id AND hesap.hesap_no='".$_SESSION['hesap_no']."'
ORDER BY satim.satim_id DESC
LIMIT 0,1";
$sorgu=mysqli_query($baglanti,$sql);
while( $sonuc=mysqli_fetch_array($sorgu,MYSQLI_ASSOC) ){
    echo $sonuc["satim_miktar"];
}
?></td>
											<td class="d-none d-xl-table-cell"><?php
$baglanti=mysqli_connect("localhost","root","","2017469016",); 
$sql="SELECT satim.satim_fiyat as satim_fiyat
FROM isletme,hesap,satim,coin
WHERE isletme.isletme_id=hesap.isletme_id AND hesap.hesap_no=satim.hesap_no AND satim.coin_id=coin.coin_id AND hesap.hesap_no='".$_SESSION['hesap_no']."'
ORDER BY satim.satim_id DESC
LIMIT 0,1";
$sorgu=mysqli_query($baglanti,$sql);
while( $sonuc=mysqli_fetch_array($sorgu,MYSQLI_ASSOC) ){
    echo $sonuc["satim_fiyat"];
}
?></td>
											<td><span class="badge bg-danger">Satış</span></td>
											<td class="d-none d-md-table-cell"><?php
$baglanti=mysqli_connect("localhost","root","","2017469016",); 
$sql="SELECT satim.satim_id as satim_numarasi
FROM isletme,hesap,satim,coin
WHERE isletme.isletme_id=hesap.isletme_id AND hesap.hesap_no=satim.hesap_no AND satim.coin_id=coin.coin_id AND hesap.hesap_no='".$_SESSION['hesap_no']."'
ORDER BY satim.satim_id DESC
LIMIT 0,1";
$sorgu=mysqli_query($baglanti,$sql);
while( $sonuc=mysqli_fetch_array($sorgu,MYSQLI_ASSOC) ){
    echo $sonuc["satim_numarasi"];
}
?></td>
										</tr>
										<tr>
											<td><?php
$baglanti=mysqli_connect("localhost","root","","2017469016",); 
$sql="SELECT coin.coin_ad as coin_adi
FROM isletme,hesap,satim,coin
WHERE isletme.isletme_id=hesap.isletme_id AND hesap.hesap_no=satim.hesap_no AND satim.coin_id=coin.coin_id AND hesap.hesap_no='".$_SESSION['hesap_no']."'
ORDER BY satim.satim_id DESC
LIMIT 1,1";
$sorgu=mysqli_query($baglanti,$sql);
while( $sonuc=mysqli_fetch_array($sorgu,MYSQLI_ASSOC) ){
    echo $sonuc["coin_adi"];
}
?></td>
											<td class="d-none d-xl-table-cell"><?php
$baglanti=mysqli_connect("localhost","root","","2017469016",); 
$sql="SELECT satim.satim_miktar as satim_miktar
FROM isletme,hesap,satim,coin
WHERE isletme.isletme_id=hesap.isletme_id AND hesap.hesap_no=satim.hesap_no AND satim.coin_id=coin.coin_id AND hesap.hesap_no='".$_SESSION['hesap_no']."'
ORDER BY satim.satim_id DESC
LIMIT 1,1";
$sorgu=mysqli_query($baglanti,$sql);
while( $sonuc=mysqli_fetch_array($sorgu,MYSQLI_ASSOC) ){
    echo $sonuc["satim_miktar"];
}
?></td>
											<td class="d-none d-xl-table-cell"><?php
$baglanti=mysqli_connect("localhost","root","","2017469016",); 
$sql="SELECT satim.satim_fiyat as satim_fiyat
FROM isletme,hesap,satim,coin
WHERE isletme.isletme_id=hesap.isletme_id AND hesap.hesap_no=satim.hesap_no AND satim.coin_id=coin.coin_id AND hesap.hesap_no='".$_SESSION['hesap_no']."'
ORDER BY satim.satim_id DESC
LIMIT 1,1";
$sorgu=mysqli_query($baglanti,$sql);
while( $sonuc=mysqli_fetch_array($sorgu,MYSQLI_ASSOC) ){
    echo $sonuc["satim_fiyat"];
}
?></td>
											<td><span class="badge bg-danger">Satış</span></td>
											<td class="d-none d-md-table-cell"><?php
$baglanti=mysqli_connect("localhost","root","","2017469016",); 
$sql="SELECT satim.satim_id as satim_numarasi
FROM isletme,hesap,satim,coin
WHERE isletme.isletme_id=hesap.isletme_id AND hesap.hesap_no=satim.hesap_no AND satim.coin_id=coin.coin_id AND hesap.hesap_no='".$_SESSION['hesap_no']."'
ORDER BY satim.satim_id DESC
LIMIT 1,1";
$sorgu=mysqli_query($baglanti,$sql);
while( $sonuc=mysqli_fetch_array($sorgu,MYSQLI_ASSOC) ){
    echo $sonuc["satim_numarasi"];
}
?></td>
										</tr>
										<tr>
											<td><?php
$baglanti=mysqli_connect("localhost","root","","2017469016",); 
$sql="SELECT coin.coin_ad as coin_adi
FROM isletme,hesap,satim,coin
WHERE isletme.isletme_id=hesap.isletme_id AND hesap.hesap_no=satim.hesap_no AND satim.coin_id=coin.coin_id AND hesap.hesap_no='".$_SESSION['hesap_no']."'
ORDER BY satim.satim_id DESC
LIMIT 2,1";
$sorgu=mysqli_query($baglanti,$sql);
while( $sonuc=mysqli_fetch_array($sorgu,MYSQLI_ASSOC) ){
    echo $sonuc["coin_adi"];
}
?></td>
											<td class="d-none d-xl-table-cell"><?php
$baglanti=mysqli_connect("localhost","root","","2017469016",); 
$sql="SELECT satim.satim_fiyat as satim_fiyat
FROM isletme,hesap,satim,coin
WHERE isletme.isletme_id=hesap.isletme_id AND hesap.hesap_no=satim.hesap_no AND satim.coin_id=coin.coin_id AND hesap.hesap_no='".$_SESSION['hesap_no']."'
ORDER BY satim.satim_id DESC
LIMIT 2,1";
$sorgu=mysqli_query($baglanti,$sql);
while( $sonuc=mysqli_fetch_array($sorgu,MYSQLI_ASSOC) ){
    echo $sonuc["satim_fiyat"];
}
?></td>
											<td class="d-none d-xl-table-cell"><?php
$baglanti=mysqli_connect("localhost","root","","2017469016",); 
$sql="SELECT satim.satim_fiyat as satim_fiyat
FROM isletme,hesap,satim,coin
WHERE isletme.isletme_id=hesap.isletme_id AND hesap.hesap_no=satim.hesap_no AND satim.coin_id=coin.coin_id AND hesap.hesap_no='".$_SESSION['hesap_no']."'
ORDER BY satim.satim_id DESC
LIMIT 2,1";
$sorgu=mysqli_query($baglanti,$sql);
while( $sonuc=mysqli_fetch_array($sorgu,MYSQLI_ASSOC) ){
    echo $sonuc["satim_fiyat"];
}
?></td>
											<td><span class="badge bg-danger">Satış</span></td>
											<td class="d-none d-md-table-cell"><?php
$baglanti=mysqli_connect("localhost","root","","2017469016",); 
$sql="SELECT satim.satim_id as satim_numarasi
FROM isletme,hesap,satim,coin
WHERE isletme.isletme_id=hesap.isletme_id AND hesap.hesap_no=satim.hesap_no AND satim.coin_id=coin.coin_id AND hesap.hesap_no='".$_SESSION['hesap_no']."'
ORDER BY satim.satim_id DESC
LIMIT 2,1";
$sorgu=mysqli_query($baglanti,$sql);
while( $sonuc=mysqli_fetch_array($sorgu,MYSQLI_ASSOC) ){
    echo $sonuc["satim_numarasi"];
}
?></td>
										</tr>
										<tr>
											<td><?php
$baglanti=mysqli_connect("localhost","root","","2017469016",); 
$sql="SELECT coin.coin_ad as coin_adi
FROM isletme,hesap,satim,coin
WHERE isletme.isletme_id=hesap.isletme_id AND hesap.hesap_no=satim.hesap_no AND satim.coin_id=coin.coin_id AND hesap.hesap_no='".$_SESSION['hesap_no']."'
ORDER BY satim.satim_id DESC
LIMIT 3,1";
$sorgu=mysqli_query($baglanti,$sql);
while( $sonuc=mysqli_fetch_array($sorgu,MYSQLI_ASSOC) ){
    echo $sonuc["coin_adi"];
}
?></td>
											<td class="d-none d-xl-table-cell"><?php
$baglanti=mysqli_connect("localhost","root","","2017469016",); 
$sql="SELECT satim.satim_fiyat as satim_fiyat
FROM isletme,hesap,satim,coin
WHERE isletme.isletme_id=hesap.isletme_id AND hesap.hesap_no=satim.hesap_no AND satim.coin_id=coin.coin_id AND hesap.hesap_no='".$_SESSION['hesap_no']."'
ORDER BY satim.satim_id DESC
LIMIT 3,1";
$sorgu=mysqli_query($baglanti,$sql);
while( $sonuc=mysqli_fetch_array($sorgu,MYSQLI_ASSOC) ){
    echo $sonuc["satim_fiyat"];
}
?></td>
											<td class="d-none d-xl-table-cell"><?php
$baglanti=mysqli_connect("localhost","root","","2017469016",); 
$sql="SELECT satim.satim_fiyat as satim_fiyat
FROM isletme,hesap,satim,coin
WHERE isletme.isletme_id=hesap.isletme_id AND hesap.hesap_no=satim.hesap_no AND satim.coin_id=coin.coin_id AND hesap.hesap_no='".$_SESSION['hesap_no']."'
ORDER BY satim.satim_id DESC
LIMIT 3,1";
$sorgu=mysqli_query($baglanti,$sql);
while( $sonuc=mysqli_fetch_array($sorgu,MYSQLI_ASSOC) ){
    echo $sonuc["satim_fiyat"];
}
?></td>
											<td><span class="badge bg-danger">Satış</span></td>
											<td class="d-none d-md-table-cell"><?php
$baglanti=mysqli_connect("localhost","root","","2017469016",); 
$sql="SELECT satim.satim_id as satim_numarasi
FROM isletme,hesap,satim,coin
WHERE isletme.isletme_id=hesap.isletme_id AND hesap.hesap_no=satim.hesap_no AND satim.coin_id=coin.coin_id AND hesap.hesap_no='".$_SESSION['hesap_no']."'
ORDER BY satim.satim_id DESC
LIMIT 3,1";
$sorgu=mysqli_query($baglanti,$sql);
while( $sonuc=mysqli_fetch_array($sorgu,MYSQLI_ASSOC) ){
    echo $sonuc["satim_numarasi"];
}
?></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
						<div class="col-12 col-lg-4 col-xxl-3 d-flex">
							<div class="card flex-fill w-100">
								<div class="card-header">

									<h5 class="card-title mb-0">Son Alımlar (₺ Bazında)</h5>
								</div>
								<div class="card-body d-flex w-100">
									<div class="align-self-center chart chart-lg">
										<canvas id="chartjs-dashboard-bar"></canvas>
									</div>
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
<script>
		document.addEventListener("DOMContentLoaded", function() {
			// Bar chart
			new Chart(document.getElementById("chartjs-bar"), {
				type: "bar",
				data: {
					labels: ["Bitcoin", "Ethereum", "XRP", "Stellar","Bitcoin Cash","Litecoin","USD Tether","Chainlink","Cardano","Binance Coin"],
					datasets: [{
						label: "Alımlara Harcanan Toplam (₺ bazında)",
						backgroundColor: window.theme.primary,
						borderColor: window.theme.primary,
						hoverBackgroundColor: window.theme.primary,
						hoverBorderColor: window.theme.primary,
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
?>],
						barPercentage: .75,
						categoryPercentage: .5
					}, {
						label: "Satışlardan Alınan Toplam (₺ bazında)",
						backgroundColor: "#dee2e6",
						borderColor: "#dee2e6",
						hoverBackgroundColor: "#dee2e6",
						hoverBorderColor: "#dee2e6",
						data: [
							<?php
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
?>
						],
						barPercentage: .75,
						categoryPercentage: .5
					}]
				},
				options: {
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					scales: {
						yAxes: [{
							gridLines: {
								display: false
							},
							stacked: false,
							ticks: {
								stepSize: 20
							}
						}],
						xAxes: [{
							stacked: false,
							gridLines: {
								color: "transparent"
							}
						}]
					}
				}
			});
		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			// Doughnut chart
			new Chart(document.getElementById("chartjs-doughnut"), {
				type: "doughnut",
				data: {
					labels: ["TL", "Bitcoin", "Ethereum", "XRP", "Stellar","Bitcoin Cash","Litecoin","USD Tether","Chainlink","Cardano","Binance Coin"],
					datasets: [{
						data: [<?php echo $_SESSION['hesap_bakiye'] ?>, <?php
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
?>],
						backgroundColor: [
							"#9e1c1c",
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
					cutoutPercentage: 65,
					legend: {
						display: false
					}
				}
			});
		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			// Bar chart
			new Chart(document.getElementById("chartjs-dashboard-bar"), {
				type: "bar",
				data: {
					labels: ["Bitcoin", "Ethereum", "XRP", "Stellar","Bitcoin Cash","Litecoin","USD Tether","Chainlink","Cardano","Binance Coin"],
					datasets: [{
						label: "Son Alım (₺ bazında)",
						backgroundColor: window.theme.primary,
						borderColor: window.theme.primary,
						hoverBackgroundColor: window.theme.primary,
						hoverBorderColor: window.theme.primary,
						data: [<?php
$baglanti=mysqli_connect("localhost","root","","2017469016",); 
$sql="SELECT (alim.alim_miktar*alim.alim_fiyat) as son_bitcoin
FROM isletme,hesap,alim,coin
WHERE isletme.isletme_id=hesap.isletme_id AND hesap.hesap_no=alim.hesap_no AND alim.coin_id=coin.coin_id AND coin.coin_ad='Bitcoin' AND hesap.hesap_no='".$_SESSION['hesap_no']."'
ORDER BY alim.alim_id DESC
LIMIT 0,1";
$sorgu=mysqli_query($baglanti,$sql);
while( $sonuc=mysqli_fetch_array($sorgu,MYSQLI_ASSOC) ){
    echo $sonuc["son_bitcoin"];
}
?>, <?php
$baglanti=mysqli_connect("localhost","root","","2017469016",); 
$sql="SELECT (alim.alim_miktar*alim.alim_fiyat) as son_ethereum
FROM isletme,hesap,alim,coin
WHERE isletme.isletme_id=hesap.isletme_id AND hesap.hesap_no=alim.hesap_no AND alim.coin_id=coin.coin_id AND coin.coin_ad='Ethereum' AND hesap.hesap_no='".$_SESSION['hesap_no']."'
ORDER BY alim.alim_id DESC
LIMIT 0,1";
$sorgu=mysqli_query($baglanti,$sql);
while( $sonuc=mysqli_fetch_array($sorgu,MYSQLI_ASSOC) ){
    echo $sonuc["son_ethereum"];
}
?>, <?php
$baglanti=mysqli_connect("localhost","root","","2017469016",); 
$sql="SELECT (alim.alim_miktar*alim.alim_fiyat) as son_xrp
FROM isletme,hesap,alim,coin
WHERE isletme.isletme_id=hesap.isletme_id AND hesap.hesap_no=alim.hesap_no AND alim.coin_id=coin.coin_id AND coin.coin_ad='XRP' AND hesap.hesap_no='".$_SESSION['hesap_no']."'
ORDER BY alim.alim_id DESC
LIMIT 0,1";
$sorgu=mysqli_query($baglanti,$sql);
while( $sonuc=mysqli_fetch_array($sorgu,MYSQLI_ASSOC) ){
    echo $sonuc["son_xrp"];
}
?>, <?php
$baglanti=mysqli_connect("localhost","root","","2017469016",); 
$sql="SELECT (alim.alim_miktar*alim.alim_fiyat) as son_stellar
FROM isletme,hesap,alim,coin
WHERE isletme.isletme_id=hesap.isletme_id AND hesap.hesap_no=alim.hesap_no AND alim.coin_id=coin.coin_id AND coin.coin_ad='Stellar' AND hesap.hesap_no='".$_SESSION['hesap_no']."'
ORDER BY alim.alim_id DESC
LIMIT 0,1";
$sorgu=mysqli_query($baglanti,$sql);
while( $sonuc=mysqli_fetch_array($sorgu,MYSQLI_ASSOC) ){
    echo $sonuc["son_stellar"];
}
?>, <?php
$baglanti=mysqli_connect("localhost","root","","2017469016",); 
$sql="SELECT (alim.alim_miktar*alim.alim_fiyat) as son_bitcoincash
FROM isletme,hesap,alim,coin
WHERE isletme.isletme_id=hesap.isletme_id AND hesap.hesap_no=alim.hesap_no AND alim.coin_id=coin.coin_id AND coin.coin_ad='Bitcoin Cash' AND hesap.hesap_no='".$_SESSION['hesap_no']."'
ORDER BY alim.alim_id DESC
LIMIT 0,1";
$sorgu=mysqli_query($baglanti,$sql);
while( $sonuc=mysqli_fetch_array($sorgu,MYSQLI_ASSOC) ){
    echo $sonuc["son_bitcoincash"];
}
?>, <?php
$baglanti=mysqli_connect("localhost","root","","2017469016",); 
$sql="SELECT (alim.alim_miktar*alim.alim_fiyat) as son_litecoin
FROM isletme,hesap,alim,coin
WHERE isletme.isletme_id=hesap.isletme_id AND hesap.hesap_no=alim.hesap_no AND alim.coin_id=coin.coin_id AND coin.coin_ad='Litecoin' AND hesap.hesap_no='".$_SESSION['hesap_no']."'
ORDER BY alim.alim_id DESC
LIMIT 0,1";
$sorgu=mysqli_query($baglanti,$sql);
while( $sonuc=mysqli_fetch_array($sorgu,MYSQLI_ASSOC) ){
    echo $sonuc["son_litecoin"];
}
?>, <?php
$baglanti=mysqli_connect("localhost","root","","2017469016",); 
$sql="SELECT (alim.alim_miktar*alim.alim_fiyat) as son_tether
FROM isletme,hesap,alim,coin
WHERE isletme.isletme_id=hesap.isletme_id AND hesap.hesap_no=alim.hesap_no AND alim.coin_id=coin.coin_id AND coin.coin_ad='Tether' AND hesap.hesap_no='".$_SESSION['hesap_no']."'
ORDER BY alim.alim_id DESC
LIMIT 0,1";
$sorgu=mysqli_query($baglanti,$sql);
while( $sonuc=mysqli_fetch_array($sorgu,MYSQLI_ASSOC) ){
    echo $sonuc["son_tether"];
}
?>, <?php
$baglanti=mysqli_connect("localhost","root","","2017469016",); 
$sql="SELECT (alim.alim_miktar*alim.alim_fiyat) as son_chainlink
FROM isletme,hesap,alim,coin
WHERE isletme.isletme_id=hesap.isletme_id AND hesap.hesap_no=alim.hesap_no AND alim.coin_id=coin.coin_id AND coin.coin_ad='Chainlink' AND hesap.hesap_no='".$_SESSION['hesap_no']."'
ORDER BY alim.alim_id DESC
LIMIT 0,1";
$sorgu=mysqli_query($baglanti,$sql);
while( $sonuc=mysqli_fetch_array($sorgu,MYSQLI_ASSOC) ){
    echo $sonuc["son_chainlink"];
}
?>, <?php
$baglanti=mysqli_connect("localhost","root","","2017469016",); 
$sql="SELECT (alim.alim_miktar*alim.alim_fiyat) as son_cardano
FROM isletme,hesap,alim,coin
WHERE isletme.isletme_id=hesap.isletme_id AND hesap.hesap_no=alim.hesap_no AND alim.coin_id=coin.coin_id AND coin.coin_ad='Cardano' AND hesap.hesap_no='".$_SESSION['hesap_no']."'
ORDER BY alim.alim_id DESC
LIMIT 0,1";
$sorgu=mysqli_query($baglanti,$sql);
while( $sonuc=mysqli_fetch_array($sorgu,MYSQLI_ASSOC) ){
    echo $sonuc["son_cardano"];
}
?>, <?php
$baglanti=mysqli_connect("localhost","root","","2017469016",); 
$sql="SELECT (alim.alim_miktar*alim.alim_fiyat) as son_binance
FROM isletme,hesap,alim,coin
WHERE isletme.isletme_id=hesap.isletme_id AND hesap.hesap_no=alim.hesap_no AND alim.coin_id=coin.coin_id AND coin.coin_ad='Binance Coin' AND hesap.hesap_no='".$_SESSION['hesap_no']."'
ORDER BY alim.alim_id DESC
LIMIT 0,1";
$sorgu=mysqli_query($baglanti,$sql);
while( $sonuc=mysqli_fetch_array($sorgu,MYSQLI_ASSOC) ){
    echo $sonuc["son_binance"];
}
?>],
						barPercentage: .75,
						categoryPercentage: .5
					}]
				},
				options: {
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					scales: {
						yAxes: [{
							gridLines: {
								display: false
							},
							stacked: false,
							ticks: {
								stepSize: 20
							}
						}],
						xAxes: [{
							stacked: false,
							gridLines: {
								color: "transparent"
							}
						}]
					}
				}
			});
		});
	</script>

</body>

</html>