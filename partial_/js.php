<script type="text/javascript" src="https://www.bmkg.go.id/asset/js/hayoo.js"></script>
<script type="text/javascript" src="https://www.bmkg.go.id/asset/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript" src="https://www.bmkg.go.id/asset/plugins/master-slider/masterslider/masterslider.min.js" defer></script>
<script type="text/javascript" src="https://www.bmkg.go.id/asset/plugins/fancybox/source/jquery.fancybox.pack.js" defer></script>
<script type="text/javascript" src="https://www.bmkg.go.id/asset/plugins/cumulonimbus.js" defer></script>
<script>
  /*elnino*/
  var App = function() {
      function a() {
        jQuery(window).scroll(function() {
          jQuery(window).scrollTop() > 100 ? jQuery(".header-fixed .header-sticky").addClass("header-fixed-shrink") : jQuery(".header-fixed .header-sticky").removeClass("header-fixed-shrink")
        })
      }

      function b() {
        $(".blog-topbar .search-btn").on("click", function() {
          jQuery(".topbar-search-block").hasClass("topbar-search-visible") ? (jQuery(".topbar-search-block").slideUp(), jQuery(".topbar-search-block").removeClass("topbar-search-visible")) : (jQuery(".topbar-search-block").slideDown(), jQuery(".topbar-search-block").addClass("topbar-search-visible"))
        }), $(".blog-topbar .search-close").on("click", function() {
          jQuery(".topbar-search-block").slideUp(), jQuery(".topbar-search-block").removeClass("topbar-search-visible")
        }), jQuery(window).scroll(function() {
          jQuery(".topbar-search-block").slideUp(), jQuery(".topbar-search-block").removeClass("topbar-search-visible")
        })
      }

      function c() {
        $(".topbar-toggler").on("click", function() {
          jQuery(".topbar-toggler").hasClass("topbar-list-visible") ? (jQuery(".topbar-menu").slideUp(), jQuery(this).removeClass("topbar-list-visible")) : (jQuery(".topbar-menu").slideDown(), jQuery(this).addClass("topbar-list-visible"))
        })
      }

      function d() {
        $(".topbar-list > li").on("click", function(a) {
          jQuery(this).children("ul").hasClass("topbar-dropdown") && (jQuery(this).children("ul").hasClass("topbar-dropdown-visible") ? (jQuery(this).children(".topbar-dropdown").slideUp(), jQuery(this).children(".topbar-dropdown").removeClass("topbar-dropdown-visible")) : (jQuery(this).children(".topbar-dropdown").slideDown(), jQuery(this).children(".topbar-dropdown").addClass("topbar-dropdown-visible")))
        })
      }

      function e() {
        $(".hoverSelector").on("hover", function(a) {
          $(".hoverSelectorBlock", this).toggleClass("show"), a.stopPropagation()
        })
      }

      function f() {
        jQuery(".carousel").carousel({
          interval: 15e3,
          pause: "hover"
        }), jQuery(".tooltips").tooltip(), jQuery(".tooltips-show").tooltip("show"), jQuery(".tooltips-hide").tooltip("hide"), jQuery(".tooltips-toggle").tooltip("toggle"), jQuery(".tooltips-destroy").tooltip("destroy"), jQuery(".popovers").popover(), jQuery(".popovers-show").popover("show"), jQuery(".popovers-hide").popover("hide"), jQuery(".popovers-toggle").popover("toggle"), jQuery(".popovers-destroy").popover("destroy")
      }
      return {
        init: function() {
          b(), c(), a(), f(), e(), d()
        },
        initScrollBar: function() {
          jQuery(".mCustomScrollbar").mCustomScrollbar({
            theme: "minimal",
            scrollInertia: 300,
            scrollEasing: "linear"
          })
        },
        initCounter: function() {
          jQuery(".counter").counterUp({
            delay: 10,
            time: 1e3
          })
        },
        initParallaxBg: function() {
          jQuery(window).load(function() {
            jQuery(".parallaxBg").parallax("50%", .2), jQuery(".parallaxBg1").parallax("50%", .4)
          })
        }
      }
    }(),
    MasterSliderShowcase3 = function() {
      return {
        initMasterSliderShowcase3: function() {
          var a = new MasterSlider;
          a.control("arrows"), a.control("circletimer", {
            color: "#fff",
            stroke: 9
          }), a.control("thumblist", {
            autohide: !1,
            dir: "h",
            type: "tabs",
            width: 187.5,
            height: 135,
            align: "bottom",
            space: 0,
            margin: -12,
            hideUnder: 992
          }), a.setup("masterslider", {
            width: 1140,
            height: 550,
            space: 0,
            speed: 10,
            preload: "all",
            view: "basic",
            autoplay: !0
          })
        }
      }
    }(),
    OwlBMKG = function() {
      return {
        initOwlPrakicuKota: function() {
          jQuery(document).ready(function() {
            var a = jQuery(".owl-prakicu-kota");
            a.owlCarousel({
              items: [5],
              itemsDesktop: [1200, 4],
              itemsDesktopSmall: [992, 3],
              itemsTablet: [600, 2],
              itemsMobile: [479, 1],
              autoPlay: 5e3
            }), jQuery(".next-pk").click(function() {
              a.trigger("owl.next")
            }), jQuery(".prev-pk").click(function() {
              a.trigger("owl.prev")
            })
          })
        },
        initOwlKualitasUdara: function() {
          jQuery(document).ready(function() {
            var a = jQuery(".owl-kualitas-udara");
            a.owlCarousel({
              items: [4],
              itemsDesktop: [1200, 3],
              itemsDesktopSmall: [992, 3],
              itemsTablet: [600, 2],
              itemsMobile: [479, 2],
              autoPlay: 5e3
            }), jQuery(".next-ku").click(function() {
              a.trigger("owl.next")
            }), jQuery(".prev-ku").click(function() {
              a.trigger("owl.prev")
            })
          })
        },
        initOwlPeringatanDini: function() {
          jQuery(document).ready(function() {
            var a = jQuery(".owl-peringatan-dini");
            a.owlCarousel({
              items: [1],
              itemsDesktop: [1200, 1],
              itemsDesktopSmall: [992, 1],
              itemsTablet: [600, 1],
              itemsMobile: [479, 1],
              autoPlay: 5e3
            })
          })
        },
        initOwlBannerLayanan: function() {
          jQuery(document).ready(function() {
            var a = jQuery(".owl-banner-layanan");
            a.owlCarousel({
              items: [5],
              itemsDesktop: [1200, 5],
              itemsDesktopSmall: [992, 3],
              itemsTablet: [600, 2],
              itemsMobile: [479, 1],
              autoPlay: 5e3
            })
          })
        }
      }
    }(),
    FancyBox = function() {
      return {
        initFancybox: function() {
          jQuery(".fancybox").fancybox({
            groupAttr: "data-rel",
            prevEffect: "fade",
            nextEffect: "fade",
            openEffect: "elastic",
            closeEffect: "fade",
            closeBtn: !0,
            helpers: {
              title: {
                type: "float"
              }
            }
          }), $(".fbox-modal").fancybox({
            maxWidth: 800,
            maxHeight: 600,
            fitToView: !1,
            width: "70%",
            height: "70%",
            autoSize: !1,
            closeClick: !1,
            closeEffect: "fade",
            openEffect: "elastic"
          })
        }
      }
    }();

  /*lazyload*/
  ! function(a, b) {
    "function" == typeof define && define.amd ? define([], b) : "object" == typeof exports ? module.exports = b() : a.LazyLoad = b()
  }(this, function() {
    function a() {
      r || (n = {
        elements_selector: "img",
        container: window,
        threshold: 300,
        throttle: 50,
        data_src: "original",
        data_srcset: "original-set",
        class_loading: "loading",
        class_loaded: "loaded",
        skip_invisible: !0,
        callback_load: null,
        callback_error: null,
        callback_set: null,
        callback_processed: null
      }, o = !!window.addEventListener, p = !!window.attachEvent, q = !!document.body.classList, r = !0)
    }

    function b(a, b, c) {
      return o ? void a.addEventListener(b, c) : void(p && (a.attachEvent("on" + b, function(a) {
        return function() {
          c.call(a, window.event)
        }
      }(a)), a = null))
    }

    function c(a, b, c) {
      return o ? void a.removeEventListener(b, c) : void(p && a.detachEvent("on" + b, c))
    }

    function d(a, b, c) {
      function d() {
        return window.innerWidth || l.documentElement.clientWidth || document.body.clientWidth
      }

      function e() {
        return window.innerHeight || l.documentElement.clientHeight || document.body.clientHeight
      }

      function f(a) {
        return a.getBoundingClientRect().top + m - l.documentElement.clientTop
      }

      function g(a) {
        return a.getBoundingClientRect().left + n - l.documentElement.clientLeft
      }

      function h() {
        var d;
        return d = b === window ? e() + m : f(b) + b.offsetHeight, d <= f(a) - c
      }

      function i() {
        var e;
        return e = b === window ? d() + window.pageXOffset : g(b) + d(), e <= g(a) - c
      }

      function j() {
        var d;
        return d = b === window ? m : f(b), d >= f(a) + c + a.offsetHeight
      }

      function k() {
        var d;
        return d = b === window ? n : g(b), d >= g(a) + c + a.offsetWidth
      }
      var l, m, n;
      return l = a.ownerDocument, m = window.pageYOffset || l.body.scrollTop, n = window.pageXOffset || l.body.scrollLeft, !(h() || j() || i() || k())
    }

    function e() {
      var a = new Date;
      return a.getTime()
    }

    function f(a, b) {
      var c, d = {};
      for (c in a) a.hasOwnProperty(c) && (d[c] = a[c]);
      for (c in b) b.hasOwnProperty(c) && (d[c] = b[c]);
      return d
    }

    function g(a) {
      try {
        return Array.prototype.slice.call(a)
      } catch (b) {
        var c, d = [],
          e = a.length;
        for (c = 0; e > c; c++) d.push(a[c]);
        return d
      }
    }

    function h(a, b) {
      return q ? void a.classList.add(b) : void(a.className += (a.className ? " " : "") + b)
    }

    function i(a, b) {
      return q ? void a.classList.remove(b) : void(a.className = a.className.replace(new RegExp("(^|\\s+)" + b + "(\\s+|$)"), " ").replace(/^\s+/, "").replace(/\s+$/, ""))
    }

    function j(a, b) {
      var c = a.parentElement;
      if ("PICTURE" === c.tagName)
        for (var d = 0; d < c.children.length; d++) {
          var e = c.children[d];
          if ("SOURCE" === e.tagName) {
            var f = e.getAttribute("data-" + b);
            f && e.setAttribute("srcset", f)
          }
        }
    }

    function k(a, b, c) {
      var d = a.tagName,
        e = a.getAttribute("data-" + c);
      if ("IMG" === d) {
        j(a, b);
        var f = a.getAttribute("data-" + b);
        return f && a.setAttribute("srcset", f), void(e && a.setAttribute("src", e))
      }
      return "IFRAME" === d ? void(e && a.setAttribute("src", e)) : void(a.style.backgroundImage = "url(" + e + ")")
    }

    function l(a, b) {
      return function() {
        return a.apply(b, arguments)
      }
    }

    function m(c) {
      a(), this._settings = f(n, c), this._queryOriginNode = this._settings.container === window ? document : this._settings.container, this._previousLoopTime = 0, this._loopTimeout = null, this._handleScrollFn = l(this.handleScroll, this), b(window, "resize", this._handleScrollFn), this.update()
    }
    var n, o, p, q, r = !1;
    return m.prototype._showOnAppear = function(a) {
      function d() {
        null !== e && (e.callback_load && e.callback_load(a), i(a, e.class_loading), h(a, e.class_loaded), c(a, "load", d))
      }
      var e = this._settings;
      ("IMG" === a.tagName || "IFRAME" === a.tagName) && (b(a, "load", d), b(a, "error", function() {
        c(a, "load", d), i(a, e.class_loading), e.callback_error && e.callback_error(a)
      }), h(a, e.class_loading)), k(a, e.data_srcset, e.data_src), e.callback_set && e.callback_set(a)
    }, m.prototype._loopThroughElements = function() {
      var a, b, c = this._settings,
        e = this._elements,
        f = e ? e.length : 0,
        g = [];
      for (a = 0; f > a; a++) b = e[a], c.skip_invisible && null === b.offsetParent || d(b, c.container, c.threshold) && (this._showOnAppear(b), g.push(a), b.wasProcessed = !0);
      for (; g.length > 0;) e.splice(g.pop(), 1), c.callback_processed && c.callback_processed(e.length);
      0 === f && this._stopScrollHandler()
    }, m.prototype._purgeElements = function() {
      var a, b, c = this._elements,
        d = c.length,
        e = [];
      for (a = 0; d > a; a++) b = c[a], b.wasProcessed && e.push(a);
      for (; e.length > 0;) c.splice(e.pop(), 1)
    }, m.prototype._startScrollHandler = function() {
      this._isHandlingScroll || (this._isHandlingScroll = !0, b(this._settings.container, "scroll", this._handleScrollFn))
    }, m.prototype._stopScrollHandler = function() {
      this._isHandlingScroll && (this._isHandlingScroll = !1, c(this._settings.container, "scroll", this._handleScrollFn))
    }, m.prototype.handleScroll = function() {
      var a, b, c;
      this._settings && (b = e(), c = this._settings.throttle, 0 !== c ? (a = c - (b - this._previousLoopTime), 0 >= a || a > c ? (this._loopTimeout && (clearTimeout(this._loopTimeout), this._loopTimeout = null), this._previousLoopTime = b, this._loopThroughElements()) : this._loopTimeout || (this._loopTimeout = setTimeout(l(function() {
        this._previousLoopTime = e(), this._loopTimeout = null, this._loopThroughElements()
      }, this), a))) : this._loopThroughElements())
    }, m.prototype.update = function() {
      this._elements = g(this._queryOriginNode.querySelectorAll(this._settings.elements_selector)), this._purgeElements(), this._loopThroughElements(), this._startScrollHandler()
    }, m.prototype.destroy = function() {
      c(window, "resize", this._handleScrollFn), this._loopTimeout && (clearTimeout(this._loopTimeout), this._loopTimeout = null), this._stopScrollHandler(), this._elements = null, this._queryOriginNode = null, this._settings = null
    }, m
  });
