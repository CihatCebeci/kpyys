Şirketler için Kripto Para Yatırım Yönetim Sistemi

Cihat Cavit Cebeci – 2017469016

Projenin Konusu

Şirketler değerlerini arttırabilmek ve piyasada güç sahibi olabilmek için belirli noktalara yatırım yapmaktadırlar. Geleceğin teknolojisi olan ve Blockchain ağının bir parçası olan kripto paralar da bu yatırım araçlarından biri olarak görülmektedir. Günümüzde yeni teknolojilere ayak uydurmak isteyen birçok firma kripto para yatırımları yapmaktadır. Fakat bu noktada bankacılık işlemleri gibi detaylı bir portföy sunan kripto para yatırım yönetim sistemi bulunmamaktadır. Bu proje ile bahsetmiş olduğum eksiklik giderilecek, şirketlerdeki üst ve orta düzey yöneticilerin yatırım kararlarını daha etkin bir şekilde verebilmesi sağlanacaktır.

Projenin İşleyişi

Şirketler yaptıkları yatırımları oldukça yüklü miktarlarda yapmaktadırlar. Ve yatırım kararlarını çoğunlukla üst düzey yöneticiler vermektedir. Fakat yöneticiler verilerin elde edilmesi ve bilgi haline dönüştürülmesi konusunda herhangi bir uzmanlığa sahip değildirler. Bu görevin çalışanlara verilmesi oldukça fazla zaman ve kaynak kaybına sebep olacaktır.

Bu noktada KPYYS ile veriler bir veritabanında barındırılabilecek ve bu veriler bilgiye dönüştürülerek bir arayüz yardımıyla yöneticilere sunulabilecek. Bu noktada PHP, SQL, CSS, HTML ve JavaScript kullanılacak.

Veritabanı sayesinde birden fazla firmanın kullanabileceği online bir kripto para yatırım yönetim sistemi oluşturabilir. PHP ve SQL birleşimi sayesinde bir firmanın üst düzey yöneticisi kendi firmasına ait tüm alım ve satımları inceleyebilir, kar ve zarar oranlarını hesaplayabilir ve arayüz yardımıyla anlık durumları inceleyebilir. **Veritabanının buradaki asıl görevi geçmiş veriler yardımıyla yöneticilere gelecek için planlama yapabilmelerini sağlamaktır.** Tüm veriler PHP yardımıyla arayüz üzerinden alınacak ve daha sonra arayüzde düzenlenmiş ve görselleştirilmiş bir şekilde görüntülenebilecektir.

Şirketler İçin KPYYS Yazılımı

Hazırlamış olduğum sistem içerisinde binlerce satır kodlama ve birçok görsel öge bulunuyor. Ayrıca karar destek sistemlerinin sahip olması gereken tüm özellikleri içerisinde barındırıyor. KPYYS içerisinde kullanıcıların erişebileceği 10 adet sayfa bulunuyor. Bu sayfalar:

- index.php
- main.php
- istatistikler.php
- yatirimSihirbazi.php
- alimGirisi.php
- satimGirisi.php
- alimBasarili.php
- satimBasarili.php
- sonislemler.php
- yardim.php

4 adet veritabanı ile bağlantı kurulan php sayfası bulunuyor:

- kontrol.php
- veritabaniAlis.php
- veritabaniSatis.php
- veritabani.php

Bunun yanında 2 adet CSS ve 1 adet JS sayfası bulunuyor. Ayrıca Adobe Photoshop üzerinden hazırlamış olduğum birçok görsel öge bulunuyor. Sitenin tasarım kısmında CSS ve JS kodlarını dışarıdan çekmenin daha mantıklı olacağını düşündüm ve hazır birkaç tema üzerinde değişiklik yaparak KPYYS tasarımını ortaya çıkardım. 

1) Şirketler için KPYYS – Giriş Sayfası

Bu sayfa kullanıcıların arayüze erişmek için giriş yapması gereken sayfadır. Veritabanı üzerinde her işletmenin bir kullanıcı adı ve şifresi bulunmaktadır ve bu veriler PHP yardımıyla sayfa üzerinde kontrol edilmektedir. Ayrıca sayfa içerisinde hazırlamış olduğum bir logo bulunmaktadır. 









1) Şirketler için KPYYS – Ana Sayfa 

Başarılı bir şekilde giriş yapan işletmelerin yönlendirildiği sayfa olan main.php, içerisinde birçok veriyi ve bilgiyi barındırmaktadır. Bu sayfa üzerinde işletme sahipleri her türlü analizleri inceleyebilirler, güncel değerleri ve haberleri görebilirler, karar verme süreçlerini hızlandırabilirler. Sadece bu sayfa bile KPYYS için yeterli sayılabilir. 

