
<div class="col-md-4">
  <div class="headline"><h4>Berita</h4></div>
  <div class="press-release-home-bg">
    <?php
    $siarandata = getDataByTable("post");
    if($siarandata['status'] == true){
      foreach ($siarandata['message'] as $datasiaran) {
        $created_at = strtotime($datasiaran['created_at']);
        ?>
          <div class="blog-thumb margin-bottom-20">
            <div class="blog-thumb-mkg">
              <img src="<?=$main_url."asset/images/post/".$datasiaran['thumb'];?>" >
            </div>
            <div class="blog-thumb-desc">
              <h3><a href="/press-release/?p=tidak-benar-gelombang-panas-sedang-terjadi-di-indonesia-bmkg-meminta-masyarakat-tidak-panik-dan-tetap-waspada&tag=press-release&lang=ID"><?=$datasiaran['judul'];?></a></h3>
              <ul class="blog-thumb-info">
                <li><?= date("d-m-Y",$created_at);?></li>
              </ul>
            </div>
          </div>
        <?php
      }} ?>
  </div>
</div>
