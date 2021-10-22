<?php
include "./partial_/header.php";
include "./partial_/navbar.php";
?>
<section id="meteorologi-geofisika">
  <div class="container">
    <div class="row">
      <!-- include file="../config.bmkg" -->
      <div class="col-md-8 md-margin-bottom-20">
        <div class="prakicu-kota-besar no-space-carousel-block owl-carousel-v1 margin-bottom-10 md-margin-bottom-20">
          <div class="headline">
            <h4 class="pull-left">Prakiraan Cuaca <small>(<?= tanggal_indo(date('Y-m-d')); ?>)</small></h4>
            <div class="owl-navigation">
              <div class="customNavigation">
                <a class="owl-btn prev-pk">
                  <h3>←</h3>
                </a>
                <a class="owl-btn next-pk">
                  <h3>→</h3>
                </a>
              </div>
            </div>
          </div>
          <div class="prakicu-kota-besar-bg">
            <div class="owl-prakicu-kota">
              <?php
              // getcard('bojonegoro');
              // getcard('lamongan');
              echo tuban();
              echo lamongan();
              echo bojonegoro();
              ?>
            </div>
          </div>
        </div>

        <div class="peringatan-dini-home owl-carousel-v1 md-margin-bottom-20">
          <div class="clearfix">
            <div class="peringatan-dini-home-head col-md-2 no-padding">
              <h4><span></span>Peringatan Dini </h4>
            </div>
            <div class="peringatan-dini-home-bg col-md-10">
              <div class="owl-peringatan-dini">
                <?php
                $datagemlombangdini = gelombangdini();
                foreach ($datagemlombangdini['data'] as $gelombangdata) {
                  echo "<div><strong>".$gelombangdata['time_desc']." | ".$datagemlombangdini['name']."</strong>".$gelombangdata['warning_desc']."<a class='moree'></a> <a class='link-block' href='cuaca/prakiraan-cuaca-indonesia.bmkg?Prov=27&NamaProv=Sulawesi Barat'></a></div>";
                }
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4 md-margin-bottom-10">

        <div class="headline">
          <h4>Gempabumi Terkini</h4>
        </div>
        <?php
        $getgempaterkini = json_decode(getgempaterkini(), true);
        // {"Tanggal":"19 Okt 2021","Jam":"20:03:38 WIB","DateTime":"2021-10-19T13:03:38+00:00","point":{"coordinates":"-3.82,135.84"},"Lintang":"3.82 LS","Bujur":"135.84 BT","Magnitude":"4.6","Kedalaman":"4 km","Wilayah":"Pusat gempa berada di darat 26 km baratlaut Dogiyai","Potensi":"Gempa ini dirasakan untuk diteruskan pada masyarakat","Dirasakan":"II Nabire","Shakemap":"20211019200338.mmi.jpg"}
        ?>
        <div class="gempabumi-home-bg margin-top-13">
          <div class="row">
            <div class="col-md-6 col-xs-6">
              <a href="https://ews.bmkg.go.id/tews/data/<?= $getgempaterkini['Shakemap']; ?>" class="fancybox img-hover-v1" rel="gallery1" title="Gempabumi Terkini">
                <img class="img-responsive" src="https://ews.bmkg.go.id/tews/data/<?= $getgempaterkini['Shakemap']; ?>" alt="">
              </a>
            </div>
            <div class="col-md-6 col-xs-6 gempabumi-detail no-padding">
              <ul class="list-unstyled">
                <li><span class="waktu"><?= $getgempaterkini['Tanggal']; ?> , <?= $getgempaterkini['Jam']; ?></li>
                  <li><span class="ic magnitude"></span><?= $getgempaterkini['Magnitude']; ?></li>
                  <li><span class="ic kedalaman"></span><?= $getgempaterkini['Kedalaman']; ?></li>
                  <li><span class="ic koordinat"></span><?= $getgempaterkini['Lintang'] . " - " . $getgempaterkini['Bujur']; ?></li>
                  <li><span class="ic lokasi"></span><?= $getgempaterkini['Wilayah']; ?></li>
                  <li><span class="ic dirasakan"></span>Dirasakan (Skala MMI): <?= $getgempaterkini['Dirasakan']; ?></li>
                  <li><a class="more" href="./gempabumi.php">Selengkapnya →</a></li>
                </ul>
              </div>
            </div>
            <ul class="list-unstyled gempabumi-detail no-bot">
              <li><span class="ic lokasi"></span><?= $getgempaterkini['Wilayah']; ?></li>
              <li><span class="ic dirasakan"></span>Dirasakan (Skala MMI): <?= $getgempaterkini['Dirasakan']; ?></li>
              <li><a class="more" href="./gempabumi.php">Selengkapnya →</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="berita-press-release">
    <div class="container">
      <div class="row">
        <div class="berita-utama-home col-md-8 md-margin-bottom-20">
          <div class="headline">
            <h4>Berita</h4>
          </div>

          <div class="berita-utama-home margin-bottom-30">
            <div class="master-slider ms-skin-black-2 round-skin" id="masterslider">

              <div class="ms-slide blog-slider">
                <img src="asset/plugins/master-slider/masterslider/style/blank.gif" data-src="https://cdn.bmkg.go.id/Web/IMG_9772.jpg" />
                <div class="ms-info"></div>
                <div class="blog-slider-title">
                  <span class="blog-slider-posted">13 Okt 2021</span>
                  <h2><a href="berita/?p=bimtek-penguatan-pelaksanaan-rb-bmkg&lang=ID">Bimtek Penguatan Pelaksanaan RB BMKG</a></h2>
                </div>
                <div class="ms-thumb">
                  <p>Bimtek Penguatan Pelaksanaan RB BMKG</p>
                </div>
              </div>
              <div class="ms-slide blog-slider">
                <img src="asset/plugins/master-slider/masterslider/style/blank.gif" data-src="https://cdn.bmkg.go.id/Web/bandicam-2021-10-12-09-11-19-145.jpg" />
                <div class="ms-info"></div>
                <div class="blog-slider-title">
                  <span class="blog-slider-posted">13 Okt 2021</span>
                  <h2><a href="berita/?p=perkuat-sistem-peringatan-dini-tsunami-inacbt-bisa-diintegrasikan-ke-sistem-inatews&lang=ID">Perkuat Sistem Peringatan Dini Tsunami, InaCBT Bisa Diintegrasikan ke Sistem InaTEWS</a></h2>
                </div>
                <div class="ms-thumb">
                  <p>Perkuat Sistem Peringatan Dini Tsunami, InaCBT Bisa Diintegrasikan ke Sistem InaTEWS</p>
                </div>
              </div>
              <div class="ms-slide blog-slider">
                <img src="asset/plugins/master-slider/masterslider/style/blank.gif" data-src="https://cdn.bmkg.go.id/Web/IMG_5628-1.jpg" />
                <div class="ms-info"></div>
                <div class="blog-slider-title">
                  <span class="blog-slider-posted">12 Okt 2021</span>
                  <h2><a href="berita/?p=perkuat-kerjasama-pemanfaatan-data-geospasial-kepala-bmkg-terima-kunjungan-kepala-big&lang=ID">Perkuat Kerja Sama Pemanfaatan Data Geospasial, Kepala BMKG Terima Kunjungan Kepala BIG</a></h2>
                </div>
                <div class="ms-thumb">
                  <p>Perkuat Kerja Sama Pemanfaatan Data Geospasial, Kepala BMKG Terima Kunjungan Kepala BIG</p>
                </div>
              </div>
              <div class="ms-slide blog-slider">
                <img src="asset/plugins/master-slider/masterslider/style/blank.gif" data-src="https://cdn.bmkg.go.id/Web/IMG_5122.jpg" />
                <div class="ms-info"></div>
                <div class="blog-slider-title">
                  <span class="blog-slider-posted">08 Okt 2021</span>
                  <h2><a href="berita/?p=bmkg-himbau-nelayan-trenggalek-jadikan-info-bmkg-sebagai-acuan-untuk-melaut&lang=ID">BMKG Himbau Nelayan Trenggalek Jadikan Info BMKG Sebagai Acuan untuk Melaut</a></h2>
                </div>
                <div class="ms-thumb">
                  <p>BMKG Himbau Nelayan Trenggalek Jadikan Info BMKG Sebagai Acuan untuk Melaut</p>
                </div>
              </div>
              <div class="ms-slide blog-slider">
                <img src="asset/plugins/master-slider/masterslider/style/blank.gif" data-src="https://cdn.bmkg.go.id/Web/WhatsApp-Image-2021-10-07-at-09.40.18.jpeg" />
                <div class="ms-info"></div>
                <div class="blog-slider-title">
                  <span class="blog-slider-posted">08 Okt 2021</span>
                  <h2><a href="berita/?p=bmkg-gencarkan-sosialisasi-mitigasi-bencana-dan-ajak-masyarakat-tangkal-berita-bohong&lang=ID">BMKG Gencarkan Sosialisasi Mitigasi Bencana dan Ajak Masyarakat Tangkal Berita Bohong</a></h2>
                </div>
                <div class="ms-thumb">
                  <p>BMKG Gencarkan Sosialisasi Mitigasi Bencana dan Ajak Masyarakat Tangkal Berita Bohong</p>
                </div>
              </div>
              <div class="ms-slide blog-slider">
                <img src="asset/plugins/master-slider/masterslider/style/blank.gif" data-src="https://cdn.bmkg.go.id/Web/IMG_4482.jpg" />
                <div class="ms-info"></div>
                <div class="blog-slider-title">
                  <span class="blog-slider-posted">06 Okt 2021</span>
                  <h2><a href="berita/?p=antisipasi-potensi-tsunami-di-selatan-pulau-jawa-bmkg-luncurkan-aplikasi-sirita-ews-radio-broadcster&lang=ID">Antisipasi Potensi Tsunami di Selatan Pulau Jawa, BMKG Luncurkan Aplikasi SIRITA-EWS Radio Broadcaster</a></h2>
                </div>
                <div class="ms-thumb">
                  <p>Antisipasi Potensi Tsunami di Selatan Pulau Jawa, BMKG Luncurkan Aplikasi SIRITA-EWS Radio Broadcaster</p>
                </div>
              </div>
            </div>
          </div>
          <a href="https://www.bmkg.go.id/cuaca/prakiraan-pon-indonesia.bmkg" target="_blank">
            <!--
            <a href="/gempabumi/panduan-evakuasi-gempa-tsunami-situasi-covid19.bmkg" target="_blank">-->
            <!--<img class="img-responsive" data-original="https://www.bmkg.go.id/asset/img/banner/banner-posko-monitoring-2021.png" alt="">-->
            <!--<img class="img-responsive" data-original="https://www.bmkg.go.id/asset/img/banner/banner_panduan-evakuasi-gempa-tsunami-di-situasi-covid-19.jpg" alt="">-->
            <img class="img-responsive" data-original="https://www.bmkg.go.id/asset/img/banner/PON-XX-2021.jpg" alt="">
          </a>

        </div>

        <div class="col-md-4 md-margin-bottom-10">
          <div class="headline">
            <h4>Siaran Pers & Publikasi</h4>
          </div>

          <div class="press-release-home-bg margin-bottom-20">
            <div class="blog-thumb margin-bottom-20">
              <div class="blog-thumb-mkg">
                <img src="https://cdn.bmkg.go.id/Web/WhatsApp-Image-2021-10-16-at-10.16.26-250x150.jpeg" alt="">
              </div>
              <div class="blog-thumb-desc">
                <h3><a href="/press-release/?p=tidak-benar-gelombang-panas-sedang-terjadi-di-indonesia-bmkg-meminta-masyarakat-tidak-panik-dan-tetap-waspada&tag=press-release&lang=ID">Tidak Benar Gelombang Panas Sedang Terjadi di Indonesia, BMKG Meminta Masyarakat Tidak Panik dan Tetap Waspada</a></h3>
                <ul class="blog-thumb-info">
                  <li>16 Okt 2021</li>
                </ul>
              </div>
            </div>

            <div class="blog-thumb margin-bottom-20">
              <div class="blog-thumb-mkg">
                <img src="https://cdn.bmkg.go.id/Web/WhatsApp-Image-2021-10-16-at-00.02.51-250x150.jpeg" alt="">
              </div>
              <div class="blog-thumb-desc">
                <h3><a href="/press-release/?p=perkuat-sistem-peringatan-dini-tsunami-bmkg-badan-geologi-kementerian-esdm-intensifkan-pertukaran-data-dan-informasi&tag=press-release&lang=ID">Perkuat Sistem Peringatan Dini Tsunami, BMKG-Badan Geologi Kementerian ESDM Intensifkan Pertukaran Data Dan Informasi</a></h3>
                <ul class="blog-thumb-info">
                  <li>16 Okt 2021</li>
                </ul>
              </div>
            </div>

            <div class="blog-thumb margin-bottom-20">
              <div class="blog-thumb-mkg">
                <img src="https://cdn.bmkg.go.id/Web/bandicam-2021-10-12-08-43-32-894-250x150.jpg" alt="">
              </div>
              <div class="blog-thumb-desc">
                <h3><a href="/press-release/?p=sambut-postitif-kehadiran-inacbt-kepala-bmkg-memperkuat-sistem-peringatan-dini-tsunami&tag=press-release&lang=ID">Sambut Positif Kehadiran InaCBT, Kepala BMKG: Memperkuat Sistem Peringatan Dini Tsunami</a></h3>
                <ul class="blog-thumb-info">
                  <li>12 Okt 2021</li>
                </ul>
              </div>
            </div>

            <div class="blog-thumb margin-bottom-20">
              <div class="blog-thumb-mkg">
                <img src="https://cdn.bmkg.go.id/Web/WhatsApp-Image-2021-10-10-at-09.37.52-250x150.jpeg" alt="">
              </div>
              <div class="blog-thumb-desc">
                <h3><a href="/press-release/?p=udara-jateng-diy-semakin-panas-ini-penyebabnya&tag=press-release&lang=ID">Udara Jateng-DIY Semakin Panas, Ini Penyebabnya</a></h3>
                <ul class="blog-thumb-info">
                  <li>10 Okt 2021</li>
                </ul>
              </div>
            </div>

          </div>
          <!--<a href="../rakorbangnas">
          <img class="img-responsive md-margin-bottom-30" data-original="https://bmkg.go.id/asset/img/banner/Rakorbangnas-BMKG-2021.jpg" alt="">
        </a>-->

        <!-- include file="includes/depan-section-banner-layanan.bmkg" -->
      </div>
    </div>
  </div>
