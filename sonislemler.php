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
				<li class="sidebar-item active">
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

					<h1 class="h3 mb-3"><b><?php $isim=strtoupper($_SESSION['isletme_adi']); echo $isim ?></b>&nbsp;Son İşlemler</h1>

					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-body">
								<nav aria-label="breadcrumb">
										<ol class="breadcrumb">
											<li class="breadcrumb-item active">Son 10 Alım</li>
											<li class="breadcrumb-item active">Bugüne kadar toplam yapılan alım: <?php
$baglanti=mysqli_connect("localhost","root","","2017469016",); 
$sql="SELECT count(alim.alim_id) as toplam_alis
FROM isletme,hesap,alim,coin
WHERE isletme.isletme_id=hesap.isletme_id AND hesap.hesap_no=alim.hesap_no AND alim.coin_id=coin.coin_id AND hesap.hesap_no='".$_SESSION['hesap_no']."'";
$sorgu=mysqli_query($baglanti,$sql);
while( $sonuc=mysqli_fetch_array($sorgu,MYSQLI_ASSOC) ){
    echo $sonuc["toplam_alis"];
}
?></li>
										</ol>
									</nav>
								<table class="table table-hover my-0">
									<thead>
										<tr>
											<th>Kripto Para Birimi</th>
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
FROM isletme,hesap,alim,coin
WHERE isletme.isletme_id=hesap.isletme_id AND hesap.hesap_no=alim.hesap_no AND alim.coin_id=coin.coin_id AND hesap.hesap_no='".$_SESSION['hesap_no']."'
ORDER BY alim.alim_id DESC
LIMIT 4,1";
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
LIMIT 4,1";
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
LIMIT 4,1";
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
LIMIT 4,1";
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
LIMIT 5,1";
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
LIMIT 5,1";
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
LIMIT 5,1";
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
LIMIT 5,1";
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
LIMIT 6,1";
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
LIMIT 6,1";
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
LIMIT 6,1";
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
LIMIT 6,1";
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
LIMIT 7,1";
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
LIMIT 7,1";
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
LIMIT 7,1";
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
LIMIT 7,1";
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
LIMIT 8,1";
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
LIMIT 8,1";
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
LIMIT 8,1";
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
LIMIT 8,1";
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
LIMIT 9,1";
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
LIMIT 9,1";
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
LIMIT 9,1";
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
LIMIT 9,1";
$sorgu=mysqli_query($baglanti,$sql);
while( $sonuc=mysqli_fetch_array($sorgu,MYSQLI_ASSOC) ){
    echo $sonuc["alim_numarasi"];
}
?></td>
										</tr>
									</tbody>
								</table>
							
									<br>
								<nav aria-label="breadcrumb">
										<ol class="breadcrumb">
											<li class="breadcrumb-item active">Son 10 Satış</li>
											<li class="breadcrumb-item active">Bugüne kadar toplam yapılan satış: <?php
$baglanti=mysqli_connect("localhost","root","","2017469016",); 
$sql="SELECT count(satim.satim_id) as toplam_satis
FROM isletme,hesap,satim,coin
WHERE isletme.isletme_id=hesap.isletme_id AND hesap.hesap_no=satim.hesap_no AND satim.coin_id=coin.coin_id AND hesap.hesap_no='".$_SESSION['hesap_no']."'";
$sorgu=mysqli_query($baglanti,$sql);
while( $sonuc=mysqli_fetch_array($sorgu,MYSQLI_ASSOC) ){
    echo $sonuc["toplam_satis"];
}
?></li>
										</ol>
									</nav>
								<table class="table table-hover my-0">
									<thead>
										<tr>
											<th>Kripto Para Birimi</th>
											<th class="d-none d-xl-table-cell">Miktar</th>
											<th class="d-none d-xl-table-cell">Fiyat (₺)</th>
											<th>İşlem</th>
											<th class="d-none d-md-table-cell">İşlem Numarası</th>
										</tr>
									</thead>
									<tbody>
										<tr>
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
<tr>
											<td><?php
$baglanti=mysqli_connect("localhost","root","","2017469016",); 
$sql="SELECT coin.coin_ad as coin_adi
FROM isletme,hesap,satim,coin
WHERE isletme.isletme_id=hesap.isletme_id AND hesap.hesap_no=satim.hesap_no AND satim.coin_id=coin.coin_id AND hesap.hesap_no='".$_SESSION['hesap_no']."'
ORDER BY satim.satim_id DESC
LIMIT 4,1";
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
LIMIT 4,1";
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
LIMIT 4,1";
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
LIMIT 4,1";
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
LIMIT 5,1";
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
LIMIT 5,1";
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
LIMIT 5,1";
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
LIMIT 5,1";
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
LIMIT 6,1";
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
LIMIT 6,1";
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
LIMIT 6,1";
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
LIMIT 6,1";
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
LIMIT 7,1";
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
LIMIT 7,1";
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
LIMIT 7,1";
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
LIMIT 7,1";
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
LIMIT 8,1";
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
LIMIT 8,1";
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
LIMIT 8,1";
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
LIMIT 8,1";
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
LIMIT 9,1";
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
LIMIT 9,1";
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
LIMIT 9,1";
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
LIMIT 9,1";
$sorgu=mysqli_query($baglanti,$sql);
while( $sonuc=mysqli_fetch_array($sorgu,MYSQLI_ASSOC) ){
    echo $sonuc["satim_numarasi"];
}
?></td>
										</tr>
										</tbody>
								</table>
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