Sayfanın sol üst köşesinde dört adet kutu bulunmaktadır ve bu kutular içerisinde farklı bilgiler yer almaktadır. Bu bilgiler sırasıyla:

- İşletmenin yatırım için ayırmış olduğu hesap bakiyesi
- İşletmenin bugüne kadar toplam yapmış olduğu yatırım tutarının türk lirası bazında karşılığı
- Bitcoin anlık olarak güncellenen değeri (Dolar bazında)
- İşletmenin bugüne kadar toplam satmış olduğu yatırımının türk lirası bazında karşılığı


Sayfanın sağ üst köşesinde ise işletmenin bugüne kadar yaptığı toplam alım ve satımları inceleyebileceği bir bar grafik bulunmaktadır. Bu grafikteki alım ve satımlar da türk lirasına çevrilmiştir. Bu sayede işletmeler ne kadar harcama yapıp ne kadar kazandıklarını öğrenebilirler.

Orta bölümde ise üç farklı kutu ile karşılaşıyoruz. Soldan sağa birinci kutu işletmenin tüm varlıklarını TL bazında göstermektedir. Bu grafik sayesinde işletmeler tüm varlıklarını görselleştirilmiş bir şekilde görebilirler. İkinci sırada ise kripto para birimlerinin güncel değerlerini, günlük değişimlerini ve hacimlerini görüntüleyebiliriz. Üçüncü sıradaki kutuda ise güncel kripto para haberlerini görebiliriz. 

Ana sayfanın en altındaki iki kutu ise son işlemleri ve son alımları göstermektedir. Tablo halinde yapılan son 3 alım ve satım işlemini inceleyebiliriz. Bu tablo içerisinde alınan kripto paranın adı, işlem numarası, yapılan işlem, alınan miktar ve alım fiyatı gibi detaylar bulunmaktadır. Bunun yanında sağ tarafta ise yapılan son alımların TL bazındaki karşılığını görüntüleyebiliriz.

Tüm grafiklerden ve tasarımdan da anlaşılacağı üzere KPYYS ana sayfası verilerin bilgiye dönüştürüldüğü ve yöneticilerin kolaylıkla inceleyip karar verebileceği bir sisteme sahiptir. Sadece bu sayfa üzerinden tüm yatırımlar incelenebilir ve genel bir fikir edinilebilir.

1) Şirketler için KPYYS – İstatistikler Sayfası

KPYYS içerisindeki “İstatistikler” sayfası ana sayfada bulunan istatistiklerin genişletilmiş versiyonlarını içermektedir. Bu sayfa içerisinde dört adet farklı yapıda grafik bulunmaktadır ve hepsi farklı bir veriyi bilgiye dönüştürmektedir. 

İlk grafiğimiz ana sayfada sağ üst köşede gördüğümüz toplam alım satım grafiğinin çizgi grafikte gösterilen versiyonudur. İçerik aynı olmasına rağmen yöneticinin farklı bir açıdan inceleyebilmesine olanak sağlamak için çizgi grafiği bu sayfaya eklenmiştir. 

Sağ üst köşede bulunan ikinci grafiğimiz hangi kripto paralarda kaç kez alım ve satım işlemi gerçekleştirildiğini göstermektedir. Bu grafik ile kazanç veya kayıp hesaplaması yapılması mantıksız olacaktır. Bu grafiğin amacı işletmenin hangi kripto paralara daha çok ilgisinin olduğunu öğrenmek veya hangi kripto paralarda alım veya satım yapması kararını vermek için gereklidir.

Sol alt köşede bulunan üçüncü grafik yapılan son satışlardan elde edilen Türk lirasını göstermektedir. Her kripto para için incelenebilecek olan bu grafik yardımıyla yöneticiler, hangi kripto paradan en son ne kadar kazandıklarını rahatlıkla öğrenebilirler.

Sağ alt köşede bulunan dördüncü grafik ise bir pasta grafik olup, sahip olunan kripto paraların miktarlarını göstermektedir. Burada işletmenin karar vermesini gerektiren bir durum yoktur ancak hangi kripto paradan kaç adet bulunduğunu bilmek işletmenin önümüzdeki süreçte hangi kripto paraları alacağı hakkında fikir oluşturabilir.







1) Şirketler için KPYYS – Yatırım Sihirbazı Sayfası

Yatırım sihirbazı sayfası içerisinde yöneticilerin yatırım yapmadan önce inceleyebileceği ve hesaplama yapabileceği bazı eklentiler bulunuyor. Bu eklentiler investing.com üzerinden script olarak çekildi. Sol taraftaki kutuda pivot hesaplama ve fibonacci hesaplama eklentileri bulunmaktadır. Sağ taraftaki kutuda ise yöneticiler 10 kripto paranın dolar bazında güncel fiyatlarını, toplam piyasa değerlerini, 24 saatlik değer değişimini ve Bitcoin grafiğini inceleyebilirler. 