</section>
<section id="klimatologi">
  <div class="container">
    <div class="row margin-bottom-30 md-margin-bottom-10">
      <div class="col-md-6 md-margin-bottom-20">
        <div class="kualitas-udara-home no-space-carousel-block owl-carousel-v1 owl-work-v1">
          <div class="headline">
            <h4 class="pull-left">Kualitas Udara</h4>
            <div class="owl-navigation">
              <div class="customNavigation">
                <a class="owl-btn prev-ku"><i class="fa fa-angle-left"></i></a>
                <a class="owl-btn next-ku"><i class="fa fa-angle-right"></i></a>
              </div>
            </div>
          </div>
          <div class="kualitas-udara-home-bg">
            <div class="owl-kualitas-udara">
              <div class="ku-chart col-width-full CIBEUREUM">
                <div class="ku-in">
                  <h3 class="heading-xs">Cibeureum<br />PM<sub>10</sub></h3>
                  <div class="circle margin-bottom-20" id="CIBEUREUM"></div>
                  <p><a class="link-block" href="/kualitas-udara/informasi-partikulat-pm10.bmkg">Baik</a></p>

                </div>
              </div>

              <div class="ku-chart col-width-full MEDAN">
                <div class="ku-in">
                  <h3 class="heading-xs">Medan<br />PM<sub>10</sub></h3>
                  <div class="circle margin-bottom-20" id="MEDAN"></div>
                  <p><a class="link-block" href="/kualitas-udara/informasi-partikulat-pm10.bmkg">Sedang</a></p>

                </div>
              </div>

              <div class="ku-chart col-width-full MUARATEWEH">
                <div class="ku-in">
                  <h3 class="heading-xs">Muarateweh<br />PM<sub>10</sub></h3>
                  <div class="circle margin-bottom-20" id="MUARATEWEH"></div>
                  <p><a class="link-block" href="/kualitas-udara/informasi-partikulat-pm10.bmkg">Baik</a></p>

                </div>
              </div>

              <div class="ku-chart col-width-full PALANGKARAYA">
                <div class="ku-in">
                  <h3 class="heading-xs">Palangkaraya<br />PM<sub>10</sub></h3>
                  <div class="circle margin-bottom-20" id="PALANGKARAYA"></div>
                  <p><a class="link-block" href="/kualitas-udara/informasi-partikulat-pm10.bmkg">Baik</a></p>

                </div>
              </div>

              <div class="ku-chart col-width-full PALEMBANG">
                <div class="ku-in">
                  <h3 class="heading-xs">Palembang<br />PM<sub>10</sub></h3>
                  <div class="circle margin-bottom-20" id="PALEMBANG"></div>
                  <p><a class="link-block" href="/kualitas-udara/informasi-partikulat-pm10.bmkg">Baik</a></p>

                </div>
              </div>

              <div class="ku-chart col-width-full JAMBI3">
                <div class="ku-in">
                  <h3 class="heading-xs">Jambi3<br />PM<sub>2.5</sub></h3>
                  <div class="circle margin-bottom-20" id="JAMBI3"></div>
                  <p><a class="link-block" href="/kualitas-udara/informasi-partikulat-pm25.bmkg">Sedang</a></p>

                </div>
              </div>

              <div class="ku-chart col-width-full JAMBI4">
                <div class="ku-in">
                  <h3 class="heading-xs">Jambi4<br />PM<sub>2.5</sub></h3>
                  <div class="circle margin-bottom-20" id="JAMBI4"></div>
                  <p><a class="link-block" href="/kualitas-udara/informasi-partikulat-pm25.bmkg">Baik</a></p>

                </div>
              </div>

              <div class="ku-chart col-width-full KEMAYORAN2">
                <div class="ku-in">
                  <h3 class="heading-xs">Kemayoran2<br />PM<sub>2.5</sub></h3>
                  <div class="circle margin-bottom-20" id="KEMAYORAN2"></div>
                  <p><a class="link-block" href="/kualitas-udara/informasi-partikulat-pm25.bmkg">-</a></p>

                </div>
              </div>

              <div class="ku-chart col-width-full PALANGKARAYA2">
                <div class="ku-in">
                  <h3 class="heading-xs">Palangkaraya2<br />PM<sub>2.5</sub></h3>
                  <div class="circle margin-bottom-20" id="PALANGKARAYA2"></div>
                  <p><a class="link-block" href="/kualitas-udara/informasi-partikulat-pm25.bmkg">Baik</a></p>

                </div>
              </div>

              <div class="ku-chart col-width-full PALEMBANG3">
                <div class="ku-in">
                  <h3 class="heading-xs">Palembang3<br />PM<sub>2.5</sub></h3>
                  <div class="circle margin-bottom-20" id="PALEMBANG3"></div>
                  <p><a class="link-block" href="/kualitas-udara/informasi-partikulat-pm25.bmkg">Sedang</a></p>

                </div>
              </div>

              <div class="ku-chart col-width-full PEKANBARU2">
                <div class="ku-in">
                  <h3 class="heading-xs">Pekanbaru2<br />PM<sub>2.5</sub></h3>
                  <div class="circle margin-bottom-20" id="PEKANBARU2"></div>
                  <p><a class="link-block" href="/kualitas-udara/informasi-partikulat-pm25.bmkg">Baik</a></p>

                </div>
              </div>

              <div class="ku-chart col-width-full SAMARINDA2">
                <div class="ku-in">
                  <h3 class="heading-xs">Samarinda2<br />PM<sub>2.5</sub></h3>
                  <div class="circle margin-bottom-20" id="SAMARINDA2"></div>
                  <p><a class="link-block" href="/kualitas-udara/informasi-partikulat-pm25.bmkg">Baik</a></p>

                </div>
              </div>

              <div class="ku-chart col-width-full TANJUNGHARAPAN2">
                <div class="ku-in">
                  <h3 class="heading-xs">Tanjungharapan2<br />PM<sub>2.5</sub></h3>
                  <div class="circle margin-bottom-20" id="TANJUNGHARAPAN2"></div>
                  <p><a class="link-block" href="/kualitas-udara/informasi-partikulat-pm25.bmkg">Sedang</a></p>

                </div>
              </div>

            </div>
            <ul class="ku-legend">
              <li><small>Baik</small></li>
              <li><small>Sedang</small></li>
              <li><small>Tidak Sehat</small></li>
              <li><small>Sangat Tidak Sehat</small></li>
              <li><small>Berbahaya</small></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 md-margin-bottom-20">
        <div class="headline">
          <h4>Informasi Iklim</h4>
        </div>
        <div class="img-mkg-home-bg">
          <a href="https://cdn.bmkg.go.id/DataMKG/CEWS/pch/pch.bulan.1.cond1.png" class="fancybox img-hover-v1" rel="gallery" title="Informasi Ikilim">
            <img class="img-responsive" data-original="https://cdn.bmkg.go.id/DataMKG/CEWS/pch/pch.bulan.1.cond1.png" alt="Informasi Ikilim">
          </a>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 md-margin-bottom-20">
        <div class="headline">
          <h4>Hari Tanpa Hujan</h4>
        </div>
        <div class="img-mkg-home-bg">
          <a href="https://cdn.bmkg.go.id/DataMKG/CEWS/hth/PetaMonitoringHariTanpaHujan-Indonesia.jpg?id=92920ymygfa0kkmr796i2kq" class="fancybox img-hover-v1" rel="gallery" title="Hari Tanpa Hujan">
            <img class="img-responsive" data-original="https://cdn.bmkg.go.id/DataMKG/CEWS/hth/PetaMonitoringHariTanpaHujan-Indonesia.jpg?id=92920ymygfa0kkmr796i2kq" alt="Hari Tanpa Hujan">
          </a>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-3 col-sm-6 md-margin-bottom-20">
        <div class="headline">
          <h4>Citra Satelit</h4>
        </div>
        <div class="img-mkg-home-bg">
          <a href="https://inderaja.bmkg.go.id/IMAGE/HIMA/H08_EH_Jatim.png" class="fancybox img-hover-v1" rel="gallery" title="Citra Satelit">
            <img class="img-responsive" data-original="https://inderaja.bmkg.go.id/IMAGE/HIMA/H08_EH_Jatim.png" alt="Citra Satelit">
          </a>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 md-margin-bottom-20">
        <div class="headline">
          <h4>Prakiraan Tinggi Gelombang Maksimum</h4>
        </div>
        <div class="img-mkg-home-bg">
          <a href="https://peta-maritim.bmkg.go.id/render-static/w3g/2021/10/2021101912/surabaya/mwh_<?=date("Ymd");?>03.png" class="fancybox img-hover-v1" rel="gallery" title="Prakiraan Tinggi Gelombang">
            <img class="img-responsive" data-original="https://peta-maritim.bmkg.go.id/render-static/w3g/2021/10/2021101912/surabaya/mwh_<?=date("Ymd");?>03.png" alt="Prakiraan Tinggi Gelombang">
          </a>
        </div>
      </div>
      <div class="clearfix visible-sm"></div>
      <div class="col-md-3 col-sm-6 md-margin-bottom-10">
        <div class="headline">
          <h4>Prakiraan Angin</h4>
        </div>
        <div class="img-mkg-home-bg">
          <a href="https://cdn.bmkg.go.id/DataMKG/MEWS/angin/streamline_d1.jpg" class="fancybox img-hover-v1" rel="gallery" title="Prakiraan Angin">
            <img class="img-responsive" data-original="https://cdn.bmkg.go.id/DataMKG/MEWS/angin/streamline_d1.jpg" alt="Prakiraan Angin">
          </a>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 md-margin-bottom-10">
        <div class="headline">
          <h4>Potensi Kebakaran Hutan</h4>
        </div>
        <div class="img-mkg-home-bg">
          <a href="https://cdn.bmkg.go.id/DataMKG/MEWS/spartan/36_indonesia_ffmc_01.png" class="fancybox img-hover-v1" rel="gallery" title="Potensi Kebakaran Hutan">
            <img class="img-responsive" data-original="https://cdn.bmkg.go.id/DataMKG/MEWS/spartan/36_indonesia_ffmc_01.png" alt="Potensi Kebakaran Hutan">
          </a>
        </div>
      </div>
    </div>
  </div>
