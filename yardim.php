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

					<h1 class="h3 mb-3">Proje Detayları</h1>

					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
									<center><h4 class="card-title mb-0">Bu sayfada DEÜ YBS bölümü <b>Karar Destek Sistemleri</b> dersi için hazırlanmış olan <b>"Şirketler için Kripto Para Yatırım Yönetim Sistemi"</b> projesinin içerisinde neler bulunduğunu ve diğer detayları öğrenebilirsiniz.</h4>
								</center><br>
								<div class="progress mb-3">
										<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 99%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">Tamamlanma %99</div>
								</div>
								<br>
								<span class="badge bg-primary">Geliştiren: Cihat Cavit Cebeci</span>
								<span class="badge bg-secondary">Numara: 2017469016</span>
								<span class="badge bg-info">Karar Destek Sistemleri</span>
								<span class="badge bg-info">Mekansal Veritabanları</span>
								<span class="badge bg-info">Sunucu Tabanlı Programlama</span>
								</div>
								<div class="card-body">
								<nav aria-label="breadcrumb">
										<ol class="breadcrumb">
											<li class="breadcrumb-item active">Ana Sayfa Tasarımı ve Kodlaması</li>
										</ol>
									</nav>
									<h4 class="card-title mb-0">Anasayfa içerisinde birçok farklı gösterge bulunmaktadır. Sol tarafta bulunan ilk dört kutuda;</h4>
									<span class="badge bg-success">Hesap Bakiyesi</span>
									<span class="badge bg-success">Bitcoin Anlık Değeri (Dolar Bazında)</span>
									<span class="badge bg-success">Bugüne Kadar Yapılan Toplam Yatırım Tutarı</span>
									<span class="badge bg-success">Bugüne Kadar Satılan Kripto Paralardan Alınan Toplam Türk Lirası</span> bulunmaktadır.
									<br><br>
									<h4 class="card-title mb-0">Bu verilerin üçü veritabanı üzerinden çekilmekte ve ikisi veritabanı içerisinde yapılan işlemler sayesinde elde edilmektedir. Bu kodlara main.php üzerinden ulaşılabilir. Bitcoin güncel değeri ise başka bir kaynaktan anlık olarak çekilmektedir.</h4>
									<br>
									<h4 class="card-title mb-0">Sağ üst köşede ise bugüne kadar yapılmış olan tüm kripto para alım ve satımları listelenmektedir. Bu grafik sayesinde işletme hangi kripto para biriminden daha çok gelir elde ettiğini ve hangi kripto para birimiyle daha çok ilgilendiğini saptayabilir. Bu grafikte de veritabanı yardımıyla alınan ve satılan kripto para birimleri TL karşılığına çevrilmektedir.</h4>
									<br>
									<h4 class="card-title mb-0"><b>Varlık Dağılımı kutusunda</b>, işletmenin sahip olduğu tüm varlıklar hesap bakiyesi ile birlikte incelenebilir. Bu kutuda tüm kripto para birimleri ayrı bir renk sahibidir ve üzerlerine gelinmesi halinde TL bazında ne kadar sahip olunduğu incelenebilir. </h4>
									<br>
									<h4 class="card-title mb-0">Varlık Dağılımı kutusunun sağ tarafında bulunan anlık kripto para verileri uzak bir kaynaktan çekilmektedir. Bu ekranda Bitcoin, Ethereum, XRP, Litecoin, Bitcoin Cash ve Cardano birimlerinin anlık TL bazında fiyatları ve 24 saatlik değişimleri incelenebilir. </h4>
									<br>
									<h4 class="card-title mb-0">Ortadaki kutuların en sağında bulunan haber kutusu, gün içerisinde paylaşılan kripto para haberlerini göstermektedir. Bu haberler de dışarıdaki bir kaynaktan çekilmektedir. Haberlere tıklayarak haber sayfalarına erişilebilir.</h4>
									<br>
									<h4 class="card-title mb-0">Sayfanın aşağısında bulunan tabloda <b>"Son İşlemler"</b> yer almaktadır. Bu tabloda son 4 alım ve satım incelenebilir. Yeni alım ve satım yapılması halinde liste otomatik olarak güncellenir. İşletmeler bu tablo yardımıyla yaptıkları son alım ve satımların raporlarını tutabilirler. Son işlemleri daha detaylı incelemek için "Son İşlemler" sayfasına gidilebilir.</h4>
									<br>
									<h4 class="card-title mb-0">En aşağıda sağ tarafta bulunan grafik ise yapılan son alımları göstermektedir. Her kripto paraya en son ne kadar para harcandığı bu grafik yardımıyla incelenebilir.</h4>
								<br>
								<nav aria-label="breadcrumb">
										<ol class="breadcrumb">
											<li class="breadcrumb-item active">İstatistikler Sayfası ve Kodlaması</li>
										</ol>
									</nav>
									<h4 class="card-title mb-0">Bu sayfada anasayfada bulunan grafiklerin geliştirilmiş versiyonları bulunmaktadır. 4 adet grafik bulunmaktadır. Bu grafikler "Kripto Para Alım Satımları", "Alım/Satım Sayısı Grafiği", "Son Satışlar Grafiği" ve "Miktar Grafiği"'dir. Tüm grafikler yeni veri girişinde güncellenmektedir. Veritabanından PHP ve SQL yardımıyla veriler çekilmektedir.</h4>
								<br>
								<nav aria-label="breadcrumb">
										<ol class="breadcrumb">
											<li class="breadcrumb-item active">Yatırım Sihirbazı</li>
										</ol>
									</nav>
									<h4 class="card-title mb-0">Yatırımcılar bu sayfa yardımıyla yatırımlarını yapmadan önce belli analizler gerçekleştirebilirler. Ayrıca "Bitcoin" grafiğini ve diğer kripto paraların hacimlerini inceleyebilirler. Bu sayfadaki veriler "Investing.com" sitesi üzerinden çekilmiştir.</h4>
									<br>
								<nav aria-label="breadcrumb">
										<ol class="breadcrumb">
											<li class="breadcrumb-item active">Alış Girişi</li>
										</ol>
									</nav>
								<h4 class="card-title mb-0">İşletme bu sayfa yardımıyla alım yapmış oldukları kripto paraları sisteme ekleyebilirler. Bu ekranda eklenen kayıtlar anlık olarak sisteme ve tüm grafiklere yansımaktadır. KDS'nin interaktif olma özelliğini burada görebiliriz.</h4>
								<br>
								<nav aria-label="breadcrumb">
										<ol class="breadcrumb">
											<li class="breadcrumb-item active">Satış Girişi</li>
										</ol>
									</nav>
								<h4 class="card-title mb-0">İşletme bu sayfa yardımıyla satmış olduğu tüm kripto paraları sisteme ekleyebilirler. Bu ekranda eklenen kayıtlar anlık olarak sisteme ve tüm grafiklere yansımaktadır. KDS'nin interaktif olma özelliğini burada görebiliriz.</h4>
								<br>
								<nav aria-label="breadcrumb">
										<ol class="breadcrumb">
											<li class="breadcrumb-item active">Son İşlemler</li>
										</ol>
									</nav>
								<h4 class="card-title mb-0">Ana sayfada bulunan "Son İşlemler" tablosunun genişletilmiş bir versiyonu bulunmaktadır. Son 10 alım ve satım işlemi tüm detayları ile bu sayfada bulunmaktadır. Ayrıca bugüne kadar yapılan toplam alım ve satım sayısını da görmek mümkündür.</h4>
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