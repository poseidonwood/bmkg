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

  <?php
  echo "</div></div>";
  include "./partial_/sidebarpost.php";
  include "./partial_/footer.php";
  ?>
