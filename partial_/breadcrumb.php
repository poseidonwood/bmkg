<?php
$segments = explode('/', trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/'));
$numSegments = count($segments);
$currentSegment_raw = $segments[$numSegments - 1];
$currentSegment = str_replace(array("_")," ",$currentSegment_raw);

// echo 'Current Segment: ' , $currentSegment;
?>

<!-- breadcrumb -->
<div class="breadcrumbs breadcrumbs-light">
  <div class="container">
    <h1 class="pull-left"><?= strtoupper($currentSegment);?></h1>
    <ul class="pull-right breadcrumb">
      <li><a href="<?=$main_url;?>"><?= strtoupper("Beranda");?></a></li>
      <li class="active"><?=strtoupper($currentSegment);?></li>
    </ul>
  </div>
</div>
<!-- End breadcrumb -->
<div class="container content">
  <div class="row">
    <div class="col-md-8">
      <div class="blog-grid margin-bottom-30">