</script>
<script type="text/javascript">
  jQuery(document).ready(function() {
    App.init();
    App.initCounter();
    App.initParallaxBg();
    MasterSliderShowcase3.initMasterSliderShowcase3();
    OwlBMKG.initOwlKualitasUdara();
    OwlBMKG.initOwlPrakicuKota();
    OwlBMKG.initOwlPeringatanDini();
    OwlBMKG.initOwlBannerLayanan();
    FancyBox.initFancybox();
  });
  new LazyLoad();
</script>
<!--[if lt IE 9]>
	<script type="text/javascript" src="https://www.bmkg.go.id/asset/plugins/respond.min.js"></script>
	<script type="text/javascript" src="https://www.bmkg.go.id/asset/plugins/html5shiv.min.js"></script>
	<script type="text/javascript" src="https://www.bmkg.go.id/asset/plugins/placeholder-IE-fixes.min.js"></script>
<![endif]-->
<!-- </body></html> -->
<!--<script>!function(e){"use strict";e.fn.firstVisitPopup=function(t){var i,o=e("body"),n=e(this),c=function(e,t){var i=new Date,o="expires=";i.setTime(i.getTime()+31536e6),o+=i.toGMTString(),document.cookie=e+"="+t+"; "+o+"; path=/"},p=function(e){var t=document.cookie.split(";"),i=0,o="";for(i=0;i<t.length;i++){for(o=t[i];" "===o.charAt(0);)o=o.substring(1,o.length);if(0===o.indexOf(e+"="))return o.substring(e.length+1,o.length)}return!1},f=function(){i.show(),n.show()},r=function(){i.hide(),n.hide(),c("fvpp"+t.cookieName,"true")};o.append('<div id="fvpp-blackout"></div>'),n.append('<span id="fvpp-close">&#10006;</span>'),i=e("#fvpp-blackout"),p("fvpp"+t.cookieName)?r():f(),e(t.showAgainSelector).on("click",f),o.on("click","#fvpp-blackout, #fvpp-close",r)}}(jQuery);
$(function () {
	$('#popup').firstVisitPopup({
		cookieName : 'homepage-20211018'
	});
});</script>-->

