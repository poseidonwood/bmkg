<div class="header-v8 header-sticky">
  <div class="blog-topbar">
    <div class="topbar-search-block">
      <div class="container">
        <form action="">
          <input type="text" class="form-control" placeholder="Pencarian...">
          <div class="search-close"><i class="icon-close"></i></div>
        </form>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-sm-4 col-xs-12">
          <!--<i class="fa fa-search search-btn pull-right hidden-sm hidden-md hidden-lg"></i>-->
          <div class="pull-right topbar-time bahasa hidden-sm hidden-md hidden-lg">
            <a class="active" href="?lang=ID"><span class="id"></span>ID</a>
            <a href="?lang=EN"><span class="en"></span>EN</a>
          </div>
          <div class="topbar-time hari-digit hidden-xs"><?= tanggal_indo(date('Y-m-d'), true); ?></div>
          <div class="topbar-toggler"><span class="fa fa-angle-down"></span></div>
          <ul class="topbar-list topbar-menu">
            <li class="hidden-sm hidden-md hidden-lg hari-digit"><?= tanggal_indo(date('Y-m-d'), true); ?></li>
            <li class="hidden-sm hidden-md hidden-lg" id="timecontainer1"></li>
            <script type="text/javascript">
            new showLocalTime("timecontainer1", "server-asp", 0, "short")
            </script>
          </ul>
        </div>
        <div class="col-sm-8 col-xs-12 clearfix">
          <!--<i class="fa fa-search search-btn pull-right hidden-xs"></i>-->
          <div id="timecontainer" class="topbar-time pull-right hidden-xs"></div>
          <script type="text/javascript">
          new showLocalTime("timecontainer", "server-asp", 0, "short")
          </script>
        </div>
      </div>
    </div>
  </div>

  <div class="navbar mega-menu" role="navigation">
    <div class="container">
      <div class="res-container">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>

        <div class="navbar-brand">
          <a href="/?lang=ID">
            <img src="https://bmkg.go.id/asset/img/logo/logo-bmkg.png" alt="Logo">
            <span class="hidden-xs hidden-md">Stasiun Meteorologi Tuban</span>
          </a>
          <span class="hidden-xs hidden-md slogan">Cepat, Tepat, Akurat, Luas, dan Mudah Dipahami</span>
        </div>
      </div>
      <div class="collapse navbar-collapse navbar-responsive-collapse">
        <div class="res-container">
          <ul class="nav navbar-nav">
            <li class="dropdown mega-menu-fullwidth home">
              <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                Profil
              </a>
              <ul class="dropdown-menu">
                <li><a href="profil/?p=visi-misi">Visi dan Misi</a></li>
                <li><a href="profil/?p=logo-bmkg">SDM</a></li>
                <li><a href="profil/sumber-daya-manusia.bmkg">Struktur Organisasi</a></li>
              </ul>
            </li>
            <li class="dropdown mega-menu-fullwidth">
              <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                Cuaca
              </a>
              <ul class="dropdown-menu">
                <li>
                  <div class="mega-menu-content">
                    <div class="container">
                      <div class="row">
                        <div class="col-md-4 md-margin-bottom-30">
                          <h2>Prakiraan Cuaca</h2>
                          <ul class="dropdown-link-list">
                            <li><a href="cuaca/prakiraan-cuaca-dunia.bmkg">Prakiraan Cuaca Kab. Tuban</a></li>
                            <li><a href="cuaca/prakiraan-cuaca-indonesia.bmkg">Prakiraan Cuaca Kab. Lamongan</a></li>
                            <li><a href="cuaca/prakiraan-cuaca-indonesia.bmkg?Prov=07&NamaProv=DKI%20Jakarta">Prakiraan Cuaca Kab. Bojonegoro</a></li>
                            <li>
                              <hr>
                            </li>
                          </ul>

                        </div>
                        <div class="col-md-4 md-margin-bottom-30">
                          <h2>PRAKIRAAN MARITIM</h2>
                          <ul class="dropdown-link-list">
                            <li><a href="cuaca/ikhtisar-cuaca-harian.bmkg">Perairan Tuban-Lamongan</a></li>
                            <li><a href="cuaca/prakiraan-cuaca-tigaharian.bmkg">Laut Jawa Bag. Selatan Bawean</a></li>
                            <li><a href="cuaca/prakiraan-cuaca-mingguan.bmkg">Informasi Pasang Surut Wilayah Tuban</a></li>
                          </ul>
                        </div>
                        <div class="col-md-4 md-margin-bottom-30">
                          <h2>PRAKIRAAN IKLIM</h2>
                          <ul class="dropdown-link-list">
                            <li><a href="cuaca/cuaca-aktual-bandara.bmkg">Prakiraan Musim Kemarau</a></li>
                            <li><a href="cuaca/prakiraan-cuaca-bandara.bmkg">Prakiraan Musim Hujan</a></li>
                            <li>
                              <hr>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
              </ul>
            </li>

            <li class="dropdown mega-menu-fullwidth">
              <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                Iklim
              </a>
              <ul class="dropdown-menu">
                <li>
                  <div class="mega-menu-content">
                    <div class="container">
                      <div class="row">
                        <div class="col-md-3 md-margin-bottom-30">
                          <h2>Prakiraan Iklim</h2>
                          <ul class="dropdown-link-list">
                            <li><a href="iklim/prakiraan-hujan-bulanan.bmkg">Prakiraan Hujan Bulanan</a></li>
                            <li><a href="iklim/prakiraan-hujan-dasarian.bmkg">Prakiraan Hujan Dasarian</a></li>
                            <li><a href="iklim/prakiraan-musim.bmkg">Prakiraan Musim</a></li>
                            <li><a href="iklim/potensi-banjir.bmkg">Potensi Banjir Bulanan</a></li>
                            <li><a href="iklim/potensi-banjir-dasarian.bmkg">Potensi Banjir Dasarian</a></li>
                          </ul>
                        </div>

                        <div class="col-md-3 md-margin-bottom-30">
                          <h2>Analisis Iklim</h2>
                          <ul class="dropdown-link-list">
                            <li><a href="iklim/informasi-hujan-bulanan.bmkg">Informasi Hujan Bulanan</a></li>
                            <li><a href="iklim/dinamika-atmosfir.bmkg">Dinamika Atmosfer</a></li>
                            <li><a href="iklim/indeks-presipitasi-terstandarisasi.bmkg">Indeks Presipitasi Terstandarisasi</a></li>
                            <li><a href="iklim/ketersediaan-air-tanah.bmkg">Air Tersedia Bagi Tanaman (ATi)</a></li>
                          </ul>
                        </div>

                        <div class="col-md-3 md-margin-bottom-30">
                          <h2>Informasi Iklim</h2>
                          <ul class="dropdown-link-list">
                            <li><a href="http://cews.bmkg.go.id/Peta/Hari_Tanpa_Hujan.bmkg" target="_blank">Informasi Hari Tanpa Hujan</a></li>
                            <!--<li><a href="iklim/informasi-suhu-muka-laut.bmkg">Informasi Suhu Muka Laut</a></li>-->
                            <li><a href="iklim/informasi-index-elnino.bmkg">Informasi Index El Nino</a></li>
                            <!--<li><a href="iklim/informasi-temperatur-subsurface-pasifik.bmkg">Informasi Temperatur Subsurface Pasifik</a></li>-->
                            <li><a href="iklim/buletin-iklim.bmkg">Buletin Iklim</a></li>
                          </ul>
                        </div>

                        <div class="col-md-3 md-margin-bottom-30">
                          <h2>Perubahan Iklim</h2>
                          <ul class="dropdown-link-list">
                            <li><a href="iklim/?p=tren-curah-hujan">Tren Curah Hujan</a></li>
                            <li><a href="iklim/?p=tren-suhu">Tren Suhu</a></li>
                            <li><a href="iklim/perubahan-normal-curah-hujan.bmkg">Perubahan Normal Curah Hujan</a></li>
                            <li><a href="iklim/?p=ekstrem-perubahan-iklim">Ekstrem Perubahan Iklim</a></li>
                            <li><a href="iklim/?p=proyeksi-perubahan-iklim">Proyeksi Perubahan Iklim</a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
              </ul>
            </li>

            <li class="dropdown">
              <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                Kualitas Udara
              </a>
              <ul class="dropdown-menu">
                <li><a href="kualitas-udara/informasi-so2.bmkg">Informasi SO<sub>2</sub></a></li>
                <li><a href="kualitas-udara/informasi-no2.bmkg">Informasi NO<sub>2</sub></a></li>
                <li><a href="kualitas-udara/informasi-spm.bmkg">Informasi SPM</a></li>
                <li><a href="kualitas-udara/informasi-kimia-air-hujan.bmkg">Informasi Kimia Air Hujan</a></li>
                <li><a href="kualitas-udara/informasi-ozon.bmkg">Informasi Ozon (O3)</a></li>
                <li><a href="kualitas-udara/?p=gas-rumah-kaca">Informasi Gas Rumah Kaca</a></li>
                <li><a href="kualitas-udara/informasi-partikulat-pm10.bmkg">Informasi Partikulat (PM<sub>10</sub>)</a></li>
                <li><a href="kualitas-udara/informasi-partikulat-pm25.bmkg">Informasi Partikulat (PM<sub>2.5</sub>)</a></li>
                <!--<li><a href="kualitas-udara/informasi-partikulat-tsp.bmkg">Total Suspended Particulate (TSP)</a></li>-->
              </ul>
            </li>

            <li class="dropdown mega-menu-fullwidth">
              <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                Gempabumi &amp; Tsunami
              </a>
              <ul class="dropdown-menu">
                <li>
                  <div class="mega-menu-content">
                    <div class="container">
                      <div class="row">
                        <div class="col-md-4 md-margin-bottom-30">
                          <h2>Gempabumi</h2>
                          <ul class="dropdown-link-list">
                            <li><a href="gempabumi/gempabumi-terkini.bmkg">Gempabumi Terkini (M &ge; 5.0)</a></li>
                            <li><a href="gempabumi/gempabumi-dirasakan.bmkg">Gempabumi Dirasakan</a></li>
                            <li><a href="gempabumi/antisipasi-gempabumi.bmkg">Antisipasi Gempabumi</a></li>
                            <li><a href="gempabumi/skala-intensitas-gempabumi.bmkg">Skala Intensitas Gempabumi</a></li>
                            <li><a href="gempabumi/skala-mmi.bmkg">Skala MMI</a></li>
                            <li><a href="http://repogempa.bmkg.go.id/" target="_blank">Data Gempabumi</a></li>
                            <li><a href="gempabumi/katalog-gempabumi-signifikan.bmkg">Katalog Gempabumi Signifikan</a></li>
                          </ul>
                        </div>
                        <div class="col-md-4 md-margin-bottom-30">
                          <h2>Tsunami</h2>
                          <ul class="dropdown-link-list">
                            <li><a href="tsunami">Tsunami</a></li>
                            <li>
                              <hr>
                            </li>
                          </ul>

                          <h2>Seismologi Teknik</h2>
                          <ul class="dropdown-link-list">
                            <li><a href="seismologi-teknik/">Tentang Seismologi Teknik</a></li>
                            <li><a href="seismologi-teknik/ulasan-guncangan-tanah.bmkg">Ulasan Guncangan Tanah</a></li>
                            <li><a href="seismologi-teknik/peta-isoseismal.bmkg">Peta Isoseismal</a></li>
                          </ul>
                        </div>
                        <div class="col-md-4 md-margin-bottom-30">
                          <h2>Geofisika Potensial & Tanda Waktu</h2>
                          <ul class="dropdown-link-list">
                            <li><a href="geofisika-potensial/nilai-gravitasi-indonesia.bmkg">Gaya Berat</a></li>
                            <li><a href="hilal-gerhana/">Informasi Hilal dan Gerhana</a></li>
                            <li><a href="tanda-waktu/terbit-terbenam-matahari.bmkg">Terbit Terbenam Matahari</a></li>
                            <li><a href="geofisika-potensial/magnet-bumi.bmkg">Magnet Bumi</a></li>
                            <li><a href="geofisika-potensial/kalkulator-magnet-bumi.bmkg">Kalkulator Magnet Bumi</a></li>
                            <li><a href="geofisika-potensial/peta-sambaran-petir.bmkg">Peta Sambaran Petir</a></li>
                            <li><a href="geofisika-potensial/petir.bmkg">Petir (JABODETABEK)</a></li>
                            <li><a href="tanda-waktu/?p=ebook-almanak">E-Book Almanak</a></li>
                            <li><a href="tanda-waktu/?p=ebook-peta-ketinggian-hilal">E-Book Peta Ketinggian Hilal</a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
              </ul>
            </li>

            <li class="dropdown">
              <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                IT &amp; Sarana Teknis
              </a>
              <ul class="dropdown-menu">
                <li class="dropdown-submenu">
                  <a href="javascript:void(0);">Instrumentasi, Rekayasa dan Kalibrasi</a>
                  <ul class="dropdown-menu kir">
                    <li><a href="#">Instrumentasi</a></li>
                    <li><a href="#">Peta Instrumentasi BMKG</a></li>
                    <li><a href="#">Kalibrasi</a></li>
                  </ul>
                </li>
                <li class="dropdown-submenu">
                  <a href="javascript:void(0);">Jaringan Komunikasi</a>
                  <ul class="dropdown-menu kir">
                    <li><a href="email/?p=syarat-ketentuan-pembuatan">Email BMKG</a></li>
                    <li><a href="jaringan-komunikasi/?p=layanan">Layanan Jaringan Komunikasi</a></li>
                  </ul>
                </li>
                <li class="dropdown-submenu">
                  <a href="javascript:void(0);">Database</a>
                  <ul class="dropdown-menu kir">
                    <li><a href="http://dataonline.bmkg.go.id/" target="_blank">Data Online</a></li>
                    <li><a href="database/?p=tentang-database">Tentang Database</a></li>
                    <li><a href="database/?p=alur-pengumpulan-data">Alur Pengumpulan Data</a></li>
                    <li><a href="database/?p=jenis-data">Jenis Data</a></li>
                    <li><a href="database/?p=pengetahuan">Pengetahuan</a></li>
                  </ul>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
