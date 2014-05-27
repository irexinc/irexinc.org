$(document).ready(function() {
  // Set our 'active' link in the header.
  if (location.protocol + "//" + location.host + "/" == location.toString()) {
    $('nav a[href$="' + location.toString() + '"] span').addClass("active");
  } else {
    $('nav a[href$="' + location.toString() + '"]').parent().addClass("active");
  }

  // This helps us make images thumbnails and then
  //   click to make bigger without opening a new page.
  $(".fancybox").fancybox({
    openEffect : 'none',
    closeEffect : 'none',
    helpers : {
      title : {
        type : 'outside'
      }
    }
  });
});


// Gaug.es tracking
var _gauges = _gauges || [];
(function() {
  var t   = document.createElement('script');
  t.type  = 'text/javascript';
  t.async = true;
  t.id    = 'gauges-tracker';
  t.setAttribute('data-site-id', '511e675ef5a1f51137000008');
  t.src = '//secure.gaug.es/track.js';
  var s = document.getElementsByTagName('script')[0];
  s.parentNode.insertBefore(t, s);
})();