<script type="text/javascript">
  jQuery(document).ready(function() {
    CirclesMaster.initCirclesMaster();
  });

  var CirclesMaster = function() {
    return {
      initCirclesMaster: function() {
        Circles.create({
          id: 'CIBEUREUM',
          percentage: 100,
          radius: 35,
          width: 7,
          number: 10.00,
          text: '',
          colors: ['#fff', '#00cc00'],
          duration: 2000
        })
        Circles.create({
          id: 'MEDAN',
          percentage: 100,
          radius: 35,
          width: 7,
          number: 82.16,
          text: '',
          colors: ['#fff', '#194cc9'],
          duration: 2000
        })
        Circles.create({
          id: 'MUARATEWEH',
          percentage: 100,
          radius: 35,
          width: 7,
          number: 35.00,
          text: '',
          colors: ['#fff', '#00cc00'],
          duration: 2000
        })
        Circles.create({
          id: 'PALANGKARAYA',
          percentage: 100,
          radius: 35,
          width: 7,
          number: 6.19,
          text: '',
          colors: ['#fff', '#00cc00'],
          duration: 2000
        })
        Circles.create({
          id: 'PALEMBANG',
          percentage: 100,
          radius: 35,
          width: 7,
          number: 49.57,
          text: '',
          colors: ['#fff', '#00cc00'],
          duration: 2000
        })
        Circles.create({
          id: 'JAMBI3',
          percentage: 100,
          radius: 35,
          width: 7,
          number: 43.40,
          text: '',
          colors: ['#fff', '#194cc9'],
          duration: 2000
        })
        Circles.create({
          id: 'JAMBI4',
          percentage: 100,
          radius: 35,
          width: 7,
          number: 14.70,
          text: '',
          colors: ['#fff', '#00cc00'],
          duration: 2000
        })
        Circles.create({
          id: 'KEMAYORAN2',
          percentage: 0,
          radius: 35,
          width: 7,
          number: 0.48,
          text: '',
          colors: ['#fff', '#00cc00'],
          duration: 2000
        })
        Circles.create({
          id: 'PALANGKARAYA2',
          percentage: 100,
          radius: 35,
          width: 7,
          number: 11.50,
          text: '',
          colors: ['#fff', '#00cc00'],
          duration: 2000
        })
        Circles.create({
          id: 'PALEMBANG3',
          percentage: 100,
          radius: 35,
          width: 7,
          number: 30.10,
          text: '',
          colors: ['#fff', '#194cc9'],
          duration: 2000
        })
        Circles.create({
          id: 'PEKANBARU2',
          percentage: 100,
          radius: 35,
          width: 7,
          number: 12.60,
          text: '',
          colors: ['#fff', '#00cc00'],
          duration: 2000
        })
        Circles.create({
          id: 'SAMARINDA2',
          percentage: 100,
          radius: 35,
          width: 7,
          number: 5.10,
          text: '',
          colors: ['#fff', '#00cc00'],
          duration: 2000
        })
        Circles.create({
          id: 'TANJUNGHARAPAN2',
          percentage: 100,
          radius: 35,
          width: 7,
          number: 27.30,
          text: '',
          colors: ['#fff', '#194cc9'],
          duration: 2000
        })
      }
    };
  }();
</script>