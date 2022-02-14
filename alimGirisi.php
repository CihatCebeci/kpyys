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
	<form action="veritabaniAlis.php" method="POST">
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
					<li class="sidebar-item active">
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
<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title">Alış Girişi</h5>
									<h6 class="card-subtitle text-muted">Kripto Para Alımı gerçekleştirdiyseniz buradan giriş yapabilirsiniz.<br><br>
									<b>Kripto Para Kodları</b><br>
									1 - Bitcoin<br>
									2 - Ethereum<br>
									3 - XRP<br>
									4 - Stellar<br>
									5 - Bitcoin Cash<br>
									6 - Litecoin<br>
									7 - USD Tether<br>
									8 - ChainLink<br>
									9 - Cardano<br>
									10 - Binance Coin
									</h6>
								</div>
								<div class="card-body">
									<form>
										<div class="row">
											<div class="mb-3 col-md-6">
												<label class="form-label" for="coin_id">Alınan Kripto Paranın Kodu:</label>
												<select id="inputState" class="form-control" name="coin_id">
												<option selected>1</option>
												<option>2</option>
												<option>3</option>
												<option>4</option>
												<option>5</option>
												<option>6</option>
												<option>7</option>
												<option>8</option>
												<option>9</option>
												<option>10</option>
												</select>
											</div>
											<div class="mb-3 col-md-6">
												<label class="form-label" for="alim_miktar">Alım Miktarınız:</label>
												<input type="text" class="form-control" name="alim_miktar"/>
											</div>
										</div>
										<div class="mb-3">
											<label class="form-label" for="alim_fiyat">Aldığınız Fiyat:</label>
											<input class="form-control" name="alim_fiyat"/>
										</div>
										<div class="mb-3">
											<label class="form-label" for="hesap_no">Onaylamak İçin Hesap Numaranızı Giriniz:</label>
											<input type="number" class="form-control" name="hesap_no"/>
										</div>
										<div class="mb-3">
											<label class="form-label" class="form-check m-0">
              <input type="checkbox" class="form-check-input">
              <span class="form-check-label">Bu işlemin geri alınamayacağını,veritabanına kaydedileceğini biliyorum ve kabul ediyorum.</span>
            </label>
										</div>
										<input type="submit" class="btn btn-success" value="Alım Kaydı Ekle"/>
									</form>
								</div>
							</div>
						</div>
						<img src="eklemeArkaplan.jpg"/></img>
						<br>
						<br>
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