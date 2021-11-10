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
            <li class="dropdown mega-menu-fullwidth">
              <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                Profil
              </a>
              <ul class="dropdown-menu">
                <li>
                  <div class="mega-menu-content">
                    <div class="container">
                      <div class="row">
                          <ul class="dropdown-link-list">
                            <li><a href="profil/?p=visi-misi">Visi dan Misi</a></li>
                            <li><a href="profil/?p=logo-bmkg">SDM</a></li>
                            <li><a href="profil/sumber-daya-manusia.bmkg">Struktur Organisasi</a></li>
                          </ul>
                      </div>
                    </div>
                  </div>
                </li>
              </ul>
            </li>
            <li class="dropdown mega-menu-fullwidth">
              <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                Prakiraan
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
                Pelayanan Data
              </a>
              <ul class="dropdown-menu">
                <li><a href="profil/?p=visi-misi">Katalog Pelayanan</a></li>
                <li><a href="profil/?p=logo-bmkg">Pelayanan Data PNBP</a></li>
                <li><a href="profil/sumber-daya-manusia.bmkg">Pelayanan Data 0 Rupiah</a></li>
                <li><a href="profil/sumber-daya-manusia.bmkg">Survey IKM</a></li>
              </ul>
            </li>
            <li class="dropdown mega-menu-fullwidth">
              <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                Informasi Meteorologi
              </a>
              <ul class="dropdown-menu">
                <li><a href="profil/?p=visi-misi">Curah Hujan</a></li>
                <li><a href="profil/?p=logo-bmkg">Penyinaran Matahari</a></li>
                <li><a href="profil/sumber-daya-manusia.bmkg">Suhu Udara</a></li>
                <li><a href="profil/sumber-daya-manusia.bmkg">Kelembaban Udara</a></li>
                <li><a href="profil/sumber-daya-manusia.bmkg">Tekanan Udara (QFE)</a></li>
                <li><a href="profil/sumber-daya-manusia.bmkg">Penguapan</a></li>
              </ul>
            </li>
            <li class="dropdown mega-menu-fullwidth">
              <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                Berita
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
