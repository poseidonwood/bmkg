<?php
include "./config/getdata.php";
include "./config/function.php";
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="id" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="id" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="id">
<!--<![endif]-->

<head>
  <title>BMKG | Stasiun Meteorologi Tuban</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Informasi prakiraan cuaca, maritim, penerbangan, iklim, kualitas udara, gempabumi, tsunami dan tanda waktu di Indonesia dengan Cepat, Tepat, Akurat, Luas, dan Mudah Dipahami">
  <meta name="keywords" content="Informasi Cuaca, Citra Satelit Cuaca, Citra Radar, Cuaca Penerbangan, Cuaca Aktual, Cuaca Maritim, Cuaca Pelayaran, Iklim, Kualitas Udara, Gempabumi, Tsunami, Tanda Waktu, Petir">
  <meta name="author" content="BMKG">

  <meta http-equiv="cache-control" content="max-age=0">
  <meta http-equiv="cache-control" content="no-cache">

  <meta property="og:type" content="website">
  <meta property="og:title" content="BMKG | Stasiun Meteorologi Tuban">
  <meta property="og:image" content="https://www.bmkg.go.id/asset/img/logo/bg_BMKG3.jpg">
  <meta property="og:description" content="Informasi prakiraan cuaca, maritim, penerbangan, iklim, kualitas udara, gempabumi, tsunami dan tanda waktu di Indonesia dengan Cepat, Tepat, Akurat, Luas, dan Mudah Dipahami">
  <meta property="og:url" content="http://www.bmkg.go.id/">

  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:site" content="@infoBMKG">
  <meta name="twitter:creator" content="@infoBMKG">
  <meta name="twitter:title" content="BMKG | Stasiun Meteorologi Tuban">
  <meta name="twitter:description" content="Informasi prakiraan cuaca, maritim, penerbangan, iklim, kualitas udara, gempabumi, tsunami dan tanda waktu di Indonesia dengan Cepat, Tepat, Akurat, Luas, dan Mudah Dipahami">
  <meta name="twitter:image" content="https://www.bmkg.go.id/asset/img/logo/bg_BMKG3.jpg">

  <meta name="apple-itunes-app" content="app-id=1114372539">
  <meta name="google-play-app" content="app-id=com.Info_BMKG">

  <link rel="shortcut icon" href="https://www.bmkg.go.id/asset/img/favicon.ico" type="image/x-icon">
  <link rel="apple-touch-icon" href="https://www.bmkg.go.id/asset/img/favicon-60@3x.png" />
  <link rel="apple-touch-icon" sizes="60x60" href="https://www.bmkg.go.id/asset/img/favicon-60.png" />
  <link rel="apple-touch-icon" sizes="120x120" href="https://www.bmkg.go.id/asset/img/favicon-60@2x.png" />
  <link rel="apple-touch-icon" sizes="180x180" href="https://www.bmkg.go.id/asset/img/favicon-60@3x.png" />
  <link rel="apple-touch-icon" sizes="76x76" href="https://www.bmkg.go.id/asset/img/favicon-76.png" />
  <link rel="apple-touch-icon" sizes="152x152" href="https://www.bmkg.go.id/asset/img/favicon-76@2x.png" />

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Slab:300,400,700|Roboto:300,300i,400,400i,700,700i">
  <link rel="stylesheet" href="https://www.bmkg.go.id/asset/plugins/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://www.bmkg.go.id/asset/plugins/fancybox/source/jquery.fancybox.min.css">
  <link rel="stylesheet" href="./asset/css/fontawesome.css">
  <link rel="stylesheet" href="https://www.bmkg.go.id/asset/css/thunderstorm.css">
  <link rel="stylesheet" href="https://www.bmkg.go.id/asset/css/thrustfault.css">

  <script type="text/javascript">
    function showLocalTime(a, b, c, d) {
      if (document.getElementById && document.getElementById(a)) {
        this.container = document.getElementById(a), this.displayversion = d;
        var e = "server-php" == b ? '<? print date("F d, Y H:i:s", time()) ?>' : "server-ssi" == b ? '<!--#config timefmt="%B %d, %Y %H:%M:%S"--><!--#echo var="DATE_LOCAL" -->' : "<?= date('m/d/Y H:i:s'); ?>";
        this.localtime = this.serverdate = new Date(e), this.localtime.setTime(this.serverdate.getTime() + 60 * c * 1e3), this.updateTime(), this.updateContainer()
      }
    }

    function formatField(a, b) {
      if ("undefined" != typeof b) {
        var c = a > 12 ? a - 12 : a;
        return 0 == c ? 12 : c
      }
      return a <= 9 ? "0" + a : a
    }
    var minggutxt = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"],
      weekdaystxt = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
      bulantxt = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
      monthstxt = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    showLocalTime.prototype.updateTime = function() {
      var a = this;
      this.localtime.setSeconds(this.localtime.getSeconds() + 1), setTimeout(function() {
        a.updateTime()
      }, 1e3)
    }, showLocalTime.prototype.updateContainer = function() {
      var a = this;
      if ("long" == this.displayversion) this.container.innerHTML = this.localtime.toLocaleString();
      else {
        var b = this.localtime.getHours(),
          c = this.localtime.getMinutes(),
          d = this.localtime.getSeconds(),
          k = (this.localtime.getDate(), this.localtime.getUTCDate(), minggutxt[this.localtime.getDay()], bulantxt[this.localtime.getMonth()], weekdaystxt[this.localtime.getUTCDay()], monthstxt[this.localtime.getUTCMonth()], b + 1);
        k >= 24 && (k -= 24);
        var l = b + 2;
        l >= 24 && (l -= 24);
        var m = b - 7;
        m < 0 && (m += 24);
        this.container.innerHTML = "<span class='hari-digit hidden-sm'><a href='https://time.bmkg.go.id/' target='_blank'>Standar Waktu Indonesia</a> </span><span class='FontDigit'>" + formatField(b) + ":" + formatField(c) + ":" + formatField(d) + " WIB / </span><span class='FontDigit'>" + formatField(m) + ":" + formatField(c) + ":" + formatField(d) + " UTC</span>"
      }
      setTimeout(function() {
        a.updateContainer()
      }, 1e3)
    };
  </script>
  <script type="text/javascript">
    if (window.top !== window.self || top != self) {
      window.top.location = window.self.location;
      top.location.replace(location);
    }
  </script>
</head>

<body class="header-fixed header-fixed-space bmkg-home">
  <div class="wrapper">