1) Şirketler için KPYYS – Alım ve Satım Girişi Sayfası

Alım ve satım sayfaları yöneticilerin veri girişi yapabileceği sayfalardır. Bu sayfalar yardımıyla alım veya satım yaptıkları kripto paraları tüm detayları ile veritabanına kaydedebilirler. Veritabanına girilen tüm veriler anlık olarak sistem üzerindeki grafiklerde ve son işlemlerde görüntülenebilir. Sistem içerisinde hacmi en yüksek 10 kripto para birimi bulunmaktadır. İşletmenin isteklerine göre bu sayı arttırılıp azaltılabilir. 



1) Şirketler için KPYYS – Son İşlemler Sayfası

Ana sayfada bulunan son işlemler tablosunun genişletmiş bir versiyonunu barındıran bu sayfada, işletmeler yaptıkları son 10 alım ve son 10 satım işlemlerini detaylarıyla birlikte görüntüleyebilirler. Bu sayede yöneticiler son işlemleri inceleyerek detaylı raporlar oluşturabilirler. Bunun yanında işletmenin bugüne kadar toplam yaptığı alım ve satım sayısı incelenebilir.

1) Şirketler için KPYYS – Proje Detayları Sayfası

Proje detayları sayfasına footer ve sağ üstte bulunan açılan menü yardımıyla ulaşılabilir. Bu sayfa içerisinde KPYYS projesi hakkında bilgiler ve öğrenci numaramı bulabilirsiniz. Ayrıca sistem içerisinde bulunan sayfaların ne işe yaradıkları hakkında kısa açıklamalar bulunmaktadır.


1) Şirketler için KPPYS – Veritabanı Tasarımı

Veritabanı üzerinde alım ve satımların kaydının tutulduğu tablolar, işletmelerin genel bilgilerinin bulunduğu bir tablo, kripto paralar hakkında bir tablo ve işletmelerin sahip olduğu hesapların bir tablosu bulunuyor. 

Her işletmenin bir hesabı bulunuyor ve bir hesap üzerinden sınırsız sayıda alım veya satım kaydı eklenebiliyor. Her alım ve satım kaydında bir coin kullanılması gerekiyor ve bir coin birden fazla kez kullanılabiliyor. 

Veritabanı PHP yardımıyla site ile iletişim kuruyor ve sitenin neredeyse her sayfasında aktif olarak kullanılıyor. Verilerin girişinde ve görüntülenmesinde büyük bir rol oynayan veritabanı, site üzerinde görselleştirilmiş bir şekilde verileri kullanıcılara sunuyor.






Sonuç

Şirketler için Kripto Para Yatırım Yönetim sistemi planlandığı gibi oldukça açık ve işe yarar bir şekilde oluşturuldu. CSS ve JS kodları için dışarıdaki kaynaklardan yararlandım ancak genel hatlarıyla incelendiğinde tüm kodlar ve grafiksel ögeler (Logolar, fotoğraflar, sayfa dizaynı) tarafımca yapıldı. Bu siteyi hazırlamak bir aydan uzun sürdü ve sonuca geldiğimizde önümüzde gerçekten elle tutulur bir proje olduğuna inanıyorum.

Ayrıca bu proje içerisinde bazı geliştirmeler yapılabileceğini düşünüyorum. Daha sonraki ve profesyonel kullanım gerektirecek süreçlerde bu sisteme aşağıdaki özellikleri de ekleyebilirim:

- Alım ve satım işlemleri için tarih ve saat
- Daha fazla kripto para birimi üzerinde işlem yapabilme imkânı
- Daha genişletilmiş bir raporlama sunan grafikler
- Son işlemler gibi tabloların çıktılarını alabilme ve dışarı aktarma
- Yatırım sihirbazı içeriğini çeşitlendirmek için daha fazla analiz yazılımı
- Kripto paraları ile entegre çalışabilecek bir eklenti
- Yeni kullanıcı kayıt sayfası ve şifremi unuttum sayfası

Yukarıda belirttiğim geliştirmeler de sisteme eklenirse tamamen profesyonel bir yazılım olacaktır. Bunlar olmadan bile oldukça iyi bir performans sergileyen ve yöneticilerin gerçekten de yatırımlarını incelemesine, karar verme süreçlerini hızlandırmasına ve daha tutarlı kararlar verebilmesine yardım eden KPYYS, karar destek sistemlerine güzel bir örnek oluşturduğu görüşündeyim. 


