<?php
include "./partial_/header.php";
include "./partial_/navbar.php";
?>
<div class="breadcrumbs breadcrumbs-light">
  <div class="container">
    <h1 class="pull-left">Gempa Bumi</h1>
    <ul class="pull-right breadcrumb">
      <li><a href="<?=$main_url;?>">Beranda</a></li>
      <li class="active">Gempa Bumi</li>
    </ul>
  </div>
</div>

<!-- <?=var_dump(listgempadirasakan());?> -->
<div class="container content">
  <div class="row">
    <div class="col-md-8">
      <div class="blog-grid margin-bottom-30">
        <h2 class="blog-grid-title-lg"><span>Gempabumi </span>Dirasakan</h2>
        <div class="table-responsive">
          <table class="table table-hover table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th style="min-width:120px">Waktu Gempa</th>
                <th>Lintang - Bujur</th>
                <th>Magnitudo</th>
                <th>Kedalaman</th>
                <th>Dirasakan (Skala MMI)</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              foreach (json_decode(listgempadirasakan(),true) as $listgempa) {
                ?>
                <tr>
                  <td><?=$no++;?></td>
                  <td><?=$listgempa['Tanggal']." ".$listgempa['Jam'];?></td>
                  <td><?=$listgempa['Lintang']." ".$listgempa['Bujur'];?></td>
                  <td><?=$listgempa['Magnitude'];?></td>
                  <td><?=$listgempa['Kedalaman'];?></td>
                  <td><?=$listgempa['Wilayah'];?>
                    <br><span class="label label-warning"><?=$listgempa['Dirasakan'];?></span></td>
                  </tr>
                <?php }?>
              </tbody>
            </table>
          </div>

        </div>
      </div>

      <div class="col-md-4">
        <div class="headline"><h4>Info Aktual</h4></div>
        <div class="press-release-home-bg">
          <div class="blog-thumb margin-bottom-20">
            <div class="blog-thumb-mkg">
              <img data-original="https://cdn.bmkg.go.id/Web/cuaca-panas-sept-2017-250x150.jpg" alt="">
            </div>
            <div class="blog-thumb-desc">
              <h3><a href="/info-aktual/?p=penjelasan-singkat-cuaca-panas-dan-terik-dalam-beberapa-hari-terakhir&tag=info-aktual&lang=ID">Penjelasan Singkat Cuaca Panas dan Terik dalam Beberapa Hari Terakhir</a></h3>
              <ul class="blog-thumb-info">
                <li>18 Sep 2017</li>
              </ul>
            </div>
          </div>

          <div class="blog-thumb margin-bottom-20">
            <div class="blog-thumb-mkg">
              <img data-original="https://cdn.bmkg.go.id/Web/gempa-tasikmalaya-24042917-250x150.jpg" alt="">
            </div>
            <div class="blog-thumb-desc">
              <h3><a href="/info-aktual/?p=gempabumi-m50-guncang-wilayah-selatan-jawa-barat&tag=info-aktual&lang=ID">Gempabumi M=5,0 Guncang Wilayah Selatan Jawa Barat</a></h3>
              <ul class="blog-thumb-info">
                <li>24 Apr 2017</li>
              </ul>
            </div>
          </div>

          <div class="blog-thumb margin-bottom-20">
            <div class="blog-thumb-mkg">
              <img data-original="https://cdn.bmkg.go.id/Web/radar-jabodetabek-250x150.jpg" alt="">
            </div>
            <div class="blog-thumb-desc">
              <h3><a href="/info-aktual/?p=penjelasan-singkat-hujan-es&tag=info-aktual&lang=ID">Penjelasan Singkat Fenomena Hujan Es</a></h3>
              <ul class="blog-thumb-info">
                <li>28 Mar 2017</li>
              </ul>
            </div>
          </div>

          <div class="blog-thumb margin-bottom-20">
            <div class="blog-thumb-mkg">
              <img data-original="https://cdn.bmkg.go.id/Web/IMG_20161230_084426-250x150.jpg" alt="">
            </div>
            <div class="blog-thumb-desc">
              <h3><a href="/info-aktual/?p=gempabumi-kuat-m6-2-guncang-ntb-dan-ntt-tidak-berpotensi-tsunami&tag=info-aktual&lang=ID">Gempabumi Kuat M=6.2 Guncang NTB dan NTT, Tidak Berpotensi Tsunami</a></h3>
              <ul class="blog-thumb-info">
                <li>30 Des 2016</li>
              </ul>
            </div>
          </div>

        </div>

      </div>
    </div>
  </div>
  <?php
  include "./partial_/footer.php";
  ?>