</section>


<section id="partner" class="margin-bottom-30">
  <div class="container">
    <div class="row">
      <div class="col-xs-12md-margin-bottom-20">
        <div class="banner-layanan-home owl-carousel-v1">
          <div class="owl-banner-layanan">
            <!--<div class="col-md-12">
            <a href="#">
            <img class="img-responsive" src="https://www.bmkg.go.id/asset/img/banner/bersatu-lawan-terorisme.jpg" alt="Bersatu Lawan Terorisme">
          </a>
        </div>-->
        <div class="col-md-12">
          <a href="https://www.wmo.int/" target="_blank">
            <img class="img-responsive" src="https://www.bmkg.go.id/asset/img/banner/banner-wmo.jpg" alt="WMO">
          </a>
        </div>
        <div class="col-md-12">
          <a href="http://epengawasan.bmkg.go.id/wbs/" target="_blank">
            <img class="img-responsive" src="https://www.bmkg.go.id/asset/img/banner/banner-epengawasan.jpg" alt="E-Pengawasan">
          </a>
        </div>
        <div class="col-md-12">
          <a href="https://www.lapor.go.id/" target="_blank">
            <img class="img-responsive" src="https://www.bmkg.go.id/asset/img/banner/Lapor-UKP4.jpg" alt="LAPOR!">
          </a>
        </div>
        <div class="col-md-12">
          <a href="https://www.bmkg.go.id/rb" target="_blank">
            <img class="img-responsive" src="https://www.bmkg.go.id/asset/img/banner/banner-reformasi-birokrasi.jpg" alt="Reformasi Birokrasi BMKG">
          </a>
        </div>
        <div class="col-md-12">
          <a href="https://www.bmkg.go.id/profil/?p=stop-pungli-bmkg" target="_blank">
            <img class="img-responsive" src="https://www.bmkg.go.id/asset/img/banner/saber-pungli.jpg" alt="Saber Pungli">
          </a>
        </div>
        <div class="col-md-12">
          <a href="http://dataonline.bmkg.go.id/home" target="_blank">
            <img class="img-responsive" src="https://www.bmkg.go.id/asset/img/banner/banner_data_online.jpg" alt="Data Online">
          </a>
        </div>
        <div class="col-md-12">
          <a href="http://puslitbang.bmkg.go.id/jmg" target="_blank">
            <img class="img-responsive" src="https://www.bmkg.go.id/asset/img/banner/banner-journalMG.jpg" alt="Jurnal Meteorologi dan Geofisika">
          </a>
        </div>
        <div class="col-md-12">
          <a href="http://inatews.bmkg.go.id/new/query_gmpqc.php" target="_blank">
            <img class="img-responsive" src="https://www.bmkg.go.id/asset/img/banner/dataGempa.jpg" alt="Data Gempabumi">
          </a>
        </div>
        <div class="col-md-12">
          <a href="https://www.bmkg.go.id/geofisika-potensial/kalkulator-magnet-bumi.bmkg" target="_blank">
            <img class="img-responsive" src="https://www.bmkg.go.id/asset/img/banner/kalkulator-magnet.jpg" alt="Kalkulator Magnet Bumi">
          </a>
        </div>
        <div class="col-md-12">
          <a href="#">
            <img class="img-responsive" src="https://www.bmkg.go.id/asset/img/banner/mottobmkg.jpg" alt="Motto BMKG">
          </a>
        </div>
        <div class="col-md-12">
          <a href="https://www.bmkg.go.id/profil/?p=maklumat-pelayanan">
            <img class="img-responsive" src="https://www.bmkg.go.id/asset/img/banner/maklumatpelayanan.jpg" alt="Maklumat Pelayanan">
          </a>
        </div>
        <div class="col-md-12">
          <a href="http://lpse.bmkg.go.id" target="_blank">
            <img class="img-responsive" src="https://www.bmkg.go.id/asset/img/banner/lpse.jpg" alt="LPSE">
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</section>
<?php
include "./partial_/footer.php";
?>
