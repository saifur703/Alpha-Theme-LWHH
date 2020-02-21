(function($) {
  'use strict';

  jQuery(document).ready(function($) {
    var slider = tns({
      container: '.slider',
      items: 2,
      nav: false,
      controls: false,
      slideBy: 'page',
      autoplay: true,
      mouseDrag: true,
      autoplayButtonOutput: false
    });
  });

  jQuery(window).on('load', function() {});
})(jQuery);
