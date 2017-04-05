/**
 * TwT 2016 Spring Single Page
 * By Zhyupe
 */

(function () {
  var specialChars = function (text) {
    return text.replace(/&/g, "&amp;")
      .replace(/</g, "&lt;")
      .replace(/>/g, "&gt;")
      .replace(/"/g, "&quot;")
      .replace(/'/g, "&#039;");
  };

  var $img = $('img');
  var $loading = $('#loading');
  var $progress = $loading.find('.progress');
  var loaded = 0;
  var p3 = $('#page-3');
  var $pages = $('#pages');
  var $objs  = $('.pa');

  var vw = 0;

  var checkLoading = function () {
    var percent = Math.round(loaded / ($img.length) * 100);
    $progress.html(percent + '%');

    if (percent == 100) {
      $('html').removeClass('loading');
      $loading.addClass('off');
      setTimeout(function () {
        $loading.hide();
      }, 800);
    }
  };

  var parseSize = function (size) {
    return parseNum(size) / 640 * vw;
  };

  var parseNum = function (num) {
    num = parseFloat(num);
    return isNaN(num) ? 0 : num;
  };

  var preparePage = function () {
    var attrs = ['top', 'left', 'right', 'bottom', 'width'];
    var onResize = function () {
      var _vw = $(window).width();
      if (vw == _vw) return;

      vw = _vw;

      var offset = 0, temp, j;
      $pages.children().each(function (i, e) {
        offset += parseSize(e.getAttribute('mp-offset'));
        temp = parseSize(e.getAttribute('mp-height'));

        $(e).css({
          top: offset + 'px',
          height: temp + 'px'
        });

        offset += temp;
      });
      $pages.css({ height: offset + 'px'});

      $objs.each(function (i, e) {
        var css = {};
        for (j = 0; j < attrs.length; j++) {
          temp = e.getAttribute('mp-' + attrs[j]);
          if (temp !== null) {
            css[attrs[j]] = parseSize(temp);
          }
        }
        $(e).css(css);
      });
    };
    $(window).on('resize', onResize);
    onResize();

    var onScroll = function () {
      var s = $(this).scrollTop();
      if (s > 50) {
        $('#arrow').hide();
      }
      if (s + $(this).height() >= p3.offset().top) {
        $(this).off('scroll');
        p3.addClass('active');
      }
    };
    $(window).on('scroll', onScroll);
    onScroll();
    $img.each(function (i, e) {
      var src = $(e).data('img');

      var image = new Image();
      image.dom = e;
      image.onload = function () {
        e.src = this.src;

        loaded++;
        checkLoading();
      };
      image.onerror = function () {
        console.log('Image loading failed: ' + this.src);
        this.onload();
      };

      image.src = src;
    });
  };

  preparePage();
})